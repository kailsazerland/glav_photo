<div class="banner clearfix">
	<!-- slideshow start -->
	<!-- ================ -->
	<?if ($slides->count() > 0):?>
		<div class="slideshow">
		
			<!-- slider revolution start -->
			<!-- ================ -->
			
			<div class="slider-revolution-5-container">
				<div id="slider-banner-fullwidth-big-height" class="slider-banner-fullwidth-big-height rev_slider" data-version="5.0">
					<ul class="slides">
						<!-- slide 1 start -->
						<!-- ================ -->
						<?foreach ($slides as $slide):?>
							<li data-transition="random" data-slotamount="default" data-masterspeed="default" data-title="<?=$slide->title?>">
							
							<!-- main image -->
								<img src="/<?=$slide->slide?>" alt="slidebg1" data-bgposition="center top"  data-bgrepeat="no-repeat" data-bgfit="cover"  class="rev-slidebg">
								
								<!-- LAYER NR. 1 -->
								<div class="tp-caption sfb fadeout dark-translucent-bg caption-box text-left"
									style="background-color: rgba(0, 0, 0, 0.8);"
									data-x="<?=$slide->align?>"
									data-y="<?=$slide->valign?>"
									data-start="600"
									data-whitespace="normal"
									data-transform_idle="o:1;"
									data-transform_in="y:[100%];sX:1;sY:1;o:0;s:1500;e:Power4.easeInOut;"
									data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;"
									data-mask_in="x:0px;y:[100%];s:inherit;e:inherit;"
									data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;">
									<h2 class="title"><?=$slide->title?></h2>
									<div class="separator-2 clearfix"></div>
									<p><?=$slide->description?></p>
									<div class="text-right"><a class="btn btn-small btn-default margin-clear" href="<?=$slide->url?>">Подробнее</a></div>
								</div>
			
							</li>
						<?endforeach;?>
					</ul>
					<div class="tp-bannertimer"></div>
				</div>
			</div>
			<!-- slider revolution end -->
		
		</div>
		<!-- slideshow end -->
	<?endif;?>
</div>
<div class="container">
	<h1>Популярные услуги</h1>
	<div class="separator-2"></div>
	<div class="row" style="margin-top:20px;">
		<?$cages = 4;
			
		?>
		<?foreach ($top_services as $i => $child):?>
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
</div>
