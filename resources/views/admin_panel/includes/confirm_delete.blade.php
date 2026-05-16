<script>
    function confirmDelete(e, route) {
        e.preventDefault();

        Swal.fire({
            title: 'Are you sure?',
            text: "Do you want to delete this item!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = route;
            }
        });
    }
</script>
