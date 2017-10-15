<h2><i class="glyphicon glyphicon-th-large"></i> Слайд-шоу (слайды)</h2>
<div class="btn-group" role="group" aria-label="...">
	<a href="/admin/slide/" type="button" class="btn btn-lg btn-warning"><i class="glyphicon glyphicon-plus"></i> добавить слайд</a>
</div><br><br>
<?=$this->Flash->render();?>
<table class="table table-striped">
	<thead>
		<tr>
			<th width="5">N</th>
			<th width="5">Скрытая</th>
			<th>Ссылка</th>
			<th>Заголовок</th>
			<th>Создана</th>
			<th>Действия</th>
		</tr>
	</thead>
	<tbody>
		<?foreach ($slides as $slide):?>
			<tr>
				<td><?=$slide->id;?></td>
				<td><?if ($slide->is_hidden):?><i class="glyphicon glyphicon-eye-close" title="Скрытая"></i><?endif;?></td>
				<td><?=$slide->link;?></td>
				<td><?=$slide->title;?></td>
				<td><?=$slide->created->i18nFormat('HH:mm:ss dd.MM.YYYY');?></td>
				<td>
					<a href="/slides/<?=$slide->alias?>" target="_blank" title="Просмотр"><i class="glyphicon glyphicon-search"></i></a>
					<a href="/admin/slide/<?=$slide->id?>" title="Редактировать"><i class="glyphicon glyphicon-edit"></i></a>
					<a href="/admin/delete/Slides/<?=$slide->id?>/" title="Удалить" onclick="return confirm('Вы действительно хотите удалить?');" class="text-warning"><i class="glyphicon glyphicon-trash"></i></a>
				</td>
			</tr>
		<?endforeach;?>
	</tbody>
</table>