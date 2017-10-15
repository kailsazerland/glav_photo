<h2><i class="glyphicon glyphicon-user"></i> Пользовтели</h2>
<div class="btn-group" role="group" aria-label="...">
	<a href="/admin/user/" type="button" class="btn btn-default"><i class="glyphicon glyphicon-plus"></i> добавить пользователя</a>
</div>
<?=$this->Flash->render();?>
<table class="table table-striped">
	<thead>
		<tr>
			<th width="5">N</th>
			<th width="5">Бот</th>
			<th width="5">Админ</th>
			<th width="5">Конт.</th>
			<th width="5">Соб.</th>
			<th>Имя</th>
			<th>Логин</th>
			<th>Добавлен</th>
			<th>Действия</th>
		</tr>
	</thead>
	<tbody>
		<?foreach ($users as $user):?>
			<tr>
				<td><?=$user->id;?></td>
				<td><?if ($user->is_bot):?><i class="glyphicon glyphicon-ok"></i><?endif;?></td>
				<td><?if ($user->is_admin):?><i class="glyphicon glyphicon-user"></i><?endif;?></td>
				<td class="text-center"><?=$user->contact_count;?></td>
				<td class="text-center"><?=$user->event_count;?></td>
				<td><?=$user->names;?></td>
				<td><?=$user->mail;?></td>
				<td><?=$user->created->i18nFormat('HH:mm:ss dd.MM.YYYY');?></td>
				<td>
					<a href="/admin/user/<?=$user->id?>" title="Редактировать"><i class="glyphicon glyphicon-edit"></i></a>
					<a href="/admin/delete/Users/<?=$user->id?>/" title="Удалить" onclick="return confirm('Вы действительно хотите удалить?');" class="text-warning"><i class="glyphicon glyphicon-trash"></i></a>
				</td>
			</tr>
		<?endforeach;?>
	</tbody>
</table>