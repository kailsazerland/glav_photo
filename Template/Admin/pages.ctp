<h2><i class="glyphicon glyphicon-list"></i> Страницы</h2>
<div class="btn-group" role="group" aria-label="...">
	<a href="/admin/page/" type="button" class="btn btn-lg btn-warning"><i class="glyphicon glyphicon-plus"></i> добавить страницу</a>
</div><br><br>
<?=$this->Flash->render();?>
<table class="table table-striped">
	<thead>
		<tr>
			<th width="5">N</th>
			<th width="5">Скрытая</th>
			<th width="5">Пункт меню</th>
			<th>Ссылка</th>
			<th>Заголовок</th>
			<th>Просмотр</th>
			<th>Создана</th>
			<th>Действия</th>
		</tr>
	</thead>
	<tbody>
		<?foreach ($pages as $page):?>
			<tr>
				<td><?=$page->id;?></td>
				<td><?if ($page->is_hidden):?><i class="glyphicon glyphicon-check"></i><?endif;?></td>
				<td><?if ($page->in_menu):?><i class="glyphicon glyphicon-check"></i><?endif;?></td>
				<td><?=$page->alias;?></td>
				<td><?=$page->title;?></td>
				<td><a href="/pages/<?=$page->alias?>/" target="_blank">/pages/<?=$page->alias?>/</a></td>
				<td><?=$page->created->i18nFormat('HH:mm:ss dd.MM.YYYY');?></td>
				<td>
					<a href="/pages/<?=$page->alias?>" target="_blank" title="Просмотр"><i class="glyphicon glyphicon-search"></i></a>
					<a href="/admin/page/<?=$page->id?>" title="Редактировать"><i class="glyphicon glyphicon-edit"></i></a>
					<a href="/admin/delete/Pages/<?=$page->id?>/" title="Удалить" onclick="return confirm('Вы действительно хотите удалить?');" class="text-warning"><i class="glyphicon glyphicon-trash"></i></a>
				</td>
			</tr>
		<?endforeach;?>
	</tbody>
</table>