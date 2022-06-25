function deving(){
    alert("Developing...");
}

//not working
$(".deving").each(function(){
    $(this).on(click,function(){
        deving();
    });
});
