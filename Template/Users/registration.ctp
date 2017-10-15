<div class="form-block center-block p-30 light-gray-bg border-clear">
	<h2 class="title">Регистрация на сайте</h2>
	<?if (isset($done) && $done):?>
    	<div class="alert alert-success">Вы успешно зарегистрированы! Теперь <a href="/users/login/" class="text-muted">авторизуйтесь на сайте</a>.</div>
    <?else:?>
		<?=$this->Form->create($user, ['class' => 'form-horizontal'])?>
			<div class="form-group has-feedback">
				<label for="inputName" class="col-sm-3 control-label">Тип профиля <span class="text-danger small">*</span></label>
				<div class="col-sm-8 for_switch">
					<?=$this->Form->radio('type', ['fl' => 'Физическое лицо', 'ul' => 'Юридическое лицо'], ['default' => "fl", 'delimiter' => '<br>', 'class' => ' form-control', 'required' => 'required'])?>
					<?if ($this->Form->hasError('type')):?>
	                	<p class="text-danger"><?=$this->Form->error('type')?></p>
	                <?endif;?>
				</div>
			</div>
			<div class="form-group has-feedback">
				<label for="inputName" class="col-sm-3 control-label">Ваше имя <span class="text-danger small">*</span></label>
				<div class="col-sm-8">
					<?=$this->Form->text('name', ['placeholder' => "Имя", 'class' => 'form-control', 'required' => 'required'])?>
					<i class="fa fa-pencil form-control-feedback"></i>
					<?if ($this->Form->hasError('name')):?>
	                	<p class="text-danger"><?=$this->Form->error('name')?></p>
	                <?endif;?>
				</div>
			</div>
			<div class="form-group has-feedback">
				<label for="inputEmail" class="col-sm-3 control-label">E-mail <span class="text-danger small">*</span></label>
				<div class="col-sm-8">
					<?=$this->Form->email('mail', ['placeholder' => "E-mail", 'class' => 'form-control', 'required' => 'required'])?>
					<i class="fa fa-envelope form-control-feedback"></i>
					<?if ($this->Form->hasError('mail')):?>
	                	<p class="text-danger"><?=$this->Form->error('mail')?></p>
	                <?endif;?>
				</div>
			</div>
			<div class="form-group has-feedback">
				<label for="inputPassword" class="col-sm-3 control-label">Пароль <span class="text-danger small">*</span></label>
				<div class="col-sm-8">
					<?=$this->Form->password('password', ['placeholder' => "Пароль", 'class' => 'form-control', 'required' => 'required'])?>
					<i class="fa fa-lock form-control-feedback"></i>
					<?if ($this->Form->hasError('password')):?>
	                	<p class="text-danger"><?=$this->Form->error('password')?></p>
	                <?endif;?>
				</div>
			</div>
			<div class="form-group has-feedback">
				<label for="inputPassword" class="col-sm-3 control-label">Повторение пароля <span class="text-danger small">*</span></label>
				<div class="col-sm-8">
					<?=$this->Form->password('password', ['placeholder' => "Повторение пароля", 'class' => 'form-control', 'required' => 'required'])?>
					<i class="fa fa-lock form-control-feedback"></i>
					<?if ($this->Form->hasError('password_repeat')):?>
	                	<p class="text-danger"><?=$this->Form->error('password_repeat')?></p>
	                <?endif;?>
				</div>
			</div>
			<div class="form-group has-feedback">
				<label for="inputName" class="col-sm-3 control-label">Телефон<span class="text-danger small">*</span></label>
				<div class="col-sm-8">
					<?=$this->Form->text('phone', ['placeholder' => "+7хххххххххх", 'class' => 'form-control', 'required' => 'required', 'pattern' => '\+7[0-9]{10}'])?>
					<i class="fa fa-phone form-control-feedback"></i>
					<?if ($this->Form->hasError('phone')):?>
	                	<p class="text-danger"><?=$this->Form->error('phone')?></p>
	                <?endif;?>
				</div>
			</div>
			<div class="form-group has-feedback switch switch_ul">
				<label for="inputName" class="col-sm-3 control-label">Имя компании <span class="text-danger small">*</span></label>
				<div class="col-sm-8">
					<?=$this->Form->text('company_name', ['placeholder' => "Название", 'class' => 'form-control', 'required' => 'required'])?>
					<i class="fa fa-pencil form-control-feedback"></i>
					<?if ($this->Form->hasError('company_name')):?>
	                	<p class="text-danger"><?=$this->Form->error('company_name')?></p>
	                <?endif;?>
				</div>
			</div>
			<div class="form-group has-feedback">
				<label for="inputName" class="col-sm-3 control-label">Страна, город<span class="text-danger small">*</span></label>
				<div class="col-sm-8">
					<?=$this->Form->text('city', ['placeholder' => "Страна, город", 'class' => 'form-control', 'required' => 'required'])?>
					<i class="fa fa-location-arrow form-control-feedback"></i>
					<?if ($this->Form->hasError('city')):?>
	                	<p class="text-danger"><?=$this->Form->error('city')?></p>
	                <?endif;?>
				</div>
			</div>
			<div class="form-group has-feedback">
				<label for="inputName" class="col-sm-3 control-label">Адрес</label>
				<div class="col-sm-8">
					<?=$this->Form->text('address', ['placeholder' => "Адрес", 'class' => 'form-control'])?>
					<i class="fa fa-location-arrow form-control-feedback"></i>
					<?if ($this->Form->hasError('address')):?>
	                	<p class="text-danger"><?=$this->Form->error('address')?></p>
	                <?endif;?>
				</div>
			</div>
			<div class="form-group has-feedback">
				<label for="inputName" class="col-sm-3 control-label">Примечание</label>
				<div class="col-sm-8">
					<?=$this->Form->text('comment', ['placeholder' => "Примечание", 'class' => 'form-control'])?>
					<i class="fa fa-pencil form-control-feedback"></i>
					<?if ($this->Form->hasError('comment')):?>
	                	<p class="text-danger"><?=$this->Form->error('comment')?></p>
	                <?endif;?>
				</div>
			</div>
			<div class="form-group has-feedback">
				<label for="inputName" class="col-sm-3 control-label">Сумма 7+5<span class="text-danger small">*</span></label>
				<div class="col-sm-3">
					<?=$this->Form->text('captcha', ['placeholder' => "Сумма", 'class' => 'form-control', 'pattern' => '12', 'required' => 'required'])?>
					<i class="fa fa-child form-control-feedback"></i>
					<?if ($this->Form->hasError('captcha')):?>
	                	<p class="text-danger"><?=$this->Form->error('comment')?></p>
	                <?endif;?>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-3 col-sm-8">
					<div class="checkbox">
						<label>
							<?=$this->Form->checkbox('accept', ['required' => 'required'])?> С <a href="/pages/rules/">правилами предоставления услуги «Напоминание»</a> и <a href="/pages/politics/">политикой конфиденциальности</a> ознакомлен</a>.
						</label>
						<?if ($this->Form->hasError('accept')):?>
		                	<p class="text-danger"><?=$this->Form->error('accept')?></p>
		                <?endif;?>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-3 col-sm-8">
					<button type="submit" class="btn btn-group btn-default btn-animated">Зарегистрироваться <i class="fa fa-check"></i></button>
				</div>
			</div>
		</form>
	<?endif;?>
</div>
<script type="text/javascript">
	
</script>