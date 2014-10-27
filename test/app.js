require(['domReady', 'jquery', 'bus', 'service', 'cache'], function(domReady, $, bus, service, cache) {
    //window.bus = new bus();
    window.service = new service();
    window.cache = new cache();

    domReady(function() {
        require(['page'], function(component) {
            var c = new component();

            $('body').append(c.getView().getTemplate());
            c.getModel().setStatus('init');
            c.getModel().setStatus('ready');

           /* setTimeout(function() {
                console.log('dima');
                var tpl =
                    '<div>' +
                        '<div>' +
                            '<link href="f">' +
                        '</div>' +
                    '</div>';

                console.log(window.cache.getComponent('a'));
                window.cache.getComponent('a')[0].getView().getTemplate().append(tpl);
                window.cache.getComponent('a')[0].getController().load();
            }, 5000);*/
        });
    });
});


