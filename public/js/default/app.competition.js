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
            $("#sortable").sortable({
                    cursor: "move", tolerance: "pointer", opacity: 0.70, revert: true,
                    stop: function(){
                              var list = "&"+$("#sortable").sortable("serialize");
                              var order = list.split("&img[]=");
                              if((order[1] == 0)&&(order[2] == 3)&&(order[3] == 6)&&(order[4] == 1)&&(order[5] == 4)&&(order[6] == 7)&&(order[7] == 2)&&(order[8] == 5)&&(order[9] == 8))
                              { 
                                    $("#sortable").sortable("disable");
                                    clearInterval(t);
                                    $("#sortable").css("background-image",$("#sortable li").css("background-image")); 
                                    $("#sortable li").fadeOut("slow", function(){ 
                                            $("#sortable").html('<div id="start">Completed</div>'); 
                                    });
                              }
                              else
                              { $("#moves").html(parseInt($("#moves").html())+1); }
                    }
            });	
            $("#sortable").disableSelection();	
            $("#sortable").sortable("disable");
            $("#start").click(function(){breakImage();});
            $(".images img").click(function(){
                    $("#sortable").sortable("disable");
                    clearInterval(t);
                    $(".images img").css('border','1px solid #009900');
                    $(this).css('border','1px solid #ff0000');
                    $("#sortable").hide();
                    $("#sortable").html('<div id="start">Click to Start</div>');
                    $("#sortable").css("background-image","url("+$(this).attr("src")+")");
                    $("#moves").html('0');
                    $("#time").html('0');
                    $("#sortable").fadeIn("slow");
                    $("#start").click(function(){breakImage();});
            });

            // function to break main image into tiles
            function breakImage()
            {
                    t = setInterval('$("#time").html(parseInt($("#time").html())+1);',1000);
                    var image = $("#sortable").css("background-image");
                    var positionX = new Array("left","center","right");
                    var positionY = new Array("top","center","bottom");
                    $("#sortable").html('');
                    for(var y=0,z=0;y<3;y++)
                    {
                            for(var x=0;x<3;x++)
                            {
                                    $("#sortable").append('<li id="img_'+z+'">&nbsp;</li>');
                                    $("#img_"+z).css("background-image", image);
                                    $("#img_"+z).css("background-position", positionX[y]+" "+positionY[x]);
                                    z++;
                            }
                    }
                    $("#sortable").css("background-image","url(images/img.jpg)");
                    $("#sortable").sortable("refresh");
                    $("#sortable").sortable("enable");
            }
        }
    };
})(this.jQuery)