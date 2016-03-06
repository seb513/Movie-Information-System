<?php
	if(isset($success)){
?>

<div class="msg msg-ok">
	<p><strong><?php echo $success; ?>></strong></p>
    <a href="#" class="close">Close</a>
</div>

<?php
	}elseif(isset($error)){
?>

<div class="msg msg-error">
	<p><strong><?php echo $error; ?></strong></p>
    <a href="#" class="close">Close</a>
</div>

<?php
	}
?>