var App = App || {};
(function($) {
    App.CmsContest = {
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
            
            //Wizard => prize
            App.CmsContest.wizardPrizeFragment();
        },
        wizardPrizeFragment: function(){
            
            $('body').delegate('#jPrizeAdd', 'click', function(e){
               e.preventDefault();
               
               var cUrl = $(this).attr('href');
               $('#jPrizeForm').addClass('loader');
                   
               $.ajax({
                  'url': cUrl,
                  'type': 'GET',
                  success: function(data){
                      $('#jPrizeForm').removeClass('loader').html(data);
                      App.Common.tabs();
                      App.Common.jtooltip();
                      App.Common.mce();
                  }
               });
            });
            
            $('body').delegate('#jPrizeRemove', 'click', function(e){
               e.preventDefault();
               
               //Add action on remove button
               var answer = confirm ("Are you sure you want to delete this line?");
               if (!answer) return false;
                
               $('#jPrizeForm').html('');
            });
        }
        
    };
})(this.jQuery);