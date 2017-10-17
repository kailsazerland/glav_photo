<div class="form-block center-block p-30 light-gray-bg border-clear">
	<h2 class="title">Войти на сайт</h2>
	<?=$this->Flash->render('auth', ['element' => 'Flash/error']);?>
	<?=$this->Form->create('', ['class' => 'form-horizontal']);?>
	<form class="form-horizontal">
		<div class="form-group has-feedback">
			<label for="inputUserName" class="col-sm-3 control-label">Электронная почта</label>
			<div class="col-sm-8">
				<?=$this->Form->email('mail', ['type' => 'text', 'class' => 'form-control'])?>
				<i class="fa fa-user form-control-feedback"></i>
			</div>
		</div>
		<div class="form-group has-feedback">
			<label for="inputPassword" class="col-sm-3 control-label">Пароль</label>
			<div class="col-sm-8">
				<?=$this->Form->password('password', ['class' => 'form-control'])?>
				<i class="fa fa-lock form-control-feedback"></i>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-3 col-sm-8">
				<div class="checkbox">
					<label>
						<input type="checkbox"> Запомнить меня
					</label>
				</div>											
				<button type="submit" class="btn btn-group btn-default btn-animated">Войти <i class="fa fa-user"></i></button>
				<ul class="space-top">
					<li><a href="#" marked="1">Забыли пароль?</a></li>
				</ul>
				<?/*
				<span class="text-center text-muted">Login with</span>
				<ul class="social-links colored circle clearfix">
					<li class="facebook"><a target="_blank" href="http://www.facebook.com" marked="1"><i class="fa fa-facebook"></i></a></li>
					<li class="twitter"><a target="_blank" href="http://www.twitter.com" marked="1"><i class="fa fa-twitter"></i></a></li>
					<li class="googleplus"><a target="_blank" href="http://plus.google.com" marked="1"><i class="fa fa-google-plus"></i></a></li>
				</ul>*/?>
			</div>
		</div>
	</form>
</div>
<p class="text-center space-top">Ещё нет аккаунта? <a href="/users/registration/" marked="1">Зарегистрируйтесь</a> сейчас.</p>
