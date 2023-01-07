<?php
require("inc/connection.php");
?>
<?php
if(isset($_GET['cat'])){
    $id = $_GET['cat'];
}
else{
    exit;
}
?>
<?php include("inc/header.php");?>

<style>
        .card-img-top {
            width: 100%;
            height: 15vw;
            object-fit: cover;
        }
    </style>
</head>
<body>
  <div class="container">
        <!-- navbar start -->
        <?php include("inc/nevbar.php");?>
        <!-- navbar end -->
 
     <!-- content start   -->
     <div class="row">
            <?php
            $pq = "select products.*,categories.name as catname from products,categories where hot='1' and category_id='" . $id . "' and products.category_id=categories.id order by products.created_at desc";
            $pqr = $conn->query($pq);
            $p = "";
            $catname = "";
            while ($row = $pqr->fetch_assoc()) {
                $catname = $row['catname'];
                $p .= '<div class="card mt-2 col-md-3 d-flex align-items-stretch"><img src="assets/products/' . $row['images'] . '" class="card-img-top" alt="..."><div class="card-body"><a href="details2.php?id=' . $row["id"] . '"><h5 class="pname">' . $row['name'] . '</h5></a><!--p class="card-text">' . $row['description'] . '</p--><p>' . $row['price'] . '</p><p><a class="addCartBtn" data-pid="' . $row['id'] . '" data-pprice="' . $row['price'] . '" href="javascript:void(0)"><i class="bi bi-bag"></i></a></p></div></div>';
            }
            echo "<h2>Category: " . $catname . "</h2>" . $p;
            ?>
        </div>

    <!-- content end   -->
        <!-- footer star  --> 
        <?php include("inc/footer.php") ?>
        <!-- footer end  -->
        <script>
            $(document).ready(function () {
                const cart = new Cart();
                $("#bcart").html(cart.totalItems());
                $(".addCartBtn").click(function () {
                    $t = $(this);
                    let pid = $t.data("pid");
                    let pprice = $t.data("pprice");
                    let name = $t.parent().parent().find('.pname').html();
                    let img = $t.parent().parent().parent().find('.card-img-top').attr('src');
                    //    alert(img)
                    //    alert(name);
                    //    alert(pid + ": " + pprice);
                    cart.addItem({ name: name, price: pprice, id: pid, image: img });
                    $("#cartLenght").html(cart.totalItems());
                    // console.log(cart.totalItems());
                    alert("Product " + name + " has been added to cart");
                });
            });
        </script>
</body>
</html>