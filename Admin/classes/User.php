<?php
class User implements InterfaceClass{
    private $user_id;
    private $user_name;
    private $user_email;
    private $user_password;
    private $db;
    private $tablename = "users";

    public function __construct()
    {
        $this->db = new DbModel();
    }
    public function GetAll()
    {
        $this->db->GetAll($this->tablename);
    }

    public function GetByID($id)
    {
        $result= $this->db->GetByID($this->tablename, $id, "user_id");
        return $result;
    }

    public function Create($data)
    {
        $this->db->Create($this->tablename, $data);
    }

    public function Update($id, $data)
    {
        $this->db->Update($this->tablename,$data, $id, "user_id");
    }

    public function Delete($id)
    {
        $this->db->Delete($this->tablename, $id, "user_id");
    }
}
 ?>