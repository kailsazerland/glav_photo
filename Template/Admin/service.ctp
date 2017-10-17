<ol class="breadcrumb">
  <li><a href="/admin/">Начало</a></li>
  <li><a href="/admin/services/">Услуги</a></li>
</ol>
<h2><i class="glyphicon glyphicon-list"></i> Услуга (добавление/редатирование)</h2>
<div class="row">
	<div class="col-md-10 col-md-offset-1 well">
		<?=$this->Form->create($service, ['class' => 'form-horizontal', 'type' => 'file']);?>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Название</label>
					<div class="col-sm-10">
						<?=$this->Form->text('title', ['class' => 'form-control', "autocomplete" => 'off'])?>
					</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Текст ссылки</label>
					<div class="col-sm-6">
						<?=$this->Form->text('link', ['class' => 'form-control', "autocomplete" => 'off'])?>
					</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Ссылка (лат.символы)</label>
					<div class="col-sm-6">
						<?=$this->Form->text('alias', ['class' => 'form-control', "autocomplete" => 'off'])?>
					</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Фото для баннера (большое)</label>
					<div class="col-sm-6">
						<?=$this->Element('admin_image', ['entity' => $service, 'model' => 'Services', 'field' => 'banner'])?>
					</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Иконка (небольшое изображение)</label>
					<div class="col-sm-6">
						<?=$this->Element('admin_image', ['entity' => $service, 'model' => 'Services', 'field' => 'icon'])?>
					</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Иконка гл.меню</label>
					<div class="col-sm-6">
						<?=$this->Element('admin_image', ['entity' => $service, 'model' => 'Services', 'field' => 'icon_mainmenu'])?>
					</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Иконка гл.меню наведение</label>
					<div class="col-sm-6">
						<?=$this->Element('admin_image', ['entity' => $service, 'model' => 'Services', 'field' => 'icon_mainmenu_hover'])?>
					</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Родитель</label>
					<div class="col-sm-4">
						<?=$this->Form->select('parent_id', $parents, ['class' => 'form-control', "autocomplete" => 'off', 'empty' => '- нет -'])?>
					</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Текст на банере</label>
				<div class="col-sm-10">
					<?=$this->Form->textarea('content', ['class' => 'form-control', 'id' => '', "autocomplete" => 'off'])?>
				</div>
			</div>
			
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Содержание страницы</label>
				<div class="col-sm-10">
					<?=$this->Form->textarea('page_content', ['class' => 'form-control editor', 'id' => 'editor', "autocomplete" => 'off'])?>
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Скрыть услугу</label>
					<div class="col-sm-2">
						<?=$this->Form->checkbox('is_hidden', ['class' => 'form-control', "default" => '0'])?>
					</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Сортировка в меню</label>
					<div class="col-sm-2">
						<?=$this->Form->text('menu_order', ['class' => 'form-control', "default" => '0'])?>
					</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Выводить на главную</label>
					<div class="col-sm-2">
						<?=$this->Form->checkbox('on_mainpage', ['class' => 'form-control', "default" => '0'])?>
					</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Прев. без кнопки</label>
					<div class="col-sm-2">
						<?=$this->Form->checkbox('preview_without_button', ['class' => 'form-control', "default" => '0'])?>
					</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Отключить баннер</label>
				<div class="col-sm-2">
					<?=$this->Form->checkbox('without_banner', ['class' => 'form-control', "default" => '0'])?>
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Вывести в подвал</label>
				<div class="col-sm-2">
					<?=$this->Form->checkbox('in_footer', ['class' => 'form-control', "default" => '0'])?>
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Прев. без описания</label>
					<div class="col-sm-2">
						<?=$this->Form->checkbox('preview_without_description', ['class' => 'form-control', "default" => '0'])?>
					</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Сетка услуг (кол-во элементов в строке)</label>
					<div class="col-sm-2">
						<?=$this->Form->select('cages', [3 => 3, 4 => 4], ['class' => 'form-control', "default" => '0'])?>
					</div>
			</div>
					
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-success">Сохранить</button>
				</div>
			</div>
		<?=$this->Form->end();?>
	</div>
</div>
