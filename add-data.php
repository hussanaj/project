<?php
session_start();

include("config.php");
if (isset($_POST['submit'])) {



    $fishname  = $_POST['fishname'];
    $fish_pond = $_POST['fish_pond'];
    $agey  = $_POST['agey'];
    $agem  = $_POST['agem'];
    $amount = $_POST['amount'];
    $datet = $_POST['datet'];
    $quantity = $_POST['quantity'];
    $​​reduce_food  = $_POST['​​reduce_food'];
    $time_feed = $_POST['time_feed'];

    $ratio_1  = $_POST['ratio_1'];
    $ratio_2  = $_POST['ratio_2'];
    $ratio_3  = $_POST['ratio_3'];




    $timefood1 = $_POST['timefood1'];
    $timefood2 = $_POST['timefood2'];
    $timefood3 = $_POST['timefood3'];
    $timefood4 = $_POST['timefood4'];
    $timefood5 = $_POST['timefood5'];

    $value1_min = $_POST['value1_min'];
    $value1_max = $_POST['value1_max'];
    $value2_min = $_POST['value2_min'];
    $value2_max = $_POST['value2_max'];
    $value3_min = $_POST['value3_min'];
    $value3_max = $_POST['value3_max'];
    $value4_min = $_POST['value4_min'];
    $value4_max = $_POST['value4_max'];
    $value5_min = $_POST['value5_min'];
    $value5_max = $_POST['value5_max'];

    $operator_1 = $_POST['operator_1'];
    $operator_2 = $_POST['operator_2'];
    $operator_3 = $_POST['operator_3'];
    $operator_4 = $_POST['operator_4'];


    $ck_1 = $_POST['ck_1'];
    $ck_2 = $_POST['ck_2'];
    $ck_3 = $_POST['ck_3'];
    $ck_4 = $_POST['ck_4'];
    $ck_5 = $_POST['ck_5'];

    $sensor_1 = $_POST['sensor_1'];
    $sensor_2 = $_POST['sensor_2'];
    $sensor_3 = $_POST['sensor_3'];
    $sensor_4 = $_POST['sensor_4'];
    $sensor_5 = $_POST['sensor_5'];















    // $sql = "INSERT INTO `aquatic_animals`(`fish_pond`,`name_animal`,`year_age`,`month_age`,`amount_animal`,`date_release`,`quantity_food`,`level_f`,`frequency_food`,`time_1`,`time_2`,`time_3`,`time_4`,`time_5`)
    // VALUES ($fish_pond,'$fishname',$agey,$agem,$amount,'$datet',$food,1,$Feeding,'$timefood1','$timefood2','$timefood3','$timefood4','$timefood5')";



    // $sql1 = "INSERT INTO `aquatic_animals`(`name_animal`,`fish_pond`,`year_age`,`month_age`,`amount_animal`,`date_release`,`quantity_food`,`reduce_food`,`level_food`,`frequency_food`)
    // VALUES ('$fishname',$fish_pond,$agey,$agem,$amount,'$datet',$quantity,$​​reduce_food,$​​level_food,$frequency)";


    $sql1 = "INSERT INTO `aquatic_animals`(`name_animal`, `fish_pond`, `year_age`, `month_age`, `amount_animal`, `date_release`, `quantity_food`, `reduce_food`, `time_feed`)
    VALUES ('$fishname',$fish_pond,$agey,$agem,$amount,'$datet',$quantity,$​​reduce_food,$time_feed)";


    if ($conn->query($sql1) === TRUE) {
        $sql2 = "INSERT INTO `time_food`(`fish_pond`, `time_1`, `time_2`, `time_3`, `time_4`, `time_5`)
    VALUES ($fish_pond,'$timefood1','$timefood2','$timefood3','$timefood4','$timefood5')";
    }

    if ($conn->query($sql2) === TRUE) {
        if ($value1_min === "") {
            $value1_min = 0;
        }
        if ($value1_max === "") {
            $value1_max = 0;
        }
        if ($value2_min === "") {
            $value2_min = 0;
        }
        if ($value2_max === "") {
            $value2_max = 0;
        }
        if ($value3_min === "") {
            $value3_min  = 0;
        }
        if ($value3_max === "") {
            $value3_max = 0;
        }
        if ($value4_min === "") {
            $value4_min = 0;
        }
        if ($value4_max === "") {
            $value4_max = 0;
        }
        if ($value5_min === "") {
            $value5_min = 0;
        }
        if ($value5_max === "") {
            $value5_max = 0;
        }



        $sql3 = "INSERT INTO `sensor_standard`(`fish_pond`,`value1_min`, `value1_max`, `value2_min`, `value2_max`, `value3_min`, `value3_max`, `value4_min`, `value4_max`, `value5_min`, `value5_max`) 
VALUES ($fish_pond,$value1_min,$value1_max,$value2_min,$value2_max,$value3_min,$value3_max,$value4_min,$value4_max,$value5_min,$value5_max)";
    }

    if ($conn->query($sql3) === TRUE) {

        if ($ck_1 === 0) {
            $operator_1 = 0;
        }
        if ($ck_2 === 0) {
            $operator_2 = 0;
        }
        if ($ck_3 === 0) {
            $operator_3 = 0;
        }
        if ($ck_4 === 0) {
            $operator_4 = 0;
        }




        $sql4 = "INSERT INTO `operator`(`fish_pond`, `operator_1`, `operator_2`, `operator_3`, `operator_4`)
    VALUES ($fish_pond,$operator_1,$operator_2,$operator_3,$operator_4)";
    }

    if ($conn->query($sql4) === TRUE) {

        if ($ck_1 === 0) {
            $sensor_1 = 0;
        }
        if ($ck_2 === 0) {
            $sensor_2 = 0;
        }
        if ($ck_3 === 0) {
            $sensor_3 = 0;
        }
        if ($ck_4 === 0) {
            $sensor_4 = 0;
        }
        if ($ck_5 === 0) {
            $sensor_5 = 0;
        }



        $sql5 = "INSERT INTO `couple`(`fish_pond`, `sensor_1`, `sensor_2`, `sensor_3`, `sensor_4`, `sensor_5`)
    VALUES ($fish_pond,$sensor_1,$sensor_2,$sensor_3,$sensor_4,$sensor_5)";
        // echo $sql5;
    }

    if ($conn->query($sql5) === TRUE) {

        $sql6 = "INSERT INTO `ratio_food`(`fish_pond`, `ratio_1`, `ratio_2`, `ratio_3`)
        VALUES ($fish_pond,$ratio_1,$ratio_2,$ratio_3)";
        echo $sql6;
    }



    if ($conn->query($sql6) === TRUE) {
        header("Location: main.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
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
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />




    <style>
        body {
            font-family: 'Kanit', sans-serif;

        }


        #card1 {
            margin-left: 10px;
            margin-top: 50px;
            margin-right: 40px;
        }

        #logout {
            margin-left: 750px;
        }

        .hidden {
            visibility: hidden;
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
        <form class="dropzone dropzone-custom needsclick add-professors" id="demo1-upload" method="post">
            <div class="row">
                <div class="col-sm-1">

                </div>
                <div class="col-sm-10">

                    <div class="card " id="card1">
                        <div class="card-body shadow-lg  bg-white rounded ">

                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                                    <div class="form-group">
                                        <input name="fishname" id="fishname" type="text" class="form-control" placeholder="ชื่อพันธุ์สัตว์น้ำ" required>
                                    </div>
                                    <div class="form-group">
                                        <input name="fish_pond" id="fish_pond" type="text" class="form-control" placeholder="บ่อ" required>
                                    </div>
                                    <div class="form-group">
                                        <input name="agey" id="agey" type="text" class="form-control" placeholder="อายุสัตว์น้ำ(ปี)" required>
                                    </div>
                                    <div class="form-group">
                                        <input name="agem" type="text" class="form-control" placeholder="อายุสัตว์น้ำ(เดือน)" required>
                                    </div>

                                    <div class="form-group">
                                        <input name="amount" type="text" class="form-control" placeholder="จำนวนสัตว์น้ำ" required>
                                    </div>
                                    <div class="form-group">
                                        <input name="datet" id="datepicker" class="form-control" placeholder="วันที่ปล่อย" required>

                                    </div>
                                    <div class="form-group">
                                        <input name="quantity" id="quantity" type="text" class="form-control" placeholder="ปริมาณอาหาร(กก.)" required>
                                    </div>
                                    <!-- <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">ระดับการเหวี่ยงอาหาร</label>
                                        </div>
                                        <select class="custom-select" id="level_food" name="level_food" required>
                                            <option selected>โปรดเลือก</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </select>
                                    </div> -->
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">ลดปริมาณอาหาร</label>
                                        </div>
                                        <select class="custom-select" id="reduce_food" name="​​reduce_food" required>
                                            <option selected>โปรดเลือก</option>
                                            <option value="5">5%</option>
                                            <option value="10">10%</option>
                                            <option value="15">15% </option>
                                            <option value="20">20%</option>
                                            <option value="25">25%</option>
                                            <option value="30">30% </option>
                                        </select>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">เวลาในการให้สัตว์น้ำกินอาหารหมด</label>
                                        </div>
                                        <select class="custom-select" id="time_feed" name="time_feed" required>
                                            <option selected>โปรดเลือก</option>
                                            <option value="1">1 นาที</option>
                                            <option value="2">2 นาที </option>
                                            <option value="3">3 นาที</option>
                                            <option value="4">4 นาที</option>
                                            <option value="5">5 นาที </option>
                                            <option value="10">10 นาที </option>
                                        </select>
                                    </div>



                                    <!-- <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">ระดับการเหวี่ยงอาหาร</label>
                                        </div>

                                        <select class="custom-select" id="​​levelfood" name="​​levelfood">
                                            <option hidden selected>โปรดเลือก...</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>

                                        </select>
                                    </div> -->
                                    <!-- <div class="form-group">
                                        <select name="Feeding" id="Feeding" type="number" class="form-control" placeholder="ความถี่ในการให้อาหารใน 1 วัน(ครั้ง)" onchange="value_feed()">
                                    </div> -->


                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                                    <div class="input-group mb-3">
                                        <!-- <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">สูตรการให้อาหารใน 1 มื้อ</label>
                                        </div> -->
                                        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#myModal">สูตรการแบ่งสัดส่วนปริมาณการให้อาหาร</button>
                                        <!-- <select class="custom-select" id="Feeding" name="Feeding" onchange="value_feed();"> -->

                                        <div class="modal fade" id="myModal">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">สูตรการแบ่งสัดส่วนปริมาณการให้อาหารใน 1 มื้อ</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                        <!-- <h6>การให้อาหาร </h6> -->
                                                        <h6>ตัวอย่าง อาหาร 1 กิโลกรัม แบ่งเป็น 50% 40% 10%</h6>


                                                    </div>

                                                    <!-- Modal footer -->
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>


                                        



                                        <select class="custom-select" id="ratio_1" name="ratio_1">
                                            <option value="0" selected>โปรดเลือก...</option>
                                            <option value="10">10%</option>
                                            <option value="20">20%</option>
                                            <option value="30">30%</option>
                                            <option value="40">40%</option>
                                            <option value="50">50%</option>
                                            <option value="60">60%</option>
                                            <option value="60">60%</option>
                                            <option value="70">70%</option>
                                            <option value="80">80%</option>
                                            <option value="90">90%</option>
                                            <option value="100">100%</option>
                                        </select>
                                    </div>

                                   

                                    <div class="input-group mb-3">

                                        <select  id="ratio_2" name="ratio_2" class="custom-select">
                                            <option value="0" selected>โปรดเลือก...</option>
                                            <option value="10">10%</option>
                                            <option value="20">20%</option>
                                            <option value="30">30%</option>
                                            <option value="40">40%</option>
                                            <option value="50">50%</option>
                                            <option value="60">60%</option>
                                            <option value="60">60%</option>
                                            <option value="70">70%</option>
                                            <option value="80">80%</option>
                                            <option value="90">90%</option>
                                            <option value="100">100%</option>
                                        </select>
                                    </div>
                                    <div class="input-group mb-3">

                                        <select  id="ratio_3" name="ratio_3" class="custom-select">
                                            <option value="0" selected>โปรดเลือก...</option>
                                            <option value="10">10%</option>
                                            <option value="20">20%</option>
                                            <option value="30">30%</option>
                                            <option value="40">40%</option>
                                            <option value="50">50%</option>
                                            <option value="60">60%</option>
                                            <option value="60">60%</option>
                                            <option value="70">70%</option>
                                            <option value="80">80%</option>
                                            <option value="90">90%</option>
                                            <option value="100">100%</option>
                                        </select>
                                    </div>
                                    <div id="gen_time_feed" class="form-group">

                                        <div class="form-group">
                                            <input name="timefood1" class="form-control" placeholder="เวลาในการให้อาหาร" id="timepicker1">
                                        </div>
                                        <div class="form-group">
                                            <input name="timefood2" class="form-control" placeholder="เวลาในการให้อาหาร" id="timepicker2">
                                        </div>
                                        <div class="form-group">
                                            <input name="timefood3" class="form-control" placeholder="เวลาในการให้อาหาร" id="timepicker3">
                                        </div>
                                        <div class="form-group">
                                            <input name="timefood4" class="form-control" placeholder="เวลาในการให้อาหาร" id="timepicker4">
                                        </div>
                                        <div class="form-group">
                                            <input name="timefood5" class="form-control" placeholder="เวลาในการให้อาหาร" id="timepicker5">
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>

                </div>
                <div class="col-sm-1">
                </div>

            </div>

            <div class="row">
                <div class="col-sm-1">

                </div>
                <div class="col-sm-10">

                    <div class="card " id="card1">
                        <div class="card-body shadow-lg  bg-white rounded ">

                            <div class="row">


                                <div class="col-sm-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="checkbox" value="1" id="ck_1" name="ck_1">
                                            </div>
                                        </div>
                                        <select name="sensor_1" id="sensor_1" class="custom-select ">
                                            <option value="0" selected>โปรดเลือกค่าปัจจัย</option>
                                            <option value="1">ออกซิเจน</option>
                                            <option value="2">กรด-เบส</option>
                                            <option value="3">ความขุ่น</option>
                                            <option value="4">ความเค็ม</option>
                                            <option value="5">อุณหภูมิ</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input name="value1_min" id="value1_min" type="text" class="form-control" placeholder="ค่าเกณฑ์มาตรฐาน(ต่ำสุด)">
                                    </div>

                                    <div class="input-group mb-3">
                                        <select name="operator_1" id="operator_1" class="custom-select ">
                                            <option value="0" selected>โปรดเลือกตัวดำเนินการ</option>
                                            <option value="1">และ</option>
                                            <option value="2">หรือ</option>

                                        </select>
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="checkbox" value="1" id="ck_2" name="ck_2">
                                            </div>
                                        </div>
                                        <select name="sensor_2" id="sensor_2" class="custom-select ">
                                            <option value="0" selected>โปรดเลือกค่าปัจจัย</option>
                                            <option value="1">ออกซิเจน</option>
                                            <option value="2">กรด-เบส</option>
                                            <option value="3">ความขุ่น</option>
                                            <option value="4">ความเค็ม</option>
                                            <option value="5">อุณหภูมิ</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input name="value2_min" id="value2_min" type="text" class="form-control" placeholder="ค่าเกณฑ์มาตรฐาน(ต่ำสุด)">
                                    </div>
                                    <div class="input-group mb-3">

                                        <select id="operator_2" name="operator_2" class="custom-select ">
                                            <option value="0" selected>โปรดเลือกตัวดำเนินการ</option>
                                            <option value="1">และ</option>
                                            <option value="2">หรือ</option>

                                        </select>
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="checkbox" value="1" id="ck_3" name="ck_3">
                                            </div>
                                        </div>
                                        <select name="sensor_3" id="sensor_3" class="custom-select ">
                                            <option value="0" selected>โปรดเลือกค่าปัจจัย</option>
                                            <option value="1">ออกซิเจน</option>
                                            <option value="2">กรด-เบส</option>
                                            <option value="3">ความขุ่น</option>
                                            <option value="4">ความเค็ม</option>
                                            <option value="5">อุณหภูมิ</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input name="value3_min" id="value3_min" type="text" class="form-control" placeholder="ค่าเกณฑ์มาตรฐาน(ต่ำสุด)">
                                    </div>
                                    <div class="input-group mb-3">

                                        <select name="operator_3" id="operator_3" class="custom-select ">
                                            <option value="0" selected>โปรดเลือกตัวดำเนินการ</option>
                                            <option value="1">และ</option>
                                            <option value="2">หรือ</option>

                                        </select>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="checkbox" value="1" id="ck_4" name="ck_4">
                                            </div>
                                        </div>
                                        <select name="sensor_4" id="sensor_4" class="custom-select ">
                                            <option value="0" selected>โปรดเลือกค่าปัจจัย</option>
                                            <option value="1">ออกซิเจน</option>
                                            <option value="2">กรด-เบส</option>
                                            <option value="3">ความขุ่น</option>
                                            <option value="4">ความเค็ม</option>
                                            <option value="5">อุณหภูมิ</option>


                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input name="value4_min" id="value4_min" type="text" class="form-control" placeholder="ค่าเกณฑ์มาตรฐาน(ต่ำสุด)">
                                    </div>

                                    <div class="input-group mb-3">

                                        <select name="operator_4" id="operator_4" class="custom-select ">
                                            <option value="0" selected>โปรดเลือกตัวดำเนินการ</option>
                                            <option value="1">และ</option>
                                            <option value="2">หรือ</option>

                                        </select>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="checkbox" value="1" id="ck_5" name="ck_5">
                                            </div>
                                        </div>
                                        <select name="sensor_5" id="sensor_5" class="custom-select ">
                                            <option value="0" selected>โปรดเลือกค่าปัจจัย</option>
                                            <option value="1">ออกซิเจน</option>
                                            <option value="2">กรด-เบส</option>
                                            <option value="3">ความขุ่น</option>
                                            <option value="4">ความเค็ม</option>
                                            <option value="5">อุณหภูมิ</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input name="value5_min" id="value5_min" type="text" class="form-control" placeholder="ค่าเกณฑ์มาตรฐาน(ต่ำสุด)">
                                    </div>


                                </div>
                                <div class="col-sm-6">

                                    <div class="form-group" style="margin-top:55px;">
                                        <input name="value1_max" id="value1_max" type="text" class="form-control" placeholder="ค่าเกณฑ์มาตรฐาน(สูงสุด)">
                                    </div>

                                    <div class="form-group" style="margin-top:125px;">
                                        <input name="value2_max" id="value2_max" type="text" class="form-control" placeholder="ค่าเกณฑ์มาตรฐาน(สูงสุด)">
                                    </div>

                                    <div class="form-group" style="margin-top:125px;">
                                        <input name="value3_max" id="value3_max" type="text" class="form-control" placeholder="ค่าเกณฑ์มาตรฐาน(สูงสุด)">
                                    </div>

                                    <div class="form-group" style="margin-top:120px;">
                                        <input name="value4_max" id="value4_max" type="text" class="form-control" placeholder="ค่าเกณฑ์มาตรฐาน(สูงสุด)">
                                    </div>

                                    <div class="form-group" style="margin-top:125px;">
                                        <input name="value5_max" id="value5_max" type="text" class="form-control" placeholder="ค่าเกณฑ์มาตรฐาน(สูงสุด)">
                                    </div>

                                </div>



                            </div>
                        </div>

                    </div>
                    <div class="col-sm-1">

                    </div>

                </div>

            </div>


            <div class="row">
                <div class="col-sm-1">

                </div>
                <div class="col-sm-10">

                    <div class="card " id="card1">
                        <div class="card-body shadow-lg  bg-white rounded ">
                            <div class="row">
                                <div class="col-sm-6">
                                    <button name="submit" type="submit" class="btn btn-primary btn-lg btn-block">บันทึก</button>
                                </div>
                                <div class="col-sm-6">
                                    <a class="btn btn-danger btn-lg btn-block" href="main.php">ยกเลิก</a>

                                </div>
                            </div>




                        </div>
                    </div>


                </div>
                <div class="col-sm-1">

                </div>

            </div>
        </form>
    </div>
</body>

<!-- Javascript -->
<script>
    $('#datepicker').datepicker({
        uiLibrary: 'bootstrap4'
    });

    $('#timepicker1').timepicker({
        uiLibrary: 'bootstrap4'
    });

    $('#timepicker2').timepicker({
        uiLibrary: 'bootstrap4'
    });

    $('#timepicker3').timepicker({
        uiLibrary: 'bootstrap4'
    });
    $('#timepicker4').timepicker({
        uiLibrary: 'bootstrap4'
    });
    $('#timepicker5').timepicker({
        uiLibrary: 'bootstrap4'
    });
    // function start() {
    // var food = document.getElementById("food").value;
    // var level_f = document.getElementById("level_f").value;
    // var salinity1 = document.getElementById("salinity1").value;
    // var salinity2 = document.getElementById("salinity2").value;
    // var temperature1 = document.getElementById("temperature1").value;
    // var temperature2 = document.getElementById("temperature2").value;
    // var ph1 = document.getElementById("ph1").value;
    // var ph2  = document.getElementById("ph2").value;
    // var turbidity1 = document.getElementById("turbidity1").value;
    // var turbidity2 = document.getElementById("turbidity2").value;
    // var oxygen1 = document.getElementById("oxygen1").value;
    // var oxygen2 = document.getElementById("oxygen2").value;


    //     console.log(JSON.stringify(gg));
    //     $.ajax({
    //         type: "GET",
    //         url: 'http://128.199.103.49:3000/api/start/' + food + '/' + level_f + '/' + salinity1 + '/' + salinity2 + '/' + temperature1 + '/' + temperature2 + '/' + ph1 + '/' + ph2 + '/' + turbidity1 + '/' + turbidity2 + '/' + oxygen1 + '/' + oxygen2,
    //         success: function(response) {

    //             // if (result["status"] == 1) {
    //             //     toastr.info('เครื่องพร้อมทำงาน')
    //             // } else if (result["status"] == 0) {
    //             //     Swal.fire({
    //             //         icon: 'error',
    //             //         title: 'Oops...',
    //             //         text: 'ผิดพลาด',
    //             //     })
    //             // }
    //         }
    //     });


    // };
</script>
<script>
    // function value_feed() {
    //     var value = $('#Feeding').val();
    //     console.log(value);
    //     var i;
    //     for (i = 0; i < value; i++) {
    //         console.log("loop = " + i)
    //         $('#gen_time_feed').append('<input name="department' + i + '" class="form-control" placeholder="เวลาในการให้อาหาร" id="timepicker">');
    //     }
    // }

    // function value_feed() {
    //     var value = $('#Feeding').val();
    //     console.log('value = ' + value);
    //     var i = 0;
    //     $('#gen_time_feed').empty();
    //     while (i < value) {
    //         $('#gen_time_feed').append('<div class="form-group"><input name="timefood" class="form-control" placeholder="เวลาในการให้อาหาร" id="timepicker"></div>').timepicker({
    //             uiLibrary: 'bootstrap4'
    //         });;
    //         i++;
    //     }
    // }

    // $("#Feeding").change(function() {
    //     var value = $('#Feeding').val();
    //     console.log('value = ' + value);
    //     var i = 0;

    // });


    // function start() {
    //     var gg = document.getElementById("fishname");
    //     var gg1 = document.getElementById("agey");

    //     console.log(JSON.stringify(gg));
    //     $.ajax({
    //         type: "GET",
    //         url: 'http://127.0.0.1:3000/api/start/' + gg + '/' + gg1,
    //         success: function(response) {


    //         }
    //     });
    // };
</script>

</html>