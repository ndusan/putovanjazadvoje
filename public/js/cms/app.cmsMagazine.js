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
            
            $('.dataTable').dataTable();
            
            App.Common.thead();
            
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
                            $('#jremoveSubform').click(function(){
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
                            $('.jImage').remove();
                        }
                    }
                });
            });
            
        }
    };
})(this.jQuery);