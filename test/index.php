<!DOCTYPE>
<html>
<head>
    <meta charset="UTF-8"
</head>
<body>
<script>
    var require = {
        packages: ['bus', 'service', 'cache', 'page', 'a', 'b', 'c', 'd', 'e', 'f', 'passport', 'input']
    }
</script>

<script data-main="app.js" src="require.js"></script>

<script>
    window.extend = function(obj, source) {
        for(var name in source) {
            obj[name] = source[name];
        }

        return obj;
    }

    window.controller = {
        load: function() {
            var model = this.getModel();
            var view = this.getView();

            var list = view.getTemplate().find('link:not(.ready)');

            model.setTotal(list.length);

            var i = 0;
            while(i < list.length) {
                (function() {
                    var link = list.eq(i);

                    var name = link.attr('href');
                    var container = link.parent();

                    require([name], function(component) {
                        var c,
                            parent = model.getOwner(),
                            config = container.find('div').text();

                        console.log(config);

                        c = new component(parent, container, config);
                    });
                })();

                i++;
            }

            if(list.length == 0) {
                var parent = model.getParent();

                if(parent) {
                    parent.getController().append(model.getOwner());
                }
            }
        },

        append: function(component) {
            var model = this.getModel();
            var view = this.getView();

            var parent = model.getParent();

            if(parent) {
                if(model.getStatus() == 'ready') {
                    component.getModel().getContainer().append(component.getView().getTemplate());

                    model.getChildren().push(component);

                    component.getModel().setStatus('init');
                    component.getModel().setStatus('ready');
                }
                else {
                    component.getModel().getContainer().append(component.getView().getTemplate());

                    model.getChildren().push(component);

                    component.getModel().setStatus('init');

                    var all = (model.getTotal() == model.getChildren().length);

                    if(all) {
                        parent.getController().append(model.getOwner());
                    }
                }
            }
            else {
                component.getModel().getContainer().append(component.getView().getTemplate());

                model.getChildren().push(component);

                component.getModel().setStatus('init');
                component.getModel().setStatus('ready');
            }
        }
    }
</script>

</body>
</html>
