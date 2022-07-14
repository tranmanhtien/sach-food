(function ($) {
    $paymentMethod = $(
        "input[name=payoff_method]:checked",
        "#form-payment"
    ).val();
    if ($paymentMethod === "0") {
        $("#paypal-button-container").hide();
    } else {
        $("#paypal-button-container").show();
    }

    $("input[type=radio][name=payoff_method]").change(function (e) {
        if (e.target.value === "0") {
            $("#paypal-button-container").hide();
            $("#btn-payment").show();
        } else {
            $("#btn-payment").hide();
            $("#paypal-button-container").show();
        }
    });
})(jQuery);
