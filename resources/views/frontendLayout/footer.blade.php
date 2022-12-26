<section id="footer" class="footer_area">
    <div class="footer_widget pt-25 pb-25">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="footer_info mt-45">
                        <img src="{{ asset('uploads/settings/'.getSettingValue('logo')) }}" alt="Logo">
                        <span class="line"></span>
                        @if(App::isLocale('en'))
                            <p class="mt-2">{{ getSettingValue('message_en') }}</p>
                        @else
                            <p class="mt-2">{{ getSettingValue('message_ar') }}</p>
                        @endif
                    </div> <!-- footer info -->
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="footer_info mt-45">
                        <h4 class="footer_title">{{ trans('common.contactUs') }}</h4>
                        <ul class="info">
                            <li>{{ trans('common.phone') }} :
                                <a href="tel:{{ getSettingValue('phone') }}">
                                    {{ getSettingValue('phone') }}
                                </a>
                            </li>
                            <li>{{ trans('common.email') }} :
                                <a href="mailto:{{ getSettingValue('email') }}">
                                    {{ getSettingValue('email') }}
                                </a>
                            </li>
                        </ul>
                        <div class="footer_social mt-45">
                            <h4 class="footer_title">{{ trans('common.followUs') }}</h4>
                            <ul class="social">
                                <li><a href="{{ getSettingValue('facebook')  }}"><i class="lni lni-facebook-filled"></i></a></li>
                                <li><a href="{{ getSettingValue('twitter')   }}"><i class="lni lni-twitter-original"></i></a></li>
                                <li><a href="{{ getSettingValue('instagram') }}"><i class="lni lni-instagram-original"></i></a></li>
                                <li><a href="{{ getSettingValue('whatsapp') }}"><i  class="lni lni-whatsapp"></i></a></li>
                                <li><a href="{{ getSettingValue('linkedin')  }}"><i class="lni lni-linkedin-original"></i></a></li>
                            </ul>
                        </div> <!-- footer info -->
                    </div> <!-- footer info -->
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="footer_link mt-45">
                        <img src="assets/images/never-stop-learning.jpg" alt="">
                    </div> <!-- footer info -->
                </div>
            </div>  <!-- row -->
        </div> <!-- container -->
    </div> <!-- footer widget -->

    <div class="footer_copyright">
        <div class="container">
            <div class="copyright text-center">
                @if(App::isLocale('en'))
                <p>all rights reserved &copy; 2023. Impement <a href="https://technomasr.com" rel="nofollow">TechnoMasr Software</a></p>
                @else
                <p>كافة الحقوق محفوظة &copy; 2023. تنفيذ <a href="https://technomasr.com" rel="nofollow">تكنو مصر للبرمجيات</a></p>
                @endif
            </div>  <!-- copyright -->
        </div> <!-- container -->
    </div> <!-- footer copyright -->
</section>

<!--====== FOOTER PART ENDS ======-->

<!--====== BACK TOP TOP PART START ======-->

<a href="#" class="back-to-top"><i class="lni lni-chevron-up"></i></a>

<!--====== BACK TOP TOP PART ENDS ======-->

<!--====== PART START ======-->

<!--
<section class="">
    <div class="container">
        <div class="row">
            <div class="col-lg-"></div>
        </div>
    </div>
</section>
-->

<!--====== PART ENDS ======-->







<!--====== Jquery js ======-->
<script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
<script src="assets/js/vendor/modernizr-3.7.1.min.js"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> --}}
<!--====== Bootstrap js ======-->
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.4.5.2.min.js"></script>

<!-- owl carousel -->
<script src="assets/js/owl.carousel.min.js"></script>

<!--====== Slick js ======-->
<!-- <script src="assets/js/slick.min.js"></script> -->

<!--====== Ajax Contact js ======-->
<!-- <script src="assets/js/ajax-contact.js"></script> -->

<!--====== Counter Up js ======-->
<script src="assets/js/jquery.counterup.min.js"></script>
<script src="assets/js/waypoints.min.js"></script>

<!--====== Magnific Popup js ======-->
<script src="assets/js/jquery.magnific-popup.min.js"></script>

<!--====== Scrolling Nav js ======-->
<script src="assets/js/jquery.easing.min.js"></script>
<script src="assets/js/scrolling-nav.js"></script>



<!--====== Main js ======-->
<script src="assets/js/main.js"></script>
<script>
        function myFunction() {
            var anotherCourses = document.getElementsByClassName('MoreCourses');
            var btn = document.getElementById('btnMoreCourses');
            Array.from(anotherCourses).forEach((x) => {
                if (x.style.display === "none") {
                    x.style.display = "block";
                    btn.style.display = "none";
                } else {
                    x.style.display = "none";
                }
            })
}
</script>
{{-- Submit Contact Message  --}}
<script src="{{ asset('assets/js/ajax.js') }}"></script>
</body>

</html>
