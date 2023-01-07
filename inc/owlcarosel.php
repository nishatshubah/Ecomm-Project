<div>
    <h2 class="text-center p-2 mt-4">Hot Item</h2>
</div>
<div id="product-container" class="owl-carousel mt-5">
<?php 
$items = "";
while ($row = $hotitem->fetch_assoc()) {
    $items .= '<div class="card">
    <img src="assets/products/'.$row['images'].'" class="card-img-top img-fluid" alt="...">
    <div class="card-body">
        <p class="card-text"><b class="pname">'.$row['name'].'</b> <br> <span class="pprice">'.$row['price'].'</span> &#2547;</p>
        <a href="details2.php?id='.$row['id'].'" class="btn btn-outline-primary">Deteils</a>
        <a title="add to cart" href="javascript:void(0)" class="addToCart btn btn-outline-info" data-id="'.$row['id'].'"><i class="bi bi-cart-check-fill"></i></a>
    </div>
</div>';
}
echo $items;
?>


            <!-- <div class="card">
                <img src="assets/images/category/category-img-2.jpg" class="card-img-top img-fluid" alt="...">
                <div class="card-body">
                    <p class="card-text"><b>Product Name</b> <br> 5000 Tk only</p>
                </div>
            </div>
            <div class="card">
                <img src="assets/images/category/category-img-3.jpg" class="card-img-top img-fluid" alt="...">
                <div class="card-body">
                    <p class="card-text"><b>Product Name</b> <br> 5000 Tk only</p>
                </div>
            </div>
            <div class="card">
                <img src="assets/images/category/category-img-4.jpg" class="card-img-top img-fluid" alt="...">
                <div class="card-body">
                    <p class="card-text"><b>Product Name</b> <br> 5000 Tk only</p>
                </div>
            </div>
            <div class="card">
                <img src="assets/images/category/category-img-5.jpg" class="card-img-top img-fluid" alt="...">
                <div class="card-body">
                    <p class="card-text"><b>Product Name</b> <br> 5000 Tk only</p>
                </div>
            </div>
            <div class="card"> -->
                <!-- <img src="assets/images/category/category-img-6.jpg" class="card-img-top img-fluid" alt="...">
                <div class="card-body">
                    <p class="card-text"><b>Product Name</b> <br> 5000 Tk only</p>
                </div>
            </div> -->
        </div>