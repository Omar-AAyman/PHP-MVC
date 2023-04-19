<!-- Navbar Part  -->
<section id="sec-1">
    <div class="container">
        <article>
            <h1>{{title}}</h1>
            <div class="buttons">
                <button  id="save-btn" >Save</button>
                <a href="/products-list" id="cancel-btn">Cancel</a>
            </div>
        </article>
    </div>
</section>
<!-- Navbar Part  -->


<!-- Products List Part -->
<section id="sec2-addProduct">
    <div class="container">
<div id="show">

</div>
        <!-- Item Part -->
        <form  id="product_form" method="POST" action="">
            <div class="my-2">
                <label for="sku" class="form-label">SKU</label>
                <input type="text" name="sku" id="sku" value="<?= $model->sku ?>" class="form-control <?= $model->hasError('sku') ? 'is-invalid' : '' ?>">
                <div class="invalid-feedback sku_error">
                </div>
            </div>

            <div class="my-2">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" value="<?= $model->name ?>" class="form-control <?= $model->hasError('name') ? 'is-invalid' : '' ?>">
                <div class="invalid-feedback name_error">
                </div>
            </div>
            <div class="my-2">
                <label for="price" class="form-label">Price ($)</label>
                <input type="number" name="price" id="price" value="<?= $model->price ?>" class="form-control  <?= $model->hasError('price') ? 'is-invalid' : '' ?>">
                <div class="invalid-feedback price_error">
                </div>
            </div>
            <div class="my-3">
                <label for="productType" class="form-label">Type Switcher</label>
                <select name="productType" id="productType" class="form-select <?= $model->hasError('productType') ? 'is-invalid' : '' ?>">
                    <option value="">Select Type</option>
                    <option value="dvd">DVD-disc</option>
                    <option value="furniture">Furniture</option>
                    <option value="book">Book</option>
                </select>
                <div class="invalid-feedback productType_error">
                </div>
            </div>

            <!-- DVD Form -->
            <div class="DVD-form my-3 d-none" id="dvd-inputs">
                <div>
                    <label for="size" class="form-label">Size (MB)</label>
                    <input type="number" name="size" id="size" value="<?= $model->size ?>" class="form-control <?= $model->hasError('size') ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback size_error ">
                        <?= $model->getFirstError('size') ?>
                    </div>
                </div>

                <p class="mt-2">please enter DVD's size with MB.</p>
            </div>
            <!-- End OF DVD Form -->

            <!-- Furniture Form -->
            <div class="furniture-form my-3 d-none" id="furniture-inputs">
                <div class="row">
                    <div class="col-4">
                        <label for="height" class="form-label">Height (CM)</label>
                        <input type="number" name="height" id="height" class="form-control <?= $model->hasError('height') ? 'is-invalid' : '' ?>">
                        <div class="invalid-feedback height_error">
                            <?= $model->getFirstError('height') ?>
                        </div>
                    </div>
                    <div class="col-4">
                        <label for="width" class="form-label">Width (CM)</label>
                        <input type="number" name="width" id="width" class="form-control <?= $model->hasError('width') ? 'is-invalid' : '' ?>">
                        <div class="invalid-feedback width_error">
                            <?= $model->getFirstError('width') ?>
                        </div>
                    </div>
                    <div class="col-4">
                        <label for="length" class="form-label">Length (CM)</label>
                        <input type="number" name="length" id="length" class="form-control <?= $model->hasError('length') ? 'is-invalid' : '' ?>">
                        <div class="invalid-feedback length_error">
                            <?= $model->getFirstError('length') ?>
                        </div>
                    </div>
                    <p class="mt-2">please enter furniture's Dimensions with CM.</p>
                </div>
            </div>
            <!-- End of Furniture Form -->

            <!-- Book Form -->
            <div class="book-form my-3 d-none" id="book-inputs">
                <div>
                    <label for="weight" class="form-label">Weight (KG)</label>
                    <input type="number" name="weight" id="weight" class="form-control <?= $model->hasError('weight') ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback weight_error">
                        <?= $model->getFirstError('weight') ?>
                    </div>
                </div>
                <p class="mt-2">please enter book's weight with KG</p>
            </div>
            <!-- End of Book Form -->
        </form>
        <!-- End OF Item Part -->

    </div>



    </div>
</section>

<footer>
        {{footer}}
    </footer>