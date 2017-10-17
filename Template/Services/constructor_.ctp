<div class="breadcrumb-container">
		<div class="container">
			<ol class="breadcrumb">
				<li><i class="fa fa-home pr-10"></i><a class="link-dark" href="/" marked="1">Начало</a></li>
				<li><a class="link-dark" href="/services/info/<?=$service->alias?>" marked="1"><?=$service->link?></a></li>
				<li class="active">Конструктор &laquo;<?=$good->title?>&raquo;</li>
			</ol>
		</div>
	</div>
<div class="container">
	
	<h2>Конструктор &laquo;<?=$good->title?>&raquo;</h2>
	
	<?if ($good->templates_count > 0):?>
		<div class="row">
			<div id="articles" class="tab-pane active" role="tabpanel">
				<h3>Варианты:</h3>
				
			</div>
		</div>
		<div class="separator"></div>
		<div class="row">
			<div class="col-md-4">
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active"><a href="#texts" aria-controls="profile" role="tab" data-toggle="tab">Тексты</a></li>
					<li role="presentation"><a href="#image_tool" aria-controls="messages" role="tab" data-toggle="tab">Изображение</a></li>
					<?if (!empty($good->library_folder)):?>
						<li role="presentation"><a href="#library" aria-controls="messages" role="tab" data-toggle="tab">Библиотека</a></li>
					<?endif;?>
				</ul>
				<div class="tab-content">
					<?if (!empty($good->library_folder)):?>
						<div role="tabpanel" class="tab-pane" id="library">
							<?$dir = opendir('img/libs/' . $good->library_folder);?>
							<?while ($f = readdir($dir)):?>
								<?if (is_file('img/libs/' . $good->library_folder . '/' . $f)):?>
									<?$library[] = '/img/libs/' . $good->library_folder . '/' . $f?>
								<?endif;?>
							<?endwhile;?>
							<?foreach ($library as $i => $item):?>
								<?if ($i % (round(count($library) / 2)) == 0):?>
									<div class=" col-md-6">
								<?endif;?>
									<div class="thumbnail">
										<img src="<?=$item?>">
									</div>
								<?if ((($i + 1) % round(count($library) / 2) == 0) || ($i+1) == count($library)):?>
									</div>
								<?endif;?>
							<?endforeach;?>
						</div>
					<?endif;?>
					<div role="tabpanel" class="tab-pane active" id="texts">
						<h3>Добавить текст</h3>
						<form id="text_form">
							<input type="hidden" name="text_id" value="" autocomplete="off">
							<div class="form-group">
								<input type="text" class="form-control caption" autocomplete="off">
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									<select class="form-control" id="fonts"><option value="">Шрифт</option></select>
								</div>
								<div class="col-md-3">
									<input type="text" class="form-control" placeholder="размер" id="font_size">
								</div>
								<div class="col-md-3">
									<div id="colorSelector" style="float:left;"><div></div></div>
								</div>
							</div>
							<div class="btn-group" role="group" id="">
								<button type="button" class="btn  btn-default text_bold" title="Полужирный текст"><i class="fa fa-bold"></i></button>
								<button type="button" class="btn btn-default text_italic" title="Курсивный текст"><i class="fa fa-italic"></i></button>
								<button type="button" class="btn btn-default text_underline"><i class="fa fa-underline"></i></button>
							</div>
							<div class="form-group row">
								<div class="col-md-12">
									<button type="submit" class="btn btn-success">Добавить</button>
								</div>
							</div>
						</form>
						<ul class="list-group" id="text_list">
							
						</ul>
					</div>
					<div role="tabpanel" class="tab-pane" id="messages">...</div>
					<div role="tabpanel" class="tab-pane" id="image_tool">
						<form id="preload" role="form" enctype="multipart/form-data" method="POST">
							<input type="hidden" name="article_id" value="" autocomplete="off" class="article_id">
							<input type="hidden" name="good_id" value="<?=$good->id?>" autocomplete="off">
							<input type="hidden" name="template_id" value="" autocomplete="off">
							<div class="progress progress-striped" id="preload_bar" style="display:none;">
								<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
							    	<span class="sr-only">40% Complete (success)</span>
								</div>
							</div>
							<div class="form-group">
								<br>
								<div class="btn-group" data-toggle="buttons" id="type_upload">
									<label class="btn btn-primary active">
										<input type="radio" name="upload_from" value="file" id="option1" autocomplete="off" checked>Из файла
									</label>
									<label class="btn btn-primary">
										<input type="radio" name="upload_from" value="url" id="option2" autocomplete="off">Из интеренета
									</label>
								</div><br><br>
								<div id="upload_file">
									<label for="file_preload_">Укажите файл</label>
									<input type="file" name="file" id="file">
								</div>
								<div id="upload_url" style="display: none;">
									<input type="text" name="url" class="form-control" placeholder="Введите ссылку на файл">
								</div>
								<div class="form-group">
									<input type="submit" value="Загрузить" class="btn btn-success" id="" data-loading-text="Загружается...">
								</div>
							</div>
							
						</form>
						<ul class="list-group" id="image_list">
							
						</ul>
						<div class="btn-group" role="group" id="image_tool">
							<button type="button" class="btn  btn-default" id="auto_resize" title="Подогнать изображение под поле печати"><i class="glyphicon glyphicon-fullscreen"></i></button>
							<button type="button" class="btn btn-default zoom_in"><i class="glyphicon glyphicon-zoom-in"></i></button>
							<button type="button" class="btn btn-default zoom_out"><i class="glyphicon glyphicon-zoom-out"></i></button>
							
							
							<button type="button" class="btn btn-default delete"><i class="glyphicon glyphicon glyphicon-remove text-danger"></i></button>
						</div><br>
						<div class="btn-group" role="group" id="">
							<button type="button" class="btn btn-default upper_all" title="Поднять выше все изображений"><i class="fa fa-angle-double-up"></i></button>
							<button type="button" class="btn btn-default upper" title="Поднять на уровень"><i class="fa fa-angle-up"></i></button>
							<button type="button" class="btn btn-default downer" title="Опустить на уровень"><i class="fa fa-angle-down"></i></button>
							<button type="button" class="btn btn-default downer_all" title="Опустить нижу всех изображений"><i class="fa fa-angle-double-down"></i></button>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-8 well">
				<h3>Предпросмотр</h3>
				<div class="alert alert-danger alert-dismissable" style="display:none;" id="error_alert"><span></span></div>
				<div id="mainer">
					<div class="bottom sizeble"></div>
					<div id="images">
						
					</div>
					<div id="texts-captions">
						
					</div>
					<div class="top template sizeble"></div>
					<div id="images-clone" class="object"></div>
					<div id="texts-clone">
					
					</div>
				</div>
				<div id="sizes_colors">
					<h4>Цвета, размеры</h4>
					<div class="sizes switcher">
						<div class="btn-group btn-group-sm" role="group" aria-label="..."></div>
					</div><br>
					<div class="colors switcher">
						<div class="btn-group btn-group-sm" role="group" aria-label="..."></div>
					</div>
				</div>
				<div class="row text-center">
					<button class="btn btn-success btn-lg" id="order" data-toggle="modal" data-target="#order_form">Заказать</button>
				</div>
				
				<h3>Пример работа (заготовки):</h3>
				<div class="examples" style="height: 100px; border: 1px solid black;   overflow-x: scroll; overflow-y: hidden;">
					<div style="width:1500px;">
						<span class="thumbnail" style="width:150px; float:left; display:inline">Пример будет тут</span>
						<span class="thumbnail" style="width:150px; float:left; display:inline">Пример будет тут</span>
						<span class="thumbnail" style="width:150px; float:left; display:inline">Пример будет тут</span>
						<span class="thumbnail" style="width:150px; float:left; display:inline">Пример будет тут</span>
						<span class="thumbnail" style="width:150px; float:left; display:inline">Пример будет тут</span>
						<span class="thumbnail" style="width:150px; float:left; display:inline">Пример будет тут</span>
						<span class="thumbnail" style="width:150px; float:left; display:inline">Пример будет тут</span>
						<span class="thumbnail" style="width:150px; float:left; display:inline">Пример будет тут</span>
						<span class="thumbnail" style="width:150px; float:left; display:inline">Пример будет тут</span>
						<span class="thumbnail" style="width:150px; float:left; display:inline">Пример будет тут</span>
					</div>
				</div>
			</div>
			
		</div>
		<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="order_form">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Всё почти готово!</h4>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-md-6">
								<h4>Ваш вариант:</h4>
								<div id="canvas">Идёт загрузка конечного варианта...</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<form>
									<input type="hidden" name="article_id" value="" autocomplete="off" class="article_id">
									<h4>Данные заказа:</h4>
									<div class="form-group">
										<input class="form-control input-lg" placeholder="Имя" type="text" name="name">
									</div>
									<div class="form-group">
										<input class="form-control input-lg" placeholder="Телефон" name="phone" required>
									</div>
									<div class="form-group">
										<input class="form-control input-lg" placeholder="Адрес" type="text" name="address">
									</div>
									<div class="form-group">
										<input class="form-control input-lg" placeholder="Email" type="email" name="mail" required>
									</div>
								</form>
							</div>
						</div>
					</div>
				  <div class="modal-footer">
				  	<span id="upload_result" style="display:none;">
				  		Дождитесь конца загрузки...
				  	</span>
				    <button type="button" class="btn btn-default" data-dismiss="modal">Назад</button>
				    <button type="button" class="btn btn-primary" id="send_order">Отправить</button>
				  </div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
		
	<?else:?>
		<i>Конструктор товара не доступен! </i>
	<?endif;?>
</div>
<script type="text/javascript">
	good_id = <?=$good->id?>;

</script>
	<script src="/constructor/js/jquery-ui.min.js"></script>
    <script src="/constructor/js/jquery.form.js"></script>
    <script src="/constructor/js/colorpicker.js"></script>
    <script src="/constructor/js/html2canvas.js"></script>
<script type="text/javascript" src="/constructor/js/constructor.js"></script>
<style>
	#articles > div {
		cursor: pointer;
		height: 235px;
	}
	
	#library img {
		cursor: pointer;
	}
	
	#library {
		height: 500px;
		overflow: auto;
	}
</style>
<link rel="stylesheet" href="/constructor/css/user.css">
<link rel="stylesheet" href="/constructor/css/jquery-ui.css">
    <link rel="stylesheet" href="/constructor/css/colorpicker.css">