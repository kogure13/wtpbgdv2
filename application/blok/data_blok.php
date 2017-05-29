<?php

include '../../inc/class.php';
$db = new Database();
$connString = $db->getConstring();

$params = $_REQUEST;

$action = isset($params['action']) != '' ? $params['action'] : '';
$blokClass = new Blok($connString);

switch ($action) {
    case 'add'  : $blokClass->insertBlok($params);
        break;
    case 'edit' : $blokClass->updateBlok($params);
        break;
    default :
        $blokClass->getBlok($params);
        return;
}

class Blok {

    protected $conn;
    protected $data = [];

    function __construct($connString) {
        $this->conn = $connString;
    }

    public function getBlok($params) {
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
        $sql = "SELECT * FROM wtp_blok";
        $sql .= " ORDER BY " . $sortname . " " . $sortorder;
        $sql .= " LIMIT " . $start . " , " . $rp . " ";
        $sqlTot = "SELECT * FROM wtp_blok";
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
    
    function insertBlok($params) {
        $data = [];
        $sql = "INSERT INTO wtp_blok";
        $sql .= " (namablok, kelompok)";
        $sql .= " VALEUS('".$params['namablok']."', '".$params['kelompok']."')";
        
        echo $result = mysqli_query($this->conn, $sql) or die();        
    }
    
    function updateBlok($params) {
        $data = [];
        $sql = "UPDATE wtp_blok";
        $sql .= " SET namablok = '".$params['namablok']."', kelompok = '".$params['kelompok']."'";
        $sql .= " WHERE id = '".$params['edit_id']."'";
        
        echo $result = mysqli_query($this->conn, $sql) or die();
    }        

}
