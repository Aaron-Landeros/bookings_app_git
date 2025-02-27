$(document).on('change', '#themingSwitcher', function (e) {
    if($(this).prop('checked')){
        $('html').attr('data-bs-theme', 'dark');
    } else {
        $('html').attr('data-bs-theme', 'light');
    }
})