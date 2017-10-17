<ol class="breadcrumb">
  <li><a href="/admin/">Начало</a></li>
  <li><a href="/admin/votes/">Голосования</a></li>
</ol>
<h2><i class="glyphicon glyphicon-check"></i> Опрос (добавление/редатирование)</h2>
<div class="row">
	<div class="col-md-10 col-md-offset-1 well">
		<?=$this->Form->create($vote, ['class' => 'form-horizontal', 'type' => 'file']);?>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Вопрос</label>
					<div class="col-sm-10">
						<?=$this->Form->text('title', ['class' => 'form-control', "autocomplete" => 'off'])?>
					</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Начало</label>
					<div class="col-sm-10">
						<?=$this->Form->datetime('start', ['class' => 'form-control', "autocomplete" => 'off'])?>
					</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Конец</label>
					<div class="col-sm-10">
						<?=$this->Form->datetime('end', ['class' => 'form-control', "autocomplete" => 'off'])?>
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
