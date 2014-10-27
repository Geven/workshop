define(["jquery"], function($) {
    function account(container) {
        var z;
        var logout = container.find("div>a").eq(0);

        logout.on('click', function(event) {
            event.preventDefault();

            $.ajax({
                type: "POST",
                url: "http://" + root + "/" + logout.attr("href"),
                data: {},
                success: function(data, textStatus, jqXHR) {
                    console.log(data);

                    if(data.status) {
                        location.href = "http://" + root;
                    }
                },
                dataType: "json"
            });
        });

        var api = {};

        z = api;

        return z;
    }

    return account;
});