<?foreach ($form->fields as $field):?>
	<div class="form-group">
		<label for="paymentFirstName" class="col-md-4 control-label"><?=$field->label?><?if ($field->required):?><small class="text-default">*</small><?endif;?></label>
		<div class="col-md-8">
			<div class="row">
				<div class="col-md-7">
					<?$params = [];?>
					<?if ($field->required) $params['required'] = true;?>
					<?$params['class'] = 'form-control';?>
					<?$fname = "field[{$field->id}]";?>
					<?if ($field->type == 'text'):?>
						<?=$this->Form->text($fname, $params)?>
					<?elseif($field->type == 'textarea'):?>
						<?=$this->Form->textarea($fname, $params)?>
					<?elseif ($field->type == 'checkbox'):?>
						<?$params['class'] = false;?>
						<?=$this->Form->checkbox($fname, $params);?>
					<?elseif ($field->type == 'select_price'):?>
						<?
							$options = json_decode($field->variants);
						?>
						<select class="form-control select_price" name="<?=$fname?>">
							<?foreach ($options as $option):?>
								<option value="<?=$option[0]?>" data-price="<?=$option[1]?>"><?=$option[0]?></option>
							<?endforeach;?>
						</select>
					<?elseif ($field->type == 'select'):?>
						<?$params['empty'] = 'выберите'?>
						<?=$this->Form->select($fname, array_combine(explode(';', $field->variants), explode(';', $field->variants)), $params);?>
					<?elseif ($field->type == 'file'):?>
						<?$params['class'] = false;?>
						<?=$this->Form->file($fname, $params);?>
					<?elseif ($field->type == 'number'):?>
						<?$params['min'] = 1; $params['max'] = 100;?>
						<?=$this->Form->number($fname, $params)?>
					<?elseif ($field->type == 'separator'):?>
						<div class="separator"></div>
					<?endif;?>
					<?if ($field->nb):?>
						<p class="help-block"><?=$field->nb?></p>
					<?endif;?>
				</div>
			</div>
		</div>
	</div>
<?endforeach;?>