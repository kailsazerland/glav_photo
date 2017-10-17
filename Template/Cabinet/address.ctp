<h1 class="page-title">Адресная книга</h1>
<div class="separator-2"></div>
<a class="btn btn-animated btn-success" href="/cabinet/address_contact/" marked="1"><i class="fa fa-plus"></i> Добавить контакт</a>
<a href="/cabinet/address_import/" class="btn btn-animated btn-info" marked="1">Импортировать <i class="fa fa-download"></i></a>
<a href="/cabinet/address_groups/" class="btn btn-animated btn-info" marked="1">Группы контактов <i class="fa fa-users"></i></a>
	<?=$this->Flash->render()?>
	<?if ($contacts->count() > 0):?>
		<table class="table table-striped table-colored">
			<thead>
				<th width="40%">Имя</th>
				<th>Группа</th>
				<th>E-mail</th>
				<th>Телефон</th>
				<th>&nbsp;</th>
			</thead>
			<tbody>
				<?foreach ($contacts as $contact):?>
					<tr>
						<td><?=h($contact->name)?></td>
						<td>
							<?if ($contact->group):?>
								<span class="label label-<?=$contact->group->color?>"><?=h($contact->group->name)?></span>
							<?endif;?>
						</td>
						<td><?=h($contact->mail)?></td>
						<td><?=h($contact->phone)?></td>
						<td>
							<a href="/cabinet/address_contact/<?=$contact->id?>/" title="Редактировать"><i class="fa fa-pencil"></i></a>
							<a href="/cabinet/address_delete/<?=$contact->id?>/" title="Удалить"><i class="fa fa-trash text-danger"></i></a>
						</td>
					</tr>
				<?endforeach;?>
			</tbody>
		</table>
		<ul class="pagination">
			<?=$this->Paginator->numbers();?>
		</ul>
	<?else:?>
		<br><br><i>Контакты не найдены! Добавьте их или импортируйте.</i>
	<?endif;?>