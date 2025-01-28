/*
-------------------------------------
|   Get Data for Datatable          |
-------------------------------------
*/
let data = null;
$(document).ready(function () {
    data = $("#sale-table").DataTable({
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
                data: "profit",
                name: "profit",
            },
            {
                data: "created_at",
                name: "created_at",
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
    var reminderQuantity = 0;

    $("#product-id").change(function () {
        var selectedOption = $(this).find("option:selected");
        reminderQuantity = selectedOption.data("reminder-quantity");

        $("#reminder-quantity").val(reminderQuantity);
        $("#re-parent").removeClass("d-none");
        $("#reminder-quantity").prop("disabled", true);
    });

    $.validator.addMethod(
        "lessThanOrEqual",
        function (value, element) {
            return (
                this.optional(element) || parseInt(value) <= reminderQuantity
            );
        },
        "Quantity must be less than or equal to reminder quantity."
    );

    $("#create-salse-form").validate({
        rules: {
            product_id: {
                required: true,
            },
            quantity: {
                required: true,
                number: true,
                lessThanOrEqual: true,
            },
            price: {
                required: true,
                number: true,
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
                success: function (result) {
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
                        title: result.success,
                    });
                    window.location.reload();
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
|           Delete Product          |
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
                url: "/sales/" + id,
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
                    window.location.reload();
                },
            });
        }
    });
}
