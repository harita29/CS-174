<?php

class Lists
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
    
    public function getspecific($id)
    {
        $sql = "SELECT * FROM lists where idlist =".$id;
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }
    
    public function getListlevelone()
    {
        $sql = "SELECT * FROM lists where sublist = 0";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }
    
      public function getListlevex($id)
    {
        $sql = "SELECT * FROM lists where sublist = ".$id;
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function addList($name, $id)
    {
        $sql = "INSERT INTO lists (listname, sublist) VALUES (:name, :id)";
        $query = $this->db->prepare($sql);
        $parameters = array(':name' => $name, ':id' => $id);
        $query->execute($parameters);
    }

}

