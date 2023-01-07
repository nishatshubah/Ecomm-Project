<?php
require("inc/connection.php");
$select = "select * from products where 1 order by created_at desc";
$allcat = $conn->query($select);
?>
<?php include("inc/header.php");?>

<style>
        .member{
            position: relative;
            padding: 30px;
            box-shadow: 0px 2px 15px rgba(0,0,0,0.1);
            border-radius: 5px;
            background: #fff;
        }
        .teampic img{
            width: 300px;
            border-radius: 15px;
        }
        .member-info{
            padding-left: 30px;
        }
    </style>
</head>
<body>
  <div class="container">
        <!-- navbar start -->
        <?php include("inc/nevbar.php");?>
        <!-- navbar end -->
 
     <!-- content start   -->
    <?php 
    while ($row = $allcat->fetch_assoc()) {
        echo '<section>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mt-4">
                    <div class="member d-flex justify-content-start">
                        <div class="teampic">
                            <img src="assets/products/'.$row ['images'].'" class="card-img-top img-fluid">
                        </div>
                        <div class="member-info">
                            <h5 class="pname card-text fw-bold">'.$row['name'] .'</h5>
                            <p class="card-text">'.$row['description'] .'</p>
                            <p class="card-text"><br> <span class="pprice">'.$row['price'].'</span> &#2547;</p>
                            <p class="card-text">Quantity : '.$row['quantity'] .'</p>
                            <p class="card-text">Discount : '.$row['discount'] .'</p>
                            <p class="card-text">Hot : '.$row['hot'] .'</p>
                            <a href="details2.php?id='.$row['id'].'" class="btn btn-outline-primary">Deteils</a>
                            <a title="add to cart" href="javascript:void(0)" class="addToCart btn btn-outline-info" data-id="'.$row['id'].'"><i class="bi bi-cart-check-fill"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>';

//       <div class="col-md-6 col-lg-12 d-flex justify-content-center w-100%">
//       <div class="card mb-3" style="max-width: 540px;">
//           <div class="row g-0">
//               <div class="col-md-4">
//               <img width="200px" src="assets/products/'.$row ['images'].'" class="card-img-top img-fluid"/>
//               </div>
//               <div class="col-md-8">
//                   <div class="card-body">
//                       <h5 class=" pname card-title">'.$row['name'] .'</h5>
//                       <p class="card-text">'.$row['description'] .'</p>
//                       <p class=" pprice card-text">Price : '.$row['price'] .'</p>
//                       <p class="card-text">Quantity : '.$row['quantity'] .'</p>
//                       <p class="card-text">Discount : '.$row['discount'] .'</p>
//                       <p class="card-text">Hot : '.$row['hot'] .'</p>
//                       <a href="details.php?id='.$row['id'].'" class="btn btn-outline-primary">Deteils</a>
//                       <a href="javascript:void(0)" class="addToCart btn btn-outline-info" data-id="'.$row['id'].'"><i class="bi bi-cart-check-fill"></i></a>
//                   </div>
//               </div>
//           </div>
//       </div>
//   </div>;

    // echo "<h1>" . $row['name'] . "</h1>";
    // echo "<p>" . $row['description'] . "</p>";
    // echo "<p>" . $row['price'] . "</p>";
    // echo "<p>" . $row['quantity'] . "</p>";
    // echo "<p><img width='60px' src='assets/products/".$row ['images']."'/></p>";
    //  echo "<p>" . $row['discount'] . "</p>";
    //  echo "<p>" . $row['hot'] . "</p>";
     }
     ?>

    <!-- content end   -->
        <!-- footer star  --> 
        <?php include("inc/footer.php") ?>
        <!-- footer end  -->
 
</body>
</html>