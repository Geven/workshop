define(['bus'], function() {
    function view() {
        var template = $(
            '<div>' +
                'Component a' +
                '<div>' +
                    '<link href="b">' +
                '</div>' +
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