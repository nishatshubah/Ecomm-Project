<?php 
require("inc/admin_outh.php");
require("inc/header.php");
require("../inc/connection.php");
$select = "select id,name from categories where 1";
$allcat = $conn->query($select);

?>
<style>
    .formBtn{
        padding:8px;
        width: 100px;
        border: 1px solid #fffcfc;
        border-radius: 6px;
        color:#eee;
        background-color: #1372ffed;
    }
</style>
</head>

<body class="sb-nav-fixed">
<?php include("inc/nav.php"); ?>

    <div id="layoutSidenav">
        <?php include("inc/sidenav.php") ?>

        <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Product</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">product</li>
                        </ol>
                        <button class="formBtn" id="FormBtn"> + </button>
                    </div>

                    <!-- Category content s-->
                    <div id="container" class="form-container">
            <form action="product/add.php" method="post" enctype="multipart/form-data">
            <h3>PRODUCTS</h3> 

            <input type="text" name="sku" required placeholder="enter sku">
            
            <select name="category_id" id="category_id">
            <option value="-1">category id</option>
                <?php
                    while($row = $allcat->fetch_assoc()){
                        echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                    }
                ?>
            </select>

           <select name="subcategory_id" id="subcategory_id">
           <option value="-1">Subcategory id</option>
    
            </select>

            <input type="text" name="name" required placeholder="product name">

            <input type="text" name="price" required placeholder="products price">

            <input type="number" name="quantity" required placeholder="quantity">

            <input type="text" name="discount" required placeholder="discount">

            <select name="hot" id="">
                <option >HotItemm</option>
                <option value="0">no</option>
                <option value="1">yes</option>
            </select>


        <input type="file" name="images" required>

        <textarea id="description" name="description" cols="30" rows="3" placeholder="description..."></textarea>

            <input type="submit" name="addproduct" id="addproduct" value="Add Product" class="form-btn">
            
        </form>
    </div>
                   <!-- Category content e-->
                 <!-- table    -->
                <div class="Tablecontainer" id="tablecontent">
                    <table class="table" style="border: 1px; width: 100%; margin:0; padding: 0;">
                        <tr>
                            <th>ID</th>
                            <th>Sku</th>
                            <th>Category</th>
                            <th>Sub Category</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Images</th>
                            <th>Discount</th>
                            <th>HotItemm</th>
                            <th>Action</th>
                        </tr>
                        <tbody>
                            <?php 
                            $s = "select * from products where 1";
                            $allp = $conn->query($s);
                            while ($row = $allp->fetch_assoc()) {
                                echo "<tr>
                                <td>".$row['id']."</td>
                                <td>".$row['sku']."</td>
                                <td>".$row['category_id']."</td>
                                <td>".$row['subcategory_id']."</td>
                                <td>".$row['name']."</td>
                                <td>".$row['description']."</td>
                                <td>".$row['price']."</td>
                                <td>".$row['quantity']."</td>
                                <td><img width='60px' src='../assets/products/".$row['images']."'/></td>
                                <td>".$row['discount']."</td>
                                <td>".$row['hot']."</td>
                                <th>Edit | Delete</th>
                            </tr>";
                            }
                            ?>
                            
                        </tbody>
                    </table>
                </div> 
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="assets/js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
    <script src="assets/js/jquery-3.6.3.min.js"></script>
    <script>
            $(document).ready(function () {
                $("#container").hide();
                $("#FormBtn").click(function(){
                    $("#container").toggle(400);
                    $("#tablecontent").toggle(400);
                });


                $("#category_id").change(function(){
                    $("#subcategory_id").html("");
                    //alert($(this).val())
                    $.getJSON("ajax/showsubcat.php",{cid:$(this).val()},function(d){
                        console.log(d);
                        if(d.length){
                            showsubcat(d);
                        }
                    })
                });


                function showsubcat(d){
                    let html='<option value="-1">Subcategory id</option>';
                    d.forEach(e => {
                        html += '<option value="'+e.id+'">'+e.name+'</option>';
                    });
                    $("#subcategory_id").html(html);
                }
            });
</script>
</body>

</html>