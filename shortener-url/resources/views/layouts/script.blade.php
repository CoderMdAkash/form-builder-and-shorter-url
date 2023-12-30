@if(session('success'))
    <script>
        $(document).ready(function() {
            Toastify({
                text: '{{session('success')}}',
                duration: 3000,
                close: true,
                gravity: "top", // `top` or `bottom`
                position: "right", // `left`, `center` or `right`
                stopOnFocus: true, // Prevents dismissing of toast on hover
                style: {
                    background: "linear-gradient(to right, #00b09b, #96c93d)",
                },
                onClick: function(){} // Callback after click
            }).showToast();
        });
    </script>
@endif

@if(session('error'))
    <script>
        $(document).ready(function() {
            Toastify({
                text: '{{session('error')}}',
                duration: 3000,
                close: true,
                gravity: "top", // `top` or `bottom`
                position: "right", // `left`, `center` or `right`
                stopOnFocus: true, // Prevents dismissing of toast on hover
                style: {
                    background: "linear-gradient(to right, #ff5f6d, #ffc371)",
                },
                onClick: function(){} // Callback after click
            }).showToast();
        });
    </script>
@endif



<script>

    $(document).ready(function() {
        $('.delete-item-btn').on('click', function(e) {
            e.preventDefault();

            const deleteRoute = $(this).data('delete-route');

            Swal.fire({
                title: 'Are you sure?',
                text: 'This action can not be undone!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Delete',
                cancelButtonText: 'Cancel',
                confirmButtonColor: '#d33',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: 'Deleting item...',
                        text: 'Please wait while we are deleting the item!',
                        showConfirmButton: false,
                        allowOutsideClick: false,
                        willOpen: () => {
                            Swal.showLoading();
                        }
                    });

                    $.ajax({
                        url: deleteRoute,
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            Swal.fire({
                                title: 'Deleted successfully!',
                                icon: 'success',
                                showConfirmButton: false,
                                timer: 1000
                            }).then(() => {
                                location.reload();
                            });
                        },
                        error: function(error) {
                            Swal.fire({
                                title: 'Error processing!',
                                text: 'Please try again!',
                                icon: 'error'
                            });
                        }
                    });
                }
            });
        });
    });
</script>