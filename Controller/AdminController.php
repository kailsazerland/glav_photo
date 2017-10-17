<?php
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\Auth\DefaultPasswordHasher;

class AdminController extends AppController
{
	public $paginate = [
		'limit' => 30
	];
	
	public $menu = [
		'/admin/slides/' => [
			'title' => 'Слайд-шоу',
			'icon' => 'th-large'
		],
		'/admin/pages/' => [
			'title' => 'Страницы',
			'icon' => 'list-alt'
		],
		'/admin/services/' => [
			'title' => 'Услуги',
			'icon' => 'picture',
			'children' => [
				'/admin/services/' => 'Все услуги',
				'/admin/auto_list/Shippings/' => 'Доставки',
				'/admin/auto_list/Payments/' => 'Способы оплаты'
			]
		],
		'/admin/goods/' => [
			'title' => 'Товары',
			'icon' => 'tags'
		],
		'/admin/auto_list/Formats/' => [
			'title' => 'Фотопечать',
			'icon' => 'camera',
			'children' => [
				'/admin/auto_list/Photoprints/' => 'Заказы',
				'/admin/auto_list/Formats/' => 'Форматы печати'
			]
		],
		'/admin/auto_list/Forms/' => [
			'icon' => 'list',
			'title' => 'Формы',
			'children' => [
				'/admin/auto_list/Forms/' => 'Формы',
				'/admin/auto_list/Fields/' => 'Поля форм'
			]
		],
		'/admin/users/' => [
			'title' => 'Пользователи',
			'icon' => 'user'
		],
		'/admin/auto_list/Socials/' => [
			'title' => 'Социалки',
			'icon' => 'globe'
		],
		'/admin/configs/' => [
			'title' => 'Параметры, настройки',
			'icon' => 'cog'
		]
	];
	
	public function initialize(){
        parent::initialize();
        $this->Auth->config('authorize', ['Controller']);
        $this->viewBuilder()->layout('admin');
        $this->loadModel('Users');
        $this->loadModel('Pages');
        $this->loadModel('Services');
        $this->loadModel('Slides');
        $this->loadModel('Goods');
        $this->loadModel('Tabs');
        $this->loadModel('Templates');
        $this->loadModel('Socials');
        $this->loadModel('Formats');
        $this->loadModel('Photoprints');
        $this->loadModel('Forms');
        $this->loadModel('Fields');
        $this->loadModel('Shippings');
        $this->loadModel('Payments');

        $this->loadModel('Configs');
        $this->loadComponent('Paginator');
    }
    
    function beforeRender(\Cake\Event\Event $event){
    	parent::beforeRender($event);
    	//$this->set('auth', $this->Auth->user());
    	$this->set('menu', $this->menu);
    }
    
    public function isAuthorized($user = null){
        return $user['is_admin'];
    }

    public function index(){
        $this->set('new_photoprints', $this->Photoprints->find('all', ['conditions' => ['status' => 0]])->count());
    }
    
