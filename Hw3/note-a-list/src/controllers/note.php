<?php

class Note {

    public function index() {
        require BASE_URL . "/models/lists.php";
        require BASE_URL . "/models/notes.php";
        require BASE_URL . "/views/elements/displaynote.php";
        require BASE_URL . "/views/helpers/tools.php";
        $list = new Lists();
        $note = new Notes();
        $id = 0;
        if(!isset($_GET['id'])){
            $datalist = $list->getListlevelone();
            $datanotes = $note->getallnotelevelone();
            
        }else{
            $datalist = $list->getListlevex($_GET['id']);
            $datanotes = $note->getallnote($_GET['id']);
            $id = $_GET['id'];
        }
        $helper = new Tools();

        
        $navigation = [];
        if(isset($_GET['id']) && $_GET['id']!=0){
        $temp = $list->getspecific($_GET['id'])[0];
        $navigation[] = $temp;
        while(isset($temp->sublist) && $temp->sublist != 0){
            $temp = $list->getspecific($temp->sublist)[0];
            $navigation[] = $temp;
        }
        }
        
        $data = $note->getnote($_GET['idnote']);
        
        $html_nav = $helper->getnavigation($navigation);
        $html_note = $helper->noteformat($data);
        
        $view = new displaynote();
        $view->render($html_nav,$html_note);
    }
    
     public function create() {
         require BASE_URL . "/models/notes.php";
         require BASE_URL . "/models/lists.php";
        require BASE_URL . "/views/elements/createnote.php";
        require BASE_URL . "/views/helpers/tools.php";
          $helper = new Tools();
        $note = new Notes();
         $list = new Lists();
         
         $navigation = [];
        if(isset($_GET['id']) && $_GET['id']!=0){
            
        $temp = $list->getspecific($_GET['id'])[0];
        $navigation[] = $temp;
        while(isset($temp->sublist) && $temp->sublist != 0){
            $temp = $list->getspecific($temp->sublist)[0];
            $navigation[] = $temp;
        }
        }
        
        $html_nav = $helper->getnavigation($navigation);
        $view = new createnote();
        $view->render($html_nav,$_GET['id']);
         
     }
     public function docreate() {
         require BASE_URL . "/models/notes.php";
         $note = new Notes();
         if(!empty($_GET['title']) || $_GET['title'] != "" || !empty($_GET['desc']) || $_GET['desc'] != ""){
         $note->addnote($_GET['title'],$_GET['desc'],$_GET['id']);
         header("location:index.php?name_of_controller=home&name_of_method=index");
           }else{
              header("location:index.php?name_of_controller=note&name_of_method=create&id=".$_GET['id']);
         }
         
     }

}
