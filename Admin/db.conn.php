<?php
class DbModel implements InterfaceDb{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname ="php_project";
    private $db;
    public function __construct()
    {
        try {
            $this->db = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this-> password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Lỗi kết nối đến cơ sở dữ liệu: " . $e->getMessage());
        }
    }

    public function GetAll($tablename)
    {
        try{
            $sql = "SELECT * FROM $tablename";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        }
        catch(PDOException $e){
            echo "Lỗi:".$e->getMessage();
        }
    }

    public function GetByID($tablename, $id, $columname)
    {
        try{
            $id= trim($id);
            $sql = "SELECT * FROM $tablename WHERE $columname = '$id'";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        }
        catch(PDOException $e){
            echo "Lỗi:".$e->getMessage();
        }
    }

    public function Create($tablename, $data)
    {
        try{
            $columns = implode(', ', array_keys($data));//Lấy các key của data
            $placeholders = ':' . implode(', :', array_keys($data));// Tạo placeholders để insert vào bảng
            $sql = "INSERT INTO $tablename ($columns) VALUES ($placeholders)";
            $stmt = $this->db->prepare($sql);
    
        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
            
        }
        $stmt->execute();
        return 1;
        
        }
        catch(PDOException $e){
            die("Lỗi thêm dữ liệu vào bảng: ".$e->getMessage());
        }
    }

    public function Update($tablename, $data, $id, $columname)
    {
        try{
            $array = [];
            foreach($data as $key => $value){
                $nameSet = "$key = :$key";
                array_push($array, $nameSet);
            }
            $columns = implode(', ', $array);
            $sql = "UPDATE $tablename SET $columns  WHERE $columname = :id";
            $stmt = $this->db->prepare($sql);
        
            foreach ($data as $key => $value) {
                $stmt->bindValue(":$key", $value);
            }
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            
            }
            catch(PDOException $e){
                die("Lỗi thêm dữ liệu vào bảng: ".$e->getMessage());
            }
    }

    public function Delete($tablename, $id, $columname)
    {
        try{
            $sql = "DELETE FROM $tablename WHERE $columname = :id LIMIT 1";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
        }
        catch(PDOException $e){
            echo "Lỗi:".$e->getMessage();
        }
    }
}
 ?>