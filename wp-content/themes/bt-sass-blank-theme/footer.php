<footer id="footer">
    <div class="bg-secondary">
        <div class="container py-3">
            <div class="row py-5 justify-content-around">
                <a href="<?php echo get_option('facebook_field');?>" target="_blank" class="btn social-icon p-3 d-flex align-items-center">
                    <i class="fab fa-facebook-f fa-2-5x px-2"></i>
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
<script src="https://cdn.jsdelivr.net/npm/lodash@4.17.15/lodash.min.js"></script>
<script src="<?php echo get_template_directory_uri().'/js/owlcarousel/owl.carousel.min.js'?>"></script>
<?php wp_footer(); ?>
<script type="text/javascript">
    $(document).ready(function () {
        var owlConfig = {
            loop:true,
            margin:0,
            nav:false,
            dots:false,
            responsive:{
                0:{
                    items:1.5,
                },
                600:{
                    items:2.3,
                },
                1000:{
                    items:5.2
                }
            }
        };
        function getInfo(edge){
            return {
                src:edge.thumbnail_src,
                link:`https://www.instagram.com/p/${edge.shortcode}/`,
                likes:edge.edge_liked_by.count,
                comments:edge.edge_media_to_comment.count,
                caption:edge.edge_media_to_caption.edges[0]?edge.edge_media_to_caption.edges[0].node.text:'',
            }
        }

        function addClass(div,overlay) {
        }

        var carousel = $(".owl-carousel");

        $.get('https://www.instagram.com/julia_rfotografia?__a=1',function (res) {

            var content = [];
            for(var edge of res.graphql.user.edge_owner_to_timeline_media.edges){
                info = getInfo(edge.node);
                //create structure of div
                var img = document.createElement('img');
                img.src=info.src;
                var overlay = document.createElement('a');
                overlay.href = info.link;
                overlay.target = "_blank";
                $(overlay).html(
                    `<div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                 <p class='d-block d-md-none d-lg-none d-xl-none'>${_.truncate(info.caption, {'length': 50})}</p>
                                 <p class='d-none d-md-block d-lg-none d-xl-none'>${_.truncate(info.caption, {'length': 75})}</p>
                                 <p class='d-none d-lg-block d-xl-none'>${_.truncate(info.caption, {'length': 100})}</p>
                                 <p class='d-none d-xl-block'>${_.truncate(info.caption, {'length': 150})}</p>
                                 <p><i class="fas fa-heart"></i> ${info.likes}<i class="fas fa-comment ml-3"></i> ${info.comments}</p>
                            </div>
                        </div>
                     </div>`
                ).addClass('instagram-overlay');
                var div = document.createElement('div');
                $(div).addClass('instagram-post').append(img).append(overlay);
                content.push(div);
            }
            carousel.prepend(content);
            carousel.owlCarousel(owlConfig);
        });

        $(".navbar-toggler").click(function(){

            $("#navbarNav").toggleClass("show-sidebar").toggleClass("animated slideInLeft");;
            // $("#navbarNav").toggleClass("animated slideOutLeft");
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
    });
</script>
</body>
</html>