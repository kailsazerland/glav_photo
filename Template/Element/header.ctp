<html class="js no-touch csstransitions" lang="en">
	<head>
		<meta charset="utf-8">
		<title>ГЛАВ-ФОТО - фотоуслуги и полиграфия он-лайн</title>
		<meta name="description" content="http://glav-foto.ru/services/info/krujki/">

		<!-- Mobile Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- Favicon -->
		<link rel="shortcut icon" href="/favicon.ico">

		<!-- Web Fonts -->
		<link href="http://fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,500,500italic,700,700italic" rel="stylesheet" type="text/css">
		<link href="http://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet" type="text/css">
		<link href="http://fonts.googleapis.com/css?family=PT+Serif" rel="stylesheet" type="text/css">

		<!-- Bootstrap core CSS -->
		<link href="/bootstrap/css/bootstrap.css" rel="stylesheet">

		<!-- Font Awesome CSS -->
		<link href="/fonts/font-awesome/css/font-awesome.css" rel="stylesheet">

		<!-- Fontello CSS -->
		<link href="/fonts/fontello/css/fontello.css" rel="stylesheet">

		<!-- Plugins -->
		<link href="/plugins/magnific-popup/magnific-popup.css" rel="stylesheet">
		<link href="/plugins/rs-plugin-5/css/settings.css" rel="stylesheet">
		<link href="/plugins/rs-plugin-5/css/layers.css" rel="stylesheet">
		<link href="/plugins/rs-plugin-5/css/navigation.css" rel="stylesheet">
		<link href="/css/animations.css" rel="stylesheet">
		<link href="/plugins/owl-carousel/owl.carousel.css" rel="stylesheet">
		<link href="/plugins/owl-carousel/owl.transitions.css" rel="stylesheet">
		<link href="/plugins/hover/hover-min.css" rel="stylesheet">		
		<link href="/plugins/morphext/morphext.css" rel="stylesheet">
		<link href="/css/custom.css" rel="stylesheet">
		
		<!-- The Project's core CSS file -->
		<link href="/css/style.css" rel="stylesheet">
		<!-- The Project's Typography CSS file, includes used fonts -->
		<!-- Used font for body: Roboto -->
		<!-- Used font for headings: Raleway -->
		<link href="/css/typography-default.css" rel="stylesheet">
		<!-- Color Scheme (In order to change the color scheme, replace the blue.css with the color scheme that you prefer)-->
		<link href="/css/skins/orange.css" rel="stylesheet">
		

		<!-- Custom css --> 
		<script   src="https://code.jquery.com/jquery-2.2.4.js"   integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="   crossorigin="anonymous"></script>
		
		<!-- Include Unite Gallery -->
		<script type='text/javascript' src='/unitegallery/js/unitegallery.min.js'></script>		
		<link rel='stylesheet' href='/unitegallery/css/unite-gallery.css' type='text/css' />	
		<script type='text/javascript' src='/unitegallery/themes/tiles/ug-theme-tiles.js'></script>
		<script type='text/javascript' src='/js/custom.js?r=<?=rand(0,10000)?>'></script>
		
	</head>
	<body class="front-page     pace-done"><div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Закрыть</span></button>
						<h4 class="modal-title" id="myModalLabel"></h4>
					</div>
					<div class="modal-body">
						
					</div>
									</div>
			</div>
		</div><div class="pace  pace-inactive"><div class="pace-progress" style="transform: translate3d(100%, 0px, 0px);" data-progress-text="100%" data-progress="99">
  <div class="pace-progress-inner"></div>
