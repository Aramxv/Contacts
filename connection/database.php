<?php

class DBController
{
    // Database Connection Properties
    protected $host = 'localhost';
    protected $user = 'root';
    protected $password = '';
    protected $database = "contacts";

    // connection property
    public $con = null;

    // call constructor
    public function __construct()
    {
        $this->con = mysqli_connect($this->host, $this->user, $this->password, $this->database);
        if ($this->con->connect_error){
            echo "Fail " . $this->con->connect_error;
        } else {
            // TEST
            //echo ('yess');
        }
    }

    public function __destruct()
    {
        $this->closeConnection();
    }

    // for mysqli closing connection
    protected function closeConnection(){
        if ($this->con != null ){
            $this->con->close();
            $this->con = null;
        }
    }
}

   /* 
        Database Credentials 
        Default Settings (user root no password) 
    */
    define ('DB_SERVER', 'localhost');
    define ('DB_USERNAME', 'root');
    define ('DB_PASSWORD', '');
    define ('DB_NAME', 'contacts');

    /* 
        Attempt to connect to MySQL Database
    */
    $connect = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    /* 
        if $connect have a null value, it will imply that system is not connected to database
        otherwise it is connected.  
    */
    if ($connect === false) {
        die ("ERROR: Could not connect. " . mysqli_connect_errror());
    } else {
        // Echo a Test Connection String
        //echo 'YEEEES! Connected';
    }
?>