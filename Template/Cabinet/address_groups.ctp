<ol class="breadcrumb">
	<li><i class="fa fa-home pr-10"></i><a href="/cabinet/" marked="1">Личный кабинет</a></li>
	<li><a href="/cabinet/address/" marked="1">Адресная книга</a></li>
	<li class="active">Группы контактов</li>
</ol>
<h1 class="page-title">Группы контактов</h1>
<div class="separator-2"></div>

<a class="btn btn-animated btn-success" href="/cabinet/address_group/" marked="1"><i class="fa fa-plus"></i> Добавить группу</a>

	<?=$this->Flash->render()?>
	<?if ($groups->count() > 0):?>
		<table class="table table-striped table-colored">
			<thead>
				<th width="50%">Имя</th>
				<th>Управление</th>
			</thead>
			<tbody>
				<?foreach ($groups as $contact):?>
					<tr>
						<td><span class="label label-<?=$contact->color?>"><?=h($contact->name)?></span></td>
						<td>
							<a href="/cabinet/address_group/<?=$contact->id?>/" title="Редактировать"><i class="fa fa-pencil"></i></a>
							<a href="/cabinet/address_group_delete/<?=$contact->id?>/" title="Удалить"><i class="fa fa-trash text-danger"></i></a>
						</td>
					</tr>
				<?endforeach;?>
			</tbody>
		</table>
		<ul class="pagination">
			<?=$this->Paginator->numbers();?>
		</ul>
	<?else:?>
		<br><br><i>Группы не найдены! Добавьте их.</i><br><br>
	<?endif;?>
	