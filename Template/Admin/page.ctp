<ol class="breadcrumb">
  <li><a href="/admin/">Начало</a></li>
  <li><a href="/admin/pages/">Страницы</a></li>
</ol>
<h2><i class="glyphicon glyphicon-list"></i> Страницы (добавление/редатирование)</h2>
<div class="row">
	<div class="col-md-10 col-md-offset-1 well">
		<?=$this->Form->create($page, ['class' => 'form-horizontal', 'type' => 'file']);?>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Заголовок</label>
					<div class="col-sm-10">
						<?=$this->Form->text('title', ['class' => 'form-control', "autocomplete" => 'off'])?>
					</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Ссылка (англ.)</label>
					<div class="col-sm-4">
						<?=$this->Form->text('alias', ['class' => 'form-control', "autocomplete" => 'off'])?>
					</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Текст ссылки</label>
					<div class="col-sm-4">
						<?=$this->Form->text('link', ['class' => 'form-control', "autocomplete" => 'off'])?>
					</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Иконка ссылки</label>
					<div class="col-sm-4">
						<?=$this->Form->text('menu_icon', ['class' => 'form-control', "autocomplete" => 'off'])?>
					</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Содержание</label>
					<div class="col-sm-10">
						<?=$this->Form->textarea('content', ['class' => 'form-control editor', 'id' => 'editor', "autocomplete" => 'off'])?>
					</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Скрыть</label>
				<div class="col-sm-10">
					<?=$this->Form->checkbox('is_hidden', ['class' => '', "autocomplete" => 'off'])?>
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Отображать в меню</label>
				<div class="col-sm-10">
					<?=$this->Form->checkbox('in_menu', ['class' => '', "autocomplete" => 'off'])?>
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Сортировка в меню</label>
					<div class="col-sm-2">
						<?=$this->Form->text('menu_order', ['class' => 'form-control', "default" => '0'])?>
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
