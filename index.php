<?php
require("inc/connection.php");
$selectQ = "select * from products where hot = '1' order by created_at desc limit 20";
$hotitem = $conn->query($selectQ);
?>
<?php include("inc/header.php");?>

</head>
<body>
  <div class="container">
        <!-- navbar start -->
      <?php include("inc/nevbar.php");?>
        <!-- navbar end -->
        <!-- carosel start  -->
      <?php include("inc/carosel.php"); ?>
        <!-- carosel end  -->
        <!-- owl carousel start -->
      <?php include("inc/owlcarosel.php"); ?>
        <!-- owl carousel end -->
        <!-- category start  -->
      <?php include("inc/category.php") ?> 
        <!-- category end  -->  
      

        <!-- footer star  --> 
      <?php include("inc/footer.php") ?>
        <!-- footer end  -->
    
</body>
</html>