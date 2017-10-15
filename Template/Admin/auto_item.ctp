<ol class="breadcrumb">
  <li><a href="/admin/">Начало</a></li>
  <li><a href="/admin/auto_list/<?=$model?>/"><?=@$auto['title_plural']?></a></li>
</ol>
<h2><i class="glyphicon <?=@$auto['icon']?>"></i> <?=@$auto['title_singular']?> (добавление/редатирование)</h2>
<div class="row">
	<div class="col-md-10 col-md-offset-1 well">
		<?=$this->Form->create($item, ['class' => 'form-horizontal', 'type' => 'file']);?>
			<?foreach ($auto['schema'] as $field => $element):?>
				<?if (!isset($element['visible']['form']) || $element['visible']['form']):?>
					<div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label"><?=$element['title']?></label>
						<div class="col-sm-<?if (isset($element['field_size'])):?><?=$element['field_size']?><?else:?>10<?endif?>">
							<?if ($element['type'] == 'url'):?>
								<?if ($item->{$field}):?>
									<a href="/<?=$item->{$field}?>" target="_blank"><i class="glyphicon glyphicon-download"></i>скачать файл</a>
								<?endif;?>
							<?elseif ($element['type'] == 'bool'):?>	
								<?=$this->Form->checkbox($field)?>
							<?elseif ($element['type'] == 'list'):?>
								<?$list = []; $listname = $field . "_values";
									if (isset($element['values'])) $list = $element['values']; elseif (isset($$listname)) {
										$list = $$listname;
									}
								?>
								<?=$this->Form->select($field, $list, ['class' => 'form-control', "autocomplete" => 'off', 'empty' => 'выбрать'])?>
							<?else:?>
								<?=$this->Form->{$element['type']}($field, ['class' => 'form-control', "autocomplete" => 'off'])?>
							<?endif;?>
							<?if (isset($element['nb'])):?>
								<p class="help-block"><?=$element['nb']?></p>
							<?endif;?>
						</div>
					</div>
				<?endif;?>
			<?endforeach;?>
			
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-success">Сохранить</button>
				</div>
			</div>
		<?=$this->Form->end();?>
	</div>
</div>
