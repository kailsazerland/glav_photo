<h2><i class="glyphicon glyphicon-shopping-cart"></i> Лоты</h2>
<div class="btn-group" role="group" aria-label="...">
	<a href="/admin/lot/" type="button" class="btn btn-lg btn-warning"><i class="glyphicon glyphicon-plus"></i> добавить лот</a>
</div><br><br>
<?=$this->Flash->render();?>
<table class="table table-striped">
	<thead>
		<tr>
			<th width="5">N</th>
			<th width="5">Скрытая</th>
			<th width="5">Оплачена</th>
			<th width="5">Заверш.</th>
			<th>Заголовок</th>
			<th>Стартовая цена</th>
			<th>Старт</th>
			<th>Конец</th>
			<th>Создана</th>
			<th>Действия</th>
		</tr>
	</thead>
	<tbody>
		<?foreach ($lots as $lot):?>
			<tr>
				<td><?=$lot->id;?></td>
				<td><?if ($lot->is_hidden):?><i class="glyphicon glyphicon-check"></i><?endif;?></td>
				<td><?if ($lot->is_paid):?><i class="glyphicon glyphicon-check"></i><?endif;?></td>
				<td><?if ($lot->is_finished):?><i class="glyphicon glyphicon-check"></i><?endif;?></td>
				<td><?=$lot->title;?></td>
				<td><?=$this->Number->format($lot->price_start, ['locale' => 'ru_RU']);?></td>
				<td><?if ($lot->start):?><?=$lot->start->i18nFormat('HH:mm:ss dd.MM.YYYY');?><?endif;?></td>
				<td><?if ($lot->end):?><?=$lot->end->i18nFormat('HH:mm:ss dd.MM.YYYY');?><?endif;?></td>
				<td><?=$lot->created->i18nFormat('HH:mm:ss dd.MM.YYYY');?></td>
				<td>
					<a href="/admin/lot/<?=$lot->id?>" title="Редактировать"><i class="glyphicon glyphicon-edit"></i></a>
					<a href="/admin/delete/Lots/<?=$lot->id?>/" title="Удалить" onclick="return confirm('Вы действительно хотите удалить?');" class="text-warning"><i class="glyphicon glyphicon-trash"></i></a>
				</td>
			</tr>
		<?endforeach;?>
	</tbody>
</table>