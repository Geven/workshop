define(['bus'], function() {
    function view() {
        var template = $(
            '<div>' +
                '<input>' +
                '<div class="info" style="display: none"></div>' +
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