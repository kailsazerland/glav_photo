<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="alert  alert-icon alert-danger" role="alert">
	<i class="fa fa-times"></i>
	<?=$message?>
</div>