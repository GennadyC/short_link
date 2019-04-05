<?php

class Short{

    public function __construct($link, $links) {
        $this->link = $link;
        $this->links = $links;
    }
  public function checkShortLink1($short_link)
    {
        $code = 1;
        $query ="SELECT * FROM links WHERE short = '{$short_link}'";
        $result = mysqli_query( $this->links , $query) or die("Ошибка " . mysqli_error( $this->links )); 
        if(mysqli_num_rows($result) == 0)
        {
            $code = 1;
        }
        else {
            $code = 0;
        }
        return $code;
    }
	public function getShortLink()
	{
        $characters = "aAbBcCdDfFgGhHjJkKmMnNpPqQrRsStTvVwWxXyYzZ";
        $shortLink = '';
        $a = true;
        while ($a)
        {
            for ($i = 0; $i < 8; $i++)
                $shortLink .= $characters[mt_rand(0, 41)];
            $check_code = $this->checkShortLink1($shortLink);
            if ($check_code)
            {
                $query ="INSERT INTO links VALUES(NULL, '$shortLink','$this->link')";
                $result = mysqli_query( $this->links , $query) or die("Ошибка " . mysqli_error( $this->links )); 
                if($result)
                {
                    echo "Коротка ссылка: localhost/$shortLink <br>";
                }
                
                $a = false;
            }
        }
	}

    
}
?>