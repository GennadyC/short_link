<?php

require_once 'connection.php'; 
require_once 'short_link.php'; 


$long_links = "NoN";
if(isset($_POST['long_links'])) $long_links = $_POST['long_links'];

echo "Ваша ссылка: $long_links  <br>";
$link = mysqli_connect($host, $user, $password, $database) 
    or die("Ошибка " . mysqli_error($link));


$query ="SELECT * FROM links WHERE url = '{$long_links}'";
$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
$row = mysqli_fetch_array($result);
if(mysqli_num_rows($result) == 0)
{
    $short_link = new Short($long_links, $link);
	$short_link->getShortLink();
}
else {
	echo "Ссылка: ".$row['short']."<br>\n";
}

mysqli_close($link);

?>