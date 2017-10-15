<div class="container">
	<div class="col-md-6 col-md-offset-3 well">
		<h2>Восстановить доступ</h2>
		<?=$this->Flash->render();?>
		<?if (!isset($done) || !$done):?>
			<?=$this->Form->create('', ['class' => 'form-horizontal']);?>
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-3 control-label">Ваш e-mail:</label>
					<div class="col-sm-9">
						<?=$this->Form->email('mail', ['type' => 'text', 'class' => 'form-control'])?>
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-sm-offset-3 col-sm-9">
						<button type="submit" class="btn btn-success">Выслать новый пароль</button>
					</div>
				</div>
			<?=$this->Form->end();?>
		<?endif;?>
	</div>
</div>