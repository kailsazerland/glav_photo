<?if (!$service->without_banner):?>
	<section class="section parallax dark-translucent-bg" style="background-image: url('/<?=$service->banner?>');">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2" style="min-height: 400px;">
					<h2><?=$service->title?></h2>
					<div class="separator"></div>
					<p><?=$service->content?></p>
				</div>
			</div>
		</div>
	</section>
<?endif;?>
<div class="container">
	<h2><?=$service->title;?></h2>
	<?if ($service->tabs_count > 0):?>
		<ul class="nav nav-tabs style-4" role="tablist">
			<li class="active"><a href="#htab0" role="tab" data-toggle="tab" marked="1" aria-expanded="false"><i class="fa fa-rub pr-10"></i>Цены на услуги</a></li>
			<?foreach ($service->tabs as $tab):?>
				<li class=""><a href="#htab<?=$tab->id?>" role="tab" data-toggle="tab" marked="1" aria-expanded="true"><i class="<?=$tab->icon?> pr-10"></i><?=$tab->title?></a></li>
			<?endforeach;?>
		</ul>
		<div class="tab-content">
			<div class="tab-pane fade in active" id="htab0">
	<?endif;?>
	<?if ($children->count() > 0):?>
		<div class="row" style="margin-top:20px;">
			<?$cages = 3;
				if (!empty($service->cages)) $cages = $service->cages;
			?>
			<?foreach ($children as $i => $child):?>
				<?if ($i % ($cages) == 0):?>
					<div class="clearfix"></div>
				<?endif;?>
				<div class="col-sm-<?=round(12 / $cages)?>">
					<div class="image-box style-2 mb-20 shadow bordered light-gray-bg text-center">
						<div class="overlay-container">
							<img src="/<?=$child->icon?>" alt="">
							<?/*<div class="overlay-to-top">
								<p class="small margin-clear"><em>Some info <br> Lorem ipsum dolor sit</em></p>
							</div>*/?>
						</div>
						<div class="body">
							<h3><?=$child->link?></h3>
							<?if (!$child->preview_without_button || !$child->preview_without_description):?>
								<div class="separator"></div>
								<?if (!$child->preview_without_description):?><p><?=$child->content?></p><?endif;?>
								<?if (!$child->preview_without_button):?>
									<a href="/services/info/<?=$child->alias?>/" class="btn btn-default btn-sm btn-hvr hvr-shutter-out-horizontal margin-clear" marked="1">Заказать<i class="fa fa-arrow-right pl-10"></i></a>
								<?endif;?>
							<?endif;?>
						</div>
					</div>
				</div>	
			<?endforeach;?>
		</div>
	<?elseif ($goods->count() > 0):?>
		<div class="row">
			<?$cages = 3;
				if (!empty($service->cages)) $cages = $service->cages;
			?>
			<?foreach ($goods as $i => $good):?>
				<?if ($i % ($cages) == 0):?>
					<div class="clearfix"></div>
				<?endif;?>
				<div class="col-sm-<?=round(12 / $cages)?>">
					<div class="image-box shadow text-center mb-20">
						<div class="overlay-container">
							<img src="/<?=$good->preview?>" alt="">
							<div class="overlay-top">
								<div class="text">
									<?if (!empty($good->form_id)){
										$url = "/services/form/" . $good->form_id;										
									} else {
										$url = "/services/constructor/" . $good->id;
									}?>
									<h3><a href="<?=$url?>" marked="1"><?=$good->title?></a></h3>
									<p class="small"><?=$good->description?></p>
								</div>
							</div>
							<div class="overlay-bottom">
								<div class="links">
									<a href="<?=$url?>" class="btn btn-gray-transparent btn-animated btn-sm" marked="1">Всего <?=$good->price?><span class="fa fa-rub"></span> <i class="pl-10 fa fa-arrow-right"></i></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?endforeach;?>
		</div>
	<?else:?>
		<?=($service->page_content);?>
	<?endif;?>
	<?if ($service->tabs_count > 0):?>
			</div>
			<?foreach ($service->tabs as $tab):?>
				<div class="tab-pane fade" id="htab<?=$tab->id?>">
					<?=$tab->content;?>
				</div>
			<?endforeach;?>
		</div>
	<?endif;?>
</div>