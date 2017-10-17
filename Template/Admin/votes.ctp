<h2><i class="glyphicon glyphicon-check"></i> Голосования</h2>
<div class="btn-group" role="group" aria-label="...">
	<a href="/admin/vote/" type="button" class="btn btn-lg btn-warning"><i class="glyphicon glyphicon-plus"></i> добавить опрос</a>
</div><br><br>
<?=$this->Flash->render();?>
<table class="table table-striped">
	<thead>
		<tr>
			<th width="5">N</th>
			<th width="5">Вопрос</th>
			<th>Старт</th>
			<th>Конец</th>
			<th>Создана</th>
			<th>Действия</th>
		</tr>
	</thead>
	<tbody>
		<?foreach ($votes as $vote):?>
			<tr>
				<td><?=$vote->id;?></td>
				<td width="30%"><?=$this->Text->truncate($vote->title, 50);?></td>
				<td><?=$vote->start->i18nFormat('HH:mm:ss dd.MM.YYYY');?></td>
				<td><?if ($vote->end):?><?=$vote->end->i18nFormat('HH:mm:ss dd.MM.YYYY');?><?endif;?></td>
				<td><?=$vote->created->i18nFormat('HH:mm:ss dd.MM.YYYY');?></td>
				<td>
					<a href="/admin/caption/?vote_id=<?=$vote->id?>" title="Добавить вариант ответа"><i class="glyphicon glyphicon-plus"></i></a>
					<a href="/admin/vote/<?=$vote->id?>" title="Редактировать"><i class="glyphicon glyphicon-edit"></i></a>
					<a href="/admin/delete/Votes/<?=$vote->id?>/" title="Удалить" onclick="return confirm('Вы действительно хотите удалить?');" class="text-warning"><i class="glyphicon glyphicon-trash"></i></a>
				</td>
			</tr>
			<?if (!empty($vote->captions)):?>
				<tr>
					<td><i class="glyphicon glyphicon-menu-right"></i></td>
					<td colspan="2">
						<table class="table table-striped">
							<?foreach ($vote->captions as $caption):?>
								<tr>
									<td width="5"><?=$caption->id;?></td>
									<td width=""><?=$this->Text->truncate($caption->caption, 50);?></td>
									<td><?=$caption->voted_for;?></td>
									<td width="5" nowrap>
										<a href="/admin/caption/<?=$caption->id?>/" title="Редактировать"><i class="glyphicon glyphicon-edit"></i></a>
										<a href="/admin/delete/Captions/<?=$caption->id?>/" title="Удалить" onclick="return confirm('Вы действительно хотите удалить?');" class="text-warning"><i class="glyphicon glyphicon-trash"></i></a>
									</td>
								</tr>
							<?endforeach;?>
						</table>
					</td>
				</tr>
			<?endif;?>
		<?endforeach;?>
	</tbody>
</table>