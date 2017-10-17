<?=$this->Element('header')?>
    <div class="container" style="min-height:800px;">
		<ul class="nav nav-tabs">
			<li role="presentation" <?if ($this->request->params['action'] == 'index'):?>class="active"<?endif;?>><a href="/profile/">Личные данные</a></li>
			<li role="presentation" <?if ($this->request->params['action'] == 'lots'):?>class="active"<?endif;?>><a href="/profile/lots/">Ваши лоты</a></li>
			<li role="presentation" <?if ($this->request->params['action'] == 'password'):?>class="active"<?endif;?>><a href="/profile/password/">Смена пароля</a></li>
			<li role="presentation" <?if ($this->request->params['action'] == 'operations'):?>class="active"<?endif;?>><a href="/profile/operations/">Операции</a></li>
			<li role="presentation" <?if ($this->request->params['action'] == 'referals'):?>class="active"<?endif;?>><a href="/profile/referals/">Партнерская программа</a></li>
		</ul>
    	<div class="row">
        	<?= $this->fetch('content') ?>
        </div>
    </div>
    <?=$this->Element('footer');?>