
<?php
class Database
{
  //  private $host = "localhost";
  //  private $db_name = "id16183805_labiny";
  //private $username = "id16183805_labiny1";
  //private $password = "K(LIK)\8u9=82qL0";
     private $host = "localhost";
     private $db_name = "shyheads_db";
     private $username = "kazungudev";
     private $password = "sagwe1";
    public  $myName = "";
    public $conn;
    public function getConnection()
    {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8mb4");
        } catch (PDOException $exception) {
            echo "connection error " . $exception->getMessage();
        }
    }
}
?>