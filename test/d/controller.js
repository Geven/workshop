define(['bus'], function(bus) {
    function controller(model, view) {
        var m = model;
        var v = view;

        var z ;

        function init() {
            z = api;
        }

        var api = {
            getModel: function() {
                return m;
            },

            getView: function() {
                return v;
            },

            init: function() {
                //тут можем обработать данные из модели
                //тут может добыть данные для модели с сервера

                var parent = model.getParent();

                if(parent == null){
                    setTimeout(function() {
                        z.load();
                    }, 1000);
                }
                else {
                    z.load();
                }
            }
        }

        extend(api, window.controller);

        init();

        return api;
    }

    return controller;
});