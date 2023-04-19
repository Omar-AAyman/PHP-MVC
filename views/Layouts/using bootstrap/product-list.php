<?php
include_once "Layouts/header.php";
?>
<!-- Navbar Part-->
<div class="container p-0">
    <nav class=" navbar py-2 px-4 navbar-expand-lg  my-3 border-bottom
                justify-content-between">
        <a class="navbar-brand fw-bold fs-2 text-black" href="#">Product List</a>


        <div class="d-flex justify-content-between">
            <a href="add-product.php" class="btn btn-outline-primary px-3 me-3">Add</a>
            <button class="btn btn-outline-danger px-4" id="form-submit" type="submit">Mass Delete</button>
        </div>

    </nav>
</div>
<!-- End Of Navbar Part-->


<!-- Products List Part -->
<div class="container product-list-area border py-3 ">
    <div class="row justify-content-between p-2">

        <!-- Item Part -->
        <div class="card text-center mx-3 col-11 col-md-4 col-lg-2
                    mb-3">
            <div class="card-body p-3 lh-1 ">
                <div class="form-check ms-0">
                    <input class="form-check-input " type="checkbox" value="" id="flexCheckDefault">
                </div>
                <p class="card-title fw-bold">SKU
                </p>
                <p class="card-text">Item Name
                </p>
                <p class="card-text">Price
                </p>
                <p class="card-text ">Size || Weight
                </p>
            </div>
        </div>
        <!-- End Of Item Part  -->



    </div>
</div>
<!-- End Of Products List Part -->





<?php
include_once "Layouts/footer.php";
include_once "Layouts/footer-scripts.php";
// <!-- <?=getSKU()  -->
// <!-- getItemName()-->
// <!-- getPrice() -->
// <!-- getSize()-->

?>