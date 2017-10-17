<h1 class="page-title">Смена пароль</h1>
<div class="separator-2"></div>
<?=$this->Flash->render();?>
<?=$this->Form->create($password)?>
    <div class="row control-group">
        <div class="form-group col-xs-12 floating-label-form-group controls">
            <label>Текущий пароль</label>
            <?=$this->Form->password('old_password', ['placeholder' => "Текущий пароль", 'class' => 'form-control', 'required' => 'required', 'autocomplete' => 'off', 'value' => ''])?>
            <?if ($this->Form->hasError('old_password')):?>
            	<?=$this->Form->error('old_password')?>
            <?endif;?>
        </div>
    </div>
    <div class="row control-group">
        <div class="form-group col-xs-12 floating-label-form-group controls">
            <label>Новый пароль</label>
            <?=$this->Form->password('new_password', ['placeholder' => "Новый пароль", 'class' => 'form-control', 'required' => 'required', 'autocomplete' => 'off', 'value' => ''])?>
            <?if ($this->Form->hasError('new_password')):?>
            	<p class="help-block text-danger"><?=$this->Form->error('new_password')?></p>
            <?endif;?>
        </div>
    </div>
    <div class="row control-group">
        <div class="form-group col-xs-12 floating-label-form-group controls">
            <label>Повторение пароля</label>
            <?=$this->Form->password('new_password_repeat', ['placeholder' => "Новый пароль ещё разок", 'class' => 'form-control', 'required' => 'required', 'value' => ''])?>
            <?if ($this->Form->hasError('new_password_repeat')):?>
            	<p class="help-block text-danger"><?=$this->Form->error('new_password_repeat')?></p>
            <?endif;?>
        </div>
    </div>
    <br>
    <div id="success"></div>
    <div class="row">
        <div class="form-group col-xs-12">
            <button type="submit" class="btn btn-success btn-lg">Сохранить</button>
        </div>
    </div>
<?=$this->Form->end();?>
