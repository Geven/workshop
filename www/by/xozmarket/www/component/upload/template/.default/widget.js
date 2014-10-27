define(["jquery"], function($) {
    function passport(container) {
        var z;
        var email = container.find("div>input").eq(0),
            password = container.find("div>input").eq(1),
            login = container.find("div>u").eq(0),
            registration = container.find("div>u").eq(1),
            timeoutE,
            timeoutP,
            tries = 0;

        function validate(type, input) {
            if(type == "email") {
                var regexp = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return regexp.test(input.val());
            }
            else
            if(type == "password") {
                var regexp = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/;
                return regexp.test(input.val());
            }
        }

        login.on('click', function(event) {
            console.log("click");
            var count = 2;

            if(!validate("email", email)) {
                if(timeoutE) {
                    clearTimeout(timeoutE);
                }

                email.css("border", "solid 1px #ff0000");

                timeoutE = setTimeout(function () {
                    email.css("border", "");
                }, 2000);

                count --;
            }

            if(!validate("password", password)) {
                if(timeoutP) {
                    clearTimeout(timeoutP);
                }

                password.css("border", "solid 1px #ff0000");

                timeoutP = setTimeout(function () {
                    password.css("border", "");
                }, 2000);

                count --;
            }

            if(count < 2) {
                return;
            }

            var data = {
                action: "login",
                email: email.val(),
                password: password.val()
            };

            console.log("send");

            $.ajax({
                type: "POST",
                url: "http://" + name + "." + host + "." + zone + "/component/passport/pipe.php",
                data: data,
                success: function(data, textStatus, jqXHR) {
                    console.log(data);

                    if(data.status == "found") {
                        location.href = "http://" + name + "." + host + "." + zone;
                    }

                    if(data.status == "Error: email not valid") {
                        tries ++;
                        if(tries == 3) {
                            location.href = "http://" + name + "." + host + "." + zone;
                        }
                    }
                    else {
                    }
                },
                dataType: "json"
            });
        });

        registration.on('click', function(event) {
            location.href = "http://" + name + "." + host + "." + zone + "/page/registration.php";
        });

        var api = {

        }

        z = api;

        return z;
    };

    return passport;
});