</div>
<div class="pace-activity"></div></div>

		<!-- scrollToTop -->
		<!-- ================ -->
		<div class="scrollToTop circle" style="display: none;"><i class="icon-up-open-big"></i></div>
		
		<!-- page wrapper start -->
		<!-- ================ -->
		<div class="page-wrapper">
			<div class="header-container" style="padding-bottom: 0px;">
				<div class="header-top  ">
					<div class="container">
						<div class="row">
							<div class="col-xs-12 col-sm-8">
								<!-- header-top-first start -->
								<!-- ================ -->
								<div class="header-top-first hidden-xs clearfix">
									<nav>
										<ul class="list-inline text-muted">
											<li><strong class="pl-5"><i class="fa fa-phone pr-10 text-default"></i></strong> <a href="/#" marked="1"><?=$configs['phone']?></a></li>
											<li><i class="fa fa-map-marker pr-10 text-default"></i> <?=$configs['address']?></li>
											<li><strong class="pl-5">E-mail:</strong> <?=$configs['email']?></li>
										</ul>
									</nav>
								</div>
								<!-- header-top-first end -->
							</div>
							<div class="col-xs-12 col-sm-4">
								<!-- header-top-second start -->
								<!-- ================ -->
								<div id="header-top-second" class="clearfix text-right">
									<nav>
										<ul class="list-inline text-muted">
											<?if ($auth):?>
												<li><i class="fa fa-user pl-5 pr-5"></i> <a class="link-dark" href="/cabinet/" marked="1"><?=$auth['name']?></a></li>
												<li><a class="link-dark" href="/users/logout/" marked="1">Выйти</a> <i class="fa fa-sign-out pl-5 pr-5"></i></li>
											<?else:?>
												<?/*<li><i class="fa fa-user pl-5 pr-5"></i> <a class="link-dark" href="/users/registration/" marked="1">Регистрация</a></li>
												<li><i class="fa fa-lock pl-5 pr-5"></i> <a class="link-dark" href="/users/login/" marked="1">Войти</a></li>*/?>
											<?endif;?>
											</ul>
									</nav>
								</div>
								<!-- header-top-second end -->
							</div>
						</div>
					</div>
				</div>
				
				<div class="container">
					<div class="row">
						<div class="col-sm-7 p-10" style="padding-bottom:10px;">
							<a href="/" marked="1">
								<img id="logo_img" src="/images/mylogo.png" alt="Глав-фото">
							</a>
						</div>
						<div class="col-sm-5">
							<div class="row p-5 header_menu">
								<ul class="list-inline" style="padding-left:15px;">
									<?foreach ($pages_link as $i => $page):?>
							      		<li class="col-md-4 <?if ($i == 0):?>text-right<?elseif ($i == 1):?>text-center<?else:?>text-left<?endif;?>"><h4><a href="/pages/<?=$page->alias?>/"><i class="fa fa-<?=$page->menu_icon?>"></i> <?=$page->link?></a></h4></li>
							      	<?endforeach;?>
						        </ul>
							</div>
							<div class="rows header_phones">
								<div class="col-xs-6 text-center"><h3>+7 916 390 05 10</h3></div>
								<div class="col-xs-6 text-center"><h3>+7 916 390 05 11</h3></div>
							</div>
						</div>
					</div>
					
				</div>
				
				<header class="header dark  _fixed    clearfix" id="mainmenu">
					
					<div class="container">
						<div class="row">
							<div class="col-md-12">
					
								<!-- header-right start -->
								<!-- ================ -->
								<div class="header-right clearfix">
									
								<!-- main-navigation start -->
								<!-- classes: -->
								<!-- "onclick": Makes the dropdowns open on click, this the default bootstrap behavior e.g. class="main-navigation onclick" -->
								<!-- "animated": Enables animations on dropdowns opening e.g. class="main-navigation animated" -->
								<!-- "with-dropdown-buttons": Mandatory class that adds extra space, to the main navigation, for the search and cart dropdowns -->
								<!-- ================ -->
								<div class="main-navigation  animated">

									<!-- navbar start -->
									<!-- ================ -->
									<nav class="navbar navbar-default navbar-icons" role="navigation">
										<div class="container-fluid">
											<!-- Toggle get grouped for better mobile display -->
											<div class="navbar-header">
												<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
													<span class="sr-only">Toggle navigation</span>
													<span class="icon-bar"></span>
													<span class="icon-bar"></span>
													<span class="icon-bar"></span>
												</button>
												<a class="navbar-brand visible-xs" href="#">Услуги</a>
											</div>

											<!-- Collect the nav links, forms, and other content for toggling -->
											<div class="collapse navbar-collapse" id="navbar-collapse-1">
												<!-- main-menu -->
												<ul class="nav navbar-nav ">
													<?foreach ($service_links as $service):?>
														
														<li class="<?if ($service->child_count > 0):?>dropdown<?endif;?> mega-menu">
															<?if (!empty($service->icon_mainmenu)):?>
																<a href="/services/info/<?=$service->alias?>/" class="dropdown-toggle- hidden-xs for_img"><div class="icon_mainmenu icon_<?=$service->alias?>" style="background-image: url('/<?=$service->icon_mainmenu?>')"></div></a>
																<style>.icon_<?=$service->alias?>:hover {background-image: url('/<?=$service->icon_mainmenu_hover?>') !important;}</style>
															<?else:?>
																<a href="/services/info/<?=$service->alias?>/" marked="1" class="dropdown-toggle" data-toggle="dropdown"><?=$service->link?></a>
															<?endif;?>
															<?/*<a href="/services/info/<?=$service->alias?>/" marked="1" class="dropdown-toggle visible-xs" data-toggle="dropdown"><?=$service->link?></a>*/?>
															<?if ($service->child_count > 0):?>
																<ul class="dropdown-menu">
																	<li>
																		<h4 class="title hidden-xs"><i class="fa fa-magic"></i> <?=$service->title?></h4>
																		<div class="row">
																			<div class="col-md-6">
																				<div class="divider"></div>
																				<ul class="menu">
																					<?foreach ($service->children as $i => $child):?>
																						<?if ($i > round(count($service->children) / 2) - 1) break;?>
																						<li><a href="/services/info/<?=$child->alias?>/" marked="1"><?=$child->link?></a></li>
																					<?endforeach;?>
																				</ul>
																			</div>
																			<div class="col-md-6">
																				<div class="divider"></div>
																				<ul class="menu">
																					<?foreach ($service->children as $i => $child):?>
																						<?if ($i < (count($service->children) / 2)) continue;?>
																						<li><a href="/services/info/<?=$child->alias?>/" marked="1"><?=$child->link?></a></li>
																					<?endforeach;?>
																				</ul>
																			</div>
																		</div>
																	</li>
																</ul>
															<?endif;?>
														</li>
													<?endforeach;?>
												</ul>
											</div>

										</div>
									</nav>
									<!-- navbar end -->

								</div>
								<!-- main-navigation end -->
								</div>
								<!-- header-right end -->
					
							</div>
						</div>
					</div>
					
				</header>
				<!-- header end -->
			</div>
			<!-- header-container end -->