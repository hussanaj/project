<script data-main="scripts/main" src="require.js"></script>
<script src="index.js"></script>

<?php

session_start();
require 'config.php';


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>เครื่องให้อาหารสัตว์น้ำ</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Kanit', sans-serif;


        }

        .table {
            margin-top: -20px;


        }

        #card1 {
            margin-left: 10px;
            margin-top: 50px;
            margin-right: 40px;
        }

        #logout {
            margin-left: 750px;
        }

        #stop_work {

            margin-top: 30px;


        }

        /* #status_p {

            margin-top: 100px;

            margin-right: 800px;
        } */
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
            <div class="col-sm-12">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">สถานะการทำงาน</h6>

                    </div>

                    <div class="card-body">
                        <?php

                        $api_url = 'http://128.199.103.49:3000/api/status';

                        // Read JSON file
                        $json_data = file_get_contents($api_url);

                        // Decode JSON data into PHP array
                        $response_data = json_decode($json_data);

                        // All user data exists in 'data' object
                        // var_dump($response_data);
                        // echo $response_data['status'][1];
                        $user_data = $response_data->status;

                        ?>

                        <h6 id="status">สถานะ : <?php if ($user_data == 1) {
                                                    echo "กำลังทำงาน";
                                                } else if ($user_data == 0) {
                                                    echo "หยุดทำงาน";
                                                }
                                                ?></h6>

                        <?php
                        $sql2 = "SELECT * FROM aquatic_animals AS d1 
                INNER JOIN sensor_standard AS d2 ON (d1.fish_pond = d2.fish_pond) 
                INNER JOIN time_food AS d3 ON (d1.fish_pond = d3.fish_pond)
                INNER JOIN couple AS d4 ON (d1.fish_pond = d4.fish_pond)
                INNER JOIN ratio_food AS d5 ON (d1.fish_pond = d5.fish_pond)";
                        $result2 = $conn->query($sql2);
                        $row2 = $result2->fetch_assoc();

                        ?>

                        <a onclick="return confirm('ต้องการหยุดการทำงาน?')" href="stop_work.php?fish_pond= <?php echo  $row2["fish_pond"] ?> " class="btn btn-outline-danger" id="stop_work">หยุดการทำงาน</a>



                        <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modoll">
                            อาหารเหลือ
                        </button> -->

                        <!-- Modal -->

                        <div class="modal fade" id="modoll" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">อาหารเหลือในบ่อ</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                    <?php
                        $sql3 = "SELECT * FROM `photo` ORDER BY date DESC LIMIT 1";
                        $result3 = $conn->query($sql3);
                        $row3 = $result3->fetch_assoc();

                        ?>
                        <h6>อาหารเหลือ<?php echo  $row3["count"] ?>กรัม </h6>

                                        <h6>ต้องการให้ดำเนินการให้อาหารต่อหรือไม่</h6>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" id="stop" value="2" data-dismiss="modal" onclick="stop()">ไม่</button>
                                        <button type="button" class="btn btn-primary" id="start" value="1" data-dismiss="modal" onclick="start()">ใช่</button>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>



        <div class="row">
            <div class="col-sm-6">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">ข้อมูลสัตว์น้ำ</h6>

                    </div>
                    <!-- Card Body -->

                    <div class="card-body">
                        <table class="table">
                            <?php
                            $sql = "SELECT * FROM aquatic_animals AS d1 
                            INNER JOIN sensor_standard AS d2 ON (d1.fish_pond = d2.fish_pond) 
                            INNER JOIN time_food AS d3 ON (d1.fish_pond = d3.fish_pond)
                            INNER JOIN couple AS d4 ON (d1.fish_pond = d4.fish_pond)
                            INNER JOIN ratio_food AS d5 ON (d1.fish_pond = d5.fish_pond)";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                // output data of each row
                                while ($row = $result->fetch_assoc()) {
                                    if ($row["sensor_1"] == 1) {
                                        $ox_min = $row["value1_min"];
                                        $ox_max = $row["value1_max"];
                                    } elseif ($row["sensor_1"] == 2) {
                                        $ph_min = $row["value1_min"];
                                        $ph_max = $row["value1_max"];
                                    } elseif ($row["sensor_1"] == 3) {
                                        $tur_min = $row["value1_min"];
                                        $tur_max = $row["value1_max"];
                                    } elseif ($row["sensor_1"] == 4) {
                                        $sal_min = $row["value1_min"];
                                        $sal_max = $row["value1_max"];
                                    } elseif ($row["sensor_1"] == 5) {
                                        $tem_min = $row["value1_min"];
                                        $tem_max = $row["value1_max"];
                                    } else {
                                    }

                                    if ($row["sensor_2"] == 1) {
                                        $ox_min = $row["value2_min"];
                                        $ox_max = $row["value2_max"];
                                    } elseif ($row["sensor_2"] == 2) {
                                        $ph_min = $row["value2_min"];
                                        $ph_max = $row["value2_max"];
                                    } elseif ($row["sensor_2"] == 3) {
                                        $tur_min = $row["value2_min"];
                                        $tur_max = $row["value2_max"];
                                    } elseif ($row["sensor_2"] == 4) {
                                        $sal_min = $row["value2_min"];
                                        $sal_max = $row["value2_max"];
                                    } elseif ($row["sensor_2"] == 5) {
                                        $tem_min = $row["value2_min"];
                                        $tem_max = $row["value2_max"];
                                    } else {
                                    }

                                    if ($row["sensor_3"] == 1) {
                                        $ox_min = $row["value3_min"];
                                        $ox_max = $row["value3_max"];
                                    } elseif ($row["sensor_3"] == 2) {
                                        $ph_min = $row["value3_min"];
                                        $ph_max = $row["value3_max"];
                                    } elseif ($row["sensor_3"] == 3) {
                                        $tur_min = $row["value3_min"];
                                        $tur_max = $row["value3_max"];
                                    } elseif ($row["sensor_3"] == 4) {
                                        $sal_min = $row["value3_min"];
                                        $sal_max = $row["value3_max"];
                                    } elseif ($row["sensor_3"] == 5) {
                                        $tem_min = $row["value3_min"];
                                        $tem_max = $row["value3_max"];
                                    } else {
                                    }

                                    if ($row["sensor_4"] == 1) {
                                        $ox_min = $row["value4_min"];
                                        $ox_max = $row["value4_max"];
                                    } elseif ($row["sensor_4"] == 2) {
                                        $ph_min = $row["value4_min"];
                                        $ph_max = $row["value4_max"];
                                    } elseif ($row["sensor_4"] == 3) {
                                        $tur_min = $row["value4_min"];
                                        $tur_max = $row["value4_max"];
                                    } elseif ($row["sensor_4"] == 4) {
                                        $sal_min = $row["value4_min"];
                                        $sal_max = $row["value4_max"];
                                    } elseif ($row["sensor_4"] == 5) {
                                        $tem_min = $row["value4_min"];
                                        $tem_max = $row["value4_max"];
                                    } else {
                                    }

                                    if ($row["sensor_5"] == 1) {
                                        $ox_min = $row["value5_min"];
                                        $ox_max = $row["value5_max"];
                                    } elseif ($row["sensor_5"] == 2) {
                                        $ph_min = $row["value5_min"];
                                        $ph_max = $row["value5_max"];
                                    } elseif ($row["sensor_5"] == 3) {
                                        $tur_min = $row["value5_min"];
                                        $tur_max = $row["value5_max"];
                                    } elseif ($row["sensor_5"] == 4) {
                                        $sal_min = $row["value5_min"];
                                        $sal_max = $row["value5_max"];
                                    } elseif ($row["sensor_5"] == 5) {
                                        $tem_min = $row["value5_min"];
                                        $tem_max = $row["value5_max"];
                                    } else {
                                    }


                            ?>
                                    <tbody>
                                        <tr>
                                            <td>บ่อ : </td>
                                            <td><?php echo  $row["fish_pond"] ?></td>
                                        </tr>
                                        <tr>
                                            <td>ชื่อพันธุ์สัตว์น้ำ : </td>
                                            <td><?php echo  $row["name_animal"] ?></td>
                                        </tr>
                                        <tr>
                                            <td>อายุสัตว์น้ำ :</td>
                                            <td><?php echo  $row["year_age"] ?> ปี <?php echo  $row["month_age"] ?> เดือน </td>


                                        </tr>
                                        <tr>
                                            <td>จำนวนสัตว์น้ำ :</td>
                                            <td><?php echo  $row["amount_animal"] ?> ตัว</td>
                                        </tr>
                                        <tr>
                                            <td>วันที่ปล่อยสัตว์น้ำ :</td>
                                            <td><?php echo  $row["date_release"] ?></td>
                                        </tr>
                                        <tr>
                                            <td>ปริมาณอาหารที่ให้ : </td>
                                            <td><?php echo  $row["quantity_food"] ?> กก.</td>
                                        </tr>
                                        <tr>
                                            <td>ลดปริมาณอาหาร : </td>
                                            <td><?php echo  $row["reduce_food"] ?> % </td>
                                        </tr>
                                        <tr>
                                            <td>เวลาในการให้สัตว์น้ำกินอาหารหมด : </td>
                                            <td><?php echo  $row["time_feed"] ?> นาที </td>
                                        </tr>

                                        <tr>
                                            <td>สูตรการแบ่งสัดส่วนปริมาณการให้อาหาร:</td>
                                            <td><?php echo  $row["ratio_1"]  ?> <?php echo  $row["ratio_2"] ?> <?php echo  $row["ratio_3"] ?> </td>

                                        </tr>



                                        <tr>
                                            <td>เวลาในการให้อาหาร :</td>
                                            <td><?php echo  $row["time_1"] ?> </td>

                                        </tr>
                                        <tr>
                                            <td>เวลาในการให้อาหาร : </td>
                                            <td><?php echo  $row["time_2"] ?> </td>

                                        </tr>
                                        <tr>
                                            <td>เวลาในการให้อาหาร :</td>
                                            <td><?php echo  $row["time_3"] ?> </td>

                                        </tr>
                                        <tr>
                                            <td>เวลาในการให้อาหาร : </td>
                                            <td><?php echo  $row["time_4"] ?> </td>

                                        </tr>
                                        <tr>
                                            <td>เวลาในการให้อาหาร :</td>
                                            <td><?php echo  $row["time_5"] ?> </td>

                                        </tr>

                                    </tbody>
                        </table>


                    </div>
                </div>


            </div>
            <div class="col-sm-6">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">ข้อมูลค่ามาตรฐานปัจจัยต่างๆ</h6>

                    </div>
                    <!-- Card Body -->
                    <div class="card-body">

                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>ค่าเกณฑ์มาตรฐานความเค็มในน้ำ (ต่ำสุด) :</td>
                                    <td><?php echo  $sal_min ?></td>
                                </tr>
                                <tr>
                                    <td>ค่าเกณฑ์มาตรฐานความเค็มในน้ำ (สูงสุด) :</td>
                                    <td><?php echo  $sal_max ?></td>
                                </tr>
                                <tr>
                                    <td>ค่าเกณฑ์มาตรฐานอุณหภูมิในน้ำ (ต่ำสุด) :</td>
                                    <td><?php echo  $tem_min ?></td>
                                </tr>
                                <tr>
                                    <td>ค่าเกณฑ์มาตรฐานอุณหภูมิในน้ำ (สูงสุด) :</td>
                                    <td><?php echo  $tem_max ?></td>
                                </tr>
                                <tr>
                                    <td>ค่าเกณฑ์มาตรฐานกรด-เบสในน้ำ (ต่ำสุด) :</td>
                                    <td><?php echo  $ph_min ?></td>
                                </tr>
                                <tr>
                                    <td>ค่าเกณฑ์มาตรฐานกรด-เบสในน้ำ (สูงสุด) :</td>
                                    <td><?php echo  $ph_max ?></td>
                                </tr>
                                <tr>
                                    <td>ค่าเกณฑ์มาตรฐานความขุ่นในน้ำ (ต่ำสุด) :</td>
                                    <td><?php echo  $tur_min ?></td>
                                </tr>
                                <tr>
                                    <td>ค่าเกณฑ์มาตรฐานความขุ่นในน้ำ (สูงสุด) :</td>
                                    <td><?php echo  $tur_max ?></td>
                                </tr>
                                <tr>
                                    <td>ค่าเกณฑ์มาตรฐานออกซิเจนในน้ำ (ต่ำสุด) :</td>
                                    <td><?php echo  $ox_min ?></td>
                                </tr>
                                <tr>
                                    <td>ค่าเกณฑ์มาตรฐานออกซิเจนในน้ำ (สูงสุด) :</td>
                                    <td><?php echo  $ox_max ?></td>
                                </tr>
                        <?php
                                }
                            }
                            $conn->close();
                        ?>
                            </tbody>
                        </table>

                    </div>
                </div>

            </div>

        </div>


    </div>














