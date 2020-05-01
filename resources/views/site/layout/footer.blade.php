<footer>

    <div class="container">
        <div class="row">

            <div class="col-lg-4 col-md-6">
                <div class="footer-section">

                    <a class="logo" href="#"><img src="{{asset('site/images/logo.png')}}" alt="Logo Image"></a>
                    <p class="copyright">Bona @ 2020. All rights reserved.</p>
                    <p class="copyright">Designed by <a href="#" target="_blank">Colorlib</a></p>
                    <ul class="icons">
                        <li><a href="#"><i class="fab fa-facebook-f "></i></a></li>
                        <li><a href="#"><i class="fab fa-pinterest-p " aria-hidden="true"></i> </a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-git"></i></a></li>
                        <li><a href="#"><i class="fab fa-vimeo-square"></i></a></li>
                    </ul>

                </div><!-- footer-section -->
            </div><!-- col-lg-4 col-md-6 -->

            <div class="col-lg-4 col-md-6">
                    <div class="footer-section">
                    <h4 class="title"><b>CATAGORIES</b></h4>
                    <ul>
                        <li><a href="#">BEAUTY</a></li>
                        <li><a href="#">HEALTH</a></li>
                        <li><a href="#">MUSIC</a></li>
                    </ul>
                    <ul>
                        <li><a href="#">SPORT</a></li>
                        <li><a href="#">DESIGN</a></li>
                        <li><a href="#">TRAVEL</a></li>
                    </ul>
                </div><!-- footer-section -->
            </div><!-- col-lg-4 col-md-6 -->

            <div class="col-lg-4 col-md-6">
                <div class="footer-section">

                    <h4 class="title"><b>SUBSCRIBE</b></h4>
                    <div class="input-area">
                        <form>
                            <input class="email-input" type="text" placeholder="Enter your email">
                            <button class="submit-btn" type="submit"><i class="fa fa-envelope fa-lg"></i></button>
                        </form>
                    </div>

                </div><!-- footer-section -->
            </div><!-- col-lg-4 col-md-6 -->

        </div><!-- row -->
    </div><!-- container -->
</footer>


      <!-- SCIPTS -->

      <script src="{{asset('site/common-js/jquery-3.1.1.min.js')}}"></script>

      <script src="{{asset('site/common-js/tether.min.js ')}}"></script>
      
      <script src="{{asset('js/fontawesome/all.min.js')}}"></script>
  
      <script src="{{asset('site/common-js/bootstrap.js ')}}"></script>
  
      <script src="{{asset('site/common-js/scripts.js ')}}"></script>  
  
  
      @stack('js') 