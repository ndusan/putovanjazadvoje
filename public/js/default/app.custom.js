var App = App || {};
(function($) {
    App.Custom = {
        newsletter: function() {
            
            $('#newsletter').delegate('form', 'submit', function(e){
                e.preventDefault();
                
                var email = $('#newsletter_email');
                var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
                
                if (email.val() != email.attr('title') && reg.test(email.val()) != false) {
                
                    $.ajax({
                       type: 'POST',
                       url: '/newsletter',
                       data: 'email='+email.val(),
                       dataType: 'json',
                       success: function(data){
                           if(data){
                               //Roll-back to default
                               email.removeClass('warning').val(email.attr('title'));
                           }
                       }
                    });
                } else {
                    email.addClass('warning');
                }
            });
            $('#newsletter_email').focus(function(){
                if ($(this).attr('title') == $(this).val()) $(this).val('');
            });
            $('#newsletter_email').blur(function(){
                if ($(this).val().length <= 0) $(this).val($(this).attr('title'));
            });
        }
    };
})(this.jQuery)