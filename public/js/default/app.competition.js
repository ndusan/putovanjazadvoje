var App = App || {};
(function($) {
    App.Competition = {
        init: function() {
        },
        conditions: function(){
            //If checkbox active enable submit
            $('body').delegate('#jCheckbox','click', function(){
                if($(this).is(':checked')){
                    $('#jSubmit').removeAttr('disabled');
                }else{
                    $('#jSubmit').attr('disabled','disabled');
                }
            });
        },
        play: function(){
            var t;
            $('#sortable').sortable({
                cursor: 'move', 
                tolerance: 'pointer', 
                opacity: 0.70, 
                revert: true,
                stop: function(){
                    var list = "&"+$('#sortable').sortable('serialize');
                    var order = list.split('&img[]=');
                    
                    if((order[1] == 0)&&(order[2] == 4)&&(order[3] == 8)&&(order[4] == 12)&&
                       (order[5] == 1)&&(order[6] == 5)&&(order[7] == 9)&&(order[8] == 13)&& 
                       (order[9] == 2)&&(order[10] == 6)&&(order[11] == 10)&&(order[12] == 14)&&
                       (order[13] == 3)&&(order[14] == 7)&&(order[15] == 11)&&(order[16] == 15)){
                        $('#sortable').sortable('disable');
                        clearInterval(t);
                        $('#sortable').css('background-image',$("#sortable li").css("background-image")); 
                        $('#sortable li').fadeOut('slow', function(){
                            $('#sortable').html('<div class="completed">'+App.Competition.completed+'</div>'); 
                        });
                        
                    }else{ 
                        $('#moves').html(parseInt($('#moves').html())+1); 
                    }
                }
            });	
            $('#sortable').disableSelection().sortable('disable');
            $('body').delegate('#start','click',function(){
                breakImage();
            });

            // function to break main image into tiles
            function breakImage(){
                t = setInterval('$("#time").html(parseInt($("#time").html())+1);',1000);
                var image = $("#sortable").css("background-image");
                var positionX = new Array('0','-125px','-250px','-375px');
                var positionY = new Array('0','-125px','-250px','-375px');
                $("#sortable").html('');
                for(var y=0,z=0;y<4;y++){
                    for(var x=0;x<4;x++){
                        $("#sortable").append('<li id="img_'+z+'">&nbsp;</li>');
                        $("#img_"+z).css("background-image", image);
                        $("#img_"+z).css("background-position", positionX[y]+" "+positionY[x]);
                        z++;
                    }
                }
                $("#sortable").css("background-image","url(images/img.jpg)").sortable("refresh").sortable("enable");
            }
        }
    };
})(this.jQuery)