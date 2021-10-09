<?php

session_start();
require 'config.php';


$sql = "SELECT * FROM `photo` ORDER BY id_photo DESC";
$result = $conn->query($sql);



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>เครื่องให้อาหารสัตว์น้ำ</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <script src="cdn/js/jquery.min.js"></script>
    <script src="https://js-agent.newrelic.com/nr-1169.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="cdn/js/jquery.dataTables.min.js"></script>
    <script src="cdn/js/dataTables.bootstrap4.min.js"></script>
    <script src="/assets/application-3f4ce5ba43587ff2c664d8328149599907aade9dd461e6eff614bf274cdad604.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="cdn/css/dataTables.bootstrap4.min.css">
    <script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script> <!-- jQuery-FusionCharts -->
    <script type="text/javascript" src="https://rawgit.com/fusioncharts/fusioncharts-jquery-plugin/develop/dist/fusioncharts.jqueryplugin.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Fusion Theme -->
    <script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.fusion.js"></script>
    <script type="text/javascript" src="https://pubnub.github.io/eon/v/eon/1.0.0/eon.js"></script>
    <link type="text/css" rel="stylesheet" href="https://pubnub.github.io/eon/v/eon/1.0.0/eon.css" />
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">


    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

   
    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js"></script>
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" />
    <link type="text/css" rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css" />
    <link type="text/css" rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.8/css/rowReorder.bootstrap4.min.css" />


    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                rowReorder: true
            });
        });
    </script>




    <style>
        body {
            font-family: 'Kanit', sans-serif;


        }

        table {
            font-size: 100%;
            margin-left: 10px;


        }

        /* #card1 {
            margin-left: 10px;
            margin-top: 50px;
            margin-right: 40px;
        } */
        h5 {
            margin-left: 20px;
        }

        #logout {
            margin-left: 750px;
        }
    </style>
</head>

<body>

    <div class="row">

        <div class="col-sm-12">
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                <a class="navbar-brand" href="main.php">

                    <img src="logo4.png" alt="logo" style="width:150px; height: auto;">
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="main.php">หน้าหลัก <span class="sr-only">(current)</span></a>
                        </li>


                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                ตั้งค่าการทำงาน
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

                                <a class="dropdown-item" href="add-data.php">ตั้งค่าการทำงาน</a>
                                <a class="dropdown-item" href="edit-data.php">แก้ไขการตั้งค่า</a>
                            </div>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="datafood.php">ข้อมูลการให้อาหาร <span class="sr-only">(current)</span></a>
                        </li>

                        <li class="nav-item active">
                            <a class="nav-link" href="datasensor.php">ข้อมูลปัจจัยต่างๆ <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item active">
                            <a class="navbar-brand " href="main.php">
                                <img src="logout1.png" alt="logo" style=" margin-left: 750px"> </a>
                        </li>

                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <div class="container" style="margin-top:30px">
        <div class="row">
            <div class="col-sm-5">

                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">ปริมาณการให้อาหาร</h6>

                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div id="feed"></div>
                    </div>
                </div>
            </div>
            <div class="col-sm-7">

                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">ปริมาณอาหารในถัง</h6>

                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div id="chart-container"></div>
                            </div>
                            <div class="col-sm-6">
                                <div id="chart-container1"></div>
                            </div>
                        </div>


                    </div>
                </div>

            </div>

        </div>
        <br>
        <div class="row">

            <div class="col-sm-12">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">ปริมาณอาหารที่เหลือในบ่อ</h6>

                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <br>
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>วันเดือนปี</th>

                                    <th>ปริมาณอาหารที่เหลือในบ่อ</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            if ($result->num_rows > 0) {
                                // output data of each row
                                while ($row = $result->fetch_assoc()) {


                            ?>
                                   
                                        <tr>
                                            <td><?php echo  $row["date"] ?></td>
                                            <td><?php echo  $row["count"] ?></td>

                                        </tr>
                                <?php
                                }
                            }
                            $conn->close();
                                ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>วันเดือนปี</th>

                                            <th>ปริมาณอาหารที่เหลือในบ่อ</th>
                                        </tr>
                                    </tfoot>
                        </table>

                    </div>
                </div>


            </div>

        </div>
    </div>

    </div>













    <!-- <input type="text" hidden id="ultrasonic_main"> -->
</body>


</html>
<!-- <script type="text/javascript" src="graph.js"></script> -->
<script type="text/javascript" src="feed.js"></script>

