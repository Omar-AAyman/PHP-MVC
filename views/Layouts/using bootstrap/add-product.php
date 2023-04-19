<?php
include_once "Layouts/header.php";
?>
<!-- Navbar Part-->
<div class="container p-0">
    <nav class=" navbar py-2 px-4 navbar-expand-lg  my-3 border-bottom
                justify-content-between">
        <a class="navbar-brand  fw-bold fs-2 text-black" href="#">Product Add </a>

        <div class="d-flex justify-content-between">
            <input type="submit" form="product_form" class="btn btn-outline-success px-3 me-3" value="Save">
            <a href="product-list.php" class="btn btn-outline-danger px-4">Cancel</a>
        </div>

    </nav>
</div>
<!-- End Of Navbar Part-->


<!-- Products List Part -->
<div class="container product-list-area border py-3">
    <div class="row justify-content-between p-2">

        <!-- Item Part -->
        <div class="card text-center mx-3 col-11 col-md-5 mb-3 border-0">
            <div class="card-body p-2 lh-sm ">
                <form class="d-flex" id="product_form" method="get" action="AddProduct.php">
                    <div class="col">
                        <div class="mb-3 d-flex align-items-center justify-content-between">
                            <label for="" class="form-label mb-0 fw-bold fs-4">SKU</label>
                            <input type="text" name="" id="sku" class="form-control w-75" placeholder="" aria-describedby="helpId">
                        </div>

                        <div class="mb-3 d-flex align-items-center justify-content-between">
                            <label for="name" class="form-label mb-0 fw-bold fs-4">Name</label>
                            <input type="text" name="" id="name" class="form-control w-75" placeholder="" aria-describedby="helpId">
                        </div>

                        <div class="mb-3 d-flex align-items-center justify-content-between">
                            <label for="" class="form-label mb-0 fw-bold fs-4">Price ($)</label>
                            <input type="number" name="" id="price" class="form-control w-50" placeholder="" aria-describedby="helpId">
                        </div>

                        <div class="d-flex align-items-center mt-5 mb-3 justify-content-between">
                            <label for="productType" class="form-label mb-0 fw-bold fs-4">Type Switcher</label>
                            <select class="form-select w-50" id="productType" aria-label="Default select example">
                                <option selected>Type Switcher</option>
                                <option id="DVD" value="1">DVD</option>
                                <option id="Furniture" value="2">Furniture</option>
                                <option id="Book" value="3">Book</option>
                            </select>
                        </div>


                        <!-- <div class="mb-3 d-flex align-items-center justify-content-between">
                            <label for="" class="form-label mb-0 fw-bold fs-4">Weight (KG)</label>
                            <input type="number" name="" id="weight" class="form-control w-50" placeholder="" aria-describedby="helpId">
                        </div> -->
                    </div>
                </form>
            </div>
        </div>
        <!-- End Of Item Part  -->


    </div>
</div>
<!-- End Of Products List Part -->






<?php
include_once "Layouts/footer.php";
include_once "Layouts/footer-scripts.php";

?>