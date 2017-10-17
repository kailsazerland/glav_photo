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
		<div id="main-container">
          	<div id="clothing-designer" class="fpd-container fpd-shadow-2 fpd-topbar fpd-tabs fpd-tabs-side fpd-top-actions-centered fpd-bottom-actions-centered fpd-views-inside-left">
          		<?foreach ($templates as $template):?>
					<div class="fpd-product" title="<?=$template->title?>" data-thumbnail="/<?=$template->preview?>">
						<img src="/<?=$template->layer_up?>" title="Up"  data-parameters='{"zChangeable": false, "draggable": false, "removable": false, "topped": 1, "autoCenter": true, "colors": false, "price": <?=$good->price?>}' />
						<img src="/<?=$template->layer_down?>" title="Base"  data-parameters='{"zChangeable": false, "draggable": false, "removable": false, "autoCenter": true, "colors": false, "price": <?=$good->price?>}' />
					</div>
				<?endforeach;?>
				
				<?/*
          		<div class="fpd-product" title="Shirt Front" data-thumbnail="/const/example/images/yellow_shirt/front/preview.png">
	    			<img src="/const/example/images/yellow_shirt/front/base.png" title="Base" data-parameters='{"left": 325, "top": 329, "colors": "#d59211", "price": 20, "colorLinkGroup": "Base"}' />
			  		<img src="/const/example/images/yellow_shirt/front/shadows.png" title="Shadow" data-parameters='{"left": 325, "top": 329}' />
			  		<img src="/const/example/images/yellow_shirt/front/body.png" title="Hightlights" data-parameters='{"left": 322, "top": 137}' />
			  		<span title="Any Text" data-parameters='{"boundingBox": "Base", "left": 326, "top": 232, "zChangeable": true, "removable": true, "draggable": true, "rotatable": true, "resizable": true, "colors": "#000000"}' >Default Text</span>
			  		<div class="fpd-product" title="Shirt Back" data-thumbnail="/const/example/images/yellow_shirt/back/preview.png">
		    			<img src="/const/example/images/yellow_shirt/back/base.png" title="Base" data-parameters='{"left": 317, "top": 329, "colorLinkGroup": "Base", "price": 20}' />
		    			<img src="/const/example/images/yellow_shirt/back/body.png" title="Hightlights" data-parameters='{"left": 333, "top": 119}' />
				  		<img src="/const/example/images/yellow_shirt/back/shadows.png" title="Shadow" data-parameters='{"left": 318, "top": 329}' />
					</div>
				</div>
				
          		<div class="fpd-product" title="Sweater" data-thumbnail="/const/example/images/sweater/preview.png">
	    			<img src="/const/example/images/sweater/basic.png" title="Base" data-parameters='{"draggable": false, "left": 332, "top": 311, "colors": "#D5D5D5,#990000,#cccccc", "price": 20}' />
			  		<img src="/const/example/images/sweater/highlights.png" title="Hightlights" data-parameters='{"draggable": false, "left": 332, "top": 311}' />
			  		<img src="/const/example/images/sweater/shadow.png" title="Shadow" data-parameters='{"draggable": false, "left": 332, "top": 309}' />
				</div>
				
				<div class="fpd-product" title="Scoop Tee" data-thumbnail="/const/example/images/scoop_tee/preview.png">
	    			<img src="/const/example/images/scoop_tee/basic.png" title="Base" data-parameters='{"left": 314, "top": 323, "colors": "#98937f, #000000, #ffffff", "price": 15}' />
			  		<img src="/const/example/images/scoop_tee/highlights.png" title="Hightlights" data-parameters='{"left":308, "top": 316}' />
			  		<img src="/const/example/images/scoop_tee/shadows.png" title="Shadow" data-parameters='{"left": 308, "top": 316}' />
			  		<img src="/const/example/images/scoop_tee/label.png" title="Label" data-parameters='{"left": 314, "top": 140}' />
				</div>
				<div class="fpd-product" title="Hoodie" data-thumbnail="/const/example/images/hoodie/preview.png">
	    			<img src="/const/example/images/hoodie/basic.png" title="Base" data-parameters='{"left": 313, "top": 322, "colors": "#850b0b", "price": 40}' />
			  		<img src="/const/example/images/hoodie/highlights.png" title="Hightlights" data-parameters='{"left": 311, "top": 318}' />
			  		<img src="/const/example/images/hoodie/shadows.png" title="Shadow" data-parameters='{"left": 311, "top": 321}' />
			  		<img src="/const/example/images/hoodie/zip.png" title="Zip" data-parameters='{"left": 303, "top": 216}' />
				</div>
				<div class="fpd-product" title="Shirt" data-thumbnail="/const/example/images/shirt/preview.png">
	    			<img src="/const/example/images/shirt/basic.png" title="Base" data-parameters='{"left": 327, "top": 313, "colors": "#6ebed5", "price": 10}' />
	    			<img src="/const/example/images/shirt/collar_arms.png" title="Collars & Arms" data-parameters='{"left": 326, "top": 217, "colors": "#000000"}' />
			  		<img src="/const/example/images/shirt/highlights.png" title="Hightlights" data-parameters='{"left": 330, "top": 313}' />
			  		<img src="/const/example/images/shirt/shadow.png" title="Shadow" data-parameters='{"left": 327, "top": 312}' />
			  		<span title="Any Text" data-parameters='{"boundingBox": "Base", "removable": true, "draggable": true, "rotatable": true, "resizable": true, "colors": "#000000"}' >Default Text</span>
				</div>
				<div class="fpd-product" title="Short" data-thumbnail="/const/example/images/shorts/preview.png">
	    			<img src="/const/example/images/shorts/basic.png" title="Base" data-parameters='{"left": 317, "top": 332, "colors": "#81b5eb", "price": 15}' />
			  		<img src="/const/example/images/shorts/highlights.png" title="Hightlights" data-parameters='{"left": 318, "top": 331}' />
			  		<img src="/const/example/images/shorts/pullstrings.png" title="Pullstrings" data-parameters='{"left": 307, "top": 195, "colors": "#ffffff"}' />
			  		<img src="/const/example/images/shorts/midtones.png" title="Midtones" data-parameters='{"left": 317, "top": 332}' />
			  		<img src="/const/example/images/shorts/shadows.png" title="Shadow" data-parameters='{"left": 320, "top": 331}' />
				</div>
				<div class="fpd-product" title="Basecap" data-thumbnail="/const/example/images/cap/preview.png">
	    			<img src="/const/example/images/cap/basic.png" title="Base" data-parameters='{"left": 318, "top": 311, "colors": "#ededed", "price": 5}' />
			  		<img src="/const/example/images/cap/highlights.png" title="Hightlights" data-parameters='{"left": 309, "top": 300}' />
			  		<img src="/const/example/images/cap/shadows.png" title="Shadows" data-parameters='{"left": 306, "top": 299}' />
				</div>
		  		<div class="fpd-design">
		  			<div class="fpd-category" title="Swirls">
			  			<img src="/const/example/images/designs/swirl.png" title="Swirl" data-parameters='{"zChangeable": true, "left": 215, "top": 200, "colors": "#000000", "removable": true, "draggable": true, "rotatable": true, "resizable": true, "price": 10, "boundingBox": "Base", "autoCenter": true}' />
				  		<img src="/const/example/images/designs/swirl2.png" title="Swirl 2" data-parameters='{"left": 215, "top": 200, "colors": "#000000", "removable": true, "draggable": true, "rotatable": true, "resizable": true, "price": 5, "boundingBox": "Base", "autoCenter": true}' />
				  		<img src="/const/example/images/designs/swirl3.png" title="Swirl 3" data-parameters='{"left": 215, "top": 200, "colors": "#000000", "removable": true, "draggable": true, "rotatable": true, "resizable": true, "autoCenter": true}' />
				  		<img src="/const/example/images/designs/heart_blur.png" title="Heart Blur" data-parameters='{"left": 215, "top": 200, "colors": "#bf0200", "removable": true, "draggable": true, "rotatable": true, "resizable": true, "price": 5, "boundingBox": "Base", "autoCenter": true}' />
				  		<img src="/const/example/images/designs/converse.png" title="Converse" data-parameters='{"left": 215, "top": 200, "colors": "#000000", "removable": true, "draggable": true, "rotatable": true, "resizable": true, "autoCenter": true}' />
				  		<img src="/const/example/images/designs/crown.png" title="Crown" data-parameters='{"left": 215, "top": 200, "colors": "#000000", "removable": true, "draggable": true, "rotatable": true, "resizable": true, "autoCenter": true}' />
				  		<img src="/const/example/images/designs/men_women.png" title="Men hits Women" data-parameters='{"left": 215, "top": 200, "colors": "#000000", "removable": true, "draggable": true, "rotatable": true, "resizable": true, "boundingBox": "Base", "autoCenter": true}' />
		  			</div>
		  			<div class="fpd-category" title="Retro">
			  			<img src="/const/example/images/designs/retro_1.png" title="Retro One" data-parameters='{"left": 210, "top": 200, "colors": "#000000", "removable": true, "draggable": true, "rotatable": true, "resizable": true, "scale": 0.25, "price": 7, "boundingBox": "Base", "autoCenter": true}' />
				  		<img src="/const/example/images/designs/retro_2.png" title="Retro Two" data-parameters='{"left": 193, "top": 180, "colors": "#ffffff", "removable": true, "draggable": true, "rotatable": true, "resizable": true, "scale": 0.46, "boundingBox": "Base", "autoCenter": true}' />
				  		<img src="/const/example/images/designs/retro_3.png" title="Retro Three" data-parameters='{"left": 240, "top": 200, "colors": "#000000", "removable": true, "draggable": true, "rotatable": true, "resizable": true, "scale": 0.25, "price": 8, "boundingBox": "Base", "autoCenter": true}' />
				  		<img src="/const/example/images/designs/heart_circle.png" title="Heart Circle" data-parameters='{"left": 240, "top": 200, "colors": "#007D41", "removable": true, "draggable": true, "rotatable": true, "resizable": true, "scale": 0.4, "boundingBox": "Base", "autoCenter": true}' />
				  		<img src="/const/example/images/designs/swirl.png" title="Swirl" data-parameters='{"left": 215, "top": 200, "colors": "#000000", "removable": true, "draggable": true, "rotatable": true, "resizable": true, "price": 10, "boundingBox": "Base", "autoCenter": true}' />
				  		<img src="/const/example/images/designs/swirl2.png" title="Swirl 2" data-parameters='{"left": 215, "top": 200, "colors": "#000000", "removable": true, "draggable": true, "rotatable": true, "resizable": true, "price": 5, "boundingBox": "Base", "autoCenter": true}' />
				  		<img src="/const/example/images/designs/swirl3.png" title="Swirl 3" data-parameters='{"left": 215, "top": 200, "colors": "#000000", "removable": true, "draggable": true, "rotatable": true, "resizable": true}' />
				  	</div>
		  		</div>
		  		*/?>
				<div class="fpd-design">
					<?$lib_dir = 'img/libs/';
						$dir = opendir($lib_dir);
					?>
					<?while ($dir_name = readdir($dir)):?>
						<?if (is_dir($lib_dir . $dir_name) && $dir_name != '.' && $dir_name != '..'):?>
							<div class="fpd-category" title="<?=$dir_name?>">
								<?$subdir = $lib_dir . $dir_name;
								$sdir = opendir($subdir);?>
								<?while ($file = readdir($sdir)):?>
									<?if (is_file($subdir . '/' . $file)):?>
										<img src="/<?=$subdir?>/<?=$file?>" title="Пример" data-parameters='{"resizeToW":1040, "zChangeable": true, "removable": true, "draggable": true, "rotatable": true, "resizable": true, "autoCenter": true}' />
									<?endif;?>
								<?endwhile;?>
							</div>
						<?endif;?>
					<?endwhile;?>
		  		</div>
		  	</div>
		  	<br />
			<?/*
		  	<div class="fpd-clearfix" style="margin-top: 30px;">
			  	<div class="api-buttons fpd-container fpd-left">
				  	<a href="#" id="print-button" class="fpd-btn">Print</a>
				  	<a href="#" id="image-button" class="fpd-btn">Create Image</a>
				  	<a href="#" id="checkout-button" class="fpd-btn">Checkout</a>
				  	<a href="#" id="recreation-button" class="fpd-btn">Recreate product</a>
			  	</div>
			  	<div class="fpd-right">
				  	<span class="price badge badge-inverse"><span id="thsirt-price"></span> <i class="fa fa-rub"></i></span>
			  	</div>
		  	</div>
		  	<p class="fpd-container">
			  	Only working on a webserver:<br />
			  	<span class="fpd-btn" id="save-image-php">Save image with php</span>
			  	<span class="fpd-btn" id="send-image-mail-php">Send image to mail</span>
		  	</p>
		  	*/?>
    	</div>
    	<div class="row" style="padding: 0 18px;">
    		<?=$good->constructor_description?>
    	</div>
    	<div class="row text-center">
    		<button class="btn btn-default text-center" id="order_send">Оформить заказ!</button>
    	</div>
	<?else:?>
		<i>Конструктор товара не доступен! </i>
	<?endif;?>
