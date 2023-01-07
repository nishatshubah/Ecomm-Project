<?php 
require("inc/admin_outh.php");
require("inc/header.php");
require("../inc/connection.php");
?>
</head>

<body class="sb-nav-fixed">
<?php include("inc/nav.php"); ?>

    <div id="layoutSidenav">
        <?php include("inc/sidenav.php") ?>

        <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">User Management</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">users</li>
                        </ol>
                    </div>

                    <!-- Category content s-->
  <!-- table  -->
  <div class="Tablecontainer" id="tablecontent">
                    <table class="table" style="border: 1px; width: 100%; margin:0; padding: 0;">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Admin / User</th>
                            <th>Date / Time</th>
                        </tr>
                        <tbody>
                            <?php 
                            $s = "select * from users where 1";
                            $allp = $conn->query($s);
                            while ($row = $allp->fetch_assoc()) {
                                echo "<tr>
                                <td>".$row['id']."</td>
                                <td>".$row['name']."</td>
                                <td>".$row['email']."</td>
                                <td>".$row['password']."</td>
                                <td>".$row['role']."</td>
                                <td>".$row['created_at']."</td>
                            </tr>";
                            }
                            ?>
                            
                        </tbody>
                    </table>
                </div> 
                   <!-- table end -->
                   <!-- Category content e-->
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
</body>

</html>