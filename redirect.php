<?php
require_once("config.php");

$ShortURL=HOST.$_GET['shorturl'];
$sql=$db->prepare("SELECT long_url FROM urls WHERE short_url=?");
$sql->execute(array($ShortURL));
$LongURL=$sql->fetchColumn();
header('HTTP/1.1 301 Moved Permanently');
header('Location: ' .  $LongURL);

?>