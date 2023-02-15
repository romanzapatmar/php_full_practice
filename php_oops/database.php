<?php

class Database{
    //for db connection
    private $db_host = 'localhost';
    private $db_username = 'root';
    private $db_pass = '';
    private $db_name = 'test';

    //setting a boolean value false
    private $mysqli = "";
    private $result = array();
    private $conn = false;

    public function __construct()
    {
        if(!$this->conn)
        {
            //passing the variable name
            $this->mysqli = new mysqli($this->db_host, $this->db_username, $this->db_pass, $this->db_name);
            $this->conn = true;
            if($this->mysqli->connect_error)
            {
                //adding an array
                array_push($this->result, $this->mysqli->connect_error);
                return false;

            }
        }else
        {
            return true;
        }

    }

    //for for insert operation
    public function insert()
    {
        
    }
    //for for update operation
    public function update()
    {

    }
    //for for delete operation
    public function delete()
    {

    }
    //for for destruct function
    public function __destruct()
    {
        if($this->conn)
        {
            if( $this->mysqli->close())
            {
                $this->conn = false;
                return true;
            }

        }
        else{
            return false;
        }
    }

}//class close


?>