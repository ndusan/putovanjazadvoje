var App = App || {};
(function($) {
    App.CmsCarousel = {
        init: function() {
        },
        
        index: function() {
            
            //Set datatable
            $('#dataTable').dataTable({"aaSorting": [[ 2, "desc" ]], "iDisplayLength": 50});
            App.Common.thead();
       },
       add: function() {
           App.Common.tabs();
           App.Common.jtooltip();
       },
       edit: function() {
           App.Common.tabs();
           App.Common.jtooltip();
       }
    };
})(this.jQuery);