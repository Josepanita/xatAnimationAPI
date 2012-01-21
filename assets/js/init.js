function show_previews(obj){
    
    $("#url").removeClass("errorInput");
    $(".error").html("");
    $("#img img").attr("src", obj.urlgif);
    $('#animTest').html("");
    $('#jpgpath').val(obj.fileanimate);
    $('#gifpath').val(obj.filegif);
    $('#anim').attr('href',obj.urlgif);
    $('#tile').attr('href',obj.urlanimate);
    $('#anim,#tile').removeClass('link');
    
    swfobject.embedSWF("./assets/swf/TestGif.swf", "animTest", 80, 80, "9.0.0", "./assets/swf/expressInstall.swf", {
        urlGif: obj.urlanimate
    });
}

jQuery(function($){
    $("#file").uploadify({
        'uploader'      : './assets/swf/uploadify.swf',
        'script'        : '/api/convert_image.php',
        'cancelImg'     : './assets/img/cancel.png',
        'fileExt'       : '*.gif;',
        'sizeLimit'     : (1024 * 1024),
        'fileDesc'      : 'Image Files',
        'folder'        : 'uploaded',
        'auto'          : true,
        'multi'         : false,
        'queueID'       : 'fileQueue',
        'onComplete'    : function(e, qid, f, response, udata) {
            
            var obj = $.parseJSON(response);
            
            if(obj.uploaded){
                show_previews(obj);
            }else{
                
            }
        }
    });
                
    $("#prev_form").submit(function(e)  {
        e.preventDefault();
    });
    
    $("#form").submit(function(e)  { 
   
        if (!e.isDefaultPrevented()) {
      
            $.ajax({
                type: 'GET',
                url: "./convert_image.php",
                data: {
                    url : $("#url").val()
                },
                success: function(data){
                            
                    var obj = $.parseJSON(data);
                           
                    if(obj.status == "error"){
                        $("#url").addClass("errorInput");
                        $(".error").html(obj.message);
                        $("#img img").attr("src", './assets/img/gif.jpg');
                        $('#animTest').html('<img src="./assets/img/anim.jpg" />');
                    }else{
                        $("#url").removeClass("errorInput");
                        $(".error").html("")
                        $("#img img").attr("src", obj.urlgif)
                        $('#animTest').html("");
                        $('#jpgpath').val(obj.fileanimate);
                        $('#gifpath').val(obj.filegif);
                        swfobject.embedSWF("./assets/swf/TestGif.swf", "animTest", 80, 80, "9.0.0", "./assets/swf/expressInstall.swf", {
                            urlGif: obj.urlanimate
                        });
                    }
                }
            });
            e.preventDefault();
        } 
    });
    
    $(".filepath").click(function(){
        $(this).select();
    });
    $(".ext").click(function(e){
                    
        $("#internal").toggle();
        $("#external").toggle();
        $("#url").focus();
                    
        e.preventDefault();
    });
});