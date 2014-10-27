define(['bus'], function() {
    function view() {
        var template = $(
            '<div>' +
                '<div>' +
                    '<input type="text">' +
                    '<div class="info" style="display: none"></div>' +
                '</div>' +
                '<div>' +
                    '<input type="password">' +
                    '<div class="info" style="display: none"></div>' +
                '</div>' +
                '<a href="/passport.php">Регистрация</a>' +
                '&nbsp;' +
                '<a href="#">Войти</a>' +
            '</div>'
        );

        var z;

        function init() {
            z = api;
        }

        var api = {
            getTemplate: function() {
                return template;
            }
        }

        init();

        return api;
    }

    return view;
});