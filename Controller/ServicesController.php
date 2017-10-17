<?php
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use App\Form\ContactForm;
use Cake\Mailer\Email;

class ServicesController extends AppController{
	public function initialize(){
        parent::initialize();
        $this->Auth->allow();
        $this->loadModel('Goods');
        $this->loadModel('Services');
        $this->loadModel('Templates');
        $this->loadModel('Forms');
        $this->loadModel('Shippings');
        $this->loadModel('Payments');
    }
    
    public function index(){
		return $this->redirect('/');
    }
    
    public function info($alias){
    	$service = $this->Services->find('all', ['conditions' => ['alias' => $alias, 'is_hidden' => false], 'contain' => ['Tabs']]);
    	if ($service->count() == 0){
    		throw new NotFoundException(__('Услуга не найдена'));
    	}
    	$service = $service->first();
    	
    	$this->set('children', $this->Services->find('all', ['conditions' => ['parent_id' => $service->id, 'is_hidden' => false], 'order' => 'menu_order DESC, link ASC']));
    	$this->set('goods', $this->Goods->find('all', ['conditions' => ['service_id' => $service->id, 'is_hidden' => false], 'order' => 'menu_order DESC']));
    	$this->set('service', $service);
    }
    
    function vote(){
    	$voted = $this->request->session()->read('voted');
    	$vote_id = $this->request->data['vote_id'];
    	$caption_id = $this->request->data['caption_id'];
    	if (!$voted || !in_array($vote_id, $voted)){
    		$caption = $this->Captions->get($caption_id);
    		$caption->voted_for++;
    		$this->Captions->save($caption);
    		$voted[] = $vote_id;
    		$this->request->session()->write('voted', $voted);
    	} else {
    		die('ALREADY');
    	}
    	die('OK');
    }
    
    function constructor($good_id){
    	$good = $this->Goods->get($good_id);
    	
    	$this->set('service', $this->Services->get($good->service_id));
    	$this->set('good', $good);
    	if ($good->additional_form_id){
    		$this->set('additional_form', $this->Forms->get($good->additional_form_id));
    	}
    	$this->set('templates', $this->Templates->find('all', ['conditions' => ['good_id' => $good_id]]));
    	$this->set('shipping', $this->Shippings->find('all', ['order' => 'price']));
    	$this->set('payments', $this->Payments->find('list')->toArray());
    	$this->set('page', $this->Pages->findByAlias('_constructor'));
    }
    
    function templateInfo($good_id){
    	//if ($this->request->isAjax()){
    		$data = file_get_contents('constructor/js/config.json');
    		$data = json_decode($data, true);
    		$templates = $this->Templates->find('all', ['conditions' => ['good_id' => $good_id]]);
    		foreach ($templates as $template){
    			$positions = json_decode($template->sector);
    			$data['articles'][] = [
					"template_id" => $template->id,
					"title" => $template->title,
					//"sizes": ["X", "M", "L", "XL"],
					"preview" => '/' . $template->preview,
					"template" => [
						"original" => '/' . $template->layer_down,
						"sectored" => '/' . $template->layer_up
					],
					"preview_sizes" => [
						"width" => 100,
						"height" => 280
					],
					"positions" => [
						"top" => ($positions[0]),
						"bottom" => ($positions[1])
					],
					"sizes_allow" => [
						"min" => [
							"width" => 100,
							"height" => 100
						],
						"max" => [
							"width" => 1000,
							"height" => 1000
						]
					]
				];
    		}
    		die(json_encode($data));
    	//}
    	exit();
    }
    
    function form($form_id){
    	$form = $this->Forms->get($form_id, ['contain' => ['Fields' => ['sort' => 'position']]]);
    	if ($this->request->is('post')){
    		$data = $this->request->data;
    		$email = new Email();
    		foreach ($_FILES['field']['name'] as $id => $f){
    			$email->attachments([$f => $_FILES['field']['tmp_name'][$id]]);
    			$data["field"][$id] = $f;
    		}
			$email->emailFormat('html')
				->from('no-reply@' . $_SERVER['SERVER_NAME'])
			    ->to($form->reciver)
			    ->subject('Новый заказ по форме - ' . $form->title)
			    ->template('new_order_form')
			    ->viewVars([
			    	'form' => $form,
			    	'data' => $data,
			    	'total' => @$_POST['coast'],
			    	'post' => $_POST,
			    	'order_id' => $order_id = 'ФР-' . rand(100000,999999)
			    ])
			    ->send();
			$this->set('done', true);
			$this->set('order_id', $order_id);
    	}
    	$goods = $this->Goods->findByFormId($form_id);
    	$this->set('goods', $goods);
    	$this->set('form', $form);
    	$this->set('shipping', $this->Shippings->find('all', ['order' => 'price']));
    	$this->set('payments', $this->Payments->find('list')->toArray());
    }
    
    public function orderSend(){
    	if ($this->request->is('post')){
    		$tmp_file = tmpfile();
    		$base64_str = substr($_POST['img'], strpos($_POST['img'], ",")+1);
			$decoded = base64_decode($base64_str);
			fwrite($tmp_file, $decoded);
    		$tmp_file_data = (stream_get_meta_data($tmp_file));
    		$attachments = ['product_'.date('H:i:s_d-m-Y') . '.png' => $tmp_file_data['uri']];
    		foreach (@$_POST['img_source'] as $i => $source){
    			if (substr($source,0,10) == 'data:image'){
    				$type = substr($source, strpos($source, '/') + 1, strpos($source, ';') - strpos($source, '/') - 1);
    				$tmp_files[$i] = tmpfile();
		    		$base64_str = substr($source, strpos($source, ",")+1);
					$decoded = base64_decode($base64_str);
					fwrite($tmp_files[$i], $decoded);
		    		$tmp_file_data = (stream_get_meta_data($tmp_files[$i]));
		    		$attachments['source_' . rand(0,100000) . ".$type"] = $tmp_file_data['uri'];
    			} else {
    				$ext = pathinfo(substr($source, 1));
    				$attachments['source_' . rand(0,100000) . '.' . $ext['extension']] = substr($source, 1);
    			}
    		}
    		$additional_form = false;
    		if (isset($this->request->data['additional_form_id'])){
    			$additional_form = $this->Forms->get($this->request->data['additional_form_id'], ['contain' => ['Fields' => ['sort' => 'position']]]);
    		}
			$email = new Email();
			$email
			    ->emailFormat('html')
			    ->subject('Новый заказ продукта на печать')
			    ->from('no-reply@glav-foto.ru')
			    ->to($this->configs['mail_printing'])
			    //->to('kail.sazerland@gmail.com')
			    ->template('product', 'admin')
			    ->viewVars([
			    	'order' => $this->request->data,
			    	'total' => $_POST['coast'],
			    	'good' => $this->Goods->get($this->request->data['good_id']),
			    	'form' => $additional_form,
			    	'data' => $this->request->data,
			    	'order_id' => $order_id = 'ПР-' . rand(100000,999999)
			    	]
			    )			    	
			    ->attachments($attachments)
			    ->send('Файлы на печать во вложении');
			fclose($tmp_file);
			$this->set('order_id', $order_id);
    	}
    }
    
    public function formatPrice($total){
    	$this->viewBuilder()->layout(false);
    	$this->set('total', $total);
    }
}
