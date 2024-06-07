<script src="{{ asset('/') }}assets/appstack.bootlab.io/js/app.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Select2
        $(".select2").each(function() {
            $(this)
                .wrap("<div class=\"position-relative\"></div>")
                .select2({
                    placeholder: "Select value"
                    , dropdownParent: $(this).parent()
                });
        })
        // Daterangepicker
        $("input[name=\"daterange\"]").daterangepicker({
            opens: "left"
        });
        $("input[name=\"datetimes\"]").daterangepicker({
            timePicker: true
            , opens: "left"
            , startDate: moment().startOf("hour")
            , endDate: moment().startOf("hour").add(32, "hour")
            , locale: {
                format: "M/DD hh:mm A"
            }
        });
        $("input[name=\"datesingle\"]").daterangepicker({
            singleDatePicker: true
            , showDropdowns: true
        });
        var start = moment().subtract(29, "days");
        var end = moment();

        function cb(start, end) {
            $("#reportrange span").html(start.format("MMMM D, YYYY") + " - " + end.format("MMMM D, YYYY"));
        }
        $("#reportrange").daterangepicker({
            startDate: start
            , endDate: end
            , ranges: {
                "Today": [moment(), moment()]
                , "Yesterday": [moment().subtract(1, "days"), moment().subtract(1, "days")]
                , "Last 7 Days": [moment().subtract(6, "days"), moment()]
                , "Last 30 Days": [moment().subtract(29, "days"), moment()]
                , "This Month": [moment().startOf("month"), moment().endOf("month")]
                , "Last Month": [moment().subtract(1, "month").startOf("month"), moment().subtract(1, "month").endOf("month")]
            }
        }, cb);
        cb(start, end);
        // Datetimepicker
        $('#datetimepicker-minimum').datetimepicker();
        $('#datetimepicker-view-mode').datetimepicker({
            viewMode: 'years'
        });
        $('#datetimepicker-time').datetimepicker({
            format: 'LT'
        });
        $('#datetimepicker-date').datetimepicker({
            format: 'L'
        });
    });

</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Bar chart

        new Chart(document.getElementById("chartjs-dashboard-bar"), {
            type: "bar"
            , data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
                , datasets: [{
                    label: "Last year"
                    , backgroundColor: window.theme.primary
                    , borderColor: window.theme.primary
                    , hoverBackgroundColor: window.theme.primary
                    , hoverBorderColor: window.theme.primary
                    , data: [54, 67, 41, 55, 62, 45, 55, 73, 60, 76, 48, 79]
                    , barPercentage: .325
                    , categoryPercentage: .5
                }, {
                    label: "This year"
                    , backgroundColor: window.theme["primary-light"]
                    , borderColor: window.theme["primary-light"]
                    , hoverBackgroundColor: window.theme["primary-light"]
                    , hoverBorderColor: window.theme["primary-light"]
                    , data: [69, 66, 24, 48, 52, 51, 44, 53, 62, 79, 51, 68]
                    , barPercentage: .325
                    , categoryPercentage: .5
                }]
            }
            , options: {
                maintainAspectRatio: false
                , cornerRadius: 15
                , legend: {
                    display: false
                }
                , scales: {
                    yAxes: [{
                        gridLines: {
                            display: false
                        }
                        , ticks: {
                            stepSize: 20
                        }
                        , stacked: true
                    , }]
                    , xAxes: [{
                        gridLines: {
                            color: "transparent"
                        }
                        , stacked: true
                    , }]
                }
            }
        });
    });

</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        $("#datetimepicker-dashboard").datetimepicker({
            inline: true
            , sideBySide: false
            , format: "L"
        });
    });

</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Pie chart
        new Chart(document.getElementById("chartjs-dashboard-pie"), {
            type: "pie"
            , data: {
                labels: ["Direct", "Affiliate", "E-mail", "Other"]
                , datasets: [{
                    data: [2602, 1253, 541, 1465]
                    , backgroundColor: [
                        window.theme.primary
                        , window.theme.warning
                        , window.theme.danger
                        , "#E8EAED"
                    ]
                    , borderWidth: 5
                    , borderColor: window.theme.white
                }]
            }
            , options: {
                responsive: !window.MSInputMethodContext
                , maintainAspectRatio: false
                , cutoutPercentage: 70
                , legend: {
                    display: false
                }
            }
        });
    });

</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        $("#datatables-dashboard-projects").DataTable();
        $("#table1").DataTable();
    });

</script>



{{-- <script src="{{ asset('/') }}assets/appstack.bootlab.io/js/app.js"></script>
<script src="{{ asset('/') }}assets/appstack.bootlab.io/js/settings.js"></script>
<script async src="https://www.googletagmanager.com/gtag/js?id=G-Q3ZYEKLQ68"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-Q3ZYEKLQ68');

</script> --}}



