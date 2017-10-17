<ol class="breadcrumb">
  <li><a href="/admin/">Начало</a></li>
  <li><a href="/admin/slides/">Слайды</a></li>
</ol>
<h2><i class="glyphicon glyphicon-list"></i> Слайд (добавление/редатирование)</h2>
<div class="row">
	<div class="col-md-10 col-md-offset-1 well">
		<?=$this->Form->create($slide, ['class' => 'form-horizontal', 'type' => 'file']);?>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Заголовок</label>
					<div class="col-sm-10">
						<?=$this->Form->text('title', ['class' => 'form-control', "autocomplete" => 'off'])?>
					</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Ссылка</label>
					<div class="col-sm-4">
						<?=$this->Form->text('url', ['class' => 'form-control', "autocomplete" => 'off'])?>
					</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Содержание</label>
					<div class="col-sm-10">
						<?=$this->Form->textarea('description', ['class' => 'form-control', 'id' => '', "autocomplete" => 'off'])?>
					</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Слайд</label>
					<div class="col-sm-6">
						<?=$this->Element('admin_image', ['entity' => $slide, 'model' => 'Slides', 'field' => 'slide'])?>
					</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Скрыть</label>
				<div class="col-sm-10">
					<?=$this->Form->checkbox('is_hidden', ['class' => '', "autocomplete" => 'off'])?>
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Гориз.положение</label>
					<div class="col-sm-2">
						<?=$this->Form->select('align', ['left' => 'лево', 'center' => 'центр', 'right' => 'право'], ['class' => 'form-control', "default" => 'left'])?>
					</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Вертик.положение</label>
					<div class="col-sm-2">
						<?=$this->Form->select('valign', ['top' => 'верх', 'center' => 'центр', 'bottom' => 'низ'], ['class' => 'form-control', "default" => 'center'])?>
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
