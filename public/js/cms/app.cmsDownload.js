var App = App || {};
(function($) {
    App.CmsDownload = {
        init: function() {
        
        },
        wallpaper: function() {
            App.Common.tabs();
            App.Common.jtooltip();
            App.Common.mce();
        },
        logo: function(){
            App.Common.tabs();
            App.Common.jtooltip();
            App.Common.mce();
            
            App.CmsHome.addBrowse();
            App.CmsHome.removeBrowse();
        },
        wallpaper: function(){
            //Set datatable
            $('#dataTable').dataTable({"aaSorting": [[ 1, "desc" ]], "iDisplayLength": 50});
            App.Common.thead();
        }
    };
})(this.jQuery);