<?php
	$image = $_REQUEST["img"];
	if ($image == "") $image = 0;
	$dir = "http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
	$location =  $dir . "/images/" . $image . ".jpg";
	if ($image >= 7) {
		$image = 0;
	} else {
		$image = $image + 1;
    }

    header('Content-type: text/xml');

    echo '<?xml version="1.0" encoding="utf-8"?>'."\n";
?>
<SnomIPPhoneImageFile>
	<LocationX>0</LocationX>
	<LocationY>0</LocationY>
	<URL><?php echo $location; ?></URL>
	<fetch mil="5000"><?php echo $dir. "/slideshow.php?img=" . $image; ?></fetch>
</SnomIPPhoneImageFile>
