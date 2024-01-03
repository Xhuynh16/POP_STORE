<?php
interface InterfaceDb{
    public function GetAll($tablename);
    public function GetByID($tablename, $id, $columname);
    public function Create($tablename, $data);
    public function Delete($tablename, $id, $columname);
    public function Update($tablename, $data, $id, $columname);
}
 ?>