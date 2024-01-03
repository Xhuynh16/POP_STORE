<?php
class Order implements InterfaceClass{
    private $user_id;
    private $user_name;
    private $user_email;
    private $user_password;
    private $db;
    private $tablename = "orders";

    public function __construct()
    {
        $this->db = new DbModel();
    }
    public function GetAll()
    {
        $result = $this->db->GetAll($this->tablename);
        return $result;
    }

    public function GetByID($id)
    {
        
        $result =$this->db->GetByID($this->tablename, $id, "order_id");
        return $result;
    }

    public function Create($data)
    {
        $this->db->Create($this->tablename, $data);
    }

    public function Update($id, $data)
    {
        $this->db->Update($this->tablename,$data, $id, "order_id");
    }

    public function Delete($id)
    {
        $this->db->Delete($this->tablename, $id, "order_id");
    }
}
 ?>