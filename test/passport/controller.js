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
            },

            start: function() {
                var template = view.getTemplate();

                var name = template.find('input[type=text]'),
                    password = template.find('input[type=password]'),
                    enter = template.find('a[href="/passport.php"]'),
                    register = template.find('a[href="/register"]');

                    enter.on('');

            }
        }

        extend(api, window.controller);

        init();

        return api;
    }

    return controller;
});

/*
var name = view.getTemplate().find('input[type="text"]'),
    password = view.getTemplate().find('input[type="password"]');

name.on('keydown', function(event) {
    console.log(event.charCode);
});*/
