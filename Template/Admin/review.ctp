<h2><i class="glyphicon glyphicon-comment"></i> Отзыв (добавление/редатирование)</h2>
<a href="/admin/reviews/">&larr; назад</a>
<div class="row">
	<div class="col-md-10 col-md-offset-1 well">
		<?=$this->Form->create($review, ['class' => 'form-horizontal', 'type' => 'file']);?>
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">Пользователь</label>
				<div class="col-sm-10">
					<?=$this->Form->select('user_id', $users, ['class' => 'form-control', "autocomplete" => 'off', 'empty' => 'указанный вручную'])?>
					<?if ($this->Form->hasError('user_id')):?>
						<p class="text-danger"><?=$this->Form->error('user_id')?></p>
					<?endif;?>
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Имя (вручную)</label>
					<div class="col-sm-10">
						<?=$this->Form->text('name_manual', ['class' => 'form-control', "autocomplete" => 'off'])?>
					</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Аватар</label>
					<div class="col-sm-10">
						<?=$this->Form->file('avatar', ["autocomplete" => 'off'])?>
					</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Содержание</label>
					<div class="col-sm-10">
						<?=$this->Form->textarea('content', ['class' => 'form-control', "autocomplete" => 'off'])?>
					</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Youtube</label>
					<div class="col-sm-10">
						<?=$this->Form->text('youtube', ['class' => 'form-control', "autocomplete" => 'off'])?>
					</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Вконтакте</label>
					<div class="col-sm-10">
						<?=$this->Form->text('vk_profile', ['class' => 'form-control', "autocomplete" => 'off'])?>
					</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Facebook</label>
					<div class="col-sm-10">
						<?=$this->Form->text('fb_profile', ['class' => 'form-control', "autocomplete" => 'off'])?>
					</div>
			</div>
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">Модерация</label>
				<div class="col-sm-10">
					<?=$this->Form->select('moderated', [-1 => 'Отказано', 0 => 'Ожидается', 1 => 'Разрешено'], ['class' => 'form-control', "autocomplete" => 'off', 'default' => 1])?>
					<?if ($this->Form->hasError('moderated')):?>
						<p class="text-danger"><?=$this->Form->error('moderated')?></p>
					<?endif;?>
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
