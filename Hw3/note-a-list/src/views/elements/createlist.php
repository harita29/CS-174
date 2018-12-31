<?php

class createlist 
{

    public function render($data,$sub)
    {
        require BASE_URL."/views/layouts/header.php";
        echo '<h1>'.$data.'</h1>
                <h2>New List</h2>
                <form metthod="GET" action="index.php">
                Title: <input type="text" name="title" />
                <input type="hidden" name="sub" value="'.$sub.'" />
                <input type="hidden" name="name_of_controller" value="home" />
                <input type="hidden" name="name_of_method" value="docreate" />
                <input type="submit" name="addlist" value="add"/>
                </form>
            ';
        require BASE_URL."/views/layouts/footer.php";
    }
    
    
}

