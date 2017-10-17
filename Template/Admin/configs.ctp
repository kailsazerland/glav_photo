<ol class="breadcrumb">
  <li><a href="/admin/">Начало</a></li>
</ol>
<h2><i class="glyphicon glyphicon-cog"></i> Настройки, данные</h2>
<div class="row">
	<div class="col-md-10 col-md-offset-1 well">
		<?if (isset($done) && $done):?>
			<div class="alert alert-success">Данные обновлены!</div>
		<?endif;?>
		<?=$this->Form->create(false, ['class' => 'form-horizontal', 'type' => 'file']);?>
			<?foreach ($configs_data as $config):?>
				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label"><?=$config->title?></label>
						<div class="col-sm-6">
							<?=$this->Form->{$config->type}($config->name, ["default" => $config->value, "class" => 'form-control'])?>
						</div>
				</div>
			<?endforeach;?>
			
								
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-success">Сохранить</button>
				</div>
			</div>
		<?=$this->Form->end();?>
	</div>
</div>
