<h2><i class="glyphicon glyphicon-user"></i> Пользователь (добавление/редатирование)</h2>
<a href="/admin/users/">&larr; назад</a>
<div class="row">
	<div class="col-md-8 col-md-offset-2 well">
		<?=$this->Form->create($user, ['class' => 'form-horizontal', "autocomplete" => 'off']);?>
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">Имя</label>
				<div class="col-sm-10">
					<?=$this->Form->text('name', ['class' => 'form-control', "autocomplete" => 'off'])?>
					<?if ($this->Form->hasError('name')):?>
						<p class="text-danger"><?=$this->Form->error('name')?></p>
					<?endif;?>
				</div>
			</div>
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">E-mail</label>
				<div class="col-sm-10">
					<?=$this->Form->text('mail', ['class' => 'form-control', "autocomplete" => 'off'])?>
					<?if ($this->Form->hasError('mail')):?>
						<p class="text-danger"><?=$this->Form->error('mail')?></p>
					<?endif;?>
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Пароль</label>
					<div class="col-sm-10">
						<?=$this->Form->password('password', ['class' => 'form-control', 'value' => '', 'required' => 'no', "autocomplete" => 'off'])?>
					</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Админ</label>
				<div class="col-sm-10">
					<?=$this->Form->checkbox('is_admin', ['class' => '', "autocomplete" => 'off'])?>
				</div>
			</div>
						
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-success">Сохранить</button>
				</div>
			</div>
		<?=$this->Form->end();?>
	</div>
</div>
