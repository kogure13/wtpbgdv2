<?php

include_once '../../inc/class.php';
$db = new Database();
$connString = $db->getConstring();
$pelangganClass = new Pelanggan($connString);

$key = $_REQUEST['term'];
$pelangganClass->getPelanggan($key);

class Pelanggan {

    protected $conn;

    function __construct($connString) {
        $this->conn = $connString;
    }

    function getPelanggan($key) {
        $json_data = array();
        $query =$key;

        $sql = "SELECT CONCAT(wtp_blok.namablok,'-',wtp_pelanggan.kav) AS alamat,
            wtp_pelanggan.id,
            wtp_pelanggan.id_Pel,
            wtp_pelanggan.nama_pemilik
            FROM
            wtp_pelanggan
            INNER JOIN wtp_area ON wtp_pelanggan.area = wtp_area.id
            INNER JOIN wtp_blok ON wtp_pelanggan.blok = wtp_blok.id
            WHERE 
            wtp_pelanggan.status = 1 AND 
            CONCAT(wtp_blok.namablok,'-',wtp_pelanggan.kav) LIKE '%{$query}%' OR "
            . "id_Pel LIKE '%{$query}%' ";            

        $result = mysqli_query($this->conn, $sql) or die();
        while ($row = mysqli_fetch_array($result)) {
            $json_data[] = array(
                'label' => $row['alamat'],'/',$row['id_Pel'],
                'value' => "",
                'id' => $row['id'],
                'nama_pemilik' => $row['nama_pemilik']
            );
        }

        echo json_encode($json_data);
    }

}
