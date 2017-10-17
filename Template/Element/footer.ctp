			<!-- footer top end -->
			<!-- footer start (Add "dark" class to #footer in order to enable dark footer) -->
			<!-- ================ -->
			<footer id="footer" class="clearfix dark">

				<!-- .footer start -->
				<!-- ================ -->
				<div class="footer">
					<div class="container">
						<div class="footer-inner">
							<div class="row">
								<div class="col-md-4">
									<div class="footer-content">
										<h2 class="title">Глав-фото</h2>
										<div class="separator-2"></div>
										<p><?=$configs['footer_about']?> <a href="/pages/about/">Подробнее<i class="fa fa-long-arrow-right pl-5"></i></a></p>
										<div class="separator-2"></div>
										<ul class="list-icons">
											<?if (!empty($configs['address'])):?>
												<li><i class="fa fa-map-marker pr-10 text-default"></i> <?=$configs['address'];?></li>
											<?endif;?>
											<?if (!empty($configs['phone'])):?>
												<li><i class="fa fa-phone pr-10 text-default"></i> <?=$configs['phone'];?></li>
											<?endif;?>
											<?if (!empty($configs['email'])):?>
												<li><a href="mailto:<?=$configs['email'];?>"><i class="fa fa-envelope-o pr-10"></i> <?=$configs['email'];?></a></li>
											<?endif;?>
										</ul>
										<div class="separator-2"></div>
										<h2 class="title">Задать вопрос</h2>
										<a href="/feedback/">Обратная связь</a>
									</div>
								</div>
								<div class="col-md-4">
									<div class="footer-content">
										<h2 class="title">Помощь</h2>
										<div class="separator-2"></div>
										<nav>
											<ul class="list-icons">
											<?foreach ($footer_services as $service):?>
												<li><a href="/services/info/<?=$service->alias?>/"><?=$service->title?></a></li>
											<?endforeach;?>
											</ul>
										</nav>
									</div>
								</div>
								<div class="col-md-4">
									<div class="footer-content">
										<h2 class="title">Мы в соцсетях</h2>
										<div class="separator-2"></div>
										<script type="text/javascript" src="//vk.com/js/api/openapi.js?137"></script>
											<!-- VK Widget -->
											<div id="vk_groups"></div>
											<script type="text/javascript">
											VK.Widgets.Group("vk_groups", {mode: 3, width: "330"}, 135427764);
										</script>
										<ul class="social-links circle animated-effect-1">
											<?foreach ($socials as $social):?>
												<li class="<?=$social->class?>"><a target="_blank" href="<?=$social->url?>"><i class="<?=$social->icon?>"></i></a></li>
											<?endforeach;?>
										</ul>
										
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- .footer end -->

				<!-- .subfooter start -->
				<!-- ================ -->
				<div class="subfooter">
					<div class="container">
						<div class="subfooter-inner">
							<div class="row">
								<div class="col-md-12">
									<p class="text-center">Copyright © <?=date('Y')?> Проект <a target="_blank" href="/">Глав-фото.ру</a>. Все права защищены.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- .subfooter end -->

			</footer>
			<!-- footer end -->
			
		</div>
	
		<script type="text/javascript" src="/bootstrap/js/bootstrap.min.js"></script>
		<!-- Modernizr javascript -->
		<script type="text/javascript" src="/plugins/modernizr.js"></script>
		<script type="text/javascript" src="/plugins/rs-plugin-5/js/jquery.themepunch.tools.min.js?rev=5.0"></script>
		<script type="text/javascript" src="/plugins/rs-plugin-5/js/jquery.themepunch.revolution.min.js?rev=5.0"></script>
		<!-- Isotope javascript -->
		<script type="text/javascript" src="/plugins/isotope/isotope.pkgd.min.js"></script>
		<!-- Magnific Popup javascript -->
		<script type="text/javascript" src="/plugins/magnific-popup/jquery.magnific-popup.min.js"></script>
		<!-- Appear javascript -->
		<script type="text/javascript" src="/plugins/waypoints/jquery.waypoints.min.js"></script>
		<!-- Count To javascript -->
		<script type="text/javascript" src="/plugins/jquery.countTo.js"></script>
		<!-- Parallax javascript -->
		<script src="/plugins/jquery.parallax-1.1.3.js"></script>
		<!-- Contact form -->
		<script src="/plugins/jquery.validate.js"></script>
		<!-- Morphext -->
		<script type="text/javascript" src="/plugins/morphext/morphext.min.js"></script>
		<!-- Google Maps javascript -->
		<script type="text/javascript" src="/https://maps.googleapis.com/maps/api/js?v=3.exp&amp;key=your_google_map_key"></script>
		<script type="text/javascript" src="/js/google.map.config.js"></script>
		<!-- Background Video -->
		<script src="/plugins/vide/jquery.vide.js"></script>
		<!-- Owl carousel javascript -->
		<script type="text/javascript" src="/plugins/owl-carousel/owl.carousel.js"></script>
		<!-- Pace javascript -->
		<script type="text/javascript" src="/plugins/pace/pace.min.js"></script>
		<!-- SmoothScroll javascript -->
		<script type="text/javascript" src="/plugins/jquery.browser.js"></script>
		<script type="text/javascript" src="/plugins/SmoothScroll.js"></script>
		<!-- Initialization of Plugins -->
		<script type="text/javascript" src="/js/template.js"></script>
		<!-- Custom Scripts -->
		<script type="text/javascript" src="/js/custom.js"></script>
		
		<script type="text/javascript" src="//vk.com/js/api/openapi.js?139"></script>
		<script type="text/javascript">
		  VK.init({
		    apiId: 5870444 
		  });
		</script>
		<script type="text/javascript" src="/js/oksdk.js" defer="defer"></script>

		
		
		<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Закрыть</span></button>
						<h4 class="modal-title" id="myModalLabel"></h4>
					</div>
					<div class="modal-body">
						
					</div>
					<?/*<div class="modal-footer">
						<button type="button" class="btn btn-sm btn-dark" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-sm btn-default">Save changes</button>
					</div>
					*/?>
				</div>
			</div>
		</div>
	</body>
</html>
