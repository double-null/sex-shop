$(document).ready(function(){
    var quantity=0;

    $('.quantity-right-plus').click(function(e){
        e.preventDefault();
        var quantity = parseInt($($(this).data('field')).val());
        $($(this).data('field')).val(quantity + 1);
    });

    $('.quantity-left-minus').click(function(e){
        e.preventDefault();
        var quantity = parseInt($($(this).data('field')).val());
        if(quantity>0){
            $($(this).data('field')).val(quantity - 1);
        }
    });

});