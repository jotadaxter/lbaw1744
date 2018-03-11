document.getElementById("cart").addEventListener("click", function(){
    document.location.href = '/LBAW/Vapor/shopping_cart.php';
});
document.getElementById("signIn_btn").addEventListener("click", function(){
    document.location.href = '/LBAW/Vapor/login_page.php';
});
document.getElementById("register_btn").addEventListener("click", function(){
    document.location.href = '/LBAW/Vapor/register_page.php';
});
document.getElementById("search_btn").addEventListener("click", function(){
    document.location.href = '/LBAW/Vapor/products_page.php';
});


/* Filters the Products shown */
$(document).ready(function(){
    $(".filter-button").click(function(){
        var value = $(this).attr('data-filter');

        if(value == "all"){
            $('.filter').show('1000');
        }
        else{
            $(".filter").not('.'+value).hide('3000');
            $('.filter').filter('.'+value).show('3000');
        }
    });
    if ($(".filter-button").removeClass("active")) {
        $(this).removeClass("active");
    }
    $(this).addClass("active");
});

/* Mobiles Menu */
$(document).ready(function() {
    var sideslider = $('[data-toggle=collapse-side]');
    var sel = sideslider.attr('data-target');
    var sel2 = sideslider.attr('data-target-2');
    sideslider.click(function(event){
        $(sel).toggleClass('in');
        $(sel2).toggleClass('out');
    });
});