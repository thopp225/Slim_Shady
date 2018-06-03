function changePage(event) {
    if($(event.target).hasClass('external')) {
        window.location.href = $(event.target).attr('href');
        return;
    }
    //...
}
$(function () {
    $('.nav li').click( changePage );
}