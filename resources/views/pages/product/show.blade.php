<div class="modal fade" id="show-product-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('products.store') }}" method="post" id="show-purchase-form">
            @csrf
            <div class="modal-content">
                <div class="modal-header p-2 bg-primary text-white">
                    <h5 class="modal-title " id="exampleModalLabel">Product Details</h5>
                    <button class="close text-white" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 ">
                            <div class="form-group mt-2">
                                <label for="product">Product</label>
                                <input type="text" name="product_name" disabled id="show-product-name"
                                    placeholder="Product" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="form-group mt-2">
                                <label for="status">Product Status</label>
                                <select name="product_status" class="form-control" disabled id="show-product-status">
                                    <option selected disabled>Select Status</option>
                                    <option value="Active">Active</option>
                                    <option value="Disabled">Disabled</option>
                                </select>
                            </div>
                        </div>
                        <hr>
                        <div class="col-md-4 ">
                            <div class="form-group mt-2">
                                <label for="storage">Storage</label>
                                <input type="text" name="storage" disabled id="show-storage" placeholder="Storage"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4 ">
                            <div class="form-group mt-2">
                                <label for="color">Color</label>
                                <input type="text" name="color" disabled id="show-color" placeholder="Color"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4 ">
                            <div class="form-group mt-2">
                                <label for="battery">Battery</label>
                                <input type="text" name="battery" disabled id="show-battery" placeholder="Battery"
                                    class="form-control">
                            </div>
                        </div>
                        <hr>
                        <div class="col-md-6 ">
                            <div class="form-group mt-2">
                                <label for="quantity">Quantity</label>
                                <input type="number" name="quantity" disabled id="show-quantity" placeholder="Quantity"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="form-group mt-2">
                                <label for="price">Price</label>
                                <input type="number" name="price" disabled id="show-price" placeholder="Price"
                                    class="form-control">
                            </div>
                        </div>


                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

                </div>
            </div>
        </form>
    </div>
</div>
