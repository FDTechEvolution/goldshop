$(document).ready(function () {
    //seller
    if ($('#seller').length > 0) {
        $.get(SITE_URL + 'service-selector/seller/').done(function (res) {
            var jsonData = JSON.parse(res);
            $.each(jsonData, function (key, value) {
                $('#seller')
                        .append($("<option></option>")
                                .attr("value", value.id)
                                .attr("data-id", value.id)
                                .text(value.full_name));
            });

        });
    }

    //BankAccount
    if ($('#bank_account_id').length > 0) {
        $.get(SITE_URL + 'service-selector/bank-account/').done(function (res) {
            var jsonData = JSON.parse(res);
            $.each(jsonData.BACC, function (key, value) {
                $('#bank_account_id')
                        .append($("<option></option>")
                                .attr("value", value.id)
                                .attr("data-id", value.id)
                                .text(value.name));
            });

            if ($('#credit_account_id').length > 0) {
                $.each(jsonData.CREDIT, function (key, value) {
                    $('#credit_account_id')
                            .append($("<option></option>")
                                    .attr("value", value.id)
                                    .attr("data-id", value.id)
                                    .text(value.name));
                });
            }

        });
    }
});