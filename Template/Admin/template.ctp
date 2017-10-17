<ol class="breadcrumb">
  <li><a href="/admin/">Начало</a></li>
  <li><a href="/admin/goods/">Товары</a></li>
</ol>
<h2><i class="glyphicon glyphicon-scissors"></i> Шаблон-выкройка (добавление/редатирование)</h2>
<div class="row">
	<div class="col-md-10 col-md-offset-1 well">
		<?=$this->Form->create($template, ['class' => 'form-horizontal', 'type' => 'file']);?>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Название</label>
				<div class="col-sm-10">
					<?=$this->Form->text('title', ['class' => 'form-control', "autocomplete" => 'off'])?>
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Товар</label>
				<div class="col-sm-4">
					<?=$this->Form->select('good_id', $goods, ['class' => 'form-control', "autocomplete" => 'off', 'empty' => '- нет -', 'default' => @$_GET['good_id']])?>
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Иконка (небольшое изображение)</label>
				<div class="col-sm-6">
					<?=$this->Element('admin_image', ['entity' => $template, 'model' => 'Templates', 'field' => 'preview'])?>
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Выкройка (с прорезью)</label>
				<div class="col-sm-6">
					<?=$this->Element('admin_image', ['entity' => $template, 'model' => 'Templates', 'field' => 'layer_up'])?>
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Выкройка (сплошная)</label>
				<div class="col-sm-6">
					<?=$this->Element('admin_image', ['entity' => $template, 'model' => 'Templates', 'field' => 'layer_down'])?>
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Сектор вставки изображения (px)</label>
				<div class="col-sm-6">
					<?=$this->Form->text('sector', ['class' => 'form-control', "autocomplete" => 'off'])?>
					<small>В формате: [[96,65],[202, 225]]</small>
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Скрыть шаблон</label>
					<div class="col-sm-2">
						<?=$this->Form->checkbox('is_hidden', ['class' => 'form-control', "default" => '0'])?>
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
