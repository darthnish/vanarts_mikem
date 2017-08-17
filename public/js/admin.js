//  function for delete confirmation
function confirmDelete() {
    return confirm("Are you sure?");
}

$(function () {
    //  bootstrap tooltip initialization
    $('[data-toggle="tooltip"]').tooltip();

    //  trigger event when user change image in the news page
    $('#select-image').change(function () {
        console.log('hi');
        $('.news-one__image').attr('src', '/img/uploads/' + $('#select-image option:selected').text());
    });
});
