<footer id="footer">
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<?php wp_footer(); ?>
<script type="text/javascript">
    $(".navbar-toggler").click(function(){
        $("#navbarNav").toggleClass("show-sidebar");
        // $("#navbarNav").toggleClass("animated slideOutLeft");
        $("#navbarNav").toggleClass("animated slideInLeft");
        // $(".overlay.navbar-toggler").toggleClass("animated slideOutRight");
        $(".overlay.navbar-toggler").toggleClass("animated slideInRight");
        // if($(".overlay.navbar-toggler").hasClass('animated')){
        //     $(".overlay.navbar-toggler").remove("animated");
        //     $(".overlay.navbar-toggler").add("animated");
        // }else{
        //     $(".overlay.navbar-toggler").toggleClass("animated");
        // }
        // if($("#navbarNav").hasClass('animated')){
        //     $("#navbarNav").remove("animated");
        //     $("#navbarNav").add("animated");
        // }else{
        //     $("#navbarNav").toggleClass("animated");
        // }
        setTimeout(function(){
            $(".overlay").toggleClass("show-sidebar");
        });
    });

    $('.category-navigate').click(function () {
        window.location.href = $(this).data('url');
    });

    $(window).scroll(function() {
        var height = $(window).scrollTop();

        if(height  > 98) {
            $("#navbar").addClass("sombreado");
        }else{
            $("#navbar").removeClass("sombreado");
        }
    });
</script>
</body>
</html>