<?php
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use App\Form\ContactForm;
use Cake\I18n\Time;

class CabinetController extends AppController{
	public function initialize(){
        parent::initialize();
        //$this->Auth->allow();
        //$this->loadModel('Lots');
        $this->loadModel('Contacts');
        $this->loadModel('Groups');
        $this->loadModel('Events');
        $this->loadComponent('CustomDatetime');
        $this->viewBuilder()->layout('cabinet');
    }
    
    public function index(){
		//return $this->redirect('/cabinet/calendar');
    }
    
    public function add($date = null){
    	if ($this->request->is('post') || $this->request->is('put')){
    		$event = $this->request->data;
    		$event['user_id'] = $this->Auth->user('id');
    		$event['date'] = $this->CustomDatetime->parse($event['date']);
    		$event['remind_at'] = $this->CustomDatetime->parseDatetime($event['remind_at']);
    		$event = $this->Events->newEntity($event);
    		if (!$event->errors()){
    			$this->Events->save($event);
    			$this->Flash->success('Данные сохранены!');
    			$this->set('done', true);
    		} else {
    			$this->Flash->error('В заполненой форме есть ошибки!');
    		}
    	} else {
    		$event = $this->Events->newEntity();
    		$event['date'] = $this->CustomDatetime->formatFromString($date, 'j R Y');;
    	}
		$this->set('groups', ($this->Groups->find('all', ['conditions' => ['user_id' => $this->Auth->user('id')]])));
    	$this->set('contacts', ($this->Contacts->find('all', ['conditions' => ['Contacts.user_id' => $this->Auth->user('id')], 'contain' => ['Groups']])));
		
    	$this->set('event', $event);
    }
    
    function address(){
    	$this->set('contacts', $this->paginate($this->Contacts->find('all', ['conditions' => ['Contacts.user_id' => $this->Auth->user('id')], 'contain' => ['Groups']])));
    }
    
    function addressGroups(){
    	$this->set('groups', $this->paginate($this->Groups->find('all', ['conditions' => ['user_id' => $this->Auth->user('id')]])));
    }
    
    function addressContact($contact_id = null){
    	if ($contact_id){
    		$contact = $this->Contacts->find('all', ['conditions' => ['id' => $contact_id, 'user_id' => $this->Auth->user('id')]])->first();
    	} else {
    		$contact = $this->Contacts->newEntity();
    	}
    	if ($this->request->is('post') || $this->request->is('put')){
    		$contact = $this->Contacts->patchEntity($contact, $this->request->data);
    		$contact->user_id = $this->Auth->user('id');
    		if (!$contact->errors()){
    			$this->Contacts->save($contact);
    			$this->Flash->success('Данные сохранены!');
    			return $this->redirect('/cabinet/address/');
    		}
    	}
    	$this->set('contact', $contact);
    	$this->set('groups', $this->Groups->find('list', ['conditions' => ['user_id' => $this->Auth->user('id')]]));
    }
    
    function addressGroup($group_id = null){
    	if ($group_id){
    		$group = $this->Groups->find('all', ['conditions' => ['id' => $group_id, 'user_id' => $this->Auth->user('id')]])->first();
    	} else {
    		$group = $this->Groups->newEntity();
    	}
    	if ($this->request->is('post') || $this->request->is('put')){
    		$group = $this->Groups->patchEntity($group, $this->request->data);
    		$group->user_id = $this->Auth->user('id');
    		if (!$group->errors()){
    			$this->Groups->save($group);
    			$this->Flash->success('Данные сохранены!');
    			return $this->redirect('/cabinet/address_groups/');
    		}
    	}
    	$this->set('group', $group);
    }
    
