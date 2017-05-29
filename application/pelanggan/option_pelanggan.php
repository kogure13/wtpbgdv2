<?php
require_once '../../inc/class.php';
$db = new Database();
$connString = $db->getConstring();

$params = $_REQUEST;

$optionClass = new Option($connString);
$optionClass->getOption($params);

class Option {
    protected $conn;    
            
    function __construct($connString) {
        $this->conn = $connString;
    }
    
    function getOption($params) {
        $json_data = array();
        $sql = "SELECT * FROM wtp_blok";
        $result = mysqli_query($this->conn, $sql);
        
        while ($row = mysqli_fetch_assoc($result)){
            $json_data[] = $row;
        }                
        
        echo json_encode($json_data);
    }
}