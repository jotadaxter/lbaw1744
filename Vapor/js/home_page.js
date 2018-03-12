document.getElementById("signIn_btn").addEventListener("click", function(){
    document.location.href = '/lbaw1744/login.html';
});
document.getElementById("register_btn").addEventListener("click", function(){
    document.location.href = '/lbaw1744/register.html';
});
document.getElementById("search_btn").addEventListener("click", function(){
    document.location.href = '/lbaw1744/product_search.html';
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
