<div class="modal fade" id="sale-product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('sales.store') }}" method="post" id="create-salse-form">
            @csrf
            <div class="modal-content">
                <div class="modal-header py-2 bg-primary text-white">
                    <h5 class="modal-title " id="exampleModalLabel">Sale Product</h5>
                    <button class="close text-white" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="form-group mt-2">
                                <label for="product-id">Select Product</label>
                                <select name="product_id" class="form-control" id="product-id">
                                    <option selected disabled>Select Product</option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product['id'] }}"
                                            data-reminder-quantity="{{ $product['remaining_quantity'] }}"
                                            {{ $product['remaining_quantity'] == 0 ? 'disabled' : null }}>
                                            {{ $product['product_name'] }} : {{ $product['remaining_quantity'] }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12 d-none" id="re-parent">
                            <div class="form-group mt-2">
                                <label for="reminder-quantity">Reminder Quantity</label>
                                <input type="text" name="reminder_quantity" id="reminder-quantity"
                                    placeholder="Reminder Quantity" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mt-2">
                                <label for="quantity">Quantity</label>
                                <input type="text" name="quantity" id="quantity" placeholder="Quantity"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mt-2">
                                <label for="price">Price</label>
                                <input type="text" name="price" id="price" placeholder="Price"
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
