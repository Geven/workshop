define(['bus'], function() {
    function view() {
        var template = $(
            '<div>' +
                'Component f' +
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