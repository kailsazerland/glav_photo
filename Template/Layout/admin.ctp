<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Admin
    </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/summernote.css">
    <link rel="stylesheet" href="/css/admin.css">
    <script src="https://code.jquery.com/jquery-2.2.3.min.js" integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo="  crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script src="/js/summernote.js"></script>
    <script src="/lang/summernote-ru-RU.js"></script>
    <?= $this->Html->meta('icon') ?>
	<?/*<script src="/js/nicEdit.js"></script>*/?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
	<?if ($auth):?>
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<ul class="nav navbar-nav">
					<?
					$submenu = false;
					if (key_exists($this->request->here, $menu)){
						$submenu = $this->request->here;
					} else {
						foreach ($menu as $key => $element){
							if (isset($element['children']) && key_exists($this->request->here, $element['children'])){
								$submenu = $key;
							}
						}
					}?>
					<li class=""><a href="/admin/"><i class="glyphicon glyphicon-home"></i></a></li>
					<?foreach ($menu as $link => $params):?>
						<li class="<?if ($link == $submenu):?>active<?endif;?>"><a href="<?=$link?>"><i class="glyphicon glyphicon-<?=$params['icon']?>"></i> <?=$params['title']?></a></li>
					<?endforeach;?>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="/admin/logout/">Выйти <i class="glyphicon glyphicon-arrow-right"></i></a></li>
				</ul>
			</div>
		</nav>
	<?endif;?>
	<div class="container">
		<?if ($submenu && isset($menu[$submenu]['children'])):?>
			<ul class="nav nav-tabs">
				<?foreach ($menu[$submenu]['children'] as $link => $title):?>
			  		<li role="presentation" <?if ($this->request->here == $link):?>class="active"<?endif;?>><a href="<?=$link?>"><?=$title?></a></li>
			  	<?endforeach;?>
			</ul>
		<?endif;?>
		<?= $this->fetch('content') ?>
	</div>
</body>
</html>
<script type="text/javascript">
$(document).ready(function(){
	$('.switcher label').click(function(){
		t = this;
		setTimeout(function(){
		    $('#' + $(t).parents('.switcher').attr('for')).find('.for').hide();
			$('#' + $(t).parents('.switcher').attr('for')).find('div[data-value=' + $(t).parents('.switcher').find('input[type=radio]:checked').val() + ']').show();
		}, 100);
		
	});
	
	$('.switcher').each(function(){
		$(this).find('input:checked').parents('label').click();
		$(this).find('input:checked').change();
	});
	
	$('.editor').summernote({
		lang: 'ru-RU',
		height: 400
	});
});
</script>
<style>
	.editor {
		height: 600px !important;
	}
</style>
