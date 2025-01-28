/*
-------------------------------------
|   Get Data for Datatable          |
-------------------------------------
*/
let data = null;
$(document).ready(function () {
    data = $("#products-table").DataTable({
        processing: true,
        serverSide: true,
        ajax: purchaseDataUrl,
        columns: [
            {
                data: "id",
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1; 
                },
            },
            {
                data: "product_name",
                name: "product_name",
            },
            {
                data: "quantity",
                name: "quantity",
            },
            {
                data: "price",
                name: "price",
            },
            {
                data: "total",
                name: "total",
            },
            {
                data: "product_status",
                render: function (data) {
                    return `<span class="badge text-white ${
                        data == "Active" ? "bg-success" : "bg-danger"
                    }">${data}</span>`;
                },
            },
            {
                data: "action",
                name: "action",
                orderable: false,
                searchable: false,
            },
        ],
    });
/*
-------------------------------------
|          Form Validation          |
-------------------------------------
*/
    $("#create-purchase-form").validate({
        rules: {
            product_name: {
                required: true,
            },
            storage: {
                required: true,
            },
            color: {
                required: true,
            },
            battery: {
                required: true,
            },
            quantity: {
                required: true,
            },
            price: {
                required: true,
            },
            product_status: {
                required: true,
            },
        },
        submitHandler: function (form) {
            event.preventDefault();
            $("#disabled").removeClass("d-none");
            $("#submit").addClass("d-none");
            var formData = $(form).serialize();

            $.ajax({
                url: $(form).attr("action"),
                type: "POST",
                data: formData,
                success: function (response) {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.onmouseenter = Swal.stopTimer;
                            toast.onmouseleave = Swal.resumeTimer;
                        },
                    });
                    Toast.fire({
                        icon: "success",
                        title: response.success,
                    });
                    form.reset();
                    data.ajax.reload();
                    $("#create-product-modal").modal("hide");

                    $("#disabled").addClass("d-none");
                    $("#submit").removeClass("d-none");
                },
                error: function (xhr) {
                    alert("Error creating purchase: " + xhr.responseText);
                },
            });
        },
    });
});
/*
-------------------------------------
|        Deleteing Product          |
-------------------------------------
*/
function deleteProduct() {
    let id = event.target.closest("button").getAttribute("data-id");

    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "/products/" + id,
                method: "delete",
                data: {
                    _token: csrfToken,
                },
                success: (res) => {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.onmouseenter = Swal.stopTimer;
                            toast.onmouseleave = Swal.resumeTimer;
                        },
                    });
                    Toast.fire({
                        icon: "success",
                        title: res.success,
                    });
                    data.ajax.reload();
                },
            });
        }
    });
}
/*
-------------------------------------
|    Change Product Status          |
-------------------------------------
*/
function changeStatus() {
    let id = event.target.closest("button").getAttribute("data-id");
    console.log(id);
    Swal.fire({
        title: "Are you sure?",
        text: "Want to change the status for this Product!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, change it!",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "/change-product-status",
                method: "POST",
                data: {
                    _token: csrfToken,
                    id: id,
                },
                success: (res) => {
                    data.ajax.reload();
                },
            });
        }
    });
}

/*
-------------------------------------
|   Get Data for Edit Model         |
-------------------------------------
*/
$("#products-table").on("click", ".edit-btn", function () {
    const productId = $(this).data("id");

    $.ajax({
        url: "/edit-product/" + productId,
        type: "GET",
        success: function (response) {
            $("#edit-product-modal").modal("show");
            let opt = `
            <option value="Active" ${
                response.product_status == "Active" ? "selected" : null
            }>Active</option>
            <option value="Disabled" ${
                response.product_status == "Disabled" ? "selected" : null
            }>Disabled</option>
            `;
            $("#edit-product-status").empty().append(opt);
            $("#edit-product-name").val(response.product_name);
            $("#product-id").val(response.id);
            $("#edit-storage").val(response.storage);
            $("#edit-battery").val(response.battery);
            $("#edit-color").val(response.color);
            $("#edit-quantity").val(response.quantity);
            $("#edit-price").val(response.price);
        },
    });
});
/*
-------------------------------------
|   Get Data for Show Modal         |
-------------------------------------
*/
$("#products-table").on("click", ".show-btn", function () {
    const productId = $(this).data("id");

    $.ajax({
        url: "/products/" + productId,
        type: "GET",
        success: function (response) {
            console.log(response);
            $("#show-product-modal").modal("show");
            let opt = `
         <option value="Active" ${
             response.product_status == "Active" ? "selected" : null
         }>Active</option>
         <option value="Disabled" ${
             response.product_status == "Disabled" ? "selected" : null
         }>Disabled</option>
         `;
            $("#show-product-status").empty().append(opt);
            $("#show-product-name").val(response.product_name);
            $("#product-id").val(response.id);
            $("#show-storage").val(response.storage);
            $("#show-battery").val(response.battery);
            $("#show-color").val(response.color);
            $("#show-quantity").val(response.quantity);
            $("#show-price").val(response.price);
        },
    });
});
/*
-------------------------------------
|      Save Product Chanes          |
-------------------------------------
*/
$("#edit-purchase-form").on("submit", function (event) {
    event.preventDefault();

    $("#edit-disabled").removeClass("d-none");
    $("#edit-submit").addClass("d-none");
    const id = $("#product-id").val();
    const formData = $(this).serialize();

    $.ajax({
        url: "/products/" + id,
        type: "POST",
        data: formData,
        success: function (response) {
            console.log(response);
            $("#edit-product-modal").modal("hide");
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                },
            });
            Toast.fire({
                icon: "success",
                title: response.success,
            });
            data.ajax.reload();

            $("#edit-disabled").addClass("d-none");
            $("#edit-submit").removeClass("d-none");
        },
        error: function (xhr) {
            alert("Error: " + xhr.responseText); // Handle errors
        },
    });
});
