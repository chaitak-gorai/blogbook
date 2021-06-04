$(document).ready(function(){
    
 $('#allselectbox').click(function(event){
     
     
     if(this.checked){
         
       $('.selectbox').each(function(){
           
           this.checked=true;
           
       });  
         
         
     }else{
         
            $('.selectbox').each(function(){
           
           this.checked=false;
           
       });  
         
     }
     
 });   

// var div_box="<div id='load-screen'><div id='loading1'><div id='loading'></div></div></div>";
//     $("body").prepend(div_box);
//     $('#load-screen').delay(500).fadeOut(600,function(){
//         $(this).remove();

//     });
    
    
});

function loadusers(){
    
    
    $.get("functions.php?useronline=result",function(data){
        
        $(".useronline").text(data);
        
        
    });
    
    
    
}
setInterval(function(){
    loadusers();
},500);
