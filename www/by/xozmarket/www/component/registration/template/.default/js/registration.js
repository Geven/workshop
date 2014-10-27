define(["jquery"], function($) {
    function registration(container) {
        var name = container.find("form>input").eq(0),
            email = container.find("form>input").eq(1),
            password = container.find("form>input").eq(2),
            passwordRepeat = container.find("form>input").eq(3),
            form = container.find("form").eq(0),
            timeoutName,
            timeoutEmail,
            timeoutPassword,
            timeoutPasswordRepeat,
            timeoutErrorInfo;


        function validate(type) {
            if(type == "name") {
                var result = false;

                var regexp = /^[a-zA-Z0-9]*[a-zA-Z]+[a-zA-Z0-9]*$/;
                result = regexp.test(name.val());

                return result;
            }
            if(type == "email") {
                var result = false;

                var regexp = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                result = regexp.test(email.val());

                return result;
            }
            else
            if(type == "password") {
                var result = false;

                var regexp = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/;
                result = regexp.test(password1.val());

                return result;
            }
            else
            if(type == "passwordRepeat") {
                var result = false;

                var regexp = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/;
                result = regexp.test(password2.val());

                return result;
            }
        }

        form.on('submit', function(event) {
            event.preventDefault();

            var count = 4;

            if(!validate("name")) {
                if(timeoutName) {
                    clearTimeout(timeoutName);
                }

                name.css("border", "solid 1px #ff0000");

                timeoutName = setTimeout(function () {
                    name.css("border", "");
                }, 2000);

                count --;
            }

            if(!validate("email")) {
                if(timeoutEmail) {
                    clearTimeout(timeoutEmail);
                }

                email.css("border", "solid 1px #ff0000");

                timeoutEmail = setTimeout(function () {
                    email.css("border", "");
                }, 2000);

                count --;
            }

            if(!validate("password")) {
                if(timeoutPassword) {
                    clearTimeout(timeoutPassword);
                }

                password.css("border", "solid 1px #ff0000");

                timeoutPassword = setTimeout(function () {
                    password.css("border", "");
                }, 2000);

                count --;
            }

            if(!validate("passwordRepeat")) {
                if(timeoutPasswordRepeat) {
                    clearTimeout(timeoutPasswordRepeat);
                }

                passwordRepeat.css("border", "solid 1px #ff0000");

                timeoutPasswordRepeat = setTimeout(function () {
                    passwordRepeat.css("border", "");
                }, 2000);

                count --;
            }

            if(count != 4) {
                return;
            }

            if(password.val() != passwordRepeat.val()) {
                if(timeoutErrorInfo) {
                    clearTimeout(timeoutErrorInfo);
                }

                password.css("border", "solid 1px #ff0000");
                passwordRepeat.css("border", "solid 1px #ff0000");

                timeoutErrorInfo = setTimeout(function () {
                    password.css("border", "");
                    passwordRepeat.css("border", "");
                }, 2000);

                return;
            }

            $.ajax({
                type: "POST",
                url: "http://" + root + "/" + form.attr("action"),
                data: {
                    name: name.val(),
                    email: email.val(),
                    password: password.val(),
                    passwordRepeat: passwordRepeat.val()
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
    }

    return registration;
});
