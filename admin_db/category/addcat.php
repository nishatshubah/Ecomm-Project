<?php 
if(isset($_POST['addcategory'])){
    require("../../inc/connection.php");
    $image = null;
    if(isset($_FILES['images'])){ 
        $image = uniqid().".png";
        move_uploaded_file($_FILES['images']['tmp_name'],"../../assets/categorys/".$image);
    }
    $insert = "insert into categories values(null,'".$_POST['name']."','".$_POST['description']."','".$image."',null)";
    $conn->query($insert);
    if($conn->affected_rows){
        header("location:../category.php");
    }
}
?>