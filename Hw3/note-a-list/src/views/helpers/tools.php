<?php

class Tools {

    public function listobject($data) {
        $content = '';
        foreach ($data as $d) {
            $content .= '<li><h3><a href="index.php?name_of_controller=home&name_of_method=index&id=' . $d->idlist . '">' . $d->listname . '</a></h3></li>';
        }

        return $content;
    }
    
    public function listnotes($data,$id) {
        $content = '';
        foreach ($data as $d) {
            $content .= '<li><a href="index.php?name_of_controller=note&name_of_method=index&id='.$id.'&idnote=' . $d->idnote . '">' . $d->title . '</a><br/>'.$d->created.'</li>';
        }

        return $content;
    }
    
    public function getnavigation($array) {
 
        if(count($array) == 0){
            return '<a href="index.php?name_of_controller=home&name_of_method=index">Note A List</a>';
        }else{
            $content = '<a href="index.php?name_of_controller=home&name_of_method=index">Note A List</a>';
             
            for($i=(count($array)-1);$i>=0;$i--){
                $content .= '/<a href="index.php?name_of_controller=home&name_of_method=index&id=' . $array[$i]->idlist . '">'.$array[$i]->listname.'</a>';
            }
        }
        
         return $content;
    }
    public function noteformat($data) {
        $content = "<h2>".$data[0]->title."</h2><p>".$data[0]->description."</p>";

        return $content;
    }
}
