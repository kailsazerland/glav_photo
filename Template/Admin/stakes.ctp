<h2><i class="glyphicon glyphicon-briefcase"></i> Ставки</h2>
<div class="btn-group" role="group" aria-label="...">
	<a href="/admin/stake/" type="button" class="btn btn-lg btn-warning"><i class="glyphicon glyphicon-plus"></i> добавить ставку</a>
</div><br><br>
<?=$this->Flash->render();?>
<table class="table table-striped">
	<thead>
		<tr>
			<th width="5">N</th>
			<th width="5">Стоимость</th>
			<th>Кол-во ставок</th>
			<th>Тип</th>
			<th>Создана</th>
			<th>Действия</th>
		</tr>
	</thead>
	<tbody>
		<?foreach ($stakes as $stake):?>
			<tr>
				<td><?=$stake->id;?></td>
				<td><?=$this->Number->format($stake->price, ['locale' => 'ru_RU']);?></td>
				<td><?=$stake->count;?></td>
				<td><?=$stake->type;?></td>
				<td><?=$stake->created->i18nFormat('HH:mm:ss dd.MM.YYYY');?></td>
				<td>
					<a href="/admin/stake/<?=$stake->id?>" title="Редактировать"><i class="glyphicon glyphicon-edit"></i></a>
					<a href="/admin/delete/Lotes/<?=$stake->id?>/" title="Удалить" onclick="return confirm('Вы действительно хотите удалить?');" class="text-warning"><i class="glyphicon glyphicon-trash"></i></a>
				</td>
			</tr>
		<?endforeach;?>
	</tbody>
</table>