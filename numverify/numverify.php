<?php
####################################################
# Configure your API Key here:
####################################################
#$api_key = "HereYourNunverifyAPIKey";
$api_key = "9f5fcfcf6d6cc6d9a9b35320816bb7c6";

$url = "http://apilayer.net/api/validate?access_key=$api_key";

header('Content-type: text/xml');
echo '<?xml version="1.0" encoding="utf-8"?>'."\n";

if ($_GET['number'] != ""){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, $url . "&number=".$_GET['number']);
    $result = curl_exec($ch);
    curl_close($ch);

    $obj = json_decode($result);

    // Number not valid
    if ($obj->valid != "1") {
?>
<SnomIPPhoneText>
    <Title>ERROR!</Title>
    <Text>
        The number <?php echo $_GET['number'] ?> is not valid
    </Text>
</SnomIPPhoneText>        
<?php
        die();
    } else {
        // Number valid
 ?>
<SnomIPPhoneText>
    <Title><?php echo $_GET['number'] ?></Title>
    <Text>
        Country: <?php echo $obj->country_name ?><br/>
        Location: <?php echo $obj->location ?><br/>
        Carrier: <?php echo $obj->carrier ?><br/>
        Line type: <?php echo $obj->line_type ?><br/>
        Country prefix: <?php echo $obj->country_prefix ?><br/>
        International format: <?php echo $obj->international_format ?><br/>
    </Text>
</SnomIPPhoneText>        
<?php
    }
} else {
?>
<SnomIPPhoneInput>
<Title>Insert the number</Title>
<Url>http://<?php echo $_SERVER["HTTP_HOST"] . $_SERVER["PHP_SELF"]?>?number=__X__</Url>
<InputItem>
    <DisplayName>Title</DisplayName>
    <InputToken>__X__</InputToken>
    <DefaultValue></DefaultValue>
    <InputFlags>t</InputFlags>
</InputItem>
</SnomIPPhoneInput>
<?php
}

?>
