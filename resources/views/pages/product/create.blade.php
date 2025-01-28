<div class="modal fade" id="create-product-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('products.store') }}" method="post" id="create-purchase-form">
            @csrf
            <div class="modal-content">
                <div class="modal-header p-2 bg-primary text-white">
                    <h5 class="modal-title " id="exampleModalLabel">Purchase Product</h5>
                    <button class="close text-white" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 ">
                            <div class="form-group mt-2">
                                <label for="product">Product</label>
                                <input type="text" name="product_name" id="product" placeholder="Product"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="form-group mt-2">
                                <label for="status">Product Status</label>
                                <select name="product_status" class="form-control" id="status">
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
                                <input type="text" name="storage" id="create-storage" placeholder="Storage"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4 ">
                            <div class="form-group mt-2">
                                <label for="color">Color</label>
                                <input type="text" name="color" id="create-color" placeholder="Color"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4 ">
                            <div class="form-group mt-2">
                                <label for="battery">Battery</label>
                                <input type="text" name="battery" id="create-battery" placeholder="Battery"
                                    class="form-control">
                            </div>
                        </div>
                        <hr>
                        <div class="col-md-6 ">
                            <div class="form-group mt-2">
                                <label for="quantity">Quantity</label>
                                <input type="number" name="quantity" id="create-quantity" placeholder="Quantity"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="form-group mt-2">
                                <label for="price">Price</label>
                                <input type="number" name="price" id="create-price" placeholder="Price"
                                    class="form-control">
                            </div>
                        </div>


                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" id="submit">Save</button>
                    <button class="btn btn-primary d-none" id="disabled" type="button" disabled>
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Loading...
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
