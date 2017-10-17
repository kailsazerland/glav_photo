<?php
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use App\Form\ContactForm;
use Cake\Mailer\Email;
use ZipArchive;

class UploaderController extends AppController{
	public function initialize(){
        parent::initialize();
        $this->Auth->allow();
        $this->loadModel('Services');
        $this->loadModel('Slides');
        $this->loadModel('Formats');
        $this->loadModel('Photoprints');
        $this->loadModel('Shippings');
        $this->loadModel('Payments');
    }
    
    public function index(){
		$this->set('formats', $this->Formats->find('all'));
		$this->set('formats_list', $this->Formats->find('list'));
    }
    
    public function order(){
    	$order = $this->Photoprints->newEntity();
    	if ($this->request->is('post')){
    		$data = ($this->request->data);
	    	if (!isset($data['zip'])){
	    	   	$zip = new ZipArchive();
				$res = $zip->open($zip_name = 'img/orders/' . md5(rand(0, 1000000)) . '.zip', ZipArchive::CREATE);
				$formats = $this->Formats->find('list')->toArray();
				foreach ($data['file'] as $i => $file){
					$to_name = $i + 1;
					$ext = pathinfo($file);
					$to_name = $to_name . ' (' . $data['count'][$i] .' шт).' . $ext['extension'];
					$zip->addFile($file, $formats[$data['format'][$i]] . "/" . $to_name);
				}
				$zip->close();
				$this->set('zip', $zip_name);
				$order->zip = $zip_name;
				$order->fields = @$data['fields'];
				$order->paper = @$data['paper'];
				$order->fast = @$data['fast'];
				$order->coast = @$data['coast'];
	    	} else {
	    		$order = $this->Photoprints->newEntity($data);
	    		$order->order_id = 'ФТ-' . rand(100000,999999);
	    		$order->user_id = $this->Auth->user('id');
	    		if (!$order->errors()){
	    			$this->set('done', true);
	    			$this->Photoprints->save($order);
	    			$email = new Email();
					$email
					    ->emailFormat('html')
					    ->subject('Новый заказ печати фотографий')
					    ->from('no-reply@glav-foto.ru')
					    ->to($this->configs['mail_printing'])
					    ->template('photoprints', 'admin')
					    ->viewVars(['order' => $order, 'total' => $_POST['coast']])
					    ->attachments(['print_'.date('H:i:s_d-m-Y') . '.zip' => $order->zip])
					    ->send('Файлы на печать во вложении');
	    		} 
	    	}
    	} else {
    		return $this->redirect('/uploader/');
    	}
    	$this->set('order', $order);
    	$this->set('shipping', $this->Shippings->find('all', ['order' => 'price']));
    	$this->set('payments', $this->Payments->find('list')->toArray());
    }
}
