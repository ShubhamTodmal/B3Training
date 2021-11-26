<div>
	<!-- only shoes if logined in-->
	<?php if(isset($_SESSION['log_in'])): ?>
	<a class="btn btn-success btn-share" href="<?php echo ROOT_PATH; ?>shares/add">Share Something</a>
		<?php endif; ?>

	<?php foreach ($viewmodel as $value) : ?>
		<div class="well">
			<h3><?php echo $value['title'];?></h3>
			<small><?php echo $value['create_date']; ?></small>
			<p><?php echo $value['body']; ?></p>
			<a class="btn btn-default" href="<?php echo $value['link'];?>" target="_blank">Visit WebSite</a><br><br>
		</div>
	<?php endforeach; ?>
</div>