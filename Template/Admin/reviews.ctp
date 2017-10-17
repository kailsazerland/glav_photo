<h2><i class="glyphicon glyphicon-comment"></i> Отзывы</h2>
<div class="btn-group" role="group" aria-label="...">
	<a href="/admin/review/" type="button" class="btn btn-default"><i class="glyphicon glyphicon-plus"></i> добавить отзыв</a>
</div>
<?=$this->Flash->render();?>
<table class="table table-striped">
	<thead>
		<tr>
			<th width="5">N</th>
			<th width="10">Модерация</th>
			<th>Пользователь</th>
			<th>Создан</th>
			<th>Плюс</th>
			<th>Минус</th>
			<th>Действия</th>
		</tr>
	</thead>
	<tbody>
		<?foreach ($reviews as $review):?>
			<tr>
				<td><?=$review->id;?></td>
				<td align="center" style="position:relative;">
					<a href="#" id="moderate_<?=$review->id?>" data-toggle="dropdown"><i class="glyphicon glyphicon-<?if ($review->moderated == -1):?>ban-circle<?elseif ($review->moderated == 0):?>hourglass<?else:?>ok<?endif;?>"></i></a>
					<ul class="dropdown-menu" aria-labelledby="moderate_<?=$review->id?>">
						<li><a href="/admin/set_moderated/<?=$review->id?>/1/">Разрешено</a></li>
						<li><a href="/admin/set_moderated/<?=$review->id?>/-1/">Отказано</a></li>
					</ul>
				</td>
				<td>
					<?if ($review->user):?>
						<?=$review->user->steam_personaname;?>
					<?else:?>
						<i class="glyphicon glyphicon-hand-right"></i><?=$review->name_manual;?>
					<?endif;?>
				</td>
				<td><?=$this->Text->truncate($review->content, 50,  ['ellipsis' => '...', 'exact' => false]);?></td>
				<td class="text-success" align="center"><?=$review->thumb_up?></td>
				<td class="text-danger"  align="center"><?=$review->thumb_down?></td>
				<td><?=$review->created->i18nFormat('HH:mm:ss dd.MM.YYYY');?></td>
				<td>
					<a href="/admin/review/<?=$review->id?>" title="Редактировать"><i class="glyphicon glyphicon-edit"></i></a>
					<a href="" title="Удалить" onclick="return confirm('Вы действительно хотите удалить?');" class="text-warning"><i class="glyphicon glyphicon-trash"></i></a>
				</td>
			</tr>
		<?endforeach;?>
	</tbody>
</table>
<nav>
  <ul class="pagination"><?=$this->Paginator->numbers();?></ul></nav>