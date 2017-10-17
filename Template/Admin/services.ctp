<h2><i class="glyphicon glyphicon-comment"></i> Отзывы</h2>
<div class="btn-group" role="group" aria-label="...">
	<a href="/admin/service/" type="button" class="btn btn-warning"><i class="glyphicon glyphicon-plus"></i> добавить услугу</a>
</div>
<?=$this->Flash->render();?>
<table class="table table-striped">
	<thead>
		<tr>
			<th width="5">N</th>
			<th></th>
			<th width="5">Доч.записей</th>
			<th width="5"><?=$this->Paginator->sort('tabs_count', 'Вкладки');?></th>
			<th><?=$this->Paginator->sort('title', 'Название');?></th>
			<th>Родительская</th>
			<th>Создана</th>
			<th>Действия</th>
		</tr>
	</thead>
	<tbody>
		<?foreach ($services as $service):?>
			<tr>
				<td><?=$service->id;?></td>
				<td>
					<?if ($service->is_hidden):?>
						<i class="glyphicon glyphicon-eye-close" title="Скрытая"></i>
					<?endif;?>
				</td>
				<td align="center"><?=$service->child_count?></td>
				<td align="center">
					<a class="btn btn-primary" role="button" data-toggle="collapse" href="#service_<?=$service->id?>" aria-expanded="false" aria-controls="service_<?=$service->id?>"><?=$service->tabs_count?></a>
					
				</td>
				<td>
					<a href="/admin/service/<?=$service->id?>" title="Редактировать"><?=$service->title?></a>
				</td>
				<td>
					<?if ($service->parent):?>
						<?=$service->parent->title?>
					<?else:?>
						&mdash;
					<?endif;?>
				</td>
				<td><?=$service->created->i18nFormat('HH:mm:ss dd.MM.YYYY');?></td>
				<td>
					<a href="/admin/service/<?=$service->id?>" title="Редактировать"><i class="glyphicon glyphicon-edit"></i></a>
					<a href="/admin/delete/Services/<?=$service->id?>" title="Удалить" onclick="return confirm('Вы действительно хотите удалить?');" class="text-warning"><i class="glyphicon glyphicon-trash"></i></a>
				</td>
			</tr>
			<tr style="" class="collapse" id="service_<?=$service->id?>">
				<td colspan="100">
					<h5>Вкладки для &laquo;<?=$service->title?>&raquo;</h5>
					<div class="btn-group" role="group" aria-label="...">
						<a href="/admin/tab/?service_id=<?=$service->id?>" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-plus"></i> добавить вкладку</a>
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
							<?foreach ($service->tabs as $tab):?>
								<tr>
									<Td><?=$tab->id?></td>
									<Td><i class="<?=$tab->icon?>"></i></td>
									<Td><?=$tab->title?></td>
									<td><?=$tab->created;?></td>
									<td>
										<a href="/admin/tab/<?=$tab->id?>" title="Редактировать"><i class="glyphicon glyphicon-edit"></i></a>
										<a href="/admin/delete/Tabs/<?=$tab->id?>" title="Удалить" onclick="return confirm('Вы действительно хотите удалить?');" class="text-warning"><i class="glyphicon glyphicon-trash"></i></a>
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