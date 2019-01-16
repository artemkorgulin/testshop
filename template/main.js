(function ($) {
    $.fn.ProductCard = function (id, user) {

        $('span.minus').click(function () {
            var $input = $(this).parent().find('input[type=text]');
            var count = parseInt($input.val()) - 1;
            count = count < 1 ? 1 : count;
            $input.val(count);
            $input.change();
            return false;
        });

        $('span.plus').click(function () {
            var $input = $(this).parent().find('input[type=text]');
            $input.val(parseInt($input.val()) + 1);
            $input.change();
            return false;
        });

        var countProduct = $(id).val();

        var product = {};
        var user = user;

        $('div.product_buy a').click(function (e) {
            e.preventDefault();

            if ($("h1#productName").text() != "") {
                product["name"] = $.trim($("h1#productName").text());
            }
            if ($("div.price").text() != "") {
                product["price"] = parseInt($.trim($("div.price").text()));
            }
            if (countProduct > 0) {
                product["quantity"] = countProduct;
            } else {
                product["quantity"] = 1;
            }

            $.ajax({
                url: '/merchant/',
                type: 'POST',
                dataType: "json",
                data: JSON.stringify(
                    {
                        "method": "init",
                        "product": product,
                        "user": user,
                    }),
                success: function (json) {
                    if (json.Success) {
                        if (json.PaymentURL) {
                            location.href = json.PaymentURL;
                        }
                    }
                },
                error: function (x, a, e) {
                }
            });
            return false;
        });
    }
})(jQuery);
