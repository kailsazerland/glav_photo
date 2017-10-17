<?=$this->Element('header')?>
<div class="main-container dark-translucent-bg" style="background-image:url('/images/background-img-6.jpg');">
	<div class="container">
		<div class="row">
			<!-- main start -->
			<!-- ================ -->
			<div class="main object-non-visible animated object-visible fadeInUpSmall" data-animation-effect="fadeInUpSmall" data-effect-delay="100">
        		<?= $this->fetch('content') ?>
      		</div>
			<!-- main end -->
		</div>
	</div>
</div>
    <?=$this->Element('footer');?>
    