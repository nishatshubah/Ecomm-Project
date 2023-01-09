<?php 
require("inc/admin_outh.php");
require("inc/header.php");
require("../inc/connection.php");
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
                        <h1 class="mt-4">Category</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Category</li>
                        </ol>
                        <button class="formBtn" id="FormBtn"> + </button>
                    </div>

                    <!-- Category content s-->
                    <div id="container" class="form-container">
        <form action="category/addcat.php" method="post" enctype="multipart/form-data">
            <h3>CETAGORY</h3>

            <input type="text" name="name" required placeholder="category name">

            <input type="file" name="images" required>
           
            <textarea name="description" id="" cols="30" rows="3" placeholder="driscription"></textarea>

            <input type="submit" name="addcategory" value="Add Category" class="form-btn">

        </form>
    </div>
                   <!-- Category content e-->
                   <!-- table  -->
                <div class="Tablecontainer" id="tablecontent">
                    <table class="table" style="border: 1px; width: 100%; margin:0; padding: 0;">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>image</th>
                            <th>Action</th>
                        </tr>
                        <tbody>
                            <?php 
                            $s = "select * from categories where 1";
                            $allp = $conn->query($s);
                            while ($row = $allp->fetch_assoc()) {
                                echo "<tr>
                                <td>".$row['id']."</td>
                                <td>".$row['name']."</td>
                                <td>".$row['description']."</td>
                                <td><img width='60px' src='../assets/categorys/".$row['images']."'/></td>
                                <th><a href='#'><i class='bi bi-pencil-square'></i></a> | <a href='#'><i class='bi bi-trash-fill'></i></a></th>
                            </tr>";
                            }
                            ?>
                            
                        </tbody>
                    </table>
                </div> 
                   <!-- table end -->
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

            });
        </script>
</body>

</html>