<?php
if(session_status() === PHP_SESSION_NONE){
    session_start();
  }
  if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']){

  }else{
    echo "You are logged in";
    exit;
  }
if(isset($_POST['action']) && $_POST['action'] == "checkout"){
    require("inc/connection.php");
    // action:"checkout",
    // t:total,
    // d:discount,
    // p:payment,
    // c:comment,
    // tr:trxid,
$total = $_POST['t'];
$dis = $_POST['d'];
$payment = $_POST['p'];
$trx = $_POST['tr'];
$comment = $_POST['c'];
    // var_dump($items);
    // exit;
$items = $_POST['items'];
$user = $_SESSION['userid'];
$insertQ = "insert into orders values(null,'$user','".$total."','".$dis."','".$comment."','".$payment."','".$trx."','pe',null)";
    $conn->query($insertQ);
    if($conn->affected_rows){
        $invoiceid = $conn->insert_id;
        foreach ($items as $item) {
            $q = "insert into orderdetails values(null,'".$invoiceid."','".$item['id']."','".$item['price']."','1','',null)";
            $conn->query($q);
        }
        echo json_encode(['success' => true, 'invoiceid' => $invoiceid]);
    }else{
        echo json_encode(['success' => false, 'invoiceid' => null]);
    }   
}
?>