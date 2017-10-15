<ol class="breadcrumb">
  <li><a href="/admin/">Начало</a></li>
  <li><a href="/admin/votes/">Голосования</a></li>
</ol>
<h2><i class="glyphicon glyphicon-check"></i> Вариан ответа</h2>
<div class="row">
	<div class="col-md-10 col-md-offset-1 well">
		<?=$this->Form->create($caption, ['class' => 'form-horizontal', 'type' => 'file']);?>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Вопрос</label>
					<div class="col-sm-10">
						<?=$this->Form->select('vote_id', $votes, ['class' => 'form-control', "autocomplete" => 'off', 'default' => @$_GET['vote_id']])?>
					</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Ответ</label>
					<div class="col-sm-10">
						<?=$this->Form->text('caption', ['class' => 'form-control', "autocomplete" => 'off'])?>
					</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Сортировка</label>
					<div class="col-sm-2">
						<?=$this->Form->text('sort', ['class' => 'form-control', "autocomplete" => 'off', 'default' => 0])?>
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
