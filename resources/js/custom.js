/* Загрузка фотографии товара */

$(document).on('click','.load-photo',function (e) {
    e.stopPropagation();
    e.preventDefault();
    var productId = $('.load-photo').data('id');
    var data = new FormData();
    data.append(0, $('.add-photo')[0].files[0]);
    data.append(1, $('.add-photo')[1].files[0]);
    data.append(2, $('.add-photo')[2].files[0]);
    data.append('product', productId);

    $.ajax({
        url: '/admin/product_photo/load',
        type: 'POST',
        data: data,
        cache: false,
        dataType: 'json',
        processData: false,
        contentType: false,
        success: function( respond, textStatus, jqXHR ){
            if (respond.status == 1) {
                $('.add-photo').val('');
                $('#product-photos-list').empty();
                $.post('/admin/product_photo', {'product': productId}, function (data){
                    $.each(data, function (){
                        let out = '<div class="col-md-2">';
                        out += '<img class="img-fluid" src="/images/'+this.name+'" />';
                        out += '<a class="custom-link delete-photo" data-id="'+this.id+'" data-product="'+productId+'" href="#">';
                        out += '<i class="nav-icon fas fa-trash"></i>';
                        out += '</a>';
                        out += '<div>';
                        $('#product-photos-list').append(out);
                    });
                }, 'json');
            }
        },
    });
});

/* Удаление фотографии товара */

$(document).on('click', '.delete-photo', function(e){
    var id = $(this).data('id');
    var product = $(this).data('product');
    $.post('/admin/product_photo/delete', {'id': id}, function (){
        $.post('/admin/product_photo', {'product': product}, function (data){
            $('#product-photos-list').empty();
            $.each(data, function (){
                let out = '<div class="col-md-2">';
                out += '<img class="img-fluid" src="/images/'+this.name+'" />';
                out += '<a class="custom-link delete-photo" data-id="'+this.id+'" data-product="'+product+'" href="#">';
                out += '<i class="nav-icon fas fa-trash"></i>';
                out += '</a>';
                out += '<div>';
                $('#product-photos-list').append(out);
            });
        }, 'json');
    }, 'json');
    e.preventDefault();
});

/* Добавление характеристики товару */

$(document).on('click', '.add-param', function (e){
    var product = $(this).data('product');
    $.post('/admin/parameters/list', {'product':product}, function (data){
        var options = '';
        $.each(data, function (){
            options += '<option value="'+this.id+'">'+this.name+'</option>';
        });
        let out = '<div class="form-group row param-item">';
        out += '<div class="col-6">';
        out += '<label>Новый параметр:</label>';
        out += '<select class="form-control" name="NewParam[]">'+options+'</select>';
        out += '</div>';
        out += '<div class="col-5">'
        out += '<label>Новое значение:</label>';
        out += '<input type="text" id="photo" class="form-control" name="NewParamValue[]" value="" />';
        out += '</div>';
        out += '<div class="col-1">';
        out += '<a class="custom-link delete-param" data-fake="1" href="#">';
        out += '<i class="nav-icon fas fa-trash"></i>';
        out += '</a>';
        out += '</div>';
        out += '</div>';
        $('#product-params-list').append(out);
    }, 'json');
    e.preventDefault();
});

// Удаление характеристик товара

$(document).on('click', '.delete-param', function (e) {
    var fake = $(this).data('fake');
    if (!fake) {
        var paramId = $(this).data('id');
        var product = $(this).data('product');
        $.post('/admin/product_parameters/delete',
            {'product':product, 'param':paramId},
            function (){},
            'json'
        );
    }
    $(this).closest('.param-item').remove();
    e.preventDefault();
});
