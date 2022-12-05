$(() => {

    let cart           = $(".sale-basket-basket--order"),
        cartForm       = $("form", cart),
        cartFormField  = $(".field", cartForm),
        cartPersonType = $("input[name=\"PERSON_TYPE\"]", cartForm),
        error          = "error";

    // region person type

    if (cartPersonType.length > 1) {

        cartPersonType.on(
            "change",
            (event) => {

                event.preventDefault();

                let personType = $(event.currentTarget).val(),
                    field;

                $.each(
                    cartFormField,
                    (index, element) => {

                        field = $(element);

                        if (field.data("person")) {

                            if (field.data("person") == personType) {

                                field.show();

                            } else {

                                field.hide();

                            }

                        }

                    }
                );

            }
        );

    }

    // endregion

    //region fields validation

    let invalid = "invalid";

    $("input[name=\"PHONE\"]", cartFormField).inputmask(
        {
            showMaskOnHover : false,
            mask :            "+7 999 999-9999",
            onincoomplete :   (event) => {

                $(event.target).closest(".field").addClass(invalid);

            },
            oncomplete :      (event) => {

                $(event.target).closest(".field").removeClass(invalid);

            }
        }
    );

    $("input[name=\"EMAIL\"]", cartFormField).on(
        "blur",
        function () {

            let input = $(this),
                value = input.val(),
                field = input.closest(".field");

            if (!validateEmailAddress(value)) {

                field.addClass(invalid);

            } else {

                field.removeClass(invalid);

            }

        }
    );

    $(":input", cartFormField).on(
        "input",
        (event) => {

            let field = $(event.target).closest("field");

            if (field.hasClass(error)) {

                field.removeClass(error);

            }

        }
    );

    //endregion

    // region select reset

    $("button.clear", cartForm).on(
        "click",
        (event) => {

            event.preventDefault();

            let field       = $(event.currentTarget).closest(".field"),
                select      = $("select", field),
                emptyOption = $("option[hidden]", select);

            emptyOption.prop("selected", true);

        }
    );

    // endregion

    // region delivery

    let deliveryField = $(".field.delivery", cartForm),
        delivery      = $("input", deliveryField),
        pickup        = deliveryField.data("pickup"),
        stockField    = $(".stock.field", cartForm),
        stockSelect   = $("select", stockField);

    delivery.on(
        "change",
        (event) => {

            event.preventDefault();

            let input = $(event.currentTarget);

            if (input.data("code") !== pickup) {

                stockSelect.prop("disabled", true);

            } else {

                stockSelect.prop("disabled", false);

            }

        }
    );

    // endregion

    // region form submit

    cartForm.on(
        "submit",
        (event) => {

            event.preventDefault();

            if (validateForm(cartForm)) {

                let data = {},
                    form = cartForm.serializeArray();

                $.each(
                    form,
                    (index, element) => {
                        data[element.name] = element.value || "";
                    }
                );

                $.ajax(
                    cartForm.attr("action"),
                    {
                        method :  "POST",
                        data :    {
                            action : "order",
                            data :   data
                        },
                        success : (response) => {

                            console.debug(response);

                            if (response.success) {

                                window.location.href = cartForm.data("success");

                            }

                        }
                    }
                );

            }

        }
    );

    // endregion

});
