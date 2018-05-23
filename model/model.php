<?php

class model {
    
    function select($table){
        require "../../koneksi.php";
        $data = mysqli_query($connect, "SELECT * FROM $table");
        $dataarray = array();

            while($row = mysqli_fetch_assoc($data)){
                $dataarray[] = $row;
            }
        return $dataarray;
    }
    
    function selectWhere($table, $where){
        require '../../koneksi.php';
        $data = mysqli_query($connect, "SELECT * FROM $table where $where");
        $dataarray = array();

            while($row = mysqli_fetch_assoc($data)){
                $dataarray[] = $row;
            }
        return $dataarray;
    }
    
    function select2TableWhere($table, $table2, $on, $where){
        require '../../koneksi.php';
        $data = mysqli_query($connect, "SELECT * FROM $table INNER JOIN $table2 ON $on Where $where");
        $dataarray = array();

            while($row = mysqli_fetch_assoc($data)){
                $dataarray[] = $row;
            }
        return $dataarray;
    }
    
    function select3Table($table, $table2, $table3, $on, $on2){
        require '../../koneksi.php';
        $data = mysqli_query($connect, "SELECT * FROM (($table INNER JOIN $table2 ON $on) INNER JOIN $table3 ON $on2)");
        $dataarray = array();

            while($row = mysqli_fetch_assoc($data)){
                $dataarray[] = $row;
            }
        return $dataarray;
    }
    function select3TableWhere($table, $table2, $table3, $on, $on2, $where){
        require '../../koneksi.php';
        $data = mysqli_query($connect, "SELECT * FROM (($table INNER JOIN $table2 ON $on) INNER JOIN $table3 ON $on2) Where $where");
        $dataarray = array();

            while($row = mysqli_fetch_assoc($data)){
                $dataarray[] = $row;
            }
        return $dataarray;
    }
    
    function selectOrderBy($table, $OrderBy){
        require '../../koneksi.php';
        $data = mysqli_query($connect, "SELECT * FROM $table Order by $OrderBy");
        $dataarray = array();

            while($row = mysqli_fetch_assoc($data)){
                $dataarray[] = $row;
            }
        return $dataarray;
    }
    
    function insert($table, $value){
        require '../../koneksi.php';
        $data = mysqli_query($connect, "INSERT INTO $table values ($value)");
    }
    
    function updateWhere($table, $set, $where){
        require '../../koneksi.php';
        $data = mysqli_query($connect, "UPDATE $table Set $set where $where");
    }
    function delete($table, $where){
        require '../../koneksi.php';
        $data = mysqli_query($connect, "DELETE from $table where $where");
    }
}

?>