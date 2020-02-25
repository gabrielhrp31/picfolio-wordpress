jQuery(document).ready(function($) {


    $('.pp_like').click(function(e){
        e.preventDefault();
        var postid=jQuery(this).data('id');

        var data = {
            action: 'my_action',
            security : MyAjax.security,
            postid: postid
        };
        $.post(MyAjax.ajaxurl, data, function(res) {
            var result=jQuery.parseJSON( res );
            jQuery('#likes-count').html(result.likecount);
            if(result.likecount==0 || result.likecount>1)
                jQuery('#likes-text').html("Curtidas");
            else
                jQuery('#likes-text').html("Curtida");
            if(result.like ==1){
                jQuery('.pp_like').addClass('liked');
                jQuery('.pp_like i').removeClass('far');
                jQuery('.pp_like i').addClass('fas');
            }
            if(result.dislike ==1){
                jQuery('.pp_like').removeClass('liked');
                jQuery('.pp_like i').removeClass('fas');
                jQuery('.pp_like i').addClass('far');
            }
        });
    });


});