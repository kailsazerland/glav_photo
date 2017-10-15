<div class="container">
	<h1>Заказ печати фотографий</h1>
	<div class="separator-2"></div>
	<div class="well">
		<?if (isset($done) && $done):?>
			<div class="alert alert-success">
				Ваш заказ успешно принят!<br>
				С вами свяжется наш менеджер.<br>
				Номер вашего заказа: <b><?=$order->order_id?></b>
			</div>
		<?else:?>
			<h2>Детали заказа</h2>
			<?=$this->Form->create($order, ['class' => 'form-horizontal'])?>
				<?=$this->Form->hidden('zip')?>
				<?=$this->Form->hidden('fast')?>
				<?=$this->Form->hidden('paper')?>
				<?=$this->Form->hidden('fields')?>
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-4 control-label">Имя*</label>
					<div class="col-sm-8">
					 	<?=$this->Form->text('name', ['class' => 'form-control', 'required' => 'required', 'placeholder' => ''])?>
					 	<?=$this->Form->error('name');?>
					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-4 control-label">E-mail*</label>
					<div class="col-sm-8">
						<?=$this->Form->email('mail', ['class' => 'form-control', 'required' => 'required', 'placeholder' => ''])?>
					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-4 control-label">Телефон*</label>
					<div class="col-sm-8">
						<?=$this->Form->text('phone', ['class' => 'form-control', 'pattern' => '\+7[0-9]{10}', 'required' => 'required', 'placeholder' => 'в формате +7хххххххххх'])?>
					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-4 control-label">Доставка*</label>
					<div class="col-sm-8">
					 	<select name="shipping" class="form-control shipping" required>
					 		<?foreach ($shipping as $ship):?>
					 			 <option value="<?=$ship->title?>" data-price="<?=$ship->price?>"><?=$ship->title?>
					 			 (<?if ($ship->price == 0):?>бесплатно<?else:?>+<?=$this->Number->currency($ship->price, 'RUB')?><?endif;?>)</option>
					 		<?endforeach;?>
					 	</select>
					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-4 control-label">Оплата*</label>
					<div class="col-sm-8">
					 	<?=$this->Form->select('payment', array_combine($payments, $payments), ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Ваше имя'])?>
					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-4 control-label">Итого</label>
					<input type="hidden" value="<?=$order->coast?>" name="coast" class="final_coast">
					<div class="col-sm-8">
					 	<b id="coast_final" data-coast="<?=$order->coast?>"><?=$this->Number->currency($order->coast, 'RUB')?></b>
					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-4 control-label">Комментарий к заказу</label>
					<div class="col-sm-8">
					 	<?=$this->Form->textarea('ship',['class' => 'form-control', 'placeholder' => ''])?>
					</div>
				</div>
				<?if ($configs['captcha_question'] && $configs['captcha_answer']):?>
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-4 control-label">
							<?=$configs['captcha_question']?>
						</label>
						<div class="col-sm-4">
						 	<?=$this->Form->text('captcha',['class' => 'form-control', 'required', 'pattern' => "{$configs['captcha_answer']}"])?>
						</div>
					</div>
				<?endif;?>
				<div class="form-group">
					<div class="col-sm-offset-4 col-sm-8">
						<button type="submit" class="btn btn-default">Оформить заказ</button>
					</div>
				</div>
			</form>
		<?endif;?>
	</div>
</div>