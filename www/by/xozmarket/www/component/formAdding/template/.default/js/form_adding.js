define(["jquery","city_selection", "telephone_check","validate"], function($){
    function form_adding(container) {
        var z;


            $("#mainForm").validate({
                rules: {
                    nameOfCompany: {
                        required: true,
                        maxlength: 100
                    },
                    telephoneOfCompany: {
                        required: true

                    },
                    emailOfCompany: {
                        required: true,
                        email: true
                    },
                    regOfCompany: {
                        required: true
                    },
                    cityOfCompany: {
                        required: true
                    },
                    websiteOfCompany: {
                        required: true
                    },
                    mondayWorkShift: {
                        required: true
                    },
                    mondayDinnerShift: {
                        required: true
                    },
                    tuesdayDayOff: {
                        required: true
                    }

                },

                messages: {
                    nameOfCompany: {
                        required: "Укажите названиe"
                    },
                    telephoneOfCompany: {
                        required: "Укажите телефон",
                        digits: "Пожалуйста, указывайте здесь только цифры"
                    },

                    emailOfCompany: {
                        required: "Укажите email",
                        email: "Проверьте email, что-то неверно"
                    },
                    regOfCompany: {
                        required: "Укажите область"
                    },
                    cityOfCompany: {
                        required: "Укажите город"
                    },
                    websiteOfCompany: {
                        required: "Укажите имя сайта"
                    },
                    shiftOfCompany: {
                        required: "Укажите режим работы"
                    }

                },

                submitHandler: function (form) {
                    var request;
                    $("#mainForm").submit(function (event) {
                        if (request) {
                            request.abort();
                        }

                            var strTel = $('#companyTelephoneInput').val();

                            var check = new RegExp('^[0-9-]{16,17}$');
                            if (!check.test(strTel)) {
                                request.abort()
                            }
                        var $form = $(this);

                        var serializedData = $form.serializeArray();

                        request = $.ajax({
                            url: 'http://www.xozmarket.by/component/formAdding/template/.default/validation.php',
                            type: 'POST',
                            //contentType: 'application/json',
                            data: serializedData
                            //dataType:"json"
                        });

                        request.done(function (value) {
                            $('body').html(value);
                        });

                        request.fail(function (value) {
                            console.log('Fail');
                        });

                        event.preventDefault();
                    });
                }
            });



        var api = {};

        z = api;

        return z;
    };

    return form_adding;
});


