<h2><i class="glyphicon glyphicon-user"></i> ТОП-пользователей</h2>
<?=$this->Flash->render();?>
<table class="table table-striped">
	<thead>
		<tr>
			<th width="5">N</th>
			<th>Имя</th>
			<th>Логин</th>
			<th>Рефералов</th>
			<th>Рефералов купивших</th>
			<th>Добавлен</th>
			<th>Действия</th>
		</tr>
	</thead>
	<tbody>
		<?foreach ($users as $user):?>
			<tr>
				<td><?=$user->id;?></td>
				<td><?=$user->names;?></td>
				<td><?=$user->mail;?></td>
				<td><?=$user->referals_count;?></td>
				<td><?=$user->referals_bought_count;?></td>
				<td><?=$user->created->i18nFormat('HH:mm:ss dd.MM.YYYY');?></td>
				<td>
					<a href="/admin/user/<?=$user->id?>" title="Редактировать"><i class="glyphicon glyphicon-edit"></i></a>
					<a href="" title="Удалить" onclick="return confirm('Вы действительно хотите удалить?');" class="text-warning"><i class="glyphicon glyphicon-trash"></i></a>
				</td>
			</tr>
		<?endforeach;?>
	</tbody>
</table>