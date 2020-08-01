<?php 
/* 
    Personal Contacts
*/
class Personal
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    /* 
        INSERT INTO Personal Table
    */
    public function insertIntoPersonal($params = null, $table = 'personal'){
        if ($this->db->con!=null){
            if ($params !=null){
                $columns = implode(',',array_keys($params));

                $values = implode(',',array_values($params));

                /* 
                    Create an INSERT INTO SQL Query
                */
                $query_string = sprintf("INSERT INTO %s(%s) VALUES(%s)", $table, $columns, $values);
                
                /* 
                    Execute the SQL Query
                */
                $result = $this->db->con->query($query_string);
                return $result;
            }
        }
    }

    /* 
        Get the user id and contact id and insert into personal table
    */
    public function addToPersonal($userid, $contactid){
        if (isset($userid) && isset($contactid)){
            $params = array(
                "user_id" => $userid,
                "contact_id" => $contactid
            );

            $result = $this->insertIntoPersonal($params);
            if ($result){
                /* 
                    Reload the page after inserting the data into personal table
                */
                header("Location: " . $_SERVER['PHP_SELF']);
            }
        }
    }
}
?>