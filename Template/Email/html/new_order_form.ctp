<h1>Заказ по форме <?=$form->title?></h1>
<h2>Номер заказа: <?=$order_id?></h2>
<?foreach ($form->fields as $field):?>
	<b><?=$field->label?>:</b> <?=@$data['field'][$field->id]?><br>
<?endforeach;?>
<?if ($form->has_contacts):?>
	<b>Имя:</b> <?=@$data['name']?><br>
	<b>E-mail:</b> <?=@$data['mail']?><br>
	<b>Телефон:</b> <?=@$data['phone']?><br>
<?endif;?>
<b>Пожелания:</b> <?=@$data['comment']?>
<b>Полная стоимость:</b> <?=$total?><br>
<b>Оплата:</b> <?=$post['payment']?><br>
<b>Доставка:</b> <?=$post['shipping']?>