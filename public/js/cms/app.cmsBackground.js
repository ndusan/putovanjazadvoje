var App = App || {};
(function($) {
    App.CmsBackground = {
        init: function() {
        
        },
        index: function() {
            
            $('.bgActivate').click(function(){
               
               //Send get request
               $.ajax({
                  type: "GET",
                  url: currentUrl,
                  data: 'id='+$(this).val()
              });
              
            });
            
            //Set datatable
            $('#dataTable').dataTable();
            App.Common.thead();
        }
    };
})(this.jQuery);