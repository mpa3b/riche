$(() => {

    let element            = $('.quiz--front--new--default'),
        form               = $('form', element),
        fields             = $('.field', form),
        formRequiredFields = $('.field.required', form),
        formRequiredInputs = $(':input', formRequiredFields),
        errorClass         = 'invalid';

    let quizSlider = tns(
        {
            container : '.quiz--front--new--default .slider',
            items :     1,
            slideBy :   1,

            mode :      'gallery',
            loop :      false,
            mouseDrag : true,

            nav : false,

            controls : true,

            prevButton : '.quiz--front--new button.prev',
            nextButton : '.quiz--front--new button.next'
        }
    );

    $.each(
        fields,
        (index, element) => {

            let field = $(element);

            if (field.hasClass('phone')) {

                $('input', field).inputmask(
                    {
                        mask :            '+7 999 999-9999',
                        greedy :          false,
                        placeholder :     '',
                        showMaskOnFocus : false,
                        showMaskOnHover : false,
                        oncomplete :      (event) => {

                            field.removeClass(errorClass);

                        },
                        onincomplete :    (event) => {

                            field.addClass(errorClass);

                        }

                    }
                );

            } else if (field.hasClass('phone')) {

                $('input', field).inputmask(
                    {
                        mask :            '*{1,20}[.*{1,20}][.*{1,20}][.*{1,20}]@*{1,20}[.*{2,6}][.*{1,2}]',
                        greedy :          false,
                        placeholder :     '',
                        showMaskOnFocus : false,
                        showMaskOnHover : false,
                        onBeforePaste :   (pastedValue, opts) => {
                            pastedValue = pastedValue.toLowerCase();
                            return pastedValue.replace('mailto:', '');
                        },
                        definitions :     {
                            '*' : {
                                validator : '[0-9A-Za-z!#$%&\'*+/=?^_`{|}~\-]',
                                casing :    'lower'
                            }
                        },
                        oncomplete :      (event) => {

                            field.removeClass(error);

                        },
                        onincomplete :    (event) => {

                            field.addClass(error);

                        }
                    }
                );

            }

        }
    );

    let validateForm = (fields) => {

        let valid      = true,
            errorClass = 'invalid';

        $.each(
            fields,
            (index, element) => {

                let input = $(':input', element),
                    field = $(element);

                if (input.val() === '') {
                    valid = false;
                    field.addClass(errorClass);
                } else {
                    field.removeClass(errorClass);
                }

            }
        );

        return valid;

    };

    formRequiredInputs.on(
        'input',
        () => {

            validateForm(formRequiredFields);

        }
    );

    form.on(
        'submit',
        (event) => {

            event.preventDefault();

            let valid = validateForm(formRequiredFields);

            if (valid) {

                $.ajax(
                    '/ajax/form.php',
                    {
                        data :    form.serialize(),
                        success : (response) => {

                            console.debug(response);

                        }
                    }
                );

            }

        }
    );

});
