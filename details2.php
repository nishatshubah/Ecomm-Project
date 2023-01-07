<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    exit;
}
require("inc/connection.php");
$selectQ = "select * from products where id='" . $id . "' limit 1";
$prod = $conn->query($selectQ);
if ($prod->num_rows != 1) {
    $message = "Product not found";
    exit;
}
$d = $prod->fetch_assoc();
// var_dump($d);
?>
<?php include("inc/header.php");?>

    <style>
        .member{
            position: relative;
            border: 1px solid rgba(163, 68, 68, 0.79);
            padding: 30px;
            box-shadow: 0px 2px 15px rgba(0,0,0,0.1);
            border-radius: 5px;
            background: #fff;
        }
        .teampic img{
            overflow: hidden;
            width: 500px;
            height: auto;
            border-radius: 5px;
        }
        .member-info{
            margin-left: 40px;
        }
        .btn1{
            margin:5px ;
            padding: 6px 20px;
            border: 1px solid rgb(187 187 188);
            color: #fff;
            background: rgb(33 59 88 / 53%);
        }
        input[type="number"]{
            padding: 6px 0px;
            width: 50px;
            margin:5px ;
        }
       
        
    </style>
</head>
<body>
<div class="container">
        <!-- navbar start -->
        <?php include("inc/nevbar.php");?>
        <!-- navbar end -->
        <!-- content start   -->
  <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-md-6 mt-4">
                    <div class="member d-flex justify-content-start">
                        <div class="teampic">
                        <img src="assets/products/<?= $d['images'] ?>" class="card-img-top img-fluid">
                        </div>
                        <div class="member-info">
                            <p class="product-category mb-0">Category : <?= $d['category_id'] ?></p>
                            <h5 class="pname card-text fw-bold"><?= $d['name'] ?></h5>
                           <hr>
                           <p class="card-text"><br> <span class="pprice"><?= $d['price'] ?></span> &#2547;</p>
                           <label for="">Quatity </label>
                           <input type="number" placeholder="1">
                           <input class="addToCart btn1" data-id='.$row['id'].' type="submit" value="Add to cart">
                           <input class="btn1" type="submit" value="Add to Wishlist">
                           <hr>
                           <h6>About</h6>
                           <p class="product-description mb-4">
                                <?= $d['description'] ?>
                            </p>
                           <hr>
                           <p class="product-title mt-4 mb-1">Share this product</p>
                            <ul class="social-list">
                                <li><a href="#"><i class="fa-brands fa-facebook"></a></i></li>
                                <li><a href="#"><i class="fa-brands fa-twitter"></a></i></li>
                                <li><a href="#"><i class="fa-brands fa-square-instagram"></a></i></li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


<!-- content end   -->
   <!-- footer star  --> 
   <?php include("inc/footer.php") ?>
   <!-- footer end  -->

</body>
</html>