<script>
    $(document).ready(function() {
        var ut = ""
        var utr = ""
        var call = function() {
            $.ajax({
                url: "http://128.199.103.49:3000/api/dis",
                type: "POST",
                success: function(response) {

                    console.log(response);
                    var tem = response['Temperature'];
                    ut = response['ultra1'];
                    utr = response['ultra2'];
                    // document.getElementById('ultrasonic_main').value = ut;
                    //   document.getElementById('ultrasonic_reserve').value = response['ultra2'];
                    // ut = "";
                    // console.log("tem : " + tem);
                },
            });
        }
        setInterval(call, 5000);
        FusionCharts.ready(function() {
            new FusionCharts({
                type: "angulargauge",
                renderAt: "chart-container",
                width: "300",
                height: "250",
                dataFormat: "json",
                dataSource: {
                    chart: {
                        caption: "ถังหลัก",
                        // subCaption: "Belews Creek Power Station<br>In Metric Tonnes",
                        theme: "fusion",
                        showValue: "1"
                    },
                    colorRange: {
                        color: [{
                                minValue: "0",
                                maxValue: "12",
                                code: "#62B58F"
                            },
                            {
                                minValue: "12",
                                maxValue: "24",
                                code: "#FFC533"
                            },
                            {
                                minValue: "24",
                                maxValue: "36",
                                code: "#F2726F"
                            }
                        ]
                    },
                    dials: {
                        dial: [{
                            value: "0",
                            toolText: "<b>$dataValue metric tonnes</b>"
                        }]
                    }
                },
                events: {
                    initialized: function(evt, args) {
                        var chartRef = evt.sender;

                        function addLeadingZero(num) {
                            return num <= 9 ? "0" + num : num;
                        }

                        function updateData() {
                            var val = parseFloat(Math.floor(ut)),
                                strData =
                                "&value=" +
                                val +
                                "&toolText=<b>" +
                                val +
                                " metric tonnes</b>";
                            // Feed it to chart.
                            chartRef.feedData(strData);
                        }

                        chartRef.intervalUpdateId = setInterval(updateData, 5000);
                    },

                    disposed: function(evt, args) {
                        clearInterval(evt.sender.intervalUpdateId);
                    }
                }
            }).render();
        });

        FusionCharts.ready(function() {
            new FusionCharts({
                type: "angulargauge",
                renderAt: "chart-container1",
                width: "300",
                height: "250",
                dataFormat: "json",
                dataSource: {
                    chart: {
                        caption: "ถังสำรอง",
                        // subCaption: "Belews Creek Power Station<br>In Metric Tonnes",
                        theme: "fusion",
                        showValue: "1"
                    },
                    colorRange: {
                        color: [{
                                minValue: "0",
                                maxValue: "15",
                                code: "#62B58F"
                            },
                            {
                                minValue: "15",
                                maxValue: "30",
                                code: "#FFC533"
                            },
                            {
                                minValue: "30",
                                maxValue: "50",
                                code: "#F2726F"
                            }
                        ]
                    },
                    dials: {
                        dial: [{
                            value: "0",
                            toolText: "<b>$dataValue metric tonnes</b>"
                        }]
                    }
                },
                events: {
                    initialized: function(evt, args) {
                        var chartRef = evt.sender;

                        function addLeadingZero(num) {
                            return num <= 9 ? "0" + num : num;
                        }

                        function updateData() {
                            var val = parseFloat(Math.floor(utr)),
                                strData =
                                "&value=" +
                                val +
                                "&toolText=<b>" +
                                val +
                                " metric tonnes</b>";
                            // Feed it to chart.
                            chartRef.feedData(strData);
                        }

                        chartRef.intervalUpdateId = setInterval(updateData, 5000);
                    },

                    disposed: function(evt, args) {
                        clearInterval(evt.sender.intervalUpdateId);
                    }
                }
            }).render();
        });

        FusionCharts.ready(function() {
            new FusionCharts({
                type: "realtimecolumn",
                id: "salesticker",
                renderAt: "food",
                width: "400",
                height: "250",
                dataFormat: "json",
                dataSource: {
                    chart: {
                        caption: "Products Sold Per Second",
                        subCaption: "Gibzal Online",
                        showrealtimevalue: "0",
                        numdisplaysets: "10",
                        theme: "fusion",
                        labeldisplay: "rotate",
                        showValues: "1",
                        placeValuesInside: "0",
                        plotToolText: "<b>$label</b><br>Products Sold: <b>$dataValue</b>"
                    },
                    categories: [{
                        category: [{
                            label: "Start"
                        }]
                    }],
                    dataset: [{
                        seriesname: "",
                        alpha: "100",
                        data: [{
                            value: "12"
                        }]
                    }]
                },
                events: {
                    initialized: function(evt, arg) {
                        var chartRef = evt.sender;
                        //Format minutes, seconds by adding 0 prefix accordingly
                        function formatTime(time) {
                            time < 10 ? (time = "0" + time) : (time = time);
                            return time;
                        }
                        //Update Data method
                        function updateData() {
                            //We need to create a querystring format incremental update, containing
                            //label in hh:mm:ss format and a value (random).
                            var currDate = new Date(),
                                label =
                                formatTime(currDate.getHours()) +
                                ":" +
                                formatTime(currDate.getMinutes()) +
                                ":" +
                                formatTime(currDate.getSeconds()),
                                //Get random number between 1 & 5 - rounded
                                transactions = Math.round(Math.random() * 19) + 1,
                                strData = "&label=" + label + "&value=" + transactions;

                            //Feed it to chart.
                            chartRef.feedData(strData);
                        }

                        chartRef.intervalUpdateId = setInterval(updateData, 1000);
                    },

                    disposed: function(evt, args) {
                        clearInterval(evt.sender.intervalUpdateId);
                    }
                }
            }).render();
        });

















    });
</script>