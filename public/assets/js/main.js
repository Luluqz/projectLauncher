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

    // $('.homeSlider').slick({
    //     prevArrow : '<button type="button" class="slick-prev"><i class="fa fa-angle-left" aria-hidden="true"></i></button>',
    //     nextArrow : '<button type="button" class="slick-next"><i class="fa fa-angle-right" aria-hidden="true"></i></button>',
    // });

    // $('.catSlider').slick({
    //     dots: true,
    //     appendDots: $(".dots-container"),
    //     vertical: true,
    //     arrows:false,
    //     customPaging : function(slider, i) {
    //         var thumb = $(slider.$slides[i]).data('thumb');  
    //         return '<a>'+thumb+'</a>';
    //     },
    // });

    // $('.dots-container li').on('click', function(){
    //     $('.dots-container li').removeClass('active');
    //     $(this).addClass('active');
    // });
});

