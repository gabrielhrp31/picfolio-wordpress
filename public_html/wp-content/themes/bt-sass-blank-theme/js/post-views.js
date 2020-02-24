jQuery(document).ready(function($) {
    var postid=$("#post-id").val();
    if(postid){
        var data = {
            action: 'views_count',
            security : MyAjax.security,
            postid: postid
        };
        $.post(MyAjax.ajaxurl, data);
    }
});