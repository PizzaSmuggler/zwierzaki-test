$(function(){
    $('.delete').click(function(){
        Swal.fire({
            title: 'Czy na pewno chcesz usunąć ogłoszenie?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Tak, usuń!',
            cancelButtonText: 'Nie, zatrzymaj'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    method: "DELETE",
                    url: "/adverts/" + $(this).data("id")
                })
                    .done(function (data) {
                        window.location.reload();
                    })
                    .fail(function (data) {
                        Swal.fire('Oops...',
                            data.responseJSON.message,
                            data.responseJSON.status);
                    })
            }
        })
    });
});
