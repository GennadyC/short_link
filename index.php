<?php
    require_once 'connection.php'; 


    if (isset($_GET['short_link'])) 
    {
        $short_link = $_GET['short_link'];
        echo $short_link ."\n";
        $link = mysqli_connect($host, $user, $password, $database) 
            or die("Ошибка подключение" . mysqli_error($link));


        $query ="SELECT * FROM links WHERE short = '{$short_link}'";
        $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
        $row = mysqli_fetch_array($result);
        if(mysqli_num_rows($result) == 0)
        {
            echo "Такой ссылки не существует";
        }
        else {
            echo $row['url'];
            header("Location: " . $row['url'] ); 
        }
    }
    else {readfile('index.html');}
 
?>
