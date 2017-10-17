<h2><i class="glyphicon glyphicon-tags"></i> Товары</h2>
<div class="btn-group" role="group" aria-label="...">
	<a href="/admin/good/" type="button" class="btn btn-warning"><i class="glyphicon glyphicon-plus"></i> добавить товар</a>
</div>
<?=$this->Flash->render();?>
<table class="table table-striped">
	<thead>
		<tr>
			<th width="5">N</th>
			<th></th>
			<th width="20%">Услуга</th>
			<th>Шаблоны</th>
			<th>Название</th>
			<th>Родительская</th>
			<th>Создана</th>
			<th>Действия</th>
		</tr>
	</thead>
	<tbody>
		<?foreach ($goods as $good):?>
			<tr>
				<td><?=$good->id;?></td>
				<td>
					<?if ($good->is_hidden):?>
						<i class="glyphicon glyphicon-eye-close" title="Скрытая"></i>
					<?endif;?>
				</td>
				<td align="center"><?=$good->service->link?></td>
				<td align="center">
					<a class="btn btn-primary" role="button" data-toggle="collapse" href="#good_<?=$good->id?>" aria-expanded="false" aria-controls="good_<?=$good->id?>"><?=$good->templates_count?></a>	
				</td>
				<td>
					<a href="/admin/good/<?=$good->id?>" title="Редактировать"><?=$good->title?></a>
				</td>
				<td>
					<?if ($good->parent):?>
						<?=$good->parent->title?>
					<?else:?>
						&mdash;
					<?endif;?>
				</td>
				<td><?=$good->created->i18nFormat('HH:mm:ss dd.MM.YYYY');?></td>
				<td>
					<a href="/admin/good/<?=$good->id?>" title="Редактировать"><i class="glyphicon glyphicon-edit"></i></a>
					<a href="/admin/delete/Goods/<?=$good->id?>" title="Удалить" onclick="return confirm('Вы действительно хотите удалить?');" class="text-warning"><i class="glyphicon glyphicon-trash"></i></a>
				</td>
			</tr>
			<tr style="" class="collapse" id="good_<?=$good->id?>">
				<td colspan="100">
					<h5>Шаблоны для &laquo;<?=$good->title?>&raquo;</h5>
					<div class="btn-group" role="group" aria-label="...">
						<a href="/admin/template/?good_id=<?=$good->id?>" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-plus"></i> добавить шаблон</a>
					</div>
					<table class="table table-striped">
						<thead>
							<tr>
								<th width="5">N</th>
								<th width="5">Иконка</th>
								<th>Заголовок</th>
								<th>Создана</th>
								<th>Действия</th>
							</tr>
						</thead>
						<tbody>
							<?foreach ($good->templates as $template):?>
								<tr>
									<Td><?=$template->id?></td>
									<Td><i class="<?=$template->icon?>"></i></td>
									<Td><?=$template->title?></td>
									<td><?=$template->created;?></td>
									<td>
										<a href="/admin/template/<?=$template->id?>" title="Редактировать"><i class="glyphicon glyphicon-edit"></i></a>
										<a href="/admin/delete/Templates/<?=$template->id?>" title="Удалить" onclick="return confirm('Вы действительно хотите удалить?');" class="text-warning"><i class="glyphicon glyphicon-trash"></i></a>
									</td>
								</tr>
							<?endforeach;?>
						</tbody>
					</table>				
				</td>
			</tr>
		<?endforeach;?>
	</tbody>
</table>
<nav>
  <ul class="pagination"><?=$this->Paginator->numbers();?></ul></nav>