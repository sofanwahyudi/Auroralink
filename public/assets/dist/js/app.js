//AJAX CREATE
$('body').on('click', '.modal-show', function(event) {
    event.preventDefault();

    var me = $(this),
        url = me.attr('href'),
        title = me.attr('title');

        $('#modal-title').text(title);
        $('#modal-btn-save').removeClass('hide').text(me.hasClass('edit') ? 'Update' : 'Tambah');

        $.ajax({
            url: url,
            dataType: 'html',
            success: function(response) {
                $('#modal-body').html(response);
                $('#image').html(data.image);
                $('#datatable').DataTable().ajax.reload();
            }
        });
        $('#modal').modal('show');
});

//AJAX UPDATE
$('#modal-btn-save').click(function (event) {
    event.preventDefault();

    var form = $('#modal-body form'),
        url = form.attr('action'),
        method = $('input[name=_method]').val() == undefined ? 'POST' : 'PUT';

    form.find('.help-block').remove();
    form.find('.form-group').removeClass('has-error');

    $.ajax({
        url : url,
        method : method,
        data : form.serialize(),
        success: function (response) {
            form.trigger('reset');
            $('#modal').modal('hide');
            $('#datatable').DataTable().ajax.reload();

            swal({
                title: "Berhasil!",
                text: "Data berhasil di Update",
                icon: "success",
                button: "Tutup",
              });
        },
        error : function (xhr) {
            var res = xhr.responseJSON;
            if($.isEmptyObject(res) == false){
                $.each(res.errors, function (key, value) {
                    $('#' + key)
                    .closest('.form-group')
                    .addClass('has-error')
                    .append('<span class="help-block"><strong>' + value + '</strong>')

                });
            }
        }
    })
});


//AJAX DELETE
// $('body').on('click', '.btn-delete', function (event) {
//     event.preventDefault();

//     var me = $(this),
//         url = me.attr('href'),
//         title = me.attr('title'),
//         csrf_token = $('meta[name="csrf-token"]').attr('content');

//     swal({
//         title: 'Are you sure want to delete ' + title + ' ?',
//         text: 'You won\'t be able to revert this!',
//         buttons: true,
//         icon: 'warning',
//     }).then((result) => {
//         if (result.value) {
//             $.ajax({
//                 url: url,
//                 type: "POST",
//                 data: {
//                     '_method': 'DELETE',
//                     '_token': csrf_token
//                 },
//                 success: function (response) {
//                     $('#datatable').DataTable().ajax.reload();
//                     swal({
//                         type: 'success',
//                         title: 'Success!',
//                         text: 'Data has been deleted!'
//                     });
//                 },
//                 error: function (xhr) {
//                     swal({
//                         type: 'error',
//                         title: 'Oops...',
//                         text: 'Something went wrong!'
//                     });
//                 }
//             });
//         }
//     });
// });

    //Fungsi Delete
    $('body').on('click', '.btn-delete', function (event){
        event.preventDefault();

        var me = $(this),
        url = me.attr('href'),
        title = me.attr('title'),
        csrf_token = $('meta[name="csrf-token"]').attr('content');


        if (confirm("Apa Anda Yakin ???")) {
            $.ajax({
                url: url,
                type: "POST",
                data: {
                    '_method': 'DELETE',
                    '_token': csrf_token
                },
                success:function(data){
                        swal({
                        type: 'success',
                        title: 'Berhasil !',
                        text: 'Data berhasil di hapus   !'
                    });
                    $('#datatable').DataTable().ajax.reload();
                }
            })
        } else {
            return false;
        }
    });

//AJAX SHOW
$('body').on('click', '.btn-show ', function (event) {
    event.preventDefault();

    var me = $(this),
        url = me.attr('href'),
        title = me.attr('title');

    $('#modal-title').text(title);
    $('#modal-btn-save').addClass('hide');

    $.ajax({
        url: url,
        dataType: 'html',
        success: function (response) {
            $('#modal-body').html(response);
        }
    });

    $('#modal').modal('show');
});
