
    function confirmDelete(form) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit(); // Submits the form if the user confirms
            }
        });
}
document.addEventListener('DOMContentLoaded', function() {
    const toggleButton = document.querySelector('.toggle-sidebar-btn');
    const body = document.getElementsByTagName('body')[0]; // Access the first element
    toggleButton.addEventListener('click', function() {
        body.classList.toggle('sidebar-hidden'); // Remove the dot prefix
    });
});
