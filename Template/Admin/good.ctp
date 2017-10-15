<ol class="breadcrumb">
  <li><a href="/admin/">Начало</a></li>
  <li><a href="/admin/goods/">Товары</a></li>
</ol>
<h2><i class="glyphicon glyphicon-tags"></i> Товар (добавление/редатирование)</h2>
<div class="row">
	<div class="col-md-10 col-md-offset-1 well">
		<?=$this->Form->create($good, ['class' => 'form-horizontal', 'type' => 'file']);?>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Название</label>
				<div class="col-sm-10">
					<?=$this->Form->text('title', ['class' => 'form-control', "autocomplete" => 'off'])?>
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Услуга</label>
				<div class="col-sm-4">
					<?=$this->Form->select('service_id', $services, ['class' => 'form-control', "autocomplete" => 'off', 'empty' => '- нет -'])?>
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Иконка (небольшое изображение)</label>
				<div class="col-sm-6">
					<?=$this->Element('admin_image', ['entity' => $good, 'model' => 'Goods', 'field' => 'preview'])?>
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Описание</label>
				<div class="col-sm-10">
					<?=$this->Form->textarea('content', ['class' => 'form-control', 'id' => '', "autocomplete" => 'off'])?>
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Цена (<i class="glyphicon glyphicon-rub"></i>)</label>
				<div class="col-sm-2">
					<?=$this->Form->text('price', ['class' => 'form-control', "autocomplete" => 'off', 'default' => 0])?>
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Скрыть услугу</label>
					<div class="col-sm-2">
						<?=$this->Form->checkbox('is_hidden', ['class' => 'form-control', "default" => '0'])?>
					</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Сортировка в меню</label>
					<div class="col-sm-2">
						<?=$this->Form->text('menu_order', ['class' => 'form-control', "default" => '0'])?>
					</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Папку для библиотеки картинок</label>
					<div class="col-sm-6">
						<?=$this->Form->text('library_folder', ['class' => 'form-control', "default" => '0'])?>
					</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Использовать форму</label>
				<div class="col-sm-4">
					<?=$this->Form->select('form_id', $forms, ['class' => 'form-control', "autocomplete" => 'off', 'empty' => '- нет -'])?>
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Доп.поля для конструктора</label>
				<div class="col-sm-4">
					<?=$this->Form->select('additional_form_id', $forms, ['class' => 'form-control', "autocomplete" => 'off', 'empty' => '- нет -'])?>
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Подпись под конструктор</label>
					<div class="col-sm-10">
						<?=$this->Form->textarea('constructor_description', ['class' => 'form-control editor', 'id' => 'editor', "autocomplete" => 'off'])?>
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
