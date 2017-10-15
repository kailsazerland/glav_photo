<ol class="breadcrumb">
  <li><a href="/admin/">Начало</a></li>
  <li><a href="/admin/lots/">Лоты</a></li>
</ol>
<h2><i class="glyphicon glyphicon-shopping-cart"></i> Лот (добавление/редатирование)</h2>
<div class="row">
	<div class="col-md-10 col-md-offset-1 well">
		<?=$this->Form->create($lot, ['class' => 'form-horizontal', 'type' => 'file']);?>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Изображение</label>
					<div class="col-sm-2">
						<?if(!empty($lot->img)):?>
							<img src="/<?=$lot->img?>" width="200"><br>
						<?endif;?>
						<?=$this->Form->file('image', ["autocomplete" => 'off'])?>
					</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Название</label>
					<div class="col-sm-10">
						<?=$this->Form->text('title', ['class' => 'form-control', "autocomplete" => 'off'])?>
					</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Подзаголовок</label>
					<div class="col-sm-10">
						<?=$this->Form->text('subtitle', ['class' => 'form-control', "autocomplete" => 'off'])?>
					</div>
			</div>
			
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Описание</label>
					<div class="col-sm-10">
						<?=$this->Form->textarea('description', ['class' => 'form-control', "autocomplete" => 'off', 'id' => 'editor'])?>
					</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Стартовая цена</label>
					<div class="col-sm-2">
						<?=$this->Form->text('price_start', ['class' => 'form-control', "autocomplete" => 'off'])?>
					</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Начало</label>
					<div class="col-sm-10">
						<?=$this->Form->datetime('start', ['class' => 'form-control', "autocomplete" => 'off'])?>
					</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Таймер (сек)</label>
					<div class="col-sm-2">
						<?=$this->Form->select('timer', [10 => 10, 20 => 20, 30 => 30], ['class' => 'form-control', "autocomplete" => 'off'])?>
					</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Стартовая цена</label>
					<div class="col-sm-2">
						<?=$this->Form->text('price_start', ['class' => 'form-control', "autocomplete" => 'off'])?>
					</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Использовать ботов</label>
				<div class="col-sm-10">
					<?=$this->Form->checkbox('by_bots', ['class' => '', "autocomplete" => 'off'])?>
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">ID ботов</label>
				<div class="col-sm-10">
					<?=$this->Form->text('bots_id', ['class' => 'form-control', "autocomplete" => 'off'])?>
					<p class="help">(через запятую, без пробелов)</p>
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Предельная сумма для ботов</label>
					<div class="col-sm-2">
						<?=$this->Form->text('price_till', ['class' => 'form-control', "autocomplete" => 'off'])?>
					</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Можно "купить сейчас"</label>
				<div class="col-sm-10">
					<?=$this->Form->checkbox('can_buynow', ['class' => '', "autocomplete" => 'off'])?>
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Сумма для "купить сейчас"</label>
					<div class="col-sm-2">
						<?=$this->Form->text('price_buynow', ['class' => 'form-control', "autocomplete" => 'off'])?>
					</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Оплачен</label>
				<div class="col-sm-10">
					<?=$this->Form->checkbox('is_paid', ['class' => '', "autocomplete" => 'off'])?>
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">ФИО</label>
				<div class="col-sm-10">
					<?=$this->Form->text('name', ['class' => 'form-control', "autocomplete" => 'off'])?>
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Индекс</label>
				<div class="col-sm-4">
					<?=$this->Form->text('zip', ['class' => 'form-control', "autocomplete" => 'off'])?>
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Адрес</label>
				<div class="col-sm-10">
					<?=$this->Form->text('address', ['class' => 'form-control', "autocomplete" => 'off'])?>
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Статус заказа</label>
				<div class="col-sm-10">
					<?=$this->Form->text('status', ['class' => 'form-control', "autocomplete" => 'off'])?>
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Завершен</label>
				<div class="col-sm-10">
					<?=$this->Form->checkbox('is_finished', ['class' => '', "autocomplete" => 'off'])?>
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Выключен</label>
				<div class="col-sm-10">
					<?=$this->Form->checkbox('is_hidden', ['class' => '', "autocomplete" => 'off'])?>
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
