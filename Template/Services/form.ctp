<section class="main-container">
	<?if (isset($done) && $done):?>
		<div class="container">
			<div class="alert alert-success">
				Заявка успешно отправлена!<br>
				Номер вашего заказа: <b><?=$order_id?></b>
			</div>
		</div>
	<?Else:?>
		<form class="form-horizontal" method="POST" enctype="multipart/form-data">
		<div class="container">
			<div class="row">
	
				<!-- main start -->
				<!-- ================ -->
				<div class="main col-md-12">
	
					<!-- page-title start -->
					<!-- ================ -->
					<h1 class="page-title"><?=$form->title?></h1>
					<div class="separator-2"></div>
					<!-- page-title end -->
					<fieldset>
						<legend>Заполните нужные вам поля</legend>
							<div class="row">
								<div class="col-lg-3">
									<?foreach ($goods as $good):?>
										<h3><?=$good->title?></h3>
										<img src="/<?=$good->preview?>">
									<?endforeach;?>
								</div>
								<div class="col-lg-9">
									<?=$this->cell('Form', [$form->id])?>
									<?if ($form->has_contacts):?>
										<div class="separator"></div>
										<div class="form-group">
											<label for="inputEmail3" class="col-sm-4 control-label">Имя*</label>
											<div class="col-sm-8">
											 	<?=$this->Form->text('name', ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Ваше имя'])?>
											 	<?=$this->Form->error('name');?>
											</div>
										</div>
										<div class="form-group">
											<label for="inputEmail3" class="col-sm-4 control-label">E-mail*</label>
											<div class="col-sm-8">
												<?=$this->Form->email('mail', ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Ваш адрес электронной почты'])?>
											</div>
										</div>
										<div class="form-group">
											<label for="inputEmail3" class="col-sm-4 control-label">Телефон*</label>
											<div class="col-sm-8">
												<?=$this->Form->text('phone', ['class' => 'form-control', 'pattern' => '\+7[0-9]{10}', 'required' => 'required', 'placeholder' => 'В формате +7хххххххххх'])?>
											</div>
										</div>
										<div class="separator"></div>
									<?endif;?>
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
										<label for="inputEmail3" class="col-sm-4 control-label">Адрес</label>
										<div class="col-sm-8">
										 	<?=$this->Form->text('comment', ['class' => 'form-control', 'placeholder' => 'Заполните, если заказываете доставку'])?>
										</div>
									</div>
									<div class="form-group">
										<label for="inputEmail3" class="col-sm-4 control-label">Оплата*</label>
										<div class="col-sm-8">
										 	<?=$this->Form->select('payment', array_combine($payments, $payments), ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Ваше имя'])?>
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
									<?if (!empty($good)):?>
										<div class="form-group">
											<label for="inputEmail3" class="col-sm-4 control-label">Итого</label>
											<div class="col-sm-8">
												<?if (empty($good)):?>
													<b>Внимание!</b> Для просчёта стоимости форма должна быть прикрепленна к товару!
												<?else:?>
													<input type="hidden" value="<?=$good->price?>" name="coast" class="final_coast">
												 	<b id="coast_final" data-coast="<?=$good->price?>"><?=$this->Number->currency($good->price, 'RUB')?></b>
												 <?endif;?>
											</div>
										</div>
									<?endif;?>
								</div>
							</div>
							<div class="space"></div>
						</fieldset>
						<div class="text-right">	
							<input type="submit" class="btn btn-default" value="Отправить">
						</div>
				</div>
				<!-- main end -->
	
			</div>
		</div>
		</form>
	<?endif;?>
</section>