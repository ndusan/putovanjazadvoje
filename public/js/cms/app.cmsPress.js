var App = App || {};
(function($) {
    App.CmsPress = {
        init: function() {
        
        },
        aboutMagazine: function() {
            App.Common.tabs();
            App.Common.jtooltip();
            App.Common.mce();
            
            App.CmsHome.addBrowse();
            App.CmsHome.removeBrowse();
        },
        download: function(){
            //Set datatable
            $('#dataTable').dataTable();
            App.Common.thead();
        }
    };
})(this.jQuery);