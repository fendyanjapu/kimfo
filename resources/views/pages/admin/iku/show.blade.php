<?php 
	$doc     = $query->dokumen;
	$x        = explode('.', $doc);
	$ekstensi = strtolower(end($x));
	$host     = env('APP_URL').'/upload/';
	$src      = 'https://view.officeapps.live.com/op/embed.aspx?src='.$host.$doc;
	?>
<head>
	<title><?php echo $doc ?></title>
	<link rel="icon" href="<?php echo asset('assets/assets2/img/kimfo-hitam.jpeg') ?>" type="image/ico">
	<style>
		.responsive-container {
			position: relative;
			overflow: hidden;
			padding-top: 56.25%;
		}

		.responsive-iframe {
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			border: 0;
		}
	</style>
</head>
<div class="responsive-container">
	<?php if ($ekstensi == 'pdf'): ?>
		<embed src="<?php echo $host.$doc ?>" class="responsive-iframe"></embed>
	<?php else: ?>
		<iframe src='<?php echo $src ?>' class="responsive-iframe">
	<?php endif ?>			
</div>