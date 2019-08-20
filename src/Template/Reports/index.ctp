<?= $this->Html->css('/assets/plugins/morris/morris.css') ?>

<div class="row">
    <div class="col-lg-12">
        <div class="portlet">
            <!-- /primary heading -->
            <div class="portlet-heading">
                <h3 class="portlet-title text-dark">สถิติประจำสัปดาห์ของทุกสาขา</h3>
                <div class="portlet-widgets">
                    <a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
                    <span class="divider"></span>
                    <a data-toggle="collapse" data-parent="#accordion1" href="#bg-default"><i class="ion-minus-round"></i></a>
                    <span class="divider"></span>
                    <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
                </div>
                <div class="clearfix"></div>
            </div>
            <div id="bg-default" class="panel-collapse collapse show">
                <div class="portlet-body">
                    <div class="text-center">
                        <ul class="list-inline chart-detail-list">
                            <li class="list-inline-item">
                                <h5><i class="fa fa-circle m-r-5" style="color: #00b19d;"></i>ยอดขาย</h5>
                            </li>
                            <li class="list-inline-item">
                                <h5><i class="fa fa-circle m-r-5" style="color: #64b5f6;"></i>ยอดซื้อ</h5>
                            </li>
                            <li class="list-inline-item">
                                <h5><i class="fa fa-circle m-r-5" style="color: #dcdcdc;"></i>ยอดจำนำ</h5>
                            </li>
                        </ul>
                    </div>
                    <div id="morris-bar-example" style="height: 300px;"></div>
                </div>
            </div>
        </div>
        <!-- /Portlet -->
    </div>

</div>






<!--Morris Chart-->
<?= $this->Html->script('/assets/plugins/morris/morris.min.js'); ?>
<?= $this->Html->script('/assets/plugins/raphael/raphael-min.js'); ?>

<script>

    /**
     * Theme: Minton Admin Template
     * Author: Coderthemes
     * Morris Chart
     */

    !function ($) {
        "use strict";

        var MorrisCharts = function () {};
        //creates Bar chart
        MorrisCharts.prototype.createBarChart = function (element, data, xkey, ykeys, labels, lineColors) {
            Morris.Bar({
                element: element,
                data: data,
                xkey: xkey,
                ykeys: ykeys,
                labels: labels,
                hideHover: 'auto',
                resize: true, //defaulted to true
                gridLineColor: '#eeeeee',
                barColors: lineColors
            });
        },
                MorrisCharts.prototype.init = function () {
                    var $bar_data = '<?= $stats ?>';
                    //console.log($bar_data);
                    $bar_data = JSON.parse($bar_data);

                    this.createBarChart('morris-bar-example', $bar_data, 'y', ['a', 'b', 'c'], ['ยอดขาย', 'ยอดซื้อ', 'ยอดจำนำ'], ["#00b19d", "#64b5f6", "#dcdcdc"]);


                },
                //init
                $.MorrisCharts = new MorrisCharts, $.MorrisCharts.Constructor = MorrisCharts;
    }(window.jQuery),
            function ($) {
                "use strict";
                $.MorrisCharts.init();
            }(window.jQuery);
</script>
