<ol class="breadcrumb">
	<li><i class="fa fa-home pr-10"></i><a href="/cabinet/" marked="1">Личный кабинет</a></li>
	<li><a href="/cabinet/address/" marked="1">Адресная книга</a></li>
	<li class="active">Новый контакт</li>
</ol>
<h1 class="page-title">Новый контакт</h1>
<div class="separator-2"></div>
<?=$this->Form->create($contact, ['class' => 'form-horizontal'])?>
	<div class="form-group">
		<label for="inputEmail3" class="col-sm-3 control-label">Имя <span class="text-danger small">*</span></label>
		<div class="col-sm-9">
			<?=$this->Form->text('name', ['class' => 'form-control', 'placeholder' => 'Имя контакта', 'required'])?>
		</div>
	</div>
	<div class="form-group">
		<label for="inputEmail3" class="col-sm-3 control-label">E-mail</label>
		<div class="col-sm-9">
			<?=$this->Form->email('mail', ['class' => 'form-control', 'placeholder' => 'E-mail вашего контакта'])?>
		</div>
	</div>
	<div class="form-group">
		<label for="inputEmail3" class="col-sm-3 control-label">Телефон</label>
		<div class="col-sm-9">
			<?=$this->Form->text('phone', ['class' => 'form-control', 'placeholder' => '+7xxxxxxxxxx', 'pattern' => '\+7[0-9]{10}'])?>
		</div>
	</div>
	<div class="form-group">
		<label for="inputEmail3" class="col-sm-3 control-label">Группа</label>
		<div class="col-sm-9">
			<?=$this->Form->select('group_id', $groups, ['class' => 'form-control', 'empty' => '-выберите группу-'])?>
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">Сохранить</button>
		</div>
	</div>
</form>