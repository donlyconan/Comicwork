let btnDeleteComicwork;

function setPropertyForDangerModal() {
    let urlRequest = $(this).data('url');
    btnDeleteComicwork = $(this);
    document.getElementById('id-confirm-delete-comicwork').setAttribute('data-url', urlRequest);
}

function confirmDeleteComicwork(event) {
    /**
     * event.preventDefault: nhằm mục đích không bị reload lại page khi click
     */
    event.preventDefault();

    let urlRequest = $(this).data('url');

    $.ajax({
        type: 'GET',
        url: urlRequest,
        success: function (data) {
            if (data.code == 200) {
                btnDeleteComicwork.parent().parent().remove();
                /**
                 * toastr: là một thư viện javascript dùng cho việc hiển thị các thông báo một cách độc lập
                 */
                toastr.success('Comicwork record deleted!!.');
            }
        },
        error: function () {
            toastr.error('Comicwork deletion error!!.')
        },
    });


}

function saveStateNav(){
}

$(function () {
    $(document).on('click', '.delete-comicwork', setPropertyForDangerModal);
    $(document).on('click', '.confirm-delete-comicwork', confirmDeleteComicwork);
    // $(document).on('click', '.nav-link', saveStateNav);
    $('#mytable').DataTable();
});


