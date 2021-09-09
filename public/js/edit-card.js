$(document).ready(function (){
    $(this).find('.edit-button').hide();
    $('.card').hover(function() {
            $(this).find('.edit-button').show();
        },
        function () {
            $(this).find('.edit-button').hide();
        }
    );
});

