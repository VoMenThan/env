jQuery(function($){ // use jQuery code inside this to avoid "$ is not defined" error
    $('#form-rate-survey label').click(function () {
        $('#form-rate-survey').submit();
    });

    $('#form-rate-survey').submit(function(e){
        var data = {
                'action': 'mt_contact_form',
                'star': $("[name='rating_star']:checked").val()
            };

        $.post(misha_loadmore_params.ajaxurl, data, function(response) {
            alert(response);
        });
        return false;
    });

});