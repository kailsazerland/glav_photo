<?php
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use App\Form\ContactForm;

class IndexController extends AppController{
	public function initialize(){
        parent::initialize();
        $this->Auth->allow();
        $this->loadModel('Services');
        $this->loadModel('Slides');
    }
    
    public function index(){
		$this->set('slides', $this->Slides->find('all', ['conditions' => ['is_hidden' => 0], 'order' => 'created DESC']));
		$this->set('top_services', $this->Services->find('all', ['conditions' => ['on_mainpage' => 1], 'order' => 'menu_order DESC']));
    }
    
    public function feedback(){
    	$contact = new ContactForm();
    	 if ($this->request->is('post')) {
        	$data = $this->request->data;
        	$data['user_id'] = $this->Auth->user('id');
            if ($contact->execute($data)) {
                $this->Flash->success('Ваш запрос отправлен!');
                $this->set('done', true);
            } else {
                $this->Flash->error('Проверьте данные в форме ниже!');
            }
        }
		$page = $this->Pages->findByAlias('feedback')->first();
        $this->set('page', $page);
        $this->set('contact', $contact);
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
    
}
