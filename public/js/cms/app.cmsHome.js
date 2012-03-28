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
                                <td><input type="text" name="alias[]" value="" class="jr"/></td>\n\
                                <td><input type="file" name="file[]" value=""/></td>\n\
                                <td><a href="#" class="jRemoveBrowse cmsDelete" title="Remove file"></a></td>\n\
                            </tr>';
                
                $('#jListBrowse > tbody:last').append(html);
            });
        },
        removeBrowse: function(){
            //Remove browse
            $('body').delegate('.jRemoveBrowse', 'click', function(e){
                e.preventDefault();
                
                var cUrl = $(this).attr('href');
                var cLine = $(this).attr('browse-line');
                
                if('#' == cUrl){
                    //Empty browse
                    $(this).closest('tr').remove();
                }else{
                    
                    //Ask
                    var answer = confirm ("Are you sure you want to delete this line?");
                    if (!answer) return false;
                    
                    $.ajax({
                        url: cUrl,
                        type: 'get',
                        dataType: 'json',
                        success: function(data){
                            if(data.response){
                                $('#'+cLine).remove();
                            }
                        },
                        error: function(data){
                            console.log('error'+data);
                        }
                    });
                }
            });
        }
        
    };
})(this.jQuery);