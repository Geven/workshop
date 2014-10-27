define(['bus', './model', './view', './controller'], function(bus, model, view, controller) {
    function component(parent, container, config) {
        var m, v, c;

        var z;

        function init() {
            z = api;

            m = new model(parent, container, z, config);
            v = new view();
            c = new controller(m, v);

            c.init();
        }

        var api = {
            getModel: function() {
                return m;
            },

            getView: function() {
                return v;
            },

            getController: function() {
                return c;
            }
        }

        init();

        return api;
    };

    return component;
});