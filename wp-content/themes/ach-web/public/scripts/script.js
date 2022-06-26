$(function() {
    // Toggle page search
    $('#page-search-toggle').click((e) => {
        toggleActive('#page-search')
        toggleActive('#page-search-toggle');
    });

    // Empty search submit
    $('form.search-form').submit(function(e) {
        var val = $(e.target).find('input[name="s"]').val();
        if (!val) {
            alert('Bạn chưa nhập gì cả!');
            return false;
        }
    })
})