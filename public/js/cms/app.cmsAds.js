var App = App || {};
(function($) {
    App.CmsAds = {
        init: function() {
        
        },
        termsAndConditions: function() {
            App.Common.tabs();
            App.Common.jtooltip();
            App.Common.mce();
        },
        priceList: function(){
            App.Common.tabs();
            App.Common.jtooltip();
            App.Common.mce();
            
            App.CmsHome.addBrowse();
            App.CmsHome.removeBrowse();
        }
    };
})(this.jQuery);