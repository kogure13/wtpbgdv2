<?php

class Database {

    var $DB_Host = "localhost";
    var $DB_Name = "wtpbdg";
    var $DB_User = "root";
    var $DB_Pass = "";
    var $conn;

    function getConstring() {
        $con = mysqli_connect($this->DB_Host, $this->DB_User, $this->DB_Pass, $this->DB_Name) or 
                die("Connection failed: " . mysqli_connect_error());

        if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        } else {
            $this->conn = $con;
        }

        return $this->conn;
    }

}

class User {
    
    function logout() {
        session_destroy();
        header('location: index.php');
    }
}

class Main {
    
    function getMain(){
        include 'model/main.php';
    }
    
    function getNavHead() {
        include 'model/nav_head.php';
    }
    
    function getPage() {
        if (!isset($_GET['page'])) {
            include_once 'view/home.php';
        } else {
            $page = htmlentities($_GET['page']);
            $pageRoot = "view/" . $page . ".php";

            if (file_exists($pageRoot)) {
                include_once $pageRoot;
            } elseif ($page == "crud") {
                $halaman = $_GET['act'];
                if (file_exists("model/" . $halaman . ".php")) {
                    include_once "model/" . $halaman . ".php";
                }
            } elseif ($page == "logout") {
                $user = new User();
                $user->logout();
            } else {
                include_once 'view/home.php';
            }
        }
    }
}