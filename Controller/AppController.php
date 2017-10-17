<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\I18n\I18n;


/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

		I18n::locale('ru_RU');

		$this->loadComponent('Auth', [
        	'loginAction' => [
	            'controller' => 'Users',
	            'action' => 'login'
	        ],
	        'authError' => 'Для продолжения работы авторизуйтесь',
	        'authenticate' => [
	            'Form' => [
	                'fields' => ['username' => 'mail', 'password' => 'password'],
	                'userModel' => 'Users'
	            ]
	        ]
        ]);
        
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadModel('Pages');
        $this->loadModel('Users');
        $this->loadModel('Configs');
        $this->loadModel('Services');
        $this->loadModel('Socials');
        
        if (!empty($_GET['r'])){
        	$this->request->session()->write('partner_id', $_GET['r']);
        }
    }
	
    public function beforeFilter(Event $event){
    	//pr($this->Auth->user());
    	if ($this->Auth->user()){
    		$user = $this->Users->get($this->Auth->user('id'));
    		if (!$user->first_auth){
    			$this->set('first_auth', true);
    			$user->first_auth = 1;
    			$this->Users->save($user);
    		}
    	}
    	$this->configs = $this->Configs->getAll();
    }
    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return void
     */
    public function beforeRender(Event $event)
    {
    	if ($this->Auth->user()){
    		$this->set('auth', $this->Users->get($this->Auth->user('id')));
    	} else {
    		$this->set('auth', $this->Auth->user());
    	}
    	if ($this->request->is('ajax')){
    		$this->viewBuilder()->layout(false);
    	}
    	$this->set('configs', $this->configs);
    	$this->set('pages_link', $this->Pages->find('all', ['valueField' => 'link', 'keyField' => 'alias', 'order' => '`menu_order` DESC', 'conditions' => ['in_menu' => true, 'is_hidden' => false]]));
    	$this->set('service_links', $this->Services->find('all', ['order' => '`menu_order` DESC', 'conditions' => ['is_hidden' => false, 'parent_id IS NULL'], 'contain' => ['Children' => ['sort' => 'menu_order DESC']]]));
    	//pr($this->Services->find('children', ['conditions' => ['id' => 1]])->find('threaded')->toArray());
    	
    	$this->set('socials', $this->Socials->find('all'));
    	$this->set('footer_services', $this->Services->find('all', ['conditions' => ['in_footer' => 1, 'is_hidden' => 0]]));
    }
}
