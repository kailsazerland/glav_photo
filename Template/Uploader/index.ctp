<div class="container">
	<h1>Заказ печати фотографий</h1>
	<div class="separator-2"></div>
	<div id="source">
		<h2>Выберите источник</h2>
			<ul class="social-links large colored">
				<li class="pinterest pr-10" title="С вашего компьютера"><a target="_blank" href="#" marked="1" data-toggle="modal" data-target="#upload_pc"><i class="fa fa fa-laptop"></i></a></li>
				<li class="facebook pr-10" title="С Вконтакте"><a target="_blank" href="#" marked="1" data-toggle="modal" data-target="#upload_vk"><i class="fa fa-vk"></i></a></li>
				<li class="instagram pr-10" title="С инстаграмма"><a target="_blank" href="#" marked="1" data-toggle="modal" data-target="#upload_ig"><i class="fa fa-instagram"></i></a></li>
				<li class="facebook pr-10" title="С Facebook"><a target="_blank" href="#" marked="1" data-toggle="modal" data-target="#upload_fb"><i class="fa fa-facebook"></i></a></li>
				<li class="stumbleupon  pr-10" title="C Одноклассниковs"><a target="_blank" href="#" data-toggle="modal" data-target="#upload_ok"><i class="fa fa-odnoklassniki"></i></a></li>
				<?/*<li class="xing pr-10" title="С Яндекс.фото"><a target="_blank" href="http://www.yandex.com" marked="1"><i class="fa fa-yahoo"></i></a></li>*/?>
			</ul>
	</div>
	<form action="/uploader/order/" method="POST" style="display:none;" id="upload_final">
		<input type="hidden" name="coast">
		<div id="previews" class="well row">
			<div class="progress style-2">
				<div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%; padding-top:6px;">
					<span style="">Идёт загрузка, пожалуйста, дождитесь её завершения...</span>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="form-group">
					<?=$this->Form->select('paper', ['Глянцевая' => 'Глянцевая', 'Матовая' => 'Матовая'], ['class' => 'form-control', 'empty' => '- тип бумаги -'])?>
				</div>
				<div class="checkbox">
				  <label>
				    <input type="checkbox" value="1" name="fast" id="fast">
				    Срочный заказ (выполняется в течение дня при заказе в будни до 18.00)
				  </label>
				</div>
				<div class="checkbox">
				  <label>
				    <input type="checkbox" value="1" name="fields">
				    Печать фотографий с полями
				  </label>
				</div>
			</div>
		</div>
		<div class="text-center">
			<button type="submit" class="btn btn-default btn-lg" id="submit_order">Заказать за <span></span> <i class="glyphicon glyphicon-rub"></i></button>
		</div>
	</form>	
	<div class="col-md-3 col-sm-4 element" id="image_example" style="display:none;">
		<div class="image-box style-2 mb-20 shadow bordered light-gray-bg text-center">
			<div class="overlay-container">
				<input type="hidden" name="file[]" class="file">
				<img src="" class="center-block">
			</div>
			<div class="body">
				<div class="input-group form-group cnter">
					<div class="input-group-addon"><i class="glyphicon glyphicon-minus minus"></i></div>
					<input class="form-control count text-center pl-20" name='count[]' id="exampleInputAmount" placeholder="Кол-во" value="1" data-counter-max="100" data-counter-min="1" required pattern='[0-9]+'>
					<div class="input-group-addon"><i class="glyphicon glyphicon-plus plus"></i></div>
				</div>
				<div class="form-group">
					<?=$this->Form->select('format[]', $formats_list, ['empty' => false, 'class' => 'form-control format'])?>
				</div>
				<div class="form-group price text-center">
					<span>&mdash;</span> <li class="glyphicon glyphicon-rub"></li>
				</div>
				<a href="#" class="btn btn-danger btn-sm margin-clear right-block erase" marked="1">Удалить <i class="fa fa-times pl-10"></i></a>												
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade bs-example-modal-sm" id="upload_pc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
  	<form name="" method="post" id="preload" action="#" enctype="multipart/form-data" class="feedback-form-1">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Загрузка с компьютера</h4>
      </div>
      <div class="modal-body">
		<input type="file" multiple required id="files" name="files[]">
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success btn-animated">Загрузить<i class="fa fa-upload"></i></button>
      </div>
    </div>
    </form>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="upload_vk" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
  	<form name="" method="post" id="preload" action="#" enctype="multipart/form-data" class="feedback-form-1">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Вконтакте</h4>
      </div>
      <div class="modal-body text-center">
      	 <div id="vk_auth_link" class="vk_tab">
      	 	<a href="/" id="auth_vk">Авторизоваться через ВК</a>
      	 </div>
      	 <div id="vk_albums" class="vk_tab" style="display:none;max-height: 600px; overflow: auto;">
      	 	<h1>Ваши альбомы</h1>
      	 </div>
      	 <div id="vk_photos" class="vk_tab" style="display:none;max-height: 600px; overflow: auto;">
      	 	<h2>Ваши фотографии</h2>
      	 </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success btn-animated" id="vk_add">Добавить<i class="fa fa-upload"></i></button>
      </div>
    </div>
    </form>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="upload_ig" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
  	<form name="" method="post" id="preload" action="#" enctype="multipart/form-data" class="feedback-form-1">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Инстаграм</h4>
      </div>
      <div class="modal-body text-center">
      	 <div id="ig_auth_link" class="ig_tab">
      	 	<a href="/" id="auth_ig">Авторизоваться через Инстаграмм</a>
      	 </div>
      	 <div id="ig_albums" class="ig_tab" style="display:none;max-height: 600px; overflow: auto;">
      	 	<h1>Ваши альбомы</h1>
      	 </div>
      	 <div id="ig_photos" class="ig_tab" style="display:none;max-height: 600px; overflow: auto;">
      	 	<h2>Ваши фотографии</h2>
      	 </div>
      	 <div id="ig_more" style="display:none;" class="text-center">
      	 	<button class="btn btn-primary" data-min-id="0">Подгрузить ещё...</button>
      	 </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success btn-animated" id="ig_add">Добавить<i class="fa fa-upload"></i></button>
      </div>
    </div>
    </form>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="upload_fb" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
  	<form name="" method="post" id="preload" action="#" enctype="multipart/form-data" class="feedback-form-1">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Facebook</h4>
      </div>
      <div class="modal-body text-center">
      	 <div id="fb_auth_link" class="fb_tab">
      	 	<a href="/" id="auth_fb">Авторизоваться через Facebook</a>
      	 </div>
      	 <div id="fb_albums" class="fb_tab" style="display:none;max-height: 600px; overflow: auto;">
      	 	<h1>Ваши альбомы</h1>
      	 </div>
      	 <div id="fb_photos" class="fb_tab" style="display:none;max-height: 600px; overflow: auto;">
      	 	<h2>Ваши фотографии</h2>
      	 </div>
      	 <div id="fb_more" style="display:none;" class="text-center">
      	 	<button class="btn btn-primary" data-paging="0">Подгрузить ещё...</button>
      	 </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success btn-animated" id="fb_add">Добавить<i class="fa fa-upload"></i></button>
      </div>
    </div>
    </form>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="upload_ok" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
  	<form name="" method="post" id="preload" action="#" enctype="multipart/form-data" class="feedback-form-1">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Одноклассники</h4>
      </div>
      <div class="modal-body text-center">
      	 <div id="ok_auth_link" class="ok_tab">
      	 	<a href="/" id="auth_ok">Авторизоваться через Одноклассники</a>
      	 </div>
      	 <div id="ok_albums" class="ok_tab" style="display:none;max-height: 600px; overflow: auto;">
      	 	<h1>Ваши альбомы</h1>
      	 </div>
      	 <div id="ok_photos" class="ok_tab" style="display:none;max-height: 600px; overflow: auto;">
      	 	<h2>Ваши фотографии</h2>
      	 </div>
      	 <div id="ok_more" style="display:none;" class="text-center">
      	 	<?/*<button class="btn btn-primary" data-paging="0">Подгрузить ещё...</button>*/?>
      	 </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success btn-animated" id="ok_add">Добавить<i class="fa fa-upload"></i></button>
      </div>
    </div>
    </form>
  </div>
</div>


<script type="text/javascript" src="/js/uploader.js?r=<?=rand(0,1000000)?>">
</script>

<script type="text/javascript">
	prices = new Array();
	<?foreach ($formats as $format):?>
		prices[<?=$format->id?>] = <?=$format->coast?>;
	<?endforeach;?>
</script>
<style>
	#previews .overlay-container {
		height: 150px;
	}
	
	#previews .overlay-container img {
		max-height: 150px;
	}
	
	.plus, .minus {
		cursor: pointer;
	}
</style>