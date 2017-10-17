<h2><i class="glyphicon <?=@$auto['icon']?>"></i> <?=$auto['title_plural']?></h2>
<div class="btn-group" role="group" aria-label="...">
	<a href="/admin/auto_item/<?=$model?>/" type="button" class="btn btn-warning"><i class="glyphicon glyphicon-plus"></i> добавить <?=strtolower(@$auto['title_genetiv'])?></a>
</div>
<?=$this->Flash->render();?>
<table class="table table-striped">
	<thead>
		<tr>
			<th width="5">N</th>
			<?foreach ($auto['schema'] as $field => $element):?>
				<?if (@$element['visible']['list']):?>
					<th><?=$this->Paginator->sort($field, $element['title'])?></th>
				<?endif;?>
			<?endforeach;?>
			<th>Создана</th>
			<th>Действия</th>
		</tr>
	</thead>
	<tbody>
		<?foreach ($items as $item):?>
			<tr>
				<td><?=$item->id;?></td>
				<?foreach ($auto['schema'] as $field => $element):?>
					<?if (@$element['visible']['list']):?>
						<td>
							<?if (!is_null($item->{$field})):?>
								<?if ($element['type'] == 'currency'):?>
									<?=$this->Number->currency($item->{$field}, 'RUB');?>
								<?elseif ($element['type'] == 'list'):?>
									<?$list = []; $listname = $field . "_values";
										if (isset($element['values'])) $list = $element['values']; elseif (isset($$listname)) {
											$list = $$listname;
										}
									?>
									<?=$list[$item->{$field}]?>
								<?else:?>
									<?=$this->Text->truncate($item->{$field}, 100);?>
								<?endif;?>
							<?endif;?>
						</td>
					<?endif;?>
				<?endforeach;?>
				<td><?=$item->created->i18nFormat('HH:mm:ss dd.MM.YYYY');?></td>
				<td>
					<?if (isset($auto['buttons'])):?>
						<?foreach ($auto['buttons'] as $url => $link):?>
							<?$url = str_replace('::id::', $item->id, $url);?>
							<a href="<?=$url?>" title="<?=@$link['title']?>"><i class="glyphicon glyphicon-<?=$link['icon']?>"></i></a>
						<?endforeach;?>
					<?endif;?>
					<a href="/admin/auto_item/<?=$model?>/<?=$item->id?>" title="Редактировать"><i class="glyphicon glyphicon-edit"></i></a>
					<a href="/admin/delete/<?=$model?>/<?=$item->id?>" title="Удалить" onclick="return confirm('Вы действительно хотите удалить?');" class="text-warning"><i class="glyphicon glyphicon-trash"></i></a>
				</td>
			</tr>
		<?endforeach;?>
	</tbody>
</table>
<nav>
  <ul class="pagination"><?=$this->Paginator->numbers();?></ul></nav>