$(document).ready(function(){
    $("#form-overall-rating label").click(function(e){
        var labelDisable = $(this).hasClass('nohover');

        if (labelDisable === false) {
            var labelID;
            labelID = $(this).attr('for');
            var radioValue = $('#' + labelID).attr("checked", "checked").val();
            var data = {
                'action': 'mt_help_rating_form',
                'rating_star': radioValue
            };
            $.post(misha_loadmore_params.ajaxurl, data, function (response) {
                $('#form-overall-rating input, #form-overall-rating label').addClass('nohover');
                $('#form-overall-rating input').prop("disabled", true);
                $('.box-average-star').html(response);
            });
        }
    });

});