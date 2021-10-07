function printCommentError(){
    $('.comment-form-error').empty().show();
    $('.comment-form-error').html('Fields cannot be empty!'); 
    $('.comment-form-error').delay(5000).fadeOut("slow");
}

$("#comment-form").on("submit",function(e){
    $("#comment-form :input, texarea").each(function(){
        if($(this).val()===""){
            console.log($(this));
            e.preventDefault();
            printCommentError();
            return;
        }   
    })  
})
