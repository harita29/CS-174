<?php

class Home {

    public function index() {
        require BASE_URL . "/models/lists.php";
        require BASE_URL . "/models/notes.php";
        require BASE_URL . "/views/elements/landing.php";
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
        $html_lists = $helper->listobject($datalist);
        
        $html_notes = $helper->listnotes($datanotes,$id);
        
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
        $view = new landingview();
        $view->render($html_lists,$html_nav,$html_notes,$id);
    }
    
     public function create() {
         require BASE_URL . "/models/lists.php";
        require BASE_URL . "/views/elements/createlist.php";
        require BASE_URL . "/views/helpers/tools.php";
          $helper = new Tools();
        $list = new Lists();
        
         $navigation = [];
        if(isset($_GET['id']) && $_GET['id']!=0){
            
        $temp = $list->getspecific($_GET['id'])[0];
        $navigation[] = $temp;
        while(isset($temp->sublist) &&  $temp->sublist != 0){
            $temp = $list->getspecific($temp->sublist)[0];
            $navigation[] = $temp;
        }
        }
        
        $html_nav = $helper->getnavigation($navigation);
        $view = new createlist();
        $view->render($html_nav,$_GET['sub']);
         
     }
     public function docreate() {
         require BASE_URL . "/models/lists.php";
         $list = new Lists();
         if(!empty($_GET['title']) || $_GET['title'] != ""){
         $list->addList($_GET['title'],$_GET['sub']);
         header("location:index.php?name_of_controller=home&name_of_method=index");
         }else{
              header("location:index.php?name_of_controller=home&name_of_method=create&id=".$_GET['sub']."&sub=".$_GET['sub']);
         }
         
     }

}
