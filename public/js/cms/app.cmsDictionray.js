var App = App || {};
(function($) {
    App.CmsDictionary = {
        init: function() {
            
        },
        add: function() {
          App.Common.tabs(); 
          App.Common.jtooltip();
        },
        edit: function() {
          App.Common.tabs();
          App.Common.jtooltip();
        },
        index: function() {
            
            //Set datatable
            $('#dataTable').dataTable();
            App.Common.thead();
        }
    };
})(this.jQuery);