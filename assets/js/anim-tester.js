function draw(url){
                
    if(typeof(url) == 'undefined'){
        draw_defined();
        return false;
    }else{
        size = url.length;
        if((url.substring(0,7) != 'http://')){
            alert('La URL del gif debe empezar con "http://"');
        }else if((url.substring(size-4,size) != '.png') && 
            (url.substring(size-4,size) != '.gif') && 
            (url.substring(size-4,size) != '.jpg')){
            alert('La URL del gif debe terminar en ".png" o ".gif" ó ".jpg"')
        }else{
            
            swfobject.embedSWF("./assets/swf/TestGif.swf", "animTest", 80, 80, "9.0.0", "./assets/swf/expressInstall.swf", {
                urlGif: url
            });
    
        }
    }
}
            
function draw_defined(){
    $("#animTest").html('<img src="./assets/img/anim.jpg" width="80" height="80" />');
}
            
jQuery(function($){
    draw();
                
    $("#form").submit(function(e){
        e.preventDefault();
    });
                
    $("#send").click(function(e){
        draw($("#url").val());
    });
});