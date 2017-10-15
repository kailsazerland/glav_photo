<?=$this->Element('header')?>
<section class="main-container">

				<div class="container">
					<div class="row">

						<!-- main start -->
						<!-- ================ -->
						<div class="main col-md-8 col-lg-offset-1 col-md-push-4 col-lg-push-3">

							<?=$this->fetch('content')?>

						</div>
						<!-- main end -->

						<!-- sidebar start -->
						<!-- ================ -->
						<aside class="col-md-4 col-lg-3 col-md-pull-8 col-lg-pull-9">
							<div class="sidebar">
								
								<div class="block clearfix">
									<h3 class="title">Заказы</h3>
									<div class="separator-2"></div>
									<nav>
										<ul class="nav nav-pills nav-stacked">
											<li><a href="index.html" marked="1">Пополнить баланс</a></li>
											<li><a href="blog-large-image-right-sidebar.html" marked="1">Финансовые операции</a></li>
										</ul>
									</nav>
								</div>
								
								<div class="block clearfix">
									<h3 class="title">Личные данные</h3>
									<div class="separator-2"></div>
									<nav>
										<ul class="nav nav-pills nav-stacked">
											<li><a href="index.html" marked="1">Изменить личные данные</a></li>
											<li><a href="/profile/password/" marked="1">Сменить пароль</a></li>
										</ul>
									</nav>
								</div>
							</div>
						</aside>
						<!-- sidebar end -->

					</div>
				</div>
			</section>
    <?=$this->Element('footer');?>
    