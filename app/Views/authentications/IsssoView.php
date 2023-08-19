<head>
    <!--====== jquery js ======-->
    <script src="<?php echo base_url();?>/vendors/landingpage/assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="<?php echo base_url();?>/vendors/landingpage/assets/js/vendor/jquery-1.12.4.min.js"></script>

    <script src="<?php echo base_url(); ?>/vendors/keycloak/keycloak.js"></script>
    
    <script>
        // window.onload = function () {
        //     //javascript:keycloak.login();
        //     window.location.reload()
        // }
        $(document).ready(function(){    
           //keycloak.login();
        });
        function asd(){
            alert('asdad');
        }
        var keycloak = Keycloak();
        keycloak.init().success(function (authenticated) {
            console.log(keycloak);
            if (authenticated) {
            keycloak.loadUserInfo().success(function (result) {
                console.log(result);
                someUserInfo(keycloak);
            });
            } else {
            displayLoggedOff();
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

        var displayLoggedOff = function () {
            document.getElementById('someDetails').innerHTML = '<h2>logged off1</h2>';
        }

        function toTokenTest(){
            location.href= location.href + 'check-token.php?token='+document.getElementById('token').value;
        }
        var logout = function() {
            keycloak.logout({"redirectUri":"http://localhost:8080/issso"});
        }
    </script>
</head>

<body>
    <button onclick="javascript:keycloak.login();">
        Test LOGIN
    </button>
    <button onclick="javascript:toTokenTest();">
        Test CHECK TOKEN
    </button>
    <button onclick="logout()">
        Test LOGOUT
    </button>
    <div>
        <div id='someDetails'></div>
    </div>
    <div id="tokenDetails" style="visibility: hidden;">
        <p>token (as obtained from js keycloak object):</p>
        <textarea id="token" style="width: 50%; height: 70%;"></textarea>
    </div>
</body>