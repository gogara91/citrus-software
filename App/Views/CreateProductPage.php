<?php
namespace App\Views;

require_once 'View.php';

class CreateProductPage extends View {

    public function __construct()
    {
        parent::__construct();
    }

    public function html()
    {
        $this->builder->includeAdminSidebar();
        $this->builder->setScript('/js/product.js');
        $this->builder->startPage();
        ?>
        <div class="row mt-3">
            <div class="col-md-12">
                <h3>Create new product</h3>
                <hr/>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>Title</label>
                    <input
                        class="form-control"
                        id="title"
                        placeholder="Type in product title"
                    >
                    <p class="text-danger d-none" id="title_error"></p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Image</label>
                    <input
                        class="form-control"
                        id="image"
                        placeholder="Url of the image..."
                    >
                    <p class="text-danger d-none" id="image_error"></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label>Description</label>
                    <textarea
                        class="form-control"
                        id="description"
                        rows="10"
                        placeholder="Type in the description of the product..."
                    ></textarea>
                    <p class="text-danger d-none" id="description_error"></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 text-right">
                <button
                    type="button"
                    class="btn btn-primary"
                    onclick="createProduct()"
                >Save</button>
            </div>
        </div>
        <?php
        $this->builder->endPage();
    }

}