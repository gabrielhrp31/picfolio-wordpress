<footer id="footer">
    <div class="bg-secondary">
        <div class="container py-3">
            <div class="row py-5 justify-content-around">
                <a href="<?php echo get_option('facebook_field');?>" target="_blank" class="btn social-icon p-3 d-flex align-items-center">
                    <i class="fab fa-facebook-f fa-2-5x px-2 text-primary" sty></i>
                </a>
                <a href="<?php echo get_option('instagram_field');?>" target="_blank" class="btn social-icon text-primary p-3">
                    <i class="fab fa-instagram fa-3x"></i>
                </a>
                <a href="<?php echo get_option('whatsapp_field');?>" target="_blank" class="btn social-icon p-3 text-primary">
                    <i class="fab fa-whatsapp fa-3x"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-primary">
        <div class="row align-items-center justify-content-center text-white py-2 font-weight-bold">
                Júlia Rezende Fotografia -
                By <img src="<?php echo get_template_directory_uri().'/imgs/logo-rodape.jpg' ?>" alt="JPG APPS & WEB" style="width:80px;" class="rounded mx-3">
                Apps e Web
        </div>
    </div>
</footer>
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