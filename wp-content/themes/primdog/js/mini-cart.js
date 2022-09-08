jQuery(document).ready(function ($){
    $('.cart__btn').click(function(){
        $('.mini__cart').addClass('open')
    })
    $('#miniCartBtnClose').click(function(){
        $('.mini__cart').removeClass('open')
    })
})