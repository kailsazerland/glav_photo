<ol class="breadcrumb">
  <li><a href="/admin/">Начало</a></li>
  <li><a href="/admin/stakes/">Ставки</a></li>
</ol>
<h2><i class="glyphicon glyphicon-briefcase"></i> Ставка (добавление/редатирование)</h2>
<div class="row">
	<div class="col-md-10 col-md-offset-1 well">
		<?=$this->Form->create($stake, ['class' => 'form-horizontal', 'type' => 'file']);?>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Изображение</label>
					<div class="col-sm-2">
						<?if(!empty($stake->img)):?>
							<img src="/<?=$stake->img?>" width="200"><br>
						<?endif;?>
						<?=$this->Form->file('image', ["autocomplete" => 'off'])?>
					</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Кол-во ставок</label>
					<div class="col-sm-2">
						<?=$this->Form->text('count', ['class' => 'form-control', "autocomplete" => 'off'])?>
					</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Стоимость</label>
					<div class="col-sm-2">
						<?=$this->Form->text('price', ['class' => 'form-control', "autocomplete" => 'off'])?>
					</div>
			</div>
			
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Тип</label>
					<div class="col-sm-4">
						<?=$this->Form->select('type', ['win' => 'На победу', 'standart' => 'Стандартная'], ['class' => 'form-control', "autocomplete" => 'off'])?>
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
