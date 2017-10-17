    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Выигранные лоты</h2>
                <hr class="star-primary">
            </div>
        </div>
       	<table class="table table-striped">
       		<thead>
       			<th width="5">ID</th>
       			<th>Обновлено</th>
       			<th>Лот</th>
       			<th>Цена</th>
       			<th>Оплата</th>
       			<th>Статус</th>
       		</thead>
       		<tbody>
       			<?foreach ($lots as $lot):?>
       				<tr>
       					<td><?=$lot->id?></td>
       					<td><?=$lot->modified->i18nFormat('HH:mm:ss dd.MM.YYYY')?></td>
       					<td><a href="/lots/details/<?=$lot->id?>/"><?=$lot->title?></a></td>
       					<td align="center"><?=$this->Number->format($lot->price_current, ['locale' => 'ru_RU'])?> руб.</td>
       					<td align="center"><?if ($lot->is_paid):?><i class="glyphicon glyphicon-ok"></i><?endif;?></td>
       					<td align="center"><?if ($lot->status):?><?=$lot->status?><?else:?>&mdash;<?endif;?></td>
       					<td align="center">
       						<?if (!$lot->is_paid):?>
       							<a href="/payments/lot/<?=$lot->id?>" class="btn btn-default">Оформить</a>
       						<?endif;?>
       					</td>
       				</tr>
       			<?endforeach;?>
       		</tbody>
       	</table>
    </div>
