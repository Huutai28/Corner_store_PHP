$( document ).ready(function() {
    if (localStorage.getItem("page") === null) {
        $('#content').load('content/home.php');
        $('.app-menu__item').first().addClass("active");
    }else{
        $('#content').load('content/' + localStorage.getItem('page') + '.php');
        $("ul.app-menu li a[href="+ localStorage.getItem("page") + "]").addClass("active");
    }
    $('ul.app-menu li a').click( function() {
        var page = $(this).attr('href');
        localStorage.setItem('page', page);
        $('.app-menu__item').removeClass("active");
        $('#content').load('content/' + page + '.php');
        $(this).addClass("active");
        return false;  
    });
});