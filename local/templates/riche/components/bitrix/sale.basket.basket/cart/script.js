$(() => {

    let element        = $(".sale-basket-basket--cart"),
        cartElement    = $(".cart", element),
        cartIsEmpty    = "is-empty",
        cartItems      = $(".cart--items", cartElement),
        cartItem       = $(".item", cartItems),
        cartTotal      = $(".cart--total", cartElement),
        cartTotalValue = $(".value", cartTotal),
        cartTotalCount = $(".count", cartTotal);

    $("button.delete").on(
        "click",
        cartItem,
        (event) => {

            event.preventDefault();

            let item = $(event.currentTarget).closest(".item");

            $.ajax(
                "/ajax/cart.php",
                {
                    method :  "POST",
                    data :    {
                        action :    "delete",
                        id :        item.data("product-id"),
                        timestamp : Date.now()
                    },
                    success : (response) => {

                        console.debug(response);

                        if (response.success) {

                            item.slideUp().promise().done(
                                () => {

                                    item.remove();

                                }
                            );

                            if (response.lines > 0) {

                                cartTotalValue.text(response.price);
                                cartTotalCount.text(response.message);

                            } else {

                                cartElement.addClass(cartIsEmpty);

                            }

                        }

                    }
                }
            );

        }
    );

    let wait    = null,
        timeout = 300;

    $("input[type=\"number\"]").on(
        "change",
        cartItem,
        (event) => {

            event.preventDefault();

            let input = $(event.currentTarget),
                item  = input.closest(".item");

            clearTimeout(wait);

            wait = setTimeout(
                () => {

                    $.ajax(
                        "/ajax/cart.php",
                        {
                            data :    {
                                action :   "update",
                                id :       item.data("product-id"),
                                quantity : input.val()
                            },
                            method :  "POST",
                            success : (response) => {

                                $.each(
                                    response.items,
                                    (index, element) => {

                                        let item  = $(".item[data-product-id=" + element.id + "]", cartItems),
                                            price = $(".price .value", item),
                                            total = $(".total .value", item);

                                        price.text(element.price);
                                        total.text(element.total);

                                    }
                                );

                                cartTotalValue.text(response.price);
                                cartTotalCount.text(response.message);

                            }
                        }
                    );

                },
                timeout
            );

        }
    );

});
