$(document).ready(function () {
    //  handle click event to show/hide navbar on mobile devices
    $(".sidebar__mobile-control").click(function () {
        $(this).toggleClass("is-open");
        $(this).parent().toggleClass("is-open");
    });
});