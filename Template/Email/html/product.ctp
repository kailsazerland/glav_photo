<h1>Печать продукта "<?=$good->title?>"</h1>
<h2>Номер заказа: <?=$order_id?></h2>
<table width="50%">
	<tr>
		<td width="50%"><b>Имя</b></td>
		<td width="50%"><?=$order['name']?></td>
	</tr>
	<tr>
		<td width="50%"><b>E-mail</b></td>
		<td width="50%"><?=$order['mail']?></td>
	</tr>
	<tr>
		<td width="50%"><b>Телефон</b></td>
		<td width="50%"><?=$order['phone']?></td>
	</tr>
	<tr>
		<td width="50%"><b>Доставка</b></td>
		<td width="50%"><?=$order['shipping']?></td>
	</tr>
	<tr>
		<td width="50%"><b>Оплата</b></td>
		<td width="50%"><?=$order['payment']?></td>
	</tr>
	<tr>
		<td width="50%"><b>Стоимость</b></td>
		<td width="50%"><?=$this->Number->currency($total, 'RUB');?> (<b>Внимание! Проверьте!</b>)</td>
	</tr>
	<?if($form):?>
		<?foreach ($form->fields as $field):?>
			<tr>
				<td width="50%"><b><?=$field->label?>:</b></td>
				<td width="50%"><?=@$data['field'][$field->id]?></td>
			</tr>
		<?endforeach;?>
	<?endif;?>
</table>