    public function login(){
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Неверное имя пользователя или пароль'));
        }
    }
    
    public function autoList($model){
    	$this->set('auto', $this->{$model}->admin);
    	$this->set('model', $model);
    	$order = false;
    	if (isset($this->{$model}->admin['order'])){
    		$order = $this->{$model}->admin['order'];
    	}
    	$this->set('items', $this->paginate($this->{$model}->find('all', ['order' => $order])));
    	$this->generateLists($model);
    }
    
    public function autoItem($model, $item_id = null){
    	if ($item_id){
    		$item = $this->{$model}->get($item_id);
    	} else {
    		$item = $this->{$model}->newEntity();
    	}
    	if ($this->request->is('post') || $this->request->is('put')){
    		if (empty($this->request->data['password'])){
    			unset($this->request->data['password']);
    		}
    		$item = $this->{$model}->patchEntity($item, $this->request->data, ['validate' => false]);
    		if (1==1 || !$item->errors()){
    			if (!empty($_FILES['avatar']['name'])){
    				$path_info = pathinfo($_FILES['avatar']['name']);
    				$fname = substr(md5(rand(0,100000)),0,8) . '.' . $path_info['extension'];
					copy($_FILES['avatar']['tmp_name'], $fname = 'img/avatars/' . $fname);
    				$item->avatar = $fname;
    			}
    			$this->{$model}->save($item);
    			$this->Flash->success('Данные сохранены!');
    			return $this->redirect('/admin/auto_list/' . $model . '/');
    		}
    	}
    	$this->set('item', $item);
    	$this->set('auto', $this->{$model}->admin);
    	$this->set('model', $model);
    	$this->generateLists($model);
    }
    
    private function generateLists($model){
    	foreach ($this->{$model}->admin['schema'] as $field => $item){
    		if ($item['type'] == 'list'){
    			$assoc = $this->{$model}->associations();
    			foreach ($assoc as $title => $data){
    				if ($data->foreignKey() == $field){
    					//формируем список
    					$this->set($field . '_values', ($data->find('list')->toArray()));
    				}
    			}
    		}
    	}
    }
    
    public function reviews(){
    	$this->set('reviews', $this->paginate($this->Reviews->find('all', ['contain' => ['Users'], 'order' => 'Reviews.created DESC'])));
    	//$this->set('reviews', $this->paginate($this->Reviews));
    }
    
    public function users(){
    	$this->set('users', $this->Users->find('all'));
    }
    
    public function pages(){
    	$this->set('pages', $this->Pages->find('all'));
    }
    
    public function slides(){
    	$this->set('slides', $this->Slides->find('all'));
    }
    
    public function lots(){
    	$this->set('lots', $this->Lots->find('all'));
    }
    
    public function services(){
    	$this->set('services', $this->paginate($this->Services->find('all', ['contain' => ['Parent', 'Tabs']])));
    }
    
    public function goods(){
    	$this->set('goods', $this->paginate($this->Goods->find('all', ['contain' => ['Services', 'Templates']])));
    }
    
    public function configs(){
    	if ($this->request->is('post')){
    		$data = $this->request->data;
    		foreach ($data as $name => $value){
    			$config = $this->Configs->findByName($name)->first();
    			$config->value = $value;
    			$this->Configs->save($config);
    		}
    		$this->set('done', true);
    	}
    	$this->set('configs_data', $this->Configs->find('all'));
    }
    
    public function page($page_id = null){
    	if ($page_id){
    		$page = $this->Pages->get($page_id);
    	} else {
    		$page = $this->Pages->newEntity();
    	}
    	if ($this->request->is('post') || $this->request->is('put')){
    		if (empty($this->request->data['password'])){
    			unset($this->request->data['password']);
    		}
    		$page = $this->Pages->patchEntity($page, $this->request->data);
    		if (!$page->errors()){
    			if (!empty($_FILES['avatar']['name'])){
    				$path_info = pathinfo($_FILES['avatar']['name']);
    				$fname = substr(md5(rand(0,100000)),0,8) . '.' . $path_info['extension'];
					copy($_FILES['avatar']['tmp_name'], $fname = 'img/avatars/' . $fname);
    				$page->avatar = $fname;
    			}
    			$this->Pages->save($page);
    			$this->Flash->success('Данные сохранены!');
    			return $this->redirect('/admin/pages/');
    		}
    	}
    	$this->set('page', $page);
    }
    
    public function tab($tab_id = null){
    	if ($tab_id){
    		$tab = $this->Tabs->get($tab_id);
    	} else {
    		$tab = $this->Tabs->newEntity();
    	}
    	if ($this->request->is('post') || $this->request->is('put')){
    		$tab = $this->Tabs->patchEntity($tab, $this->request->data);
    		if (!$tab->errors()){
    			if (!empty($_FILES['avatar']['name'])){
    				$path_info = pathinfo($_FILES['avatar']['name']);
    				$fname = substr(md5(rand(0,100000)),0,8) . '.' . $path_info['extension'];
					copy($_FILES['avatar']['tmp_name'], $fname = 'img/avatars/' . $fname);
    				$tab->avatar = $fname;
    			}
    			$this->Tabs->save($tab);
    			$this->Flash->success('Данные сохранены!');
    			return $this->redirect('/admin/services/');
    		}
    	}
    	$this->set('tab', $tab);
    	$this->set('services', $this->Services->find('list', ['order' => 'title']));
    }
    
    public function good($good_id = null){
    	if ($good_id){
    		$good = $this->Goods->get($good_id);
    	} else {
    		$good = $this->Goods->newEntity();
    	}
    	if ($this->request->is('post') || $this->request->is('put')){
    		unset($this->request->data['preview']);
    		$good = $this->Goods->patchEntity($good, $this->request->data);
    		if (!$good->errors()){
    			if (!empty($_FILES['preview']['tmp_name'])){
    				$path_info = pathinfo($_FILES['preview']['name']);
    				$fname = substr(md5(rand(0,100000)),0,8) . '.' . $path_info['extension'];
					copy($_FILES['preview']['tmp_name'], $fname = 'img/goods/' . $fname);
    				$good->preview = $fname;
    			}
    			
    			$this->Goods->save($good);
    			$this->Flash->success('Данные сохранены!');
    			return $this->redirect('/admin/Goods/');
    		}
    	}
    	$this->set('good', $good);
    	$this->set('services', $p = $this->Services->find('list', ['order' => 'title']));
    	$this->set('forms', $this->Forms->find('list', ['order' => 'title']));
    }
    
    public function template($template_id = null){
    	$images = ['preview', 'layer_down', 'layer_up'];
    	if ($template_id){
    		$template = $this->Templates->get($template_id);
    	} else {
    		$template = $this->Templates->newEntity();
    	}
    	if ($this->request->is('post') || $this->request->is('put')){
    		foreach ($images as $img){
    			unset($this->request->data[$img]);
    		}
    		$template = $this->Templates->patchEntity($template, $this->request->data);
    		if (!$template->errors()){
    			foreach ($images as $img){
	    			if (!empty($_FILES[$img]['tmp_name'])){
	    				$path_info = pathinfo($_FILES[$img]['name']);
	    				$fname = substr(md5(rand(0,100000)),0,8) . '.' . $path_info['extension'];
						copy($_FILES[$img]['tmp_name'], $fname = 'img/templates/' . $fname);
	    				$template->{$img} = $fname;
	    			}
    			}
    			$this->Templates->save($template);
    			$this->Flash->success('Данные сохранены!');
    			return $this->redirect('/admin/goods/');
    		}
    	}
    	$this->set('template', $template);
    	$this->set('goods', $p = $this->Goods->find('list', ['order' => 'title']));
    }
    
    public function service($service_id = null){
    	if ($service_id){
    		$service = $this->Services->get($service_id);
    	} else {
    		$service = $this->Services->newEntity();
    	}
    	if ($this->request->is('post') || $this->request->is('put')){
    		if (empty($this->request->data['password'])){
    			unset($this->request->data['password']);
    		}
    		unset($this->request->data['banner']);
    		unset($this->request->data['icon']);
    		unset($this->request->data['icon_mainmenu']);
    		unset($this->request->data['icon_mainmenu_hover']);
    		$service = $this->Services->patchEntity($service, $this->request->data);
    		if (!$service->errors()){
    			if (!empty($_FILES['banner']['tmp_name'])){
    				$path_info = pathinfo($_FILES['banner']['name']);
    				$fname = substr(md5(rand(0,100000)),0,8) . '.' . $path_info['extension'];
					copy($_FILES['banner']['tmp_name'], $fname = 'img/services/' . $fname);
    				$service->banner = $fname;
    			}
    			if (!empty($_FILES['icon']['tmp_name'])){
    				$path_info = pathinfo($_FILES['icon']['name']);
    				$fname = substr(md5(rand(0,100000)),0,8) . '.' . $path_info['extension'];
					copy($_FILES['icon']['tmp_name'], $fname = 'img/services/' . $fname);
    				$service->icon = $fname;
    			}
    			if (!empty($_FILES['icon_mainmenu']['tmp_name'])){
    				$path_info = pathinfo($_FILES['icon_mainmenu']['name']);
    				$fname = substr(md5(rand(0,100000)),0,8) . '.' . $path_info['extension'];
					copy($_FILES['icon_mainmenu']['tmp_name'], $fname = 'img/services/' . $fname);
    				$service->icon_mainmenu = $fname;
    			}
    			if (!empty($_FILES['icon_mainmenu_hover']['tmp_name'])){
    				$path_info = pathinfo($_FILES['icon_mainmenu_hover']['name']);
    				$fname = substr(md5(rand(0,100000)),0,8) . '.' . $path_info['extension'];
					copy($_FILES['icon_mainmenu_hover']['tmp_name'], $fname = 'img/services/' . $fname);
    				$service->icon_mainmenu_hover = $fname;
    			}
    			$this->Services->save($service);
    			$this->Flash->success('Данные сохранены!');
    			return $this->redirect('/admin/services/');
    		}
    	}
    	$this->set('service', $service);
    	$cond = ['parent_id is NULL']; if (!is_null($service_id)) $cond['id <>'] = $service_id; 
    	$this->set('parents', $p = $this->Services->find('list', ['conditions' => $cond]));
    }
    
    
    public function slide($slide_id = null){
    	if ($slide_id){
    		$slide = $this->Slides->get($slide_id);
    	} else {
    		$slide = $this->Slides->newEntity();
    	}
    	if ($this->request->is('post') || $this->request->is('put')){
    		unset($this->request->data['slide']);
    		$slide = $this->Slides->patchEntity($slide, $this->request->data);
    		if (!$slide->errors()){
    			if (!empty($_FILES['slide']['tmp_name'])){
    				$path_info = pathinfo($_FILES['slide']['name']);
    				$fname = substr(md5(rand(0,100000)),0,8) . '.' . $path_info['extension'];
					copy($_FILES['slide']['tmp_name'], $fname = 'img/slides/' . $fname);
    				$slide->slide = $fname;
    			}
    			
    			$this->Slides->save($slide);
    			$this->Flash->success('Данные сохранены!');
    			return $this->redirect('/admin/slides/');
    		}
    	}
    	$this->set('slide', $slide);
    }
    
    public function stake($stake_id = null){
    	if ($stake_id){
    		$stake = $this->Stakes->get($stake_id);
    	} else {
    		$stake = $this->Stakes->newEntity();
    	}
    	if ($this->request->is('post') || $this->request->is('put')){
    		if (empty($this->request->data['password'])){
    			unset($this->request->data['password']);
    		}
    		$stake = $this->Stakes->patchEntity($stake, $this->request->data);
    		if (!$stake->errors()){
    			if (!empty($_FILES['image']['tmp_name'])){
    				$path_info = pathinfo($_FILES['image']['name']);
    				$fname = substr(md5(rand(0,100000)),0,8) . '.' . $path_info['extension'];
					copy($_FILES['image']['tmp_name'], $fname = 'img/stakes/' . $fname);
    				$stake->img = $fname;
    			}
    			$this->Stakes->save($stake);
    			$this->Flash->success('Данные сохранены!');
    			return $this->redirect('/admin/stakes/');
    		}
    	}
    	$this->set('stake', $stake);
    }
    
    public function setModerated($review_id, $status){
    	$review = $this->Reviews->get($review_id);
    	$review->moderated = $status;
    	$this->Reviews->save($review);
    	return $this->redirect($this->referer());
    }
    
    public function user($user_id = null){
    	if ($user_id){
    		$user = $this->Users->get($user_id);
    	} else {
    		$user = $this->Users->newEntity();
    	}
    	if ($this->request->is('post') || $this->request->is('put')){
    		if (empty($this->request->data['password'])){
    			unset($this->request->data['password']);
    		}
    		$user = $this->Users->patchEntity($user, $this->request->data, ['accessibleFields' => ['is_admin' => true]]);
    		if (!$user->errors()){
    			$this->Users->save($user);
    			$this->Flash->success('Данные сохранены!');
    			return $this->redirect('/admin/users/');
    		}
    	}
    	
    	$this->set('user', $user);
    }
    
    public function votes(){
    	$this->set('votes', $this->Votes->find('all', ['order' => 'Votes.created DESC', 'contain' => ['Captions' => ['sort' => 'Captions.sort DESC']]]));
    }
    
    public function vote($vote_id = null){
    	if ($vote_id){
    		$vote = $this->Votes->get($vote_id);
    	} else {
    		$vote = $this->Votes->newEntity();
    	}
    	if ($this->request->is('post') || $this->request->is('put')){
    		$vote = $this->Votes->patchEntity($vote, $this->request->data);
    		if (!$vote->errors()){
    			
    			$this->Votes->save($vote);
    			$this->Flash->success('Данные сохранены!');
    			return $this->redirect('/admin/votes/');
    		}
    	}
    	$this->set('vote', $vote);
    }
    
    public function caption($caption_id = null){
		if ($caption_id){
    		$caption = $this->Captions->get($caption_id);
    	} else {
    		$caption = $this->Captions->newEntity();
    	}
    	if ($this->request->is('post') || $this->request->is('put')){
    		$caption = $this->Captions->patchEntity($caption, $this->request->data);
    		if (!$caption->errors()){
    			
    			$this->Captions->save($caption);
    			$this->Flash->success('Данные сохранены!');
    			return $this->redirect('/admin/votes/');
    		}
    	}
    	$this->set('votes', $this->Votes->find('list', ['order' => 'title DESC']));
    	$this->set('caption', $caption);
    }

    public function logout(){
        return $this->redirect($this->Auth->logout());
    }
    
    public function delete($model, $id){
    	$entity = $this->{$model}->get($id);
		$result = $this->{$model}->delete($entity);
    	return $this->redirect($this->referer());
    }
    
    public function top(){
    	$this->set('users', $this->Users->find('all', ['conditions' => ['referals_count >' => 0], 'order' => 'referals_bought_count DESC']));
    }
    
    public function deleteImage($model, $field, $id){
    	$entity = $this->{$model}->get($id);
    	unlink($entity->{$field});
    	$entity->{$field} = null;
    	$this->{$model}->save($entity);
    	return $this->redirect($this->referer());
    }
}