define(function() {
    var listeners = {};

    return {
        listen: function(type, listener) {
            if(listeners[type] == undefined) {
                listeners[type] = [];
            }

            listeners[type].push(listener);
        },

        removeListener: function(type, listener) {
            if(listeners[type] != undefined) {
                var i= 0;
                while(i < listeners[type].length) {
                    if(listeners[type][i] == listener) {
                        listeners[type].splice(i,1);
                        break;
                    }

                    i++;
                }
            }
        },

        emit: function(type, message) {
            console.log(type, message);

            if(listeners[type] != undefined) {
                var i= 0;
                while(i < listeners[type].length) {
                    listeners[type][i](message);
                    i++;
                }
            }
        }
    }
});