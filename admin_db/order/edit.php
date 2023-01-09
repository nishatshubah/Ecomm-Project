<?php
require("../inc/admin_outh.php");
require("../../inc/connection.php");
$select = "select id,name from categories where 1";
$allcat = $conn->query($select);

// update 
if (isset($_POST['updateproduct'])) {
    $id = $_POST['id'];
    $sku = $_POST['sku'];
    $cid = $_POST['category_id'];
    $scid = $_POST['subcategory_id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $q = $_POST['quantity'];
    $d = $_POST['discount'];
    $hot = $_POST['hot'];

    $update = "UPDATE `products` SET `category_id`='" . $cid . "',`subcategory_id`='" . $scid . "',`name`='" . $name . "',`description`='" . $description . "',`sku`='" . $sku . "',`price`='" . $price . "',`quantity`='" . $q . "',`discount`='" . $d . "',`hot`='" . $hot . "' WHERE id='" . $id . "'";
    $conn->query($update);
    if ($conn->affected_rows) {
        header("location: ../products.php");
    }
}


// select 
$p = "select * from products where id='".$_GET['id']."' limit 1";
$r = $conn->query($p);
$p = $r->fetch_assoc();

?>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="../assets/css/dashbordstyles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/formstyle.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
<style>
    .formBtn {
        padding: 8px;
        width: 100px;
        border: 1px solid #fffcfc;
        border-radius: 6px;
        color: #eee;
        background-color: #1372ffed;
    }
</style>
</head>

<body class="sb-nav-fixed">

    <div id="layoutSidenav">
        

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Edit Product</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">product</li>
                    </ol>
                </div>

                <!-- Category content s-->
                <div id="container" class="form-container">
                    <form action="" method="post" enctype="multipart/form-data">
                        <h3>PRODUCTS</h3>
                        <input type="hidden" name="id" value="<?=$p['id'] ?>">

                        <select name="category_id" id="category_id">
                            <option value="-1">category id</option>
                            <?php
                            while ($row = $allcat->fetch_assoc()) {
                                echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                            }
                            ?>
                        </select>

                        <select name="subcategory_id" id="subcategory_id">
                            <option value="-1">Subcategory id</option>

                        </select>

                        <input type="text" name="name" required placeholder="product name" value="<?=$p['name'] ?>">
                        

                        <input type="text" name="sku" required placeholder="enter sku" value="<?=$p['sku'] ?>">

                        <input type="text" name="price" required placeholder="products price" value="<?=$p['price'] ?>">

                        <input type="number" name="quantity" required placeholder="quantity" value="<?=$p['quantity'] ?>">

                        <input type="text" name="discount" required placeholder="discount" value="<?=$p['discount'] ?>">

                        <select name="hot" id="">
                            <option>HotItemm</option>
                            <option value="0"  <?= $p['hot']=="0"?"selected":"" ?>>no</option>
                            <option value="1" <?= $p['hot']=="1"?"selected":"" ?>>yes</option>
                        </select>


                        <!-- <input type="file" name="images" required value="<?=$p['name'] ?>"><br> -->

                        <textarea id="description" name="description" cols="30" rows="3"><?=$p['description'] ?></textarea>

                        <input type="submit" name="updateproduct" class="form-btn" value="Update">

                    </form>
                </div>
                <!-- Category content e-->
                <!-- table    -->
                
                <!-- table end   -->
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2022</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="../assets/js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="../js/datatables-simple-demo.js"></script>
    <script src="../assets/js/jquery-3.6.3.min.js"></script>
    <script>
        $("#category_id").change(function () {
                $("#subcategory_id").html("");
                //alert($(this).val())
                $.getJSON("../ajax/showsubcat.php", { cid: $(this).val() }, function (d) {
                    console.log(d);
                    if (d.length) {
                        showsubcat(d);
                    }
                })
            });


            function showsubcat(d) {
                let html = '<option value="-1">Subcategory id</option>';
                d.forEach(e => {
                    html += '<option value="' + e.id + '">' + e.name + '</option>';
                });
                $("#subcategory_id").html(html);
            }
    </script>
</body>

</html>