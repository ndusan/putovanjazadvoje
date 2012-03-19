var App = App || {};
(function($) {
    App.Home = {
        init: function() {
            $("#slides").slides({
                pagination: true,
                effect: 'fade',
                play: 5000
            });
            
            //Call newsletter app for home page
            App.Custom.newsletter();
        },
        newsletter: function() {
            
            $('#newsletter_email').focus(function(){
                if ($(this).attr('title') == $(this).val()) $(this).val('');
            });
            $('#newsletter_email').blur(function(){
                if ($(this).val().length <= 0) $(this).val($(this).attr('title'));
            });
        }
    };
})(this.jQuery)