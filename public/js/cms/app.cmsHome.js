var App = App || {};
(function($) {
    App.CmsHome = {
        init: function() {
            App.Common.tabs();
            App.Common.thead();
        },
        addBrowse: function(){
            //Add browse
            $('body').delegate('#jAddBrowse', 'click', function(e){
                e.preventDefault();
                
                var html = '<tr>\n\
                                <td><input type="file" name="file[]" value=""/></td>\n\
                                <td><a href="#" class="jRemoveBrowse">remove</a></td>\n\
                            </tr>';
                
                $('#jListBrowse > tbody:last').append(html);
            });
        },
        removeBrowse: function(){
            //Remove browse
            $('body').delegate('.jRemoveBrowse', 'click', function(e){
                e.preventDefault();
                
                var cUrl = $(this).attr('href');
                
                if('#' == cUrl){
                    //Empty browse
                    $(this).closest('tr').remove();
                }else{
                    $.ajax({
                        url: cUrl,
                        type: 'get',
                        success: function(data){
                            if(data){
                                $(this).closest('tr').remove();
                            }
                        }
                    });
                }
            });
        }
        
    };
})(this.jQuery);