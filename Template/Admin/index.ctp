<div class="content">
	<div class="row">
		<div class="col-md-6"></div>
		<div class="col-md-6">
			<h2>Уведомления</h2>
			<?if ($new_photoprints > 0):?>
				<div class="alert alert-success">
					У вас <b><?=$new_photoprints?></b> новых заказов на печать фотографий! <a href="/admin/auto_list/Photoprints/">Перейти &rarr;</a>
				</div>
			<?endif;?>
		</div>
	</div>
</div>