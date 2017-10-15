<?namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\I18n\Time;

class CustomDatetimeComponent extends Component
{
	public $monthes_rus = [1 => 'Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'];
	public $monthes_eng = [1 => 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
	
    public function parse($string)
    {
		$day = substr($string, 0, strpos($string, ' '));
		$string = substr($string, strpos($string, ' ') + 1);
		$month = substr($string, 0, strpos($string, ' '));
		$month = array_search($month, $this->monthes_rus);
		if (strlen($month) == 1) $month = '0' . $month;
		$string = substr($string, strpos($string, ' ') + 1);
		$year = $string;
		return "$year-$month-$day";
    }
    
    public function parseDatetime($string)
    {
    	$time = substr($string, 0, strpos($string, ' '));
    	$string = substr($string, strpos($string, ' ') + 1);
    	
		return $this->parse($string) . ' ' . $time . ":00";
    }
    
    public function format($datetime, $format){
    	if (!$datetime) return false;
    	$datetime = $datetime->toUnixString();
    	$result = date($format, $datetime);
    	$result = str_replace('R', $this->monthes_rus[date('n', $datetime)], $result);
    	return $result;
    }
    
    public function formatFromString($datetime, $format){
    	return $this->format(Time::parse($datetime), $format);
    }
}?>