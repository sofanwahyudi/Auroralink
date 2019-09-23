$('body').on('click', '.modal-show', function(event) {
    event.preventDefault();

    var me = $(this),
        url = me.attr('href'),
        title = me.attr('title');

        $('#modal-title').text(title);
        $('#modal-btn-save').text(me.hasClass('edit') ? 'Update' : 'Tambah');

        $.ajax({
            url: url,
            dataType: 'html',
            success: function(response) {
                $('#modal-body').html(response);
            }
        });
        $('#modal').modal('show');
});
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
                text: "Data berhasil di simpan",
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

$('body').on('click', '.btn-delete', function(event) {
    event.preventDefault();


    var me = $(this),
        url = me.attr('href'),
        title = me.attr('title'),
        csrf_token = $('meta[name="csrf-token"]').attr('content');

    swal({
        title: title ,
        text: 'Data akan di hapus, Silahkan koreksi lagi!',
        icon: "warning",
      }).then((result) => {
       if(result.value){
        $.ajax({
            url:url,
            type:"POST",
            data:{
                '_method':'DELETE',
                '_token':csrf_token
            },
            success: function (response) {
                $('#datatable').DataTable().ajax.reload();
                swal("Poof! Your imaginary file has been deleted!", {
                    icon: "success",
                  });
            },
            error: function (xhr) {
                swal ( "Oops" ,  "Something went wrong!" ,  "error" )
            }
        });
       }
      });
});
