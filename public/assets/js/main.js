$(document).ready(function() {

    $(".image-preview-input input:file").change(function (){ 
    	var file = this.files[0];
    	$(".image-preview-input-title").text("Change");
    	$(".image-preview-clear").show();
    	$(".image-preview-filename").val(file.name);
    	console.log(file.name);
    });
    $('.image-preview-clear').click(function(){
        $('.image-preview').attr("data-content","").popover('hide');
        $('.image-preview-filename').val("");
        $('.image-preview-clear').hide();
        $('.image-preview-input input:file').val("");
        $(".image-preview-input-title").text("Browse"); 
    }); 

    $(".last-projects pagination a").click(function() {
        $('html, body').animate({
            scrollTop: $("#load").offset().top
        }, 2000);
    });

    $('#trigger-overlay').click(function(){
        $('body').toggleClass('overlay-open');
    });
});

