var App = App || {};
(function($) {
    App.CmsNewsletter = {
        init: function() {
        },
        
        subscribed: function() {
            
            //Set datatable
            $('#dataTable').dataTable({"aaSorting": [[ 1, "desc" ]], "iDisplayLength": 50});
            App.Common.thead();
        }
    };
})(this.jQuery);