define(["jquery"], function($) {
    function captcha(container) {
        var z;
        var key = container.find("form>input").eq(0),
            form = container.find("form").eq(0);

        form.on('submit', function(event) {
            event.preventDefault();

            $.ajax({
                type: "POST",
                url: "http://" + root + "/" + form.attr("action"),
                data: {
                    key: key.val()
                },
                success: function(data, textStatus, jqXHR) {
                    console.log(data);

                    if(data.status) {
                        location.href = "http://" + root + "?uid=" + uid;
                    }
                    else {
                        if(data.info == "Captcha success") {
                            location.href = "http://" + root + "/?uid=" + uid;
                        }

                        if(data.info == "Invalid captcha") {
                            location.href = "http://" + root + "/?uid=" + uid;
                        }
                    }
                },
                dataType: "json"
            });
        });

        var api = {

        }

        z = api;

        return z;
    };

    return captcha;
});

