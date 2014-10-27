define(['bus'], function(bus) {
    function model(parent, container, owner, config) {
        var parent = parent;
        var children = [];
        var container = container;
        var owner = owner;
        var status;
        var total;
        var id = new Date().getTime();
        var name = 'input';
        var z;

        console.log('=');
        console.log(config);
        console.log('=');

        function init() {
            z = api;
        }

        var api = {
            getParent: function() {
                return parent;
            },

            setParent: function(value) {
                parent = value;
            },

            getOwner: function() {
                return owner;
            },

            setOwner: function(value) {
                owner = value;
            },

            getContainer: function() {
                return container;
            },

            setContainer: function(value) {
                container = value;
            },

            getStatus: function() {
                return status;
            },

            setStatus: function(value) {
                status = value;

                console.log(status, name);

                if(value == 'init') {
                    if(parent) {
                        container.find('link').eq(0).removeClass().addClass('created');
                        cache.setComponent(owner);

                        owner.getController().start();
                    }
                    else {
                        cache.setComponent(owner);
                    }
                }
                else
                if(status == 'ready') {
                    if(parent) {
                        container.find('link').eq(0).removeClass().addClass('ready');

                        var i = 0;
                        while(i < children.length) {
                            children[i].getModel().setStatus('ready');
                            i++;
                        }
                    }
                    else {

                    }
                }
            },

            getName: function() {
                return name;
            },

            setName: function(value) {
                name = value;
            },

            getTotal: function() {
                return total;
            },

            setTotal: function(value) {
                total = value;
            },

            getChildren: function() {
                return children;
            },

            setChildren: function(value) {
                children = value;
            }
        }

        init();

        return api;
    }

    return model;
});