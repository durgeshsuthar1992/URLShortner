<?php
require_once('config.php');

if(isset($_POST['longURL'])){

	$url=mysql_escape_string($_POST['longURL']);
	$sql=$db->prepare("SELECT id FROM urls WHERE long_url LIKE :url");
	$sql->bindParam(':url',$url, PDO::PARAM_STR);
	$sql->execute();
	$id=(int)$sql->fetchColumn();
	if($id>0){
		$sql1=$db->prepare("SELECT short_url FROM urls WHERE id=?");
		$sql1->execute(array($id));
		$short_url=$sql1->fetchColumn();
		
	}else{
		
		$sql2=$db->prepare("INSERT INTO urls (long_url) VALUES (:long)");
		$sql2->execute(array($url));
		$id=$db->lastInsertId();
		$encoded = encode($id);
		$short_url=HOST.$encoded;
		$sql3=$db->prepare("INSERT INTO urls (short_url) VALUES (:short) WHERE id=:id");
		$sql3->execute(array($short_url,$id));
	}


}else{
	echo "provide an url";
}

function encode($val, $base=62, $chars='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ') {
    $str = '';
    do {
        $i = $val % $base;
        $str = $chars[$i] . $str;
        $val = ($val - $i) / $base;
    } while($val > 0);
    return $str;
}

?>