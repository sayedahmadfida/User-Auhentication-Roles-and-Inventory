$(document).ready(function () {
    $("#create-user-form").validate({
        rules: {
            name: {
                required: true,
            },
            email: {
                required: true,
                email: true,
            },
            password: {
                required: true,
            },
            user_status: {
                required: true,
            },
        },
    });
});

function changeStatus(event) {
    let id = event.target.closest("a").getAttribute("data-id");
    Swal.fire({
        title: "Are you sure?",
        text: "Want to change the status for this user!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, change it!",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "/change-status",
                method: "POST",
                data: {
                    _token: csrfToken,
                    id: id,
                },
                success: res =>{
                 window.location.reload();
                }
            });
        }
    });
}
