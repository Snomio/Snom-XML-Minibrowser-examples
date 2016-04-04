<?php
$key=$_GET["text"];
if ($key == ""){
    $text = "Please press a key";
} else {
    $text = "Pressed key: $key";
}
header('Content-type: text/xml');
echo '<?xml version="1.0" encoding="utf-8"?>'."\n";
?>
<SnomIPPhoneText>
	<Title>Softkey Text</Title>
    <Text><?php echo $text; ?></Text>
	<SoftKeyItem>
		<Name>F_UP</Name>
		<URL>http://<?php echo $_SERVER["HTTP_HOST"] . $_SERVER["PHP_SELF"] . "?text=F_Up%20pressed"; ?></URL>
	</SoftKeyItem>
	<SoftKeyItem>
		<Name>F_DOWN</Name>
		<URL>http://<?php echo $_SERVER["HTTP_HOST"] . $_SERVER["PHP_SELF"] . "?text=F_Down%20pressed"; ?></URL>
	</SoftKeyItem>
	<SoftKeyItem>
		<Name>UP</Name>
		<URL>http://<?php echo $_SERVER["HTTP_HOST"] . $_SERVER["PHP_SELF"] . "?text=Up%20pressed"; ?></URL>
	</SoftKeyItem>
	<SoftKeyItem>
		<Name>DOWN</Name>
		<URL>http://<?php echo $_SERVER["HTTP_HOST"] . $_SERVER["PHP_SELF"] . "?text=Down%20pressed"; ?></URL>
	</SoftKeyItem>
	<SoftKeyItem>
		<Name>F_LEFT</Name>
		<URL>http://<?php echo $_SERVER["HTTP_HOST"] . $_SERVER["PHP_SELF"] . "?text=F_Left%20pressed"; ?></URL>
	</SoftKeyItem>
	<SoftKeyItem>
		<Name>F_RIGHT</Name>
		<URL>http://<?php echo $_SERVER["HTTP_HOST"] . $_SERVER["PHP_SELF"] . "?text=F_Right%20pressed"; ?></URL>
	</SoftKeyItem>
	<SoftKeyItem>
		<Name>LEFT</Name>
		<URL>http://<?php echo $_SERVER["HTTP_HOST"] . $_SERVER["PHP_SELF"] . "?text=Left%20pressed"; ?></URL>
	</SoftKeyItem>
	<SoftKeyItem>
		<Name>RIGHT</Name>
		<URL>http://<?php echo $_SERVER["HTTP_HOST"] . $_SERVER["PHP_SELF"] . "?text=Right%20pressed"; ?></URL>
	</SoftKeyItem>
	<SoftKeyItem>
		<Name>F2</Name>
		<URL>http://<?php echo $_SERVER["HTTP_HOST"] . $_SERVER["PHP_SELF"] . "?text=Back%20pressed"; ?></URL>
		<Label>BACK</Label>
		<Softkey>F_MINIBROWSER_BACK</Softkey>
	</SoftKeyItem>
	<SoftKeyItem>
		<Name>F_MUTE</Name>
		<URL>http://<?php echo $_SERVER["HTTP_HOST"] . $_SERVER["PHP_SELF"] . "?text=Mute%20pressed"; ?></URL>
	</SoftKeyItem>
	<SoftKeyItem>
		<Name>ONHOOK</Name>
		<URL>http://<?php echo $_SERVER["HTTP_HOST"] . $_SERVER["PHP_SELF"] . "?text=Onhook%20pressed"; ?></URL>
	</SoftKeyItem>
	<SoftKeyItem>
		<Name>ENTER</Name>
		<URL>http://<?php echo $_SERVER["HTTP_HOST"] . $_SERVER["PHP_SELF"] . "?text=Enter%20pressed"; ?></URL>
	</SoftKeyItem>
	<SoftKeyItem>
		<Name>SPEAKER</Name>
		<URL>http://<?php echo $_SERVER["HTTP_HOST"] . $_SERVER["PHP_SELF"] . "?text=Speaker%20pressed"; ?></URL>
	</SoftKeyItem>
	<SoftKeyItem>
		<Name>REDIAL</Name>
		<URL>http://<?php echo $_SERVER["HTTP_HOST"] . $_SERVER["PHP_SELF"] . "?text=Redial%20pressed"; ?></URL>
	</SoftKeyItem>
	<SoftKeyItem>
		<Name>TRANSFER</Name>
		<URL>http://<?php echo $_SERVER["HTTP_HOST"] . $_SERVER["PHP_SELF"] . "?text=Transfer%20pressed"; ?></URL>
	</SoftKeyItem>
	<SoftKeyItem>
		<Name>CONFERENCE</Name>
		<URL>http://<?php echo $_SERVER["HTTP_HOST"] . $_SERVER["PHP_SELF"] . "?text=Conference%20pressed"; ?></URL>
	</SoftKeyItem>
	<SoftKeyItem>
		<Name>HELP</Name>
		<URL>http://<?php echo $_SERVER["HTTP_HOST"] . $_SERVER["PHP_SELF"] . "?text=Help%20pressed"; ?></URL>
	</SoftKeyItem>
	<SoftKeyItem>
		<Name>REC</Name>
		<URL>http://<?php echo $_SERVER["HTTP_HOST"] . $_SERVER["PHP_SELF"] . "?text=Rec%20pressed"; ?></URL>
	</SoftKeyItem>
	<SoftKeyItem>
		<Name>SNOM</Name>
		<URL>http://<?php echo $_SERVER["HTTP_HOST"] . $_SERVER["PHP_SELF"] . "?text=Snom%20pressed"; ?></URL>
	</SoftKeyItem>
	<SoftKeyItem>
		<Name>DND</Name>
		<URL>http://<?php echo $_SERVER["HTTP_HOST"] . $_SERVER["PHP_SELF"] . "?text=DND%20pressed"; ?></URL>
	</SoftKeyItem>
	<SoftKeyItem>
		<Name>RECALL</Name>
		<URL>http://<?php echo $_SERVER["HTTP_HOST"] . $_SERVER["PHP_SELF"] . "?text=Hold%20pressed"; ?></URL>
	</SoftKeyItem>
	<SoftKeyItem>
		<Name>5</Name>
		<URL>http://<?php echo $_SERVER["HTTP_HOST"] . $_SERVER["PHP_SELF"] . "?text=Key5%20pressed"; ?></URL>
	</SoftKeyItem>

</SnomIPPhoneText>
