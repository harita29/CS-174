<?php

class createnote
{

    public function render($data,$id)
    {
        require BASE_URL."/views/layouts/header.php";
        echo '<h1>'.$data.'</h1>
                <h2>New Note</h2>
                <form metthod="GET" action="index.php">
                Title : <input type="text" name="title" /><br/>
                Note : <textarea name="desc" ></textarea><br/>
                <input type="hidden" name="id" value="'.$id.'" />
                <input type="hidden" name="name_of_controller" value="note" />
                <input type="hidden" name="name_of_method" value="docreate" />
                <input type="submit" name="addlist" value="add"/>
                </form>
            ';
        require BASE_URL."/views/layouts/footer.php";
    }
    
    
}

