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
                    
                    if((order[1] == 0)&&(order[2] == 3)&&(order[3] == 6)&&(order[4] == 1)&&(order[5] == 4)&&(order[6] == 7)&&(order[7] == 2)&&(order[8] == 5)&&(order[9] == 8)){ 
                        $('#sortable').sortable('disable');
                        clearInterval(t);
                        $('#sortable').css('background-image',$("#sortable li").css("background-image")); 
                        $('#sortable li').fadeOut('slow', function(){
                            $('#sortable').html('<div>Completed</div>'); 
                        });
                        console.log('done');
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
                var positionX = new Array('0%','-20%','-40%','-60%','-80%');
                var positionY = new Array('0%','-20%','-40%','-60%','-80%');
                $("#sortable").html('');
                for(var y=0,z=0;y<5;y++){
                    for(var x=0;x<5;x++){
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