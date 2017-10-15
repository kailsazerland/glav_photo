<div class="container">
	<div class="col-md-6 col-md-offset-3 well">
		<h2>Войти на сайт</h2>
		<?=$this->Flash->render();?>
		<?=$this->Form->create('', ['class' => 'form-horizontal']);?>
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">Email</label>
				<div class="col-sm-10">
					<?=$this->Form->text('login', ['type' => 'text', 'class' => 'form-control'])?>
				</div>
			</div>
			<div class="form-group">
				<label for="password" class="col-sm-2 control-label">Пароль</label>
				<div class="col-sm-10">
					<?=$this->Form->password('password', ['class' => 'form-control'])?>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-success">Войти</button>
				</div>
			</div>
		<?=$this->Form->end();?>
	</div>
</div>