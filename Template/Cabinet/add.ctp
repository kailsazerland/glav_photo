<h1 class="page-title">Новое событие</h1>
<div class="separator-2"></div>
<?=$this->Flash->render();?>
<?if (isset($done) && $done):?>
	
<?else:?>
	<?=$this->Form->create($event, ['class' => 'form-horizontal', 'url' => $this->request->here()])?>
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-3 control-label">Название <span class="text-danger small">*</span></label>
			<div class="col-sm-9">
				<?=$this->Form->text('title', ['class' => 'form-control', 'placeholder' => 'Название вашего события'])?>
				<?if ($this->Form->hasError('title')):?>
					<p class="text-danger"><?=$this->Form->error('title')?></p>
				<?endif;?>
			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-3 control-label">Описание</label>
			<div class="col-sm-9">
				<?=$this->Form->textarea('description', ['class' => 'form-control', 'placeholder' => 'Краткое описание вашего события'])?>
			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-3 control-label">Дата события <span class="text-danger small">*</span></label>
			<div class="col-sm-4 has-feedback">
				<?=$this->Form->text('date', ['class' => 'form-control', 'placeholder' => 'Выберите дату', 'readonly', 'id' => 'eventdate', 'data-date-format' => 'dd MM yyyy'])?>
				<i class="fa fa-calendar form-control-feedback"></i>
				<?if ($this->Form->hasError('date')):?>
					<p class="text-danger"><?=$this->Form->error('date')?></p>
				<?endif;?>
			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-3 control-label">Время события <span class="text-danger small">*</span></label>
			<div class="col-sm-4  has-feedback">
				<?=$this->Form->text('time', ['class' => 'form-control', 'placeholder' => 'Выберите время', 'readonly', 'id' => 'eventtime', 'data-date-format' => 'hh:ii'])?>
				<i class="fa fa-clock-o form-control-feedback"></i>
				<?if ($this->Form->hasError('time')):?>
					<p class="text-danger"><?=$this->Form->error('time')?></p>
				<?endif;?>
			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-3 control-label">Дата и время напоминания <span class="text-danger small">*</span></label>
			<div class="col-sm-5 has-feedback">
				<?=$this->Form->text('remind_at', ['class' => 'form-control', 'placeholder' => 'Выберите дату и время', 'id' => 'remindtime', 'readonly', 'data-date-format' => 'hh:ii dd MM yyyy'])?>
				<i class="fa fa-calendar-check-o form-control-feedback"></i>
				<?if ($this->Form->hasError('remind_at')):?>
					<p class="text-danger"><?=$this->Form->error('remind_at')?></p>
				<?endif;?>
			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-3 control-label">Способ уведомления <span class="text-danger small">*</span></label>
			<div class="col-sm-9">
				<?=$this->Form->checkbox('by_mail', ['class' => ''])?>
				<?=$this->Form->label('by_mail', 'E-mail')?><br>
				<?=$this->Form->checkbox('by_sms', ['class' => ''])?>
				<?=$this->Form->label('by_sms', 'SMS')?><br>
				<?=$this->Form->checkbox('by_call', ['class' => ''])?>
				<?=$this->Form->label('by_call', 'Звонок')?>
			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-3 control-label">Субьект напоминания <span class="text-danger small">*</span></label>
			<div class="col-sm-9">
				<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
				  <div class="panel panel-default">
				    <div class="panel-heading" role="tab" id="headingOne">
				      <h4 class="panel-title">
				        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne" class=""><small>
				          Выбрать из групп (<b><?=$groups->count()?></b>)
				        </a>
				      </h4>
				    </div>
				    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
				      <div class="panel-body">
				      	<div class="row">
				      		<div class="col-md-6">
				      		<?foreach ($groups as $i => $group):?>
				      			<?=$this->Form->checkbox("groups[{$group->id}]", ['value' => 1, "id" => "group_{$group->id}"])?>
				      			<?=$this->Form->label("group_{$group->id}", $group->name)?><br>
				      			<?if (round($groups->count() / 2) == ($i + 1) ):?>
				      				</div><div class="col-md-6">
				      			<?endif;?>
				      		<?endforeach;?>
				      		</div>
				      	</div>
				      </div>
				    </div>
				  </div>
				  <div class="panel panel-default">
				    <div class="panel-heading" role="tab" id="headingTwo">
				      <h4 class="panel-title">
				        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"><small>
				          Выбрать из контактов (<b><?=$contacts->count()?></b>)
				        </a>
				      </h4>
				    </div>
				    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
				      <div class="panel-body">
				      	<div class="col-md-6">
					        <?foreach ($contacts as $i => $contact):?>
				      			<?=$this->Form->checkbox("contacts[{$contact->id}]", ['value' => 1, "id" => "contact-{$contact->id}"])?>
				      			<?=$this->Form->label("contact_{$contact->id}", $contact->name)?><br>
				      			<?if (round($contacts->count() / 2) == ($i + 1) ):?>
				      				</div><div class="col-md-6">
				      			<?endif;?>
				      		<?endforeach;?>
				      	</div>
				      </div>
				    </div>
				  </div>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-3 control-label">Приоритет <span class="text-danger small">*</span></label>
			<div class="col-sm-9">
				<div class="btn-group" data-toggle="buttons">
				  <label class="btn btn-sm btn-default <?if ($event->priority && $event->priority == '0'):?>active<?endif?>">
				    <input type="radio" value="0" name="priority" id="option1" autocomplete="off" <?if ($event->priority && $event->priority == '0'):?>checked<?endif?>> низкий
				  </label>
				  <label class="btn btn-sm btn-success <?if ($event->priority && $event->priority == '1'):?>active<?endif?>">
				    <input type="radio" value="1" name="priority" id="option3" autocomplete="off" <?if ($event->priority && $event->priority == '1'):?>checked<?endif?>> обычный
				  </label>
				  <label class="btn btn-sm btn-danger <?if ($event->priority && $event->priority == '2'):?>active<?endif?>">
				    <input type="radio" value="2" name="priority" id="option3" autocomplete="off" <?if ($event->priority && $event->priority == '2'):?>checked<?endif?>> высокий
				  </label>
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-3 col-sm-9">
				<button type="submit" class="btn btn-default">Сохранить</button>
			</div>
		</div>
	<?=$this->Form->end();?>
<?endif;?>
<script type="text/javascript">
	
</script>