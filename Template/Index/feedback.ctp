<div id="collapseMap" class="banner">
		<!-- google map start -->
		<!-- ================ -->
		<div id="map-canvas"><?=$configs['map']?></div>
		<!-- google maps end -->
	</div>
	<!-- banner end -->

	<!-- main-container start -->
	<!-- ================ -->
	<section class="main-container">

		<div class="container">
			<div class="row">

				<!-- main start -->
				<!-- ================ -->
				<div class="main col-md-8">
					<!-- page-title start -->
					<!-- ================ -->
					<h1 class="page-title">Обратная связь</h1>
					<div class="separator-2"></div>
					<!-- page-title end -->
					<?if ($page):?>
						<?=$page['content']?>
						<p></p>
					<?endif;?>
					<?if (isset($done) && $done):?>
			        	<div class="alert alert-success">Ваш запрос отправлен, ответ вы получите на ваш электронный адрес.</div>
			        <?else:?>
						<div class="contact-form">
							<?=$this->Form->create($contact, ['class' => 'margin-clear', 'id' => ''])?>
								<?if (!$auth):?>
									<div class="form-group has-feedback">
										<label for="name">Имя*</label>
										<?=$this->Form->text('name', ['placeholder' => "", 'class' => 'form-control', 'required' => 'required'])?>
										<i class="fa fa-user form-control-feedback"></i>
									</div>
									<div class="form-group has-feedback">
										<label for="email">Email*</label>
										<?=$this->Form->email('mail', ['placeholder' => "", 'class' => 'form-control', 'required' => 'required'])?>
										<i class="fa fa-envelope form-control-feedback"></i>
									</div>
								<?else:?>
									<?=$this->Form->hidden('mail', ['value' => $auth['mail']])?>
									<?=$this->Form->hidden('name', ['value' => $auth['name']])?>
									
								<?endif;?>
								<div class="form-group has-feedback">
									<label for="email">Телефон*</label>
									<?=$this->Form->text('phone', ['placeholder' => "+7 (9XX) XXX-XX-XX", 'class' => 'form-control', 'required' => 'required'])?>
									<i class="fa fa-phone form-control-feedback"></i>
								</div>
								<div class="form-group has-feedback">
									<label for="subject">Тема*</label>
									<?=$this->Form->text('subject', ['placeholder' => "Тема обращения", 'class' => 'form-control', 'required' => 'required'])?>
									<i class="fa fa-navicon form-control-feedback"></i>
									<?if ($this->Form->hasError('subject')):?>
				                    	<p class="help-block text-danger"><?=$this->Form->error('subject')?></p>
				                    <?endif;?>
				                    
								</div>
								<div class="form-group has-feedback">
									<label for="message">Сообщение*</label>
									<?=$this->Form->textarea('content', ['placeholder' => "Текст обращения", 'rows' => 6, 'class' => 'form-control', 'required' => 'required'])?>
									<i class="fa fa-pencil form-control-feedback"></i>
									<?if ($this->Form->hasError('content')):?>
				                    	<p class="help-block text-danger"><?=$this->Form->error('content')?></p>
				                    <?endif;?>
								</div>
								<input type="submit" value="Отправить" class="submit-button btn btn-default">
							<?=$this->Form->end();?>
						</div>
					<?endif;?>
				</div>
				<!-- main end -->

				<!-- sidebar start -->
				<!-- ================ -->
				<aside class="col-md-4 col-lg-3 col-lg-offset-1">
					<div class="sidebar">
						<div class="block clearfix">
							<h3 class="title">Найти нас</h3>
							<div class="separator-2"></div>
							<ul class="list">
								<?if (!empty($configs['address'])):?>
									<li><i class="fa fa-home pr-10"></i><?=$configs['address'];?></li>
								<?endif;?>
								<?if (!empty($configs['phone'])):?>
									<li><i class="fa fa-phone pr-10"></i><?=$configs['phone'];?></li>
								<?endif;?>
								<?/*<li><i class="fa fa-mobile pr-10 pl-5"></i><abbr title="Phone">M:</abbr> (123) 456-7890</li>*/?>
								<?if (!empty($configs['email'])):?>
									<li><i class="fa fa-envelope pr-10"></i><a href="mailto:<?=$configs['email'];?>"><?=$configs['email'];?></a></li>
								<?endif;?>
								<?if (!empty($configs['skype'])):?>
									<li><i class="fa fa-skype pr-10"></i><a href="skype:<?=$configs['skype'];?>"><?=$configs['skype'];?></a></li>
								<?endif;?>
							</ul>
							<a class="btn btn-gray collapsed map-show btn-animated" data-toggle="collapse" href="#collapseMap" aria-expanded="false" aria-controls="collapseMap">Показать карту <i class="fa fa-plus"></i></a>
						</div>
					</div>
					<div class="sidebar">
						<div class="block clearfix">
							<h2 class="title">Подписывайтесь</h2>
							<div class="separator-2"></div>
							<ul class="social-links circle small margin-clear clearfix animated-effect-1">
								<?foreach ($socials as $social):?>
									<li class="<?=$social->class?>"><a target="_blank" href="<?=$social->url?>"><i class="<?=$social->icon?>"></i></a></li>
								<?endforeach;?>
							</ul>
						</div>
					</div>
				</aside>
				<!-- sidebar end -->

			</div>
		</div>
	</section>