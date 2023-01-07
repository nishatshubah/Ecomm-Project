<?php 
if(isset($_POST['addsubcategory'])){
    require("../../inc/connection.php");
    $image = null;
    if(isset($_FILES['images'])){ 
        $image = uniqid().".png";
        move_uploaded_file($_FILES['images']['tmp_name'],"../../assets/subcategorys/".$image);
    }
    $insert = "insert into subcategories values(null,'".$_POST['category_id']."','".$_POST['name']."','".$_POST['description']."','".$image."',null)";
    $conn->query($insert);
    if($conn->affected_rows){
        header("location:../subcategory.php");
    }
}
?>