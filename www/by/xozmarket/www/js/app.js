require(['domReady', 'jquery'], function(domReady, $) {
    domReady(function() {
        var list = $("body").find('link');
        var i = 0;
        while(i < list.length) {
            (function() {
                var link = list.eq(i);

                var name = link.attr('class');
                var container = link.parent();

                require([name], function(module) {
                    var w = new module(container);
                });
            })();

            i++;
        }
    });
});


