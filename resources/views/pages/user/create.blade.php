<div class="modal fade" id="createUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('users.store') }}" method="post" id="create-user-form">
            @csrf
            <div class="modal-content">
                <div class="modal-header py-2 bg-primary text-white">
                    <h5 class="modal-title " id="exampleModalLabel">Add new User</h5>
                    <button class="close text-white" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group mt-2">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" placeholder="Name"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mt-2">
                                <label for="email">Email</label>
                                <input type="text" name="email" id="email" placeholder="Email"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mt-2">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" placeholder="Password"
                                    class="form-control">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group mt-2">
                                <label for="status">Select Status</label>
                                <select name="user_status" class="form-control" id="status">
                                    <option selected disabled>Select Status</option>
                                    <option value="Active">Active</option>
                                    <option value="Disabled">Disabled</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>
