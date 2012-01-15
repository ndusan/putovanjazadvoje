var App = App || {};
(function($) {
    App.CmsMagazine = {
        init: function() {
        
        },
        index: function() {
            //Set datatable
            $('#dataTable').dataTable({"aaSorting": [[ 2, "desc" ]]});
            App.Common.thead();
        },
        wizard: function() {
            App.Common.tabs();
            App.Common.jtooltip();
            App.Common.mce();
            
            $('.dataTable').dataTable({"aaSorting": [[ 1, "desc" ]]});
            
            App.Common.thead();
            
            
            //Required fileds in this wizard
            $('body').delegate('form[name="wizard_index"]', 'submit', function(){
                var allOk = true;
                
                $('.jr-wizard_index').each(function(){
                    if($(this).val().length <= 0){
                        
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
            $('body').delegate('form[name="wizard_topic"]', 'submit', function(){
                var allOk = true;
                
                $('.jr-wizard_topic').each(function(){
                    if($(this).val().length <= 0){
                        
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
            
            $('body').delegate('.jcallSubform', 'click', function(e){
                e.preventDefault();
                
                $('#jSubform').addClass('loader');
                var cHref = $(this).attr('href');
                
                $.ajax({
                    url: cHref,
                    type: "GET",
                    dataType: "html",
                    success: function(data){
                        if(data){
                            $('#jSubform').removeClass('loader').html(data);
                            App.Common.jtooltip();
                            App.Common.mce();
                            App.Common.tabs();
                            $('#jCancelSubform').click(function(e){
                                e.preventDefault();
                                
                                $('#jSubform').html('');
                            });
                        }
                    }
                });
            });
            
            $('body').delegate('.jSubfomDelete', 'click', function(e){
                e.preventDefault();

                var cHref = $(this).attr('href');
                $.ajax({
                    url: cHref,
                    type: "GET",
                    dataType: "json",
                    success: function(data){
                        if(data.response){
                            $('.jSubformImage').html('<input type="file" name="image" value=""/>');
                        }
                    }
                });
            });
            
        }
    };
})(this.jQuery);