var App = App || {};
(function($) {
    App.Common = {
        init: function() {
            
            /** GENERAL **/
            $('.jw').live('click', function(){
                var answer = confirm ("Are you sure you want to delete this line?");
                if (!answer) return false;
            });
            $('.jl').live('click', function(){
                var answer = confirm ("Are you sure you want to logout?");
                if (!answer) return false;
            });
            
            //spefific
            $('a[name="leaf-link"]').click(function(){
                var childClass = $(this).attr('child-class');
                $('.'+childClass).slideToggle();
            });
            
            
            //Set check on required fields
            $('body').delegate('form', 'submit', function(){
                var allOk = true;
                
                if($(this).attr('name') == 'search_form' || $(this).attr('name') == 'newsletter_form'){
                    return true;
                }
                
                $('.jr').each(function(){
                    if($(this).val().length <= 0 || $(this).val() == 0){
                        
                        $(this).addClass('warning');
                        $(this).closest('tr').find('span.req').show();

                        allOk = false;
                    }else{
                        if($(this).hasClass('jCheckEmail')){
                            var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
                            var cEmail = $(this).val();
                            
                            if(reg.test(cEmail) == false){
                                $(this).addClass('warning');
                                $(this).closest('tr').find('span.req').show();

                                allOk = false;
                            }else{
                                $(this).removeClass('warning');
                                $(this).closest('tr').find('span.req').hide();
                            }
                        }else{
                            $(this).removeClass('warning');
                            $(this).closest('tr').find('span.req').hide();
                        }
                    }
                });
                
                if(!allOk){
                    return false;
                }
            });
            
            App.Common.search();
            
        },
        mce: function() {
            tinyMCE.init({
                theme : "advanced",
                mode : "textareas",
                plugins : "fullscreen",
                editor_deselector : "mceNoEditor",
                theme_advanced_buttons3_add : "autolink,lists,spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",
                // Theme options
                theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
                theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,cleanup,help,code,|,insertdate,inserttime,forecolor,backcolor,hr,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,fullscreen",
                theme_advanced_buttons3 : "",
                theme_advanced_toolbar_location : "top",
                theme_advanced_toolbar_align : "left",
                theme_advanced_statusbar_location : "bottom",
                theme_advanced_resizing : true
            });
        },
        datepicker: function() {
            
            $('.datepicker').datepicker({
                firstDay: 1,
                dateFormat: 'dd-mm-yy'
            });
        },
        tabs: function() {
            
            $('.tabs').tabs();
        },
        thead: function(){
            
            $('.display').thead();
        },
        jtooltip: function(){
            $( ".jtooltip" ).tooltip();
        },
        search: function(){
            
            //SEARCH FORM
            $('#search_form').submit(function(){
                var allOk = true;
                
                //It has to have at least 3 letters
                if($('#search_field').val().length < 3 || $('#search_field').val() == $('#search_field').attr('title')){
                    allOk = false;
                }
                
                if(!allOk){
                    $('#search_field').addClass('warning');
                    return false;
                } 
            });
            $('#search_field').focus(function(){
                if ($(this).attr('title') == $(this).val()) $(this).val('');
            });
            $('#search_field').blur(function(){
                if ($(this).val().length <= 0) $(this).val($(this).attr('title'));
            });
        },
        antispam: function(page) {
            $.ajax({url: '/'+page,
                    type: 'GET',
                    dataType: 'html',
                    success: function(data){
                        if(data){
                            $('#'+page).html('<img src="/'+page+'" />');
                        }
                    }
            });
        }
    };
})(this.jQuery);