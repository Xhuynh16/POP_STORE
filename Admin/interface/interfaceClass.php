<?php
interface InterfaceClass{
    public function GetAll();
    public function GetByID($id);
    public function Create($data);
    public function Delete($id);
    public function Update($id, $data);
}
 ?>