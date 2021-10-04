$(document).ready(function (){
    $(this).find('.edit-button').hide();
    $('.card').hover(function() {
            $(this).closest('div').find('.edit-button:first').show();
        },
        function () {
            $(this).closest('div').find('.edit-button:first').hide();
        }
    );
});

