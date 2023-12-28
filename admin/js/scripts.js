$(document).ready(function() {
    $('#summernote').summernote({
        height: 200
    });
  });
  //Ấn vô checkbox tất cả được chọn
$(document).ready(function() {
    $('#selectAllBoxes').click(function(event){
if(this.checked){
    $('.checkBoxes').each(function(){
this.checked = true;
    });
} else {
    $('.checkBoxes').each(function(){
        this.checked = false;
            });
}
    });
  // Adding a loader to Admin  
    var div_box = "<div id='load-screen'><div id='loading'></div></div>";
    $("body").prepend(div_box);
    $('#load-screen').delay(700).fadeOut(600, function(){
$(this).remove();
    });

});
// Xem so luong nguoi dung online
function loadUsersOnline(){
    $.get("function.php?onlineusers=result", function(data){
        $(".useronline").text(data);
    });
}
setInterval(function(){
    loadUsersOnline();
},500); 
