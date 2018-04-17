document.getElementById("signOut_btn").addEventListener("click", function(){
    document.location.href = '/logout';
});
document.getElementById("search_btn").addEventListener("click", function(){
    document.location.href = '/lbaw1744/product_search.html';
});
document.getElementById("view_profile").addEventListener("click", function(){
    document.location.href = '/lbaw1744/profile.html';
});
document.getElementById("view_profile").addEventListener("click", function(){
    document.location.href = '/lbaw1744/profile.html';
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