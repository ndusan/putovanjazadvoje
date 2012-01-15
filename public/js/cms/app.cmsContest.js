var App = App || {};
(function($) {
    App.CmsContest = {
        init: function() {
        
        },
        index: function() {
            //Set datatable
            $('#dataTable').dataTable({"aaSorting": [[ 2, "desc" ]]});
            App.Common.thead();
            
            
            $('body').delegate('.jStatus', 'change', function(){
               
               var cHref= $(this).val();
               $.ajax({
                  'url': cHref,
                  'type': 'GET'
               });
            });
        },
        
        wizard: function() {
            App.Common.tabs();
            App.Common.jtooltip();
            App.Common.mce();
            
            $('body').delegate('form[name="wizard_init"]', 'submit', function(){
               var allOk = true;
                
                $('.jr-wizard_init').each(function(){
                    if($(this).val().length <= 0 || $(this).val() == 0){
                        $(this).addClass('warning');
                        allOk = false;
                    }else{
                        $(this).removeClass('warning');
                    }
                });
                
                if(!allOk){
                    return false;
                } 
            });
            
            $('body').delegate('form[name="wizard_description"]', 'submit', function(){
               var allOk = true;
                
                $('.jr-wizard_description').each(function(){
                    if($(this).val().length <= 0 || $(this).val() == 0){
                        $(this).addClass('warning');
                        allOk = false;
                    }else{
                        $(this).removeClass('warning');
                    }
                });
                
                if(!allOk){
                    return false;
                } 
            });
            
            //Wizard => prize
            App.CmsContest.wizardPrizeFragment();
        },
        wizardPrizeFragment: function(){
            
            //Set datatable
            $('.dataTable').dataTable({"aaSorting": [[ 1, "asc" ]]});
            App.Common.thead();
            
            $('body').delegate('.jPrizeAdd', 'click', function(e){
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
            
            $('body').delegate('.jPrizeImageDelete', 'click', function(e){
                e.preventDefault();

                var cHref = $(this).attr('href');
                $.ajax({
                    url: cHref,
                    type: "GET",
                    dataType: "json",
                    success: function(data){
                        
                        if(data.response){
                            $('.jPrizeImage').html('<input type="file" name="prize_image" value=""/>');
                        }
                    }
                });
            });
            
            $('body').delegate('#jPrizeRemove', 'click', function(e){
               e.preventDefault();
                
               $('#jPrizeForm').html('');
            });
            
            $('body').delegate('form[name="wizard_prize"]', 'submit', function(){
               var allOk = true;
                
                $('.jr-wizard_prize').each(function(){
                    if($(this).val().length <= 0 || $(this).val() == 0){
                        $(this).addClass('warning');
                        allOk = false;
                    }else{
                        $(this).removeClass('warning');
                    }
                });
                
                if(!allOk){
                    return false;
                } 
            });
            
        },
        winners: function(){
            App.Common.jtooltip();
        }
        
    };
})(this.jQuery);