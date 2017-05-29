<?php

include '../../inc/class.php';
$db = new Database();
$connString = $db->getConstring();

$params = $_REQUEST;

$action = isset($params['action']) != '' ? $params['action'] : '';
$areaClass = new Area($connString);

switch ($action) {
    case 'add'  : $areaClass->insertArea($params);        
        break;
    case 'edit' : $areaClass->updateArea($params);
        break;
    default :
        $areaClass->getArea($params);
        return;
}

class Area {

    protected $conn;
    protected $data = [];

    function __construct($connString) {
        $this->conn = $connString;
    }

    public function getArea($params) {
        $this->data = $this->getRecords($params);
        echo json_encode($this->data);
    }

    function getRecords() {
        $page = isset($_POST['page']) ? $_POST['page'] : 1;
        $rp = isset($_POST['rp']) ? $_POST['rp'] : 10;
        $sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'id';
        $sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'desc';
        $query = isset($_POST['query']) ? $_POST['query'] : FALSE;
        $qtype = isset($_POST['qtype']) ? $_POST['qtype'] : FALSE;

        $start = ($page - 1) * $rp;
        $sql = "SELECT * FROM wtp_area";
        $sql .= " ORDER BY " . $sortname . " " . $sortorder;
        $sql .= " LIMIT " . $start . " , " . $rp . " ";
        $sqlTot = "SELECT * FROM wtp_area";
        $qtot = mysqli_query($this->conn, $sqlTot) or die("Error to fecth total data");
        $queryRecords = mysqli_query($this->conn, $sql) or die("Error to fecth data");

        while ($row = mysqli_fetch_assoc($queryRecords)) {
            $data[] = $row;
        }

        if (intval($qtot->num_rows) > 0) {
            $json_data = [
                "page" => $page,
                "total" => intval($qtot->num_rows),
                "rows" => $data
            ];
        } else {
            $json_data = [
                "page" => 0,
                "total" => 0,
                "rows" => 0
            ];
        }

        return $json_data;
    }
    
    function insertArea($params) {
        $data = [];
        $sql = "INSERT INTO wtp_area";
        $sql .= " (areaname, skarea, companyname, address, city, state, notlp, nofax, email, zipcode)";
        $sql .= " VALEUS('".$params['areaname']."', '".$params['skarea']."', "
                . " '".$params['companyname']."', '".$params['address']."', "
                . " '".$params['city']."', '".$params['state']."', '".$params['notlp']."', "
                . " '".$params['nofax']."', '".$params['email']."', '".$params['zipcode']."')";
        
        echo $result = mysqli_query($this->conn, $sql) or die();        
    }
    
    function updateArea($params) {
        $data = [];
        $sql = "UPDATE wtp_area";
        $sql .= " SET areaname = '".$params['areaname']."', skarea = '".$params['skarea']."', "
                . "companyname = '".$params['companyname']."', address = '".$params['address']."', "
                . "city = '".$params['city']."', state = '".$params['state']."', "
                . "notlp = '".$params['notlp']."', nofax = '".$params['nofax']."', "
                . "email = '".$params['email']."', zipcode = '".$params['zipcode']."'";
        $sql .= " WHERE id = '".$params['edit_id']."'";
        
        echo $result = mysqli_query($this->conn, $sql) or die();
    }        

}
