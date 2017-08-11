function confirmDelete() {
    return confirm("Are you sure?");
}

$(function () {
    $('[data-toggle="tooltip"]').tooltip();

    $('#select-image').change(function () {
        console.log('hi');
        $('.news-one__image').attr('src', '/img/uploads/' + $('#select-image option:selected').text());
    });
});
