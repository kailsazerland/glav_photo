<?$monthes = [1 => 'январь', 'февраль', 'март', 'апрель','май','июнь','июль','август','сентябрь','октябрь','ноябрь','декабрь']?>
<?$days = [1 => 'ПН', 'ВТ', 'СР', 'ЧТ','ПТ','СБ','ВС']?>
<h1 class="page-title">События: <?=date('d.m.Y', strtotime($date))?></h1>
<div class="separator-2"></div>
<a class="btn btn-animated btn-success" href="/cabinet/add/" marked="1"><i class="fa fa-plus"></i> Добавить событие</a>
<div class="row">
	<div class="col-md-2">
		<?
			$prev_date = strtotime ($date) - 24*60*60;
		?>
		<a href="/cabinet/calendar/year/<?=date('Y-m-d', $prev_date)?>/" class="btn btn-success">&lt;</a>
	</div>
	<div class="col-md-8">
		<h2 class="text-center"><?=date('d.m.Y', strtotime($date))?></h2>
	</div>
	<div class="col-md-2 text-right">
		<?
			$next_date = strtotime($date) + 24*60*60;
		?>
		<a href="/cabinet/calendar/year/<?=date('Y-m-d', $next_date)?>/" class="btn btn-success">&gt;</a>
	</div>
</div>
<table class="table table-striped">
	<thead>
		<th width="10">Время</th>
		<th>Событие</th>
	</thead>
	<tbody>
		<?foreach ($events as $event):?>
			<tr>
				<td><?=$event->time->i18nFormat('hh:mm')?></td>
				<td>
					<a href="/"><?=$event->title?></a><br>
					<?=$event->description;?>
				</td>
			</tr>
		<?endforeach;?>
	</tbody>
</table>