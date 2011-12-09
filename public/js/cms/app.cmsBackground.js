var App = App || {};
(function($) {
    App.CmsBackground = {
        init: function() {
        
        },
        index: function() {
            
            $('.bgActivate').click(function(){
               
               var active = $(this).attr('active');
               var currId = $(this).attr('id');
               //Send get request
               $.ajax({
                  type: "GET",
                  url: currentUrl,
                  data: 'id='+$(this).val()+'&active='+active,
                  success: function(data){
                      if(data){
                          //Remove all apart from selected
                          $('.bgActivate').each(function(){
                             if($(this).attr('id') != currId){
                                 $(this).attr('active', 1).attr('checked', false);
                             }
                          });
                          
                          $('#'+currId).attr('active', (1 - active));
                      }
                  }
              });
              
            });
            
            //Set datatable
            $('#dataTable').dataTable();
            App.Common.thead();
        }
    };
})(this.jQuery);