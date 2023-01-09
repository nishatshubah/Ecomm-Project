<?php
require ("../inc/admin_outh.php");
if(isset($_GET['id'])){
    require ("../../inc/connection.php");
    $id = $_GET['id'];
    $query = "delete from products where id='{$id}' limit 1";
    $conn->query($query);
    if($conn->affected_rows){
        header("location: ../products.php");
    }    
}
?>