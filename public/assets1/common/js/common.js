document.addEventListener('DOMContentLoaded', mainFunc, false);


function mainFunc() {

  document.addEventListener('keyup', function(e) {
    if (e.key === 'Enter' && e.target.className === 'emojionearea-editor') {
       $("#ajaxSubmit").click();
       setTimeout( function() {
        $(".emojionearea-editor").html("");
       }, 2000)
    }
    
  });

}

// mainFunc()