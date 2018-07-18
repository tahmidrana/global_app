<div class="row">

    <div class="col-sm-3">

        <div class="xe-widget xe-counter xe-counter-blue" data-count=".num" data-from="1" data-to="166"
             data-duration="3" data-easing="false">
            <div class="xe-icon">
                <i class="linecons-user"></i>
            </div>
            <div class="xe-label">
                <strong class="num">166</strong>
                <span>Users Total</span>
            </div>
        </div>

    </div>

    <div class="col-sm-3">

        <div class="xe-widget xe-counter xe-counter-blue" data-count=".num" data-from="1" data-to="230" data-suffix=""
             data-duration="3" data-easing="false">
            <div class="xe-icon">
                <i class="fa-file-text"></i>
            </div>
            <div class="xe-label">
                <strong class="num">230</strong>
                <span>Total Forms</span>
            </div>
        </div>

    </div>

    <div class="col-sm-3">

        <div class="xe-widget xe-counter xe-counter-info" data-count=".num" data-from="100" data-to="183"
             data-duration="4" data-easing="true">
            <div class="xe-icon">
                <i class="fa-building"></i>
            </div>
            <div class="xe-label">
                <strong class="num">183</strong>
                <span>Number Of Clinics</span>
            </div>
        </div>

    </div>

    <div class="col-sm-3">

        <div class="xe-widget xe-counter xe-counter-red"  data-count=".num" data-from="0" data-to="10" data-prefix=""
             data-suffix="" data-duration="5" data-easing="true" data-delay="1">
            <div class="xe-icon">
                <i class="fa fa-bar-chart"></i>
            </div>
            <div class="xe-label">
                <strong class="num">10</strong>
                <span>Total Grading Policy</span>
            </div>
        </div>

    </div>
</div>
<div class="row">
    <div class="panel panel-default">

        <div class="panel panel-default">
            <div class="panel-body">
                <div id="pie"></div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    var dataSource = [{
        country: "USA",
        medals: 110
    }, {
        country: "China",
        medals: 100
    }, {
        country: "Russia",
        medals: 72
    }, {
        country: "Britain",
        medals: 47
    }, {
        country: "Australia",
        medals: 46
    }, {
        country: "Germany",
        medals: 41
    }, {
        country: "France",
        medals: 40
    }, {
        country: "South Korea",
        medals: 31
    }];
    $(function(){
        $("#pie").dxPieChart({
            palette: "bright",
            dataSource: dataSource,
            title: "Olympic Medals in 2008",
            legend: {
                orientation: "horizontal",
                itemTextPosition: "right",
                horizontalAlignment: "right",
                verticalAlignment: "bottom",
                columnCount: 4
            },
            "export": {
                enabled: true
            },
            series: [{
                argumentField: "country",
                valueField: "medals",
                label: {
                    visible: true,
                    font: {
                        size: 16
                    },
                    connector: {
                        visible: true,
                        width: 0.5
                    },
                    position: "columns",
                    customizeText: function(arg) {
                        return arg.valueText + " (" + arg.percentText + ")";
                    }
                }
            }]
        });
    });

</script>