define(['jquery'], function($) {
    function cache() {
        var list = {};
        var z;

        function init() {
            z = this;
        }

        var api = {
            setComponent: function(component) {
                var name =
                    component.getModel().getName();

                if(list[name] == undefined) {
                    list[name] = [];
                }

                list[name].push(component);

                console.log('save ' + name);
            },

            getComponent: function(name) {
                return list[name];
            }
        }

        init();

        return api;
    }

    return cache;
});