    function addressImport(){
    	if ($this->request->is('post')){
    		$csv_file = $_FILES['csv']['tmp_name'];
    		$csv_data = array();
    		$file = file($csv_file);
    		foreach ($file as $line){
    			$csv_data[] = str_getcsv($line, ',');
    		}
    		if (!$csv_data || $_FILES['csv']['type'] != 'text/csv'){
    			$this->Flash->error('Неверный формат csv-файла!');
    		} else {
    			unset($csv_data[0]);
    			if (!isset($csv_data[1][0]) || !isset($csv_data[1][30])){
    				$this->Flash->error('Неверный формат csv-файла!');
    			} else {
    				foreach ($csv_data as $line){
    					$contact = $this->Contacts->newEntity([
    						'user_id' => $this->Auth->user('id'),
    						'name' => $line[0],
    						'phone' => $line[30],
    						'mail' => $line[28],
    						'group_id' => $this->request->data['group_id']
    					]);
    					$this->Contacts->save($contact);
    				}
    				$this->Flash->success('Данные импортировны!');
    				return $this->redirect('/cabinet/address/');
    			}
    		}
    	}
    	$this->set('groups', $this->Groups->find('list', ['conditions' => ['user_id' => $this->Auth->user('id')]]));
    }
    
    function addressDelete($contact_id){
    	$contact = $this->Contacts->find('all', ['conditions' => ['user_id' => $this->Auth->user('id'), 'id' => $contact_id]]);
    	if ($contact->count() > 0){
    		$this->Contacts->delete($contact->first());
    		$this->Flash->success('Контакт удалён!');
    	}
    	
    	return $this->redirect('/cabinet/address/');
    }
    
    function calendar($type = null, $current_year = null, $current_month = null, $current_week = null){
    	if (is_null($type) || !in_array($type, ['month', 'year', 'week'])){
    		$type = 'month';
    	}
    	
    	if (is_null($current_year)){
    		$current_year = date('Y');
    	}
    	if (is_null($current_month)){
    		$current_month = date('m');
    	}
    	if (is_null($current_week)){
    		$current_week = date('W');
    	}
    	
    	//события
    	if ($type == 'year'){
    		$events = $this->Events->getByYear($this->Auth->user('id'), $current_year);
    	}
    	if ($type == 'month'){
    		$events = $this->Events->getByMonth($this->Auth->user('id'), $current_year, $current_month);
    	}
    	if ($type == 'week'){
    		$events = $this->Events->getByWeek($this->Auth->user('id'), $current_year, $current_week);
    	}
    	
    	$this->set('events', $events);
    	$this->set('current_view', $type);
    	$this->set('current_year', $current_year);
    	$this->set('current_month', $current_month);
    	$this->set('current_week', $current_week);
    	
    }
    
    function day($date){
    	$this->set('events', $this->Events->find('all', ['conditions' => ['date' => $date, 'user_id' => $this->Auth->user('id')], 'order' => '`time`']));
    	$this->set('date', $date);
    }
    
    function event($id){
    	$event = $this->Events->find('all', ['id' => $id, 'user_id' => $this->Auth->user('id')])->first();
    	if (empty($event)){
    		throw new NotFoundException('Не найдено событие!');
    	}
    	
    	if ($this->request->is('post') || $this->request->is('put')){
    		$data = $this->request->data;
    		$data['date'] = $this->CustomDatetime->parse($data['date']);
    		$data['remind_at'] = $this->CustomDatetime->parseDatetime($data['remind_at']);
			$event = $this->Groups->patchEntity($event, $data);
    		$event->user_id = $this->Auth->user('id');
    		if (!$event->errors()){
    			$this->Events->save($event);
    			$this->Flash->success('Данные сохранены!');
    			//return $this->redirect('/cabinet/address_groups/');
    		}
    	} else {
    	   	$event['time'] = $event->time->i18nformat('HH:mm');
    	   	$event['remind_at'] = $this->CustomDatetime->format($event['remind_at'], 'H:i j R Y');
    	   	$event['date'] = $this->CustomDatetime->format($event['date'], 'j R Y');
    	}
    	
    	$this->set('groups', ($this->Groups->find('all', ['conditions' => ['user_id' => $this->Auth->user('id')]])));
    	$this->set('contacts', ($this->Contacts->find('all', ['conditions' => ['Contacts.user_id' => $this->Auth->user('id')], 'contain' => ['Groups']])));
		
    	$this->set('event', $event);
    	return $this->render('add');
    }
}
