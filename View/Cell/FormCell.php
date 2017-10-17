<?
namespace App\View\Cell;

use Cake\View\Cell;

class FormCell extends Cell
{

    public function display($form_id)
    {
    	$this->loadModel('Forms');
    	$form = $this->Forms->get($form_id, ['contain' => ['Fields' => ['sort' => 'position']]]);
    	$this->set('form', $form);
    }

}
?>