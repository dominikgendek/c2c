jQuery('.question').click(function(){
    $answer = jQuery(this).siblings('.answer');
    if($answer.is(":hidden")){
        $answer.slideDown();
    }else{
        $answer.slideUp();
    }
})