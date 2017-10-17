<ol class="breadcrumb">
	<li><i class="fa fa-home pr-10"></i><a href="/cabinet/" marked="1">Личный кабинет</a></li>
	<li><a href="/cabinet/address/" marked="1">Адресная книга</a></li>
	<li class="active">Импорт контактов из Google</li>
</ol>
<h1 class="page-title">Импорт контактов из Google</h1>
<div class="separator-2"></div>
<?=$this->Flash->render()?>
<form class="form-horizontal" role="form" enctype="multipart/form-data" method="POST">
	<div class="form-group">
		<label for="inputEmail3" class="col-sm-3 control-label">СSV-файл контактов <span class="text-danger small">*</span></label>
		<div class="col-sm-9">
			<?=$this->Form->file('csv', ['placeholder' => 'Имя контакта'])?>
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
			<button type="submit" class="btn btn-default">Импортировать</button>
		</div>
	</div>
</form>