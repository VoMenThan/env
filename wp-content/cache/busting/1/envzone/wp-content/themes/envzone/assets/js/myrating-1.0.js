jQuery(function($){ // use jQuery code inside this to avoid "$ is not defined" error
    $('#form-rate-survey label').click(function () {
        $('#form-rate-survey').submit();
    });

    $('#form-rate-survey').submit(function(e){

        var data = {
                action : 'contact_form',
                rate : 'than'
            };
        $.ajax({
            type : "post",
            url : misha_loadmore_params.ajaxurl,
            data : data,
            beforeSend: function(){

            },
            success: function(response) {
                $('#display-post').html(response);
            },
            error: function(){
                console.log( 'error');
            }
        });
    });

});