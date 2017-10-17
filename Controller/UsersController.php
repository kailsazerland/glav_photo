<?php
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Mailer\Email;

class UsersController extends AppController
{
	public function initialize(){
        parent::initialize();
        $this->Auth->allow(['registration', 'remind']);
		$this->viewBuilder()->layout('users');
    }
    
	function logout(){
		$this->Auth->logout();
		return $this->redirect('/');
	}
	
	public function login(){
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                $user = $this->Users->get($this->Auth->user('id'));
                return $this->redirect($this->Auth->redirectUrl());
                //return $this->redirect('/cabinet/');
            }
            $this->Flash->error(__('Неверное имя пользователя или пароль'), [
                'key' => 'auth'
            ]);
        }
    }
    
    public function registration(){
    	if ($this->request->is('post')){
    		$user = $this->Users->newEntity($this->request->data);
    		if (!$user->errors()){
    			$this->Users->save($user);
    			$this->set('done', true);
    			$email = new Email('default');
    			$email->from(['no-reply@remind-service.com' => ' Remind-Service.com'])
				    ->to($this->request->data['mail'])
				    ->subject('Регистрационный данные на сайте Remind-Service.com')
				    ->emailFormat('html')
				    ->send('Вы зарегистрировались на сайте Remind-Service.com. Ваши регистрационные данные:<br><br>
				    	<b>Ваш логин:</b> ' . $this->request->data['mail'] . '<br><b>Ваш пароль:</b> ' . $this->request->data['password']);
    		}
    	} else {
    		$user = $this->Users->newEntity();
    	}
    	
    	$this->set('user', $user);
    }
    
    function remind(){
    	if ($this->request->is('post')){
    		$user = $this->Users->find('all', ['conditions' => ['mail' => $this->request->data['mail']]]);
    		if ($user->count() > 0){
    			$user = $user->first();
    			$new_password = substr(md5(rand(0,100000)), 0, 8);
    			$user->password = $new_password;
    			$this->Users->save($user);
	    		$email = new Email('default');
	    		$this->Flash->success('Новый пароль успешно выслан!');
	    		$this->set('done', true);
				$email->from(['no-reply@bigbonuses.ru' => 'Big Bonuses'])
				    ->to($user->mail)
				    ->subject('Новый пароль от сайта Big Bonuses')
				    ->emailFormat('html')
				    ->send('Вы запросили восстановление пароля от сайта BigBonuses.ru.<br><br><b>Ваш новый пароль:</b> ' . $new_password);
    		} else {
    			$this->Flash->error('Пользователь не найден!');
    		}
    	}
    }
}