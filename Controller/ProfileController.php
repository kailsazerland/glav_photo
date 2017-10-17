<?php
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use App\Form\PasswordForm;

class ProfileController extends AppController{
	public function initialize(){
        parent::initialize();
        //$this->Auth->allow();
        //$this->loadModel('Lots');
        $this->loadModel('Contacts');
        $this->loadModel('Groups');
        $this->viewBuilder()->layout('cabinet');
    }
    
    public function index(){

    }
    
	public function password(){
		$password = new PasswordForm();
    	 if ($this->request->is('post')) {
        	$data = $this->request->data;
        	$data['user_id'] = $this->Auth->user('id');
            if ($contact->execute($data)) {
                $this->Flash->success('Пароль успешно изменен!');
                $this->set('done', true);
            } else {
                $this->Flash->error('Проверьте данные в форме ниже!');
            }
        }
        $this->set('password', $password);
	}
}
