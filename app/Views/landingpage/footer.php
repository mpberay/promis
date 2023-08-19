<!--====== FOOTER FOUR PART START ======-->
    <footer id="footer" class="footer-area">
        <div class="footer-widget">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="footer-link">
                            <h6 class="footer-title">Company</h6>
                            <ul>
                                <li><a href="#">About</a></li>
                                <li><a href="#">Contact</a></li>
                                <li><a href="#">Profile</a></li>
                            </ul>
                        </div> <!-- footer link -->
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="footer-link">
                            <h6 class="footer-title">Solutions</h6>
                            <ul>
                                <li><a href="#">Facilities Services</a></li>
                                <li><a href="#">Workplace Staffing</a></li>
                                <li><a href="#">Project Management</a></li>
                            </ul>
                        </div> <!-- footer link -->
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="footer-link">
                            <h6 class="footer-title">Product & Services</h6>
                            <ul>
                                <li><a href="#">Products</a></li>
                                <li><a href="#">Business</a></li>
                                <li><a href="#">Developer</a></li>
                            </ul>
                        </div> <!-- footer link -->
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="footer-link">
                            <h6 class="footer-title">Help & Suuport</h6>
                            <ul>
                                <li><a href="#">Support Center</a></li>
                                <li><a href="#">FAQ</a></li>
                                <li><a href="#">Terms & Conditions</a></li>
                            </ul>
                        </div> <!-- footer link -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- footer widget -->
        
        <div class="footer-copyright">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5">
                        <div class="copyright text-center text-lg-left mt-10">
                            <p class="text">Crafted by <a style="color: #38f9d7" rel="nofollow" href="https://uideck.con">UIdeck</a> and UI Elements from <a style="color: #38f9d7" rel="nofollow" href="https://ayroui.com">Ayro UI</a></p>
                        </div> <!--  copyright -->
                    </div>
                    <div class="col-lg-2">
                        <div class="footer-logo text-center mt-10">
                            <a href="index.html"><img src="<?php echo base_url();?>/vendors/landingpage/assets/images/logo-2.svg" alt="Logo"></a>
                        </div> <!-- footer logo -->
                    </div>
                    <div class="col-lg-5">
                        <ul class="social text-center text-lg-right mt-10">
                            <li><a href="https://facebook.com/uideckHQ"><i class="lni-facebook-filled"></i></a></li>
                            <li><a href="https://twitter.com/uideckHQ"><i class="lni-twitter-original"></i></a></li>
                            <li><a href="https://instagram.com/uideckHQ"><i class="lni-instagram-original"></i></a></li>
                            <li><a href="#"><i class="lni-linkedin-original"></i></a></li>
                        </ul> <!-- social -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- footer copyright -->
    </footer>

    <!--====== FOOTER FOUR PART ENDS ======-->
    
    <!--====== BACK TOP TOP PART START ======-->

    <a href="#" class="back-to-top"><i class="lni-chevron-up"></i></a>


    <!--====== jquery js ======-->
    <script src="<?php echo base_url();?>/vendors/landingpage/assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="<?php echo base_url();?>/vendors/landingpage/assets/js/vendor/jquery-1.12.4.min.js"></script>

    <!--====== Bootstrap js ======-->
    <script src="<?php echo base_url();?>/vendors/landingpage/assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>/vendors/landingpage/assets/js/popper.min.js"></script>

    <!--====== Slick js ======-->
    <script src="<?php echo base_url();?>/vendors/landingpage/assets/js/slick.min.js"></script>

    <!--====== Isotope js ======-->
    <script src="<?php echo base_url();?>/vendors/landingpage/assets/js/isotope.pkgd.min.js"></script>

    <!--====== Images Loaded js ======-->
    <script src="<?php echo base_url();?>/vendors/landingpage/assets/js/imagesloaded.pkgd.min.js"></script>

    <!--====== Magnific Popup js ======-->
    <script src="<?php echo base_url();?>/vendors/landingpage/assets/js/jquery.magnific-popup.min.js"></script>

    <!--====== Scrolling js ======-->
    <script src="<?php echo base_url();?>/vendors/landingpage/assets/js/scrolling-nav.js"></script>
    <script src="<?php echo base_url();?>/vendors/landingpage/assets/js/jquery.easing.min.js"></script>

    <!--====== wow js ======-->
    <script src="<?php echo base_url();?>/vendors/landingpage/assets/js/wow.min.js"></script>

    <!--====== Main js ======-->
    <script src="<?php echo base_url();?>/vendors/landingpage/assets/js/main.js"></script>

    <script src="<?php echo base_url(); ?>/vendors/keycloak/keycloak.js"></script>

    <script>

        var keycloak = Keycloak();
        keycloak.init().success(function (authenticated) {
            //console.log(keycloak);
            //var password = $('#password').val();
            if (authenticated) {
                keycloak.loadUserInfo().success(
                    function (result) {
                        //console.log(result);
                        //console.log(keycloak);
                        //console.log(keycloak.userInfo.name);
                        var user_info = keycloak.userInfo;
                        $.ajax({
                            type: "GET",
                            url: "<?php echo base_url('issso_login'); ?>",
                            dataType: "json",
                            data: {
                                user_info : user_info,
                            },
                            success: function(msg){
                                //console.log(keycloak.userInfo.name);
                                console.log(keycloak);
                            }       
                        });
                    }
                );
            } else {
                //alert("asdaasd");
                //displayLoggedOff();
            }
        }).error(function () {
            alert('failed to initialize');
        });
      
        var someUserInfo = function (kc) {
            document.getElementById('someDetails').innerHTML = displaySomeUserInfo(kc);
            document.getElementById('token').value = kc.token;
            document.getElementById('tokenDetails').style.visibility = "visible";
        }

        var displaySomeUserInfo = function (kc) {
            var message = "<h1>";
            message += 'Hello1 ' + kc.userInfo.name;
            message += "</h1>";
            message += "<p>";
            message += "registered email : " + kc.userInfo.email;
            message += "<br />";
            message += "registered user name : " + kc.userInfo.preferred_username;
            message += "</p>";
            return message;
        }

        // var displayLoggedOff = function () {
        //     document.getElementById('someDetails').innerHTML = '<h2>logged off1</h2>';
        //     alert('asdasdasdasd');
        // }

        function toTokenTest(){
            location.href= location.href + 'check-token.php?token='+document.getElementById('token').value;
        }
        var logout = function() {
             $.ajax({
                type: "GET",
                url: "<?php echo base_url('issso_logout'); ?>",
                dataType: "json",
                // data: {
                //     //user_info : user_info,
                // },
                success: function(msg){
                    //console.log(keycloak.userInfo.name);
                    //console.log(keycloak);
                }       
            });
            keycloak.logout({"redirectUri":"http://localhost:8080"});
        }
    </script>

</body>

</html>