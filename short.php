<?php
require_once('config.php');

if(isset($_POST['longURL'])){

	$url=mysql_escape_string($_POST['longURL']);
	if ($url=="") {
		echo "provide an url";
		exit;
	}
	$sql=$db->prepare("SELECT id FROM urls WHERE long_url LIKE :url");
	$sql->bindParam(':url',$url, PDO::PARAM_STR);
	$sql->execute();
	$id=(int)$sql->fetchColumn();
	if($id>0){
		$sql1=$db->prepare("SELECT short_url FROM urls WHERE id=?");
		$sql1->execute(array($id));
		$short_url=$sql1->fetchColumn();
	}else{
		
		$sql2=$db->prepare("INSERT INTO urls (long_url) VALUES (?)");
		$sql2->execute(array($url));
		$id=$db->lastInsertId();
		$encoded = encode($id);
		$short_url=HOST.$encoded;
		$sql3=$db->prepare("UPDATE urls SET short_url=? WHERE id=?");
		$sql3->execute(array($short_url,$id));
	}


}else{
	echo "provide an url";
}

function encode($id, $base=62, $chars='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ') {
    $str = '';
    do {
        $i = $id % $base;
        $str = $chars[$i] . $str;
        $id = ($id - $i) / $base;
    } while($id > 0);
    return $str;
}

?>