var App = App || {};
(function($) {
    App.CmsNews = {
        init: function() {
        },
        
        index: function() {
            
            //Set datatable
            $('#dataTable').dataTable();
            App.Common.thead();
       },
       add: function() {
           App.Common.tabs();
           App.Common.jtooltip();
           App.Common.mce();
       },
       edit: function() {
           App.Common.tabs();
           App.Common.jtooltip();
           App.Common.mce();
       }
    };
})(this.jQuery);