</div>
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="order_form">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<form method="POST" action="/services/order_send/" class='form-horizontal'>
			<input type="hidden" value="" id="img_base" name="img">
			<div id="img_sources">
			
			</div>
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
					<div class="col-md-6">
							<input type="hidden" name="good_id" value="<?=$good->id?>" autocomplete="off" class="article_id">
							<h4>Данные заказа:</h4>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-4 control-label">Имя*</label>
								<div class="col-sm-8">
								 	<?=$this->Form->text('name', ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Ваше имя'])?>
								 	<?=$this->Form->error('name');?>
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-4 control-label">E-mail*</label>
								<div class="col-sm-8">
									<?=$this->Form->email('mail', ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Ваш адрес электронной почты'])?>
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-4 control-label">Телефон*</label>
								<div class="col-sm-8">
									<?=$this->Form->text('phone', ['class' => 'form-control', 'pattern' => '\+7[0-9]{10}', 'required' => 'required', 'placeholder' => 'В формате +7хххххххххх'])?>
								</div>
							</div>
							<?if (@$additional_form):?>
								<div class="separator"></div>
									<h4><?=$additional_form->title?></h4>
									<?=$this->Form->hidden('additional_form_id', ['value' => $additional_form->id])?>
									<?=$this->cell('Form', [$additional_form->id])?>
								<div class="separator"></div>
							<?endif;?>
							
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-4 control-label">Доставка*</label>
								<div class="col-sm-8">
								 	<select name="shipping" class="form-control shipping" required>
								 		<?foreach ($shipping as $ship):?>
								 			 <option value="<?=$ship->title?>" data-price="<?=$ship->price?>"><?=$ship->title?>
								 			 (<?if ($ship->price == 0):?>бесплатно<?else:?>+<?=$this->Number->currency($ship->price, 'RUB')?><?endif;?>)</option>
								 		<?endforeach;?>
								 	</select>
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-4 control-label">Оплата*</label>
								<div class="col-sm-8">
								 	<?=$this->Form->select('payment', array_combine($payments, $payments), ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Ваше имя'])?>
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-4 control-label">Итого</label>
								<div class="col-sm-8">
									<?=$this->Form->hidden('coast', ['value' => $good->price, 'class' => 'final_coast'])?>
								 	<b id="coast_final" data-coast="<?=$good->price?>"><?=$this->Number->currency($good->price, 'RUB')?><br></b>
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-4 control-label">Комментарий к заказу</label>
								<div class="col-sm-8">
								 	<?=$this->Form->textarea('ship',['class' => 'form-control', 'placeholder' => ''])?>
								</div>
							</div>
							<?if ($configs['captcha_question'] && $configs['captcha_answer']):?>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-4 control-label">
										<?=$configs['captcha_question']?>
									</label>
									<div class="col-sm-4">
									 	<?=$this->Form->text('captcha',['class' => 'form-control', 'required', 'pattern' => "{$configs['captcha_answer']}"])?>
									</div>
								</div>
							<?endif;?>
					</div>
				</div>
			</div>
		  <div class="modal-footer">
		  	<span id="upload_result" style="display:none;">
		  		Дождитесь конца загрузки...
		  	</span>
		    <button type="button" data-dismiss="modal" class="btn btn-warning" >Назад</button>
		    <button type="submit"  style="margin-top: 4px;" class="btn btn-default" id="send_order">Отправить</button>
		  </div>
		  </form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<link rel="stylesheet" type="text/css" href="/const/source/css/FancyProductDesigner-all.min.css" />

<!-- Include js files -->
<script src="/const/example/js/jquery-ui.min.js" type="text/javascript"></script>

<!-- HTML5 canvas library - required -->
<script src="/const/source/js/fabric.min.js" type="text/javascript"></script>
<!-- The plugin itself - required -->
<script src="/const/source/js/FancyProductDesigner-all.min.js" type="text/javascript"></script>

<script type="text/javascript">
    jQuery(document).ready(function(){

    	 $yourDesigner = $('#clothing-designer'),
    		pluginOpts = {
	    		stageWidth: 1200,
	    		editorMode: false,
	    		fonts: [
			    	{name: 'Helvetica'},
			    	{name: 'Times New Roman'},
			    	{name: 'Pacifico', url: 'Enter_URL_To_Pacifico'},
			    	{name: 'Arial'},
		    		{name: 'Lobster', url: 'google'}
		    	],
	    		customTextParameters: {
		    		colors: true,
		    		removable: true,
		    		resizable: true,
		    		draggable: true,
		    		rotatable: true,
		    		autoCenter: true,
		    		boundingBox: "Base",
		    		zChangeable: true
		    	},
	    		customImageParameters: {
		    		draggable: true,
		    		removable: true,
		    		resizable: true,
		    		rotatable: true,
		    		colors: '#000',
					autoCenter: true,
		    		maxW: 6000, maxH: 6000,
		    		resizeToH:300,
					resizeToW:400,
					zChangeable: true,
					uniScalingUnlockable: true
		    	},
		    	actions:  {
					'top': [],
					'right': ['magnify-glass', 'zoom', 'reset-product', 'qr-code', 'ruler','preview-lightbox'],
					'bottom': [],
					'left': ['undo','redo', 'manage-layers', 'save','load','download','print', 'snap' ]
				},
				langJSON: '/const/source/lang/default.json',
				templatesDirectory: '/const/source/html/'
    		},

    	yourDesigner = new FancyProductDesigner($yourDesigner, pluginOpts);

    	//print button
		$('#print-button').click(function(){
			yourDesigner.print();
			return false;
		});

		//create an image
		$('#image-button').click(function(){
			var image = yourDesigner.createImage();
			return false;
		});

		//checkout button with getProduct()
		$('#checkout-button').click(function(){
			var product = yourDesigner.getProduct();
			console.log(product);
			return false;
		});

		//event handler when the price is changing
		$yourDesigner.on('priceChange', function(evt, price, currentPrice) {
			$('#thsirt-price').text(currentPrice);
		});

		//save image on webserver
		$('#save-image-php').click(function() {

			yourDesigner.getProductDataURL(function(dataURL) {
				$.post( "php/save_image.php", { base64_image: dataURL} );
			});

		});
		
		$("#order_send").click(function(){
			$('#order_form').modal('show');
			yourDesigner.getProductDataURL(function(dataURL) {
				$('#canvas').html('<img width="500">');
				$('#canvas img').attr('src', dataURL);
				$('#img_base').val(dataURL);
				//все картинки
				$('#img_sources').html();
				var product = yourDesigner.getProduct();
				for (i in product[0]['elements']){
					var el = product[0]['elements'][i];
					if (el.type == 'image'){
						$('#img_sources').append('<input type=hidden name="img_source[]" value="' + el.source + '">');
					}
				}
			});
		});

		//send image via mail
		$('#send-image-mail-php').click(function() {

			yourDesigner.getProductDataURL(function(dataURL) {
				$.post( "php/send_image_via_mail.php", { base64_image: dataURL} );
			});

		});

    });
</script>