<?php

class Notes
{
    public $db = null;

    function __construct()
    {
        try {
            
            $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING);
            $this->db = new PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET, DB_USER, DB_PASS, $options);
            
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }
      public function getnote($id)
    {
        $sql = "SELECT * FROM notes where idnote =".$id;
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }
    
    public function getallnote($id)
    {
        $sql = "SELECT * FROM notes where idlist =".$id;
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }
    
     public function getallnotelevelone()
    {
        $sql = "SELECT * FROM notes where idlist  = 0 ";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }


    public function addnote($title,$desc, $id)
    {
        $sql = "INSERT INTO notes (title, description,idlist) VALUES (:title,:description, :id)";
        $query = $this->db->prepare($sql);
        $parameters = array(':title' => $title,':description' => $desc, ':id' => $id);
        $query->execute($parameters);
    }

}

