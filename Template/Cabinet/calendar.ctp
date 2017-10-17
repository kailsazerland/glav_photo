<?$monthes = [1 => 'январь', 'февраль', 'март', 'апрель','май','июнь','июль','август','сентябрь','октябрь','ноябрь','декабрь']?>
<?$days = [1 => 'ПН', 'ВТ', 'СР', 'ЧТ','ПТ','СБ','ВС']?>
<h1 class="page-title">Календарь событий</h1>
<div class="separator-2"></div>
<a class="btn btn-animated btn-success in_modal" href="/cabinet/add/" marked="1"><i class="fa fa-plus"></i> Добавить событие</a>
<div class="row text-cetner">
	Вид: 
	<div class="btn-group">
		<?$types = ['year' => 'год', 'month' => 'месяц', 'week' => 'неделя'];?>
		<?foreach ($types as $alias => $type):?>
			<a class="btn btn-sm btn-default <?if ($current_view == $alias):?>active<?endif?>" href="/cabinet/calendar/<?=$alias?>/"><?=$type?></a>
		<?endforeach;?>
	</div>
</div>
<br><br>
<div class="row">
	<?if ($current_view == 'year'):?>
		<div class="row">
			<div class="col-md-2">
				<?
					$prev_year = $current_year - 1;
					if ($prev_year < 1970) $prev_year = 1970;
				?>
				<a href="/cabinet/calendar/year/<?=$prev_year?>/" class="btn btn-success">&lt;</a>
			</div>
			<div class="col-md-8">
				<h2 class="text-center"><?=$current_year?> г.</h2>
			</div>
			<div class="col-md-2 text-right">
				<?
					$next_year = $current_year + 1;
				?>
				<a href="/cabinet/calendar/year/<?=$next_year?>/" class="btn btn-success">&gt;</a>
			</div>
		</div>
		<div class="row">
			<?for($i = 1; $i < 13; $i++):?>
				<div class="col-md-6">
					<h3><a href="/cabinet/calendar/month/<?=$current_year?>/<?=$i?>/"><?=$monthes[$i]?></a></h3>
					<table class="table table-striped calendar-year">
						<?$date = strtotime("$current_year-$i-01");?>
						<?for ($k = 1; $k < 7; $k++):?>
							<tr>
								<?for ($j = 1; $j < 8; $j++):?>
									<td class="<?if (date('Y-m-d', $date) == date('Y-m-d')):?>bg-success<?endif;?>" data-date="<?=date('Y-m-d', $date)?>">
										<?if (date('m', $date) == $i && date('N', $date) == $j):?>
											<small class="date"><?=date('j', $date)?></small>
											<?if (isset($events[date('Y-m-d', $date)])):?>
												<span class="label label-success"><a href="/cabinet/day/<?=date('Y-m-d', $date)?>/"><?=$events[date('Y-m-d', $date)]?></a></span>
											<?endif;?>
											<?$date = $date + 24*60*60?>
										<?endif;?>
									</td>
								<?endfor;?>
							</tr>
						<?endfor;?>
					</table>
				</div>
				<?if ($i > 1 && ($i) % 2 == 0):?>
					</div><div class="row">
				<?endif;?>
			<?endfor;?>
		</div>
	<?endif;?>
	<?if ($current_view == 'month'):?>
		<div class="row">
			<div class="col-md-2">
				<?
					$prev_month = $current_month - 1;
					$prev_year = $current_year;
					if ($prev_month == 0) {
						$prev_month = 12; $prev_year = $prev_year - 1;
					}
				?>
				<a href="/cabinet/calendar/month/<?=$prev_year?>/<?=$prev_month?>" class="btn btn-success">&lt;</a>
			</div>
			<div class="col-md-8">
				<h2 class="text-center"><?=$monthes[$current_month]?> <?=$current_year?> г.</h2>
			</div>
			<div class="col-md-2 text-right">
				<?
					$next_month = $current_month + 1;
					$next_year = $current_year;
					if ($next_month == 13) {
						$next_month = 1; $next_year = $current_year + 1;
					}
				?>
				<a href="/cabinet/calendar/month/<?=$next_year?>/<?=$next_month?>" class="btn btn-success">&gt;</a>
			</div>
		</div>
		<table class="table table-striped- calendar-month table-bordered">
			<thead class="text-center">
				<th width="15%">ПН</th>
				<th width="15%">ВТ</th>
				<th width="15%">СР</th>
				<th width="15%">ЧТ</th>
				<th width="15%">ПТ</th>
				<th width="15%"><b>СБ</b></th>
				<th width="15%"><b>ВС</b></th>
			</thead>
			<tbody>
				<?$date = strtotime("$current_year-$current_month-01")?>
				<?for ($i = 1; $i < 6; $i++):?>
					<tr>
						<?for ($j = 1; $j < 8; $j++):?>
							<td height="80" class="<?if (date('Y-m-d', $date) == date('Y-m-d')):?>bg-success<?endif;?> <?if (date('m', $date) == $current_month && date('N', $date) == $j):?>add_event<?endif;?>" data-date="<?if (date('m', $date) == $current_month && date('N', $date) == $j):?><?=date('Y-m-d', $date)?><?endif;?>">
								<?if (date('m', $date) == $current_month && date('N', $date) == $j):?>
									<small class="date"><?=date('j', $date)?></small>
									<?if (isset($events[date('Y-m-d', $date)])):?>
										<?$show = 2;?>
										<?if (count($events[date('Y-m-d', $date)]) == 3) $show = 3;?>
										<?for ($k = 1 ; $k < $show + 1; $k++):?>
											<?if (isset($events[date('Y-m-d', $date)][$k - 1])):?>
												<?$event = $events[date('Y-m-d', $date)][$k - 1]?>
												<a href="/cabinet/event/<?=$event->id?>/" class="in_modal label label-success" data-toggle="tooltip" data-placement="top" title="<?=$event->time->i18nFormat('HH:mm')?> <?=h($event->title)?>"><?=$this->Text->truncate($event->title, 14)?></a>
											<?endif;?>
										<?endfor;?>
										<?if (count($events[date('Y-m-d', $date)]) > 3):?>
											<span class="label label-warning"><a href="/cabinet/day/<?=date('Y-m-d', $date)?>/">Ещё <?=count($events[date('Y-m-d', $date)]) - 2?> &gt;</a></span>
										<?endif;?>
									<?endif;?>
									<?$date = $date + 24*60*60?>
								<?endif;?>
								
							</td>
						<?endfor;?>
					</tr>
				<?endfor;?>
			</tbody>
		</table>
	<?endif;?>
	<?if ($current_view == 'week'):?>
		<div class="row">
			<div class="col-md-2">
				<?
					$prev_week = $current_week - 1;
					$prev_year = $current_year;
					if ($prev_week == 0) {
						$prev_week = 52; $prev_year = $prev_year - 1;
					}
				?>
				<a href="/cabinet/calendar/week/<?=$prev_year?>/0/<?=$prev_week?>" class="btn btn-success">&lt;</a>
			</div>
			<div class="col-md-8">
				<h2 class="text-center">Неделя: <?=$current_week?>, <?=$current_year?> г.</h2>
			</div>
			<div class="col-md-2 text-right">
				<?
					$next_week = $current_week + 1;
					$next_year = $current_year;
					if ($next_week == 53) {
						$next_week = 1; $next_year = $current_year + 1;
					}
				?>
				<a href="/cabinet/calendar/week/<?=$next_year?>/0/<?=$next_week?>" class="btn btn-success">&gt;</a>
			</div>
		</div>
		<?
		$anydate = strtotime("$current_year-01-01") + $current_week * 7 * 24 * 60 * 60;
		$date = $monday = $anydate - (date('N', strtotime("$current_year-01-01")) - 1 )* 24 * 60 * 60;
		?>
		<table class="table table-striped">
			<?for ($i = 1; $i < 8; $i++):?>
				<tr class="<?if (date('Y-m-d', $date) == date('Y-m-d')):?>bg-success<?endif;?>">
					<td width="10" height="100" nowrap><?=date('d/m', $date)?>, <b><?=$days[date('N', $date)]?></b></td>
					<td width="" class="add_event" data-date="<?=date('Y-m-d', $date)?>">
						<?if (isset($events[date('Y-m-d', $date)])):?>
							<?foreach ($events[date('Y-m-d', $date)] as $event):?>
								<a href="/cabinet/event/<?=$event->id?>/" class="label in_modal label-success"><?=$event->time->i18nFormat('HH:mm')?> &mdash; <?=$this->Text->truncate($event->title, 200)?></a><br>
							<?endforeach;?>
						<?endif;?>
					</td>
				</tr>
				<?$date = $date + 24*60*60;?>
			<?endfor;?>
		</table>
	<?endif;?>
</div>