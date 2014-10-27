define(["jquery"], function($) {
    function passport(container) {
        var z;
        var email = container.find("form>input").eq(0),
            password = container.find("form>input").eq(1),
            form = container.find("form").eq(0),
            timeoutEmail,
            timeoutPassword;

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

        form.on('submit', function(event) {
            event.preventDefault();

            var count = 2;

            if(!validate("email", email)) {
                if(timeoutEmail) {
                    clearTimeout(timeoutEmail);
                }

                email.css("border", "solid 1px #ff0000");

                timeoutEmail = setTimeout(function () {
                    email.css("border", "");
                }, 2000);

                count --;
            }

            if(!validate("password", password)) {
                if(timeoutPassword) {
                    clearTimeout(timeoutPassword);
                }

                password.css("border", "solid 1px #ff0000");

                timeoutPassword = setTimeout(function () {
                    password.css("border", "");
                }, 2000);

                count --;
            }

            if(count < 2) {
                return;
            }

            $.ajax({
                type: "POST",
                url: "http://" + root + "/" + form.attr("action"),
                data: {
                    email: email.val(),
                    password: password.val()
                },
                success: function(data, textStatus, jqXHR) {
                    console.log(data);

                    if(data.status == true) {
                        location.href = "http://" + root + "/?uid=" + uid;
                    }
                    else {
                        if(data.info == "Captcha validation") {
                            location.href = "http://" + root + "/?uid=" + uid;
                        }
                    }
                },
                dataType: "json"
            });
        });

        var api = {};

        z = api;

        return z;
    };

    return passport;
});

