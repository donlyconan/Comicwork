let btnDelete;

function setPropertyForDangerModal() {
    let urlRequest = $(this).data('url');
    btnDelete = $(this);
    document.getElementById('id-confirm-delete-record').setAttribute('data-url', urlRequest);
}

function confirmDeleteRecord(event) {
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
                btnDelete.parent().parent().remove();
                /**
                 * toastr: là một thư viện javascript dùng cho việc hiển thị các thông báo một cách độc lập
                 */
                toastr.success('Successfuly, record deleted!!.');
            }
        },
        error: function () {
            toastr.error('Failure, deletion error!!.')
        },
    });


}





$(function () {
    //index.js
    $(document).on('click', '.delete-record', setPropertyForDangerModal);
    $(document).on('click', '.confirm-delete-record', confirmDeleteRecord);
    $('#mytable').DataTable();


    //Select2
    $(".tags_selection").select2({
        tags: true,
        tokenSeparators: [',']
    });

    //Hiển thị tên file được upload
    $('input[type="file"]').change(function(e){
        var fileName = e.target.files[0].name;
        $('.custom-file-label').html(fileName);
    });

    //tinyMCE
    let editor_config = {
        path_absolute : "/",
        selector: "textarea.my-editor",
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
        relative_urls: false,
        file_browser_callback : function(field_name, url, type, win) {
            let x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
            let y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

            let cmsURL = editor_config.path_absolute + 'filemanager?field_name=' + field_name;
            if (type == 'image') {
                cmsURL = cmsURL + "&type=Images";
            } else {
                cmsURL = cmsURL + "&type=Files";
            }

            tinyMCE.activeEditor.windowManager.open({
                file : cmsURL,
                title : 'Filemanager',
                width : x * 0.8,
                height : y * 0.8,
                resizable : "yes",
                close_previous : "no"
            });
        }
    };
    tinymce.init(editor_config);


    // Hiển thị image preview
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }

    $("#imgInp").change(function() {
        readURL(this);
    });

});
