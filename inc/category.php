<?php
$q = "select * from categories where 1";
$r = $conn->query($q);
?>
<div class="category">
  <div class="row">
    <div class="col-lg-12 col-md-8">
      <!-- start  -->
      <h1 class="text-center m-3 p-3">category</h1>
      <div class="row mt-3 p-3">
        <?php
        while ($row = $r->fetch_assoc()) {
          ?>

          <div class="col">
            <div class="card">
              <img src="assets/images/category/<?= $row['images'] ?>" class="card-img-top" alt="...">
              <div class="card-body">
                <a href="category.php?cat=<?= $row['id'] ?>">
                  <?= $row['name'] ?>
                </a>
              </div>
            </div>
          </div>

        <?php } ?>


      </div>
    </div>
    <!-- end  -->
  </div>
</div>