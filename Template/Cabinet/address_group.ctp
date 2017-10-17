<ol class="breadcrumb">
	<li><i class="fa fa-home pr-10"></i><a href="/cabinet/" marked="1">Личный кабинет</a></li>
	<li><a href="/cabinet/address/" marked="1">Адресная книга</a></li>
	<li><a href="/cabinet/adress_groups/" marked="1">Группы контактов</a></li>
	<li class="active">Новая группа</li>
</ol>
<h1 class="page-title">Новая группа</h1>
<div class="separator-2"></div>
<?=$this->Form->create($group, ['class' => 'form-horizontal'])?>
	<div class="form-group">
		<label for="inputEmail3" class="col-sm-3 control-label">Название <span class="text-danger small">*</span></label>
		<div class="col-sm-9">
			<?=$this->Form->text('name', ['class' => 'form-control', 'placeholder' => 'Название группы', 'required'])?>
		</div>
	</div>
	<div class="form-group">
		<label for="inputEmail3" class="col-sm-3 control-label">Цвет подсветки</label>
		<div class="col-sm-9">
			<div class="btn-group" data-toggle="buttons">
			  <label class="btn btn-sm <?if ($group->color && $group->color == 'white'):?>active<?endif?>">
			    <input type="radio" value="white" name="color" id="option1" autocomplete="off" <?if ($group->color && $group->color == 'white'):?>checked<?endif?>> белый
			  </label>
			  <label class="btn btn-sm btn-default <?if ($group->color && $group->color == 'default'):?>active<?endif?>">
			    <input type="radio" value="default" name="color" id="option1" autocomplete="off" <?if ($group->color && $group->color == 'default'):?>checked<?endif?>> голубой
			  </label>
			  <label class="btn btn-sm btn-primary <?if ($group->color && $group->color == 'primary'):?>active<?endif?>">
			    <input type="radio" value="primary" name="color" id="option2" autocomplete="off" <?if ($group->color && $group->color == 'primary'):?>checked<?endif?>> синий
			  </label>
			  <label class="btn btn-sm btn-success <?if ($group->color && $group->color == 'success'):?>active<?endif?>">
			    <input type="radio" value="success" name="color" id="option3" autocomplete="off" <?if ($group->color && $group->color == 'success'):?>checked<?endif?>> зеленый
			  </label>
			  <label class="btn btn-sm btn-warning <?if ($group->color && $group->color == 'warning'):?>active<?endif?>">
			    <input type="radio" value="warning" name="color" id="option3" autocomplete="off" <?if ($group->color && $group->color == 'warning'):?>checked<?endif?>> оранжевый
			  </label>
			  <label class="btn btn-sm btn-danger <?if ($group->color && $group->color == 'danger'):?>active<?endif?>">
			    <input type="radio" value="danger" name="color" id="option3" autocomplete="off" <?if ($group->color && $group->color == 'danger'):?>checked<?endif?>> красный
			  </label>
			</div>
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">Сохранить</button>
		</div>
	</div>
</form>