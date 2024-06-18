document.addEventListener("DOMContentLoaded", function() {
    const sidebar = document.querySelector(".sidebar");
    const closeBtn = document.querySelector("#btn");

    closeBtn.addEventListener("click", function() {
        sidebar.classList.toggle("active");
    });
});

$(document).ready(function() {
    var deleteUrl;

    // Menggunakan class .hapus untuk memilih tombol
    $('.hapus').on('click', function() {
        deleteUrl = $(this).data('delete-url');
        console.log('Delete URL set to: ' + deleteUrl);
    });

    $('#deleteButton').on('click', function() {
        if(deleteUrl) {
            console.log('Sending DELETE request to: ' + deleteUrl);
            $.ajax({
                url: deleteUrl,
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    console.log('Delete successful:', response);
                    // Tutup modal
                    $('#deleteModal').modal('hide');
                    // Refresh page
                    location.reload();
                },
                error: function(xhr) {
                    console.error('Error occurred while deleting:', xhr);
                    alert('Terjadi kesalahan saat menghapus data anggota. Status: ' + xhr.status + ' - ' + xhr.statusText);
                }                
            });
        } else {
            console.error('Delete URL is not set.');
        }
    });

    $('#deleteModal').on('hidden.bs.modal', function() {
        deleteUrl = null;
        console.log('Modal closed. Delete URL reset.');
    });
});
