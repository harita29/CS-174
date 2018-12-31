<?php

class displaynote
{

    public function render($data1,$data2)
    {
        require BASE_URL."/views/layouts/header.php";
        echo '<h1>'.$data1.'</h1>
                '.$data2.'
            ';
        require BASE_URL."/views/layouts/footer.php";
    }
    
    
}

