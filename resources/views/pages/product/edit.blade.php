<div class="modal fade" id="edit-product-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('purchase.store') }}" method="post" id="edit-purchase-form">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header  p-2 bg-primary text-white">
                    <h5 class="modal-title " id="exampleModalLabel">Update Purchase</h5>
                    <button class="close text-white" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <input type="hidden" id="product-id" name="product_id">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 ">
                            <div class="form-group mt-2">
                                <label for="product">Product</label>
                                <input type="text" name="product_name" id="edit-product-name" placeholder="Product"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="form-group mt-2">
                                <label for="status">Product Status</label>
                                <select name="product_status" class="form-control" id="edit-product-status">

                                </select>
                            </div>
                        </div>
                        <hr>
                        <div class="col-md-4 ">
                            <div class="form-group mt-2">
                                <label for="storage">Storage</label>
                                <input type="text" name="storage" id="edit-storage" placeholder="Storage"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4 ">
                            <div class="form-group mt-2">
                                <label for="color">Color</label>
                                <input type="text" name="color" id="edit-color" placeholder="Color"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4 ">
                            <div class="form-group mt-2">
                                <label for="battery">Battery</label>
                                <input type="text" name="battery" id="edit-battery" placeholder="Battery"
                                    class="form-control">
                            </div>
                        </div>
                        <hr>
                        <div class="col-md-6 ">
                            <div class="form-group mt-2">
                                <label for="quantity">Quantity</label>
                                <input type="number" name="quantity" id="edit-quantity" placeholder="Quantity"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="form-group mt-2">
                                <label for="price">Price</label>
                                <input type="number" name="price" id="edit-price" placeholder="Price"
                                    class="form-control">
                            </div>
                        </div>


                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" id="edit-submit">Save</button>
                    <button class="btn btn-primary d-none" id="edit-disabled" type="button" disabled>
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Loading...
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
