var App = App || {};
(function($) {
    App.CmsHeader = {
        init: function() {
        },
        
        index: function() {
            
            //Set datatable
            $('#dataTable').dataTable({"aaSorting": [[ 2, "desc" ]], "iDisplayLength": 50});
            App.Common.thead();
            
            $('input[type="radio"]').click(function(){
                /** @TODO **/
                window.href = $(this).val();
            })
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