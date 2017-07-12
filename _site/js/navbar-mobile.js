$(document).ready(function () {
    $(".sidebar__mobile-control").click(function () {
        $(this).toggleClass("is-open");
        $(this).parent().toggleClass("is-open");
    });
});