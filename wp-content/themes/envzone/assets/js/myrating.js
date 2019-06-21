jQuery(function($){ // use jQuery code inside this to avoid "$ is not defined" error
    $('#form-rate-survey label').click(function () {
        $('#form-rate-survey').submit();
    });

    $('#form-rate-survey').submit(function(e){

        var data = {
            'action' : 'contact_form',
            'rate' : $('.rate').val()
        };
        $.ajax({
            data: data,
            type: 'post',
            url: misha_loadmore_params.ajaxurl,
            success: function(data) {

                alert(data); // This prints '0', I want this to print whatever name the user inputs in the form.

            }
        });
        return false;
    });

});