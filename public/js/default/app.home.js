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
        }
    };
})(this.jQuery)