</body>


</html>
<script>
    function start() {
        var gg = document.getElementById("start").value;


        console.log(JSON.stringify(gg));
        $.ajax({
            type: "GET",
            url: 'http://128.199.103.49:3000/api/alertt/' + gg,
            success: function(response) {


            }
        });

    }

    function stop() {
        var gg = document.getElementById("stop").value;


        console.log(JSON.stringify(gg));
        $.ajax({
            type: "GET",
            url: 'http://128.199.103.49:3000/api/alertt/' + gg,
            success: function(response) {


            }
        });

    }


    // var myVar = setInterval(model, 1500);


    // function model() {
    //     $.ajax({
    //         type: "GET",
    //         url: 'http://localhost:3000/api/alert',
    //         success: function(response) {
    //             console.log(response['feed']);
    //             // console.log(response);
    //             if (response['feed'] == "1") {
    //                clearInterval(timerInterval);
    //                 // document.getElementById("exampleModalCenter").innerHTML = "STOP";
    //                 // document.getElementById("base-timer-path-remaining").innerHTML = "STOP";
    //                 $('#modoll').modal("show");

    //             }


    //         }
    //     });
    // }


    $(document).ready(function() {
        // function model() {
        $.ajax({
            type: "GET",
            url: 'http://128.199.103.49:3000/api/alert',
            success: function(response) {
                console.log(response['feed']);
                // console.log(response);
                if (response['feed'] == "1") {
                    //    clearInterval(timerInterval);
                    // document.getElementById("exampleModalCenter").innerHTML = "STOP";
                    // document.getElementById("base-timer-path-remaining").innerHTML = "STOP";
                    $('#modoll').modal("show");

                }


            }
        });
        //}

    });
</script>