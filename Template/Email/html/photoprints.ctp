<h1>Печать фотографий</h1>
<h2>Номер заказа: <?=$order->order_id?></h2>
<table width="50%">
	<tr>
		<td width="50%"><b>Имя</b></td>
		<td width="50%"><?=$order->name?></td>
	</tr>
	<tr>
		<td width="50%"><b>E-mail</b></td>
		<td width="50%"><?=$order->mail?></td>
	</tr>
	<tr>
		<td width="50%"><b>Телефон</b></td>
		<td width="50%"><?=$order->phone?></td>
	</tr>
	<tr>
		<td width="50%"><b>Доставка</b></td>
		<td width="50%"><?=$order->shipping?></td>
	</tr>
	<tr>
		<td width="50%"><b>Оплата</b></td>
		<td width="50%"><?=$order->payment?></td>
	</tr>
	<tr>
		<td width="50%"><b>Стоимость</b></td>
		<td width="50%"><?=$this->Number->currency($total, 'RUB');?> (<b>Внимание! Проверьте!</b>)</td>
	</tr>
	<tr>
		<td width="50%"><b>Поля печать</b></td>
		<td width="50%"><?if ($order->fields):?>да<?else:?>нет<?endif;?></td>
	</tr>
	<tr>
		<td width="50%"><b>Быстрая печать</b></td>
		<td width="50%"><?if ($order->fast):?>да<?else:?>нет<?endif;?></td>
	</tr>
	<tr>
		<td width="50%"><b>Бумага</b></td>
		<td width="50%"><?=$order->paper?></td>
	</tr>
	
	<tr>
		<td width="50%"><b>ZIP-файл</b></td>
		<td width="50%"><a href="http://<?=$_SERVER['SERVER_NAME']?>/<?=$order->zip?>">скачать</a></td>
	</tr>
</table>