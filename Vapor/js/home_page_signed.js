document.getElementById("bell").addEventListener("click", function(){
    document.location.href = '/LBAW/Vapor/notifications.php';
});
document.getElementById("signOut_btn").addEventListener("click", function(){
    document.location.href = '/LBAW/Vapor/home_page.php';
});
document.getElementById("search_btn").addEventListener("click", function(){
    document.location.href = '/LBAW/Vapor/products_page.php';
});

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