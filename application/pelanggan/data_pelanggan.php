<?php

include_once '../../inc/class.php';
$db = new Database();
$connString = $db->getConstring();

$params = $_REQUEST;

$action = isset($params['action']) != '' ? $params['action'] : '';
$pelangganClass = new Pelanggan($connString);

switch ($action) {
    case 'add' : $pelangganClass->insertPelanggan($params);
        break;
    case 'edit' : $pelangganClass->updatePelanggan($params);
        break;
    default :
        $pelangganClass->getPelanggan($params);
        return;
}

class Pelanggan {

    protected $conn;
    protected $data = [];

    function __construct($connString) {
        $this->conn = $connString;
    }

    public function getPelanggan($params) {
        $this->data = $this->getRecords($params);
        echo json_encode($this->data);
    }

    function getRecords() {
        $page = isset($_POST['page']) ? $_POST['page'] : 1;
        $rp = isset($_POST['rp']) ? $_POST['rp'] : 15;
        $sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'id_Pel';
        $sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'desc';
        $query = isset($_POST['query']) ? $_POST['query'] : false;
        $qtype = isset($_POST['qtype']) ? $_POST['qtype'] : false;
        $qsearch = ($query != '' || $qtype != '') ? " WHERE " . $qtype . " LIKE '%" . $query . "%'" : "";

        $start = ($page - 1) * $rp;
        $sql = "SELECT id_Pel, nama_pemilik, skarea, namablok, kav, wtp_pelanggan.telp ";
        $sql .= "FROM wtp_pelanggan ";
        $sql .= "INNER JOIN wtp_area ON wtp_area.id = wtp_pelanggan.area "
                . " INNER JOIN wtp_blok ON wtp_blok.id = wtp_pelanggan.blok ";
        $sql .= $qsearch;
        $sqlTot = $sql;

        $sql .= " ORDER BY " . $sortname . " " . $sortorder;
        $sql .= " LIMIT " . $start . " , " . $rp . " ";

        $qtot = mysqli_query($this->conn, $sqlTot) or die("Error to fecth total data");
        $queryRecords = mysqli_query($this->conn, $sql) or die("Errot to fecth data");

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

    function insertPelanggan($params) {
        $data = array();
        $sql = "INSERT INTO master_kategori";
        $sql .= " (kode_kategori, nama_kategori)";
        $sql .= " VALUES('" . $params['kode_kategori'] . "', '" . $params['nama_kategori'] . "')";

        echo $result = mysqli_query($this->conn, $sql) or die("error to insert kategori data");
    }

    function updatePelanggan($params) {
        $data = array();
        $sql = "UPDATE master_kategori";
        $sql .= " SET kode_kategori='" . $params['kode_kategori'] . "', nama_kategori = '" . $params['nama_kategori'] . "'";
        $sql .= " WHERE id = '" . $_POST['edit_id'] . "'";

        echo $result = mysqli_query($this->conn, $sql) or die("error to update employee data");
    }

}
