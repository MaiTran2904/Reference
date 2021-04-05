<?php

class ConnectDataBase{
    public  $server='localhost';
    public  $user='root';
    public  $pass = '';
    public  $dbname='php_project';
  
    public  $connect;
    public function ConnectDataBase()
    {
        $this->connect= mysqli_connect($this->server, $this->user, $this->pass, $this->dbname);
    }
    public function query($sql)
    {
        $this->connect= mysqli_connect($this->server, $this->user, $this->pass, $this->dbname);
        $ketqua =  mysqli_query($this->connect, $sql);
        return $ketqua;
        
    }}
?>
    