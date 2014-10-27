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
                var input = view.getTemplate().find('input');
                var info = view.getTemplate().find('.info');

                input.attr('type', model.getType());

                input.on('keydown', function() {
                    console.log('keydown');
                    if(input.val().length > model.getLimit()) {
                        info.css('display', 'block');
                        info.text('limit');
                    }
                })
            }
        }

        extend(api, window.controller);

        init();

        return api;
    }

    return controller;
});