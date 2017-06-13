<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="renderer" content="webkit">
    <title><?php echo $site['title'];?></title>
    <meta name="keywords" content="<?php echo $site['keywords'];?>">
    <meta name="description" content="<?php echo $site['description'];?>">
	<!--[if lt IE 9]><script>window.location.href='http://www.ifeiwu.com/ie-browser-upgrade.html';</script><![endif]-->
	<link rel="apple-touch-icon" href="<?php echo $this->url('data/apple-touch-icon.png');?>">
    <link rel="icon" type="image/png" href="<?php echo $this->url('data/favicon.png');?>">
    	
    <link rel="stylesheet" href="<?php echo $this->url('asset/css/reset.css');?>">
    <link rel="stylesheet" href="<?php echo $this->url('asset/css/swiper.css');?>">
    <link rel="stylesheet" href="<?php echo $this->url('asset/css/main.css');?>">
    <?php if ($site['skin']):?>
    <link rel="stylesheet" href="<?php echo $this->url('asset/css/skin/'.$site['skin'].'.css');?>">
    <?php endif;?>
    <?php if ($site['style']):?>
    <link rel="stylesheet" href="<?php echo $this->url('asset/css/'.$site['style'].'.css');?>">
	<?php endif;?>
		
	<script>var items = '<?php echo json_encode($items);?>';</script>
	<script src="<?php echo $this->url('asset/js/jquery.js');?>"></script>
	<script src="<?php echo $this->url('asset/js/swiper.js');?>"></script>
	<script src="<?php echo $this->url('asset/js/main.js');?>"></script>
</head>
<body>

	<?php if ($site['logo']):?>
	<a class="logo"><img alt="logo" src="<?php echo $this->url('data/'.$site['logo']);?>"></a>
	<?php endif;?>
	
	<div class="swiper-container">
		<div class="swiper-wrapper"></div>
	</div>
	
	<div class="page-num"></div>
	
	<div class="svg-wrap">
		<svg width="64" height="64" viewBox="0 0 64 64">
			<path id="arrow-left" d="M44.797 17.28l0.003 29.44-25.6-14.72z" />
		</svg>
		<svg width="64" height="64" viewBox="0 0 64 64">
			<path id="arrow-right" d="M19.203 17.28l-0.003 29.44 25.6-14.72z" />
		</svg>
	</div>
	
	<?php
	$prev_imgs = $next_imgs = '';
	foreach ($items as $key => $value) {
		if( $key==3 ) continue;
		if( $key<3 ) {
			$prev_imgs .= '<img src="'.$this->url($value['image_path'].'/s_'.$value['image'], $value['utime']).'" alt="'.$value['title'].'" />';
		} else {
			$next_imgs .= '<img src="'.$this->url($value['image_path'].'/s_'.$value['image'], $value['utime']).'" alt="'.$value['title'].'" />';
		}
	}
	?>
	
	<nav>
		<a class="prev">
			<span class="icon-wrap"><svg class="icon" width="48" height="48" viewBox="0 0 64 64"><use xlink:href="#arrow-left"></svg></span>
			<div><?php echo $prev_imgs;?></div>
		</a>
		<a class="next">
			<span class="icon-wrap"><svg class="icon" width="48" height="48" viewBox="0 0 64 64"><use xlink:href="#arrow-right"></svg></span>
			<div><?php echo $next_imgs;?></div>
		</a>
	</nav>
	
	<?php
	if ($site['stats_open'] == 1)
	{
		$squery = http_build_query(array(
				'r'=>$this->request->root(),
				'm'=>$site['stats_much'],
				'u'=>$site['stats_unit'],
				'd'=>$site['stats_date']
			)
		);
		
		echo '<script src="' . $this->url('asset/js/stats.js?' . $squery) . '"></script>';
	}
	
	if ($site['stats3_open'] == 1) { echo $this->decode($site['stats3_code']); }
	?>
	
</body>
</html>
