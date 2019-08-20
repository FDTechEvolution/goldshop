<div id="main" style="display: none;">
    <?= $content ?>
</div>
<script>
    $(document).ready(function () {
        var goldBarSalesPrice = 0;
        var goldBarPurchasePrice = 0;
        var goldSalesPrice = 0;
        var goldPurchasePrice = 0;
        var title = '';

        if ($('#DetailPlace_uc_goldprices1_lblBLBuy').length > 0) {
            goldBarPurchasePrice = $('#DetailPlace_uc_goldprices1_lblBLBuy').text();
            console.log(goldBarPurchasePrice);
        } else {
            console.log('not found goldBarPurchasePrice');
        }

        if ($('#DetailPlace_uc_goldprices1_lblBLSell').length > 0) {
            goldBarSalesPrice = $('#DetailPlace_uc_goldprices1_lblBLSell').text();
            console.log(goldBarSalesPrice);
        } else {
            console.log('not found goldBarSalesPrice');
        }

        if ($('#DetailPlace_uc_goldprices1_lblOMBuy').length > 0) {
            goldPurchasePrice = $('#DetailPlace_uc_goldprices1_lblOMBuy').text();
            console.log(goldPurchasePrice);
        } else {
            console.log('not found goldPurchasePrice');
        }

        if ($('#DetailPlace_uc_goldprices1_lblOMSell').length > 0) {
            goldSalesPrice = $('#DetailPlace_uc_goldprices1_lblOMSell').text();
            console.log(goldSalesPrice);
        } else {
            console.log('not found goldSalesPrice');
        }

        if ($('#DetailPlace_uc_goldprices1_lblAsTime').length > 0) {
            title = $('#DetailPlace_uc_goldprices1_lblAsTime').text();
            console.log(title);
        } else {
            console.log('not found title');
        }

        var url = window.location.href;
        $.ajax({
            type: "POST",
            url: url,
            async: false,
            data: {
                gold_bar_purchase_price: goldBarPurchasePrice, 
                gold_bar_sales_price: goldBarSalesPrice,
                gold_purchase_price:goldPurchasePrice,
                gold_sales_price:goldSalesPrice,
                title:title
            },
            success: function (response) {
                
            }
        });



    });
</script>