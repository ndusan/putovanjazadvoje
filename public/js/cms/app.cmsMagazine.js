var App = App || {};
(function($) {
    App.CmsMagazine = {
        init: function() {
        
        },
        index: function() {
            //Set datatable
            $('#dataTable').dataTable();
            App.Common.thead();
        },
        wizard: function() {
            App.Common.tabs();
            App.Common.jtooltip();
            App.Common.mce();
        }
    };
})(this.jQuery);