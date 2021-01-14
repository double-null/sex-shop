$('.add-to-cart').click(function(e){
    e.preventDefault();
    var product = $(this).data('product');
    var quantity = $('#quantity').val();
    if (quantity == 'undefined') quantity = 1;
    $.post('/shop/add_to_cart', {'product':product, 'quantity':quantity}, function (data){
        $('#products-in-cart').text();
        $('#products-in-cart').text(data['cartSize']);
        if (data['action'] == 1) {
            var cartActionLabel = 'Добавить в корзину';
        } else {
            var cartActionLabel = 'Удалить из корзины';
        }
        $('#product-'+data['product']+' .cart-action').text(cartActionLabel);
    }, 'json');
});

$('.remove-from-cart').click(function(e){
    e.preventDefault();
    var product = $(this).data('product');
    $.post('/shop/remove_from_cart', {'product':product}, function (data){
        $('#products-in-cart').text();
        $('#products-in-cart').text(data['cartSize']);
    }, 'json');
    $(this).closest('.product-item').remove();
});