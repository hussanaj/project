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
    $​​level_food  = $_POST['level_food'];
    $frequency = $_POST['frequency'];
    $remainder = $_POST['remainder'];
    $timefood1 = $_POST['timefood1'];
    $timefood2 = $_POST['timefood2'];
    $timefood3 = $_POST['timefood3'];
    $timefood4 = $_POST['timefood4'];
    $timefood5 = $_POST['timefood5'];
    $oxygen1 = $_POST['oxygen1'];
    $oxygen2 = $_POST['oxygen2'];
    $temperature1 = $_POST['temperature1'];
    $temperature2 = $_POST['temperature2'];
    $ph1 = $_POST['ph1'];
    $ph2 = $_POST['ph2'];
    $turbidity1 = $_POST['turbidity1'];
    $turbidity2 = $_POST['turbidity2'];
    $salinity1 = $_POST['salinity1'];
    $salinity2 = $_POST['salinity2'];

    $oxygen_operator = $_POST['oxygen_operator'];
    $temperature_operator = $_POST['temperature_operator'];
    $ph_operator = $_POST['ph_operator'];
    $turbidity_operator = $_POST['turbidity_operator'];
    $salinity_operator = $_POST['salinity_operator'];

    $oxygen_ck = $_POST['oxygen_ck'];
    $temperature_ck = $_POST['temperature_ck'];
    $ph_ck = $_POST['ph_ck'];
    $turbidity_ck = $_POST['turbidity_ck'];
    $salinity_ck = $_POST['salinity_ck'];

    $oxygen_couple = $_POST['oxygen_couple'];
    $temperature_couple = $_POST['temperature_couple'];
    $ph_couple = $_POST['ph_couple'];
    $turbidity_couple = $_POST['turbidity_couple'];
    $salinity_couple = $_POST['salinity_couple'];








    // $sql = "INSERT INTO `aquatic_animals`(`fish_pond`,`name_animal`,`year_age`,`month_age`,`amount_animal`,`date_release`,`quantity_food`,`level_f`,`frequency_food`,`time_1`,`time_2`,`time_3`,`time_4`,`time_5`)
    // VALUES ($fish_pond,'$fishname',$agey,$agem,$amount,'$datet',$food,1,$Feeding,'$timefood1','$timefood2','$timefood3','$timefood4','$timefood5')";



    // $sql1 = "INSERT INTO `aquatic_animals`(`name_animal`,`fish_pond`,`year_age`,`month_age`,`amount_animal`,`date_release`,`quantity_food`,`reduce_food`,`level_food`,`frequency_food`)
    // VALUES ('$fishname',$fish_pond,$agey,$agem,$amount,'$datet',$quantity,$​​reduce_food,$​​level_food,$frequency)";


    $sql1 = "INSERT INTO `aquatic_animals`(`name_animal`, `fish_pond`, `year_age`, `month_age`, `amount_animal`, `date_release`, `quantity_food`, `reduce_food`, `level_food`, `frequency_food`, `remainder`)
    VALUES ('$fishname',$fish_pond,$agey,$agem,$amount,'$datet',$quantity,$​​reduce_food,$​​level_food,$frequency,$remainder)";
    

    if ($conn->query($sql1) === TRUE) {
        $sql2 = "INSERT INTO `time_food`(`fish_pond`, `time_1`, `time_2`, `time_3`, `time_4`, `time_5`)
    VALUES ($fish_pond,'$timefood1','$timefood2','$timefood3','$timefood4','$timefood5')";
    }

    if ($conn->query($sql2) === TRUE) {
        if ($oxygen1 === "") {
            $oxygen1 = 0;
            
        }
        if ($oxygen2 === "") {
            $oxygen2 = 0;
        }
        if ($temperature1 === "") {
            $temperature1 = 0;
        }
        if ($temperature2 === "") {
            $temperature2 = 0;
        }
        if ($ph1 === "") {
            $ph1  = 0;
        }
        if ($ph2 === "") {
            $ph2 = 0;
        }
        if ($turbidity1 === "") {
            $turbidity1 = 0;
        }
        if ($turbidity2 === "") {
            $turbidity2 = 0;
        }
        if ($salinity1 === "") {
            $salinity1 = 0;
        }
        if ($salinity2 === "") {
            $salinity2 = 0;
        }
        $sql3 = "INSERT INTO `sensor_standard`(`fish_pond`,`oxygen_min`, `oxygen_max`, `temperature_min`, `temperature_max`, `ph_min`, `ph_max`, `turbidity_min`, `turbidity_max`, `salinity_min`, `salinity_max`) 
VALUES ($fish_pond,$oxygen1,$oxygen2,$temperature1,$temperature2,$ph1,$ph2,$turbidity1,$turbidity2,$salinity1,$salinity2)";
    }

    if ($conn->query($sql3) === TRUE) {

        if ($oxygen_ck === 0) {
            $oxygen_operator = 0;
            
        }
        if ($temperature_ck === 0) {
            $temperature_operator = 0;
        }
        if ($ph_ck === 0) {
            $ph_operator = 0;
        }
        if ($turbidity_ck === 0) {
            $turbidity_operator = 0;
        }
        if ($salinity_ck === 0) {
            $salinity_operator = 0;
        }



        $sql4 = "INSERT INTO `operator`(`fish_pond`, `temperature_operator`, `ph_operator`, `turbidity_operator`, `oxygen_operator`, `salinity_operator`)
    VALUES ($fish_pond,$temperature_operator,$ph_operator,$turbidity_operator,$oxygen_operator, $salinity_operator)";
    }
    
    if ($conn->query($sql4) === TRUE) {

        if ($oxygen_ck === 0) {
            $oxygen_couple = 0;
            
        }
        if ($temperature_ck === 0) {
            $temperature_couple = 0;
        }
        if ($ph_ck === 0) {
            $ph_couple = 0;
        }
        if ($turbidity_ck === 0) {
            $turbidity_couple = 0;
        }
        if ($salinity_ck === 0) {
            $salinity_couple = 0;
        }



        $sql5 = "INSERT INTO `couple`(`fish_pond`, `oxygen_couple`, `temperature_couple`, `ph_couple`, `turbidity_couple`, `salinity_couple`)
    VALUES ($fish_pond,$oxygen_couple,$temperature_couple, $ph_couple,$turbidity_couple, $salinity_couple)";
    echo $sql1;
    }

    if ($conn->query($sql5) === TRUE) {
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
                                ข้อมูลสัตว์น้ำ
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="main.php">ข้อมูลโดยรวม</a>
                                <a class="dropdown-item" href="add-data.php">เพิ่มข้อมูล</a>
                                <a class="dropdown-item" href="edit-data.php">แก้ไขข้อมูล</a>
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
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">ระดับการเหวี่ยงอาหาร</label >
                                        </div>
                                        <select class="custom-select" id="level_food" name="level_food" required>
                                            <option selected>โปรดเลือก</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </select>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">อาหารเหลือ</label>
                                        </div>
                                        <select class="custom-select" id="remainder" name="remainder" required>
                                            <option selected>โปรดเลือก</option>
                                            <option value="10">10%</option>
                                            <option value="15">15% </option>
                                            <option value="20">20%</option>
                                            <option value="25">25%</option>
                                            <option value="30">30% </option>
                                            <option value="40">40% </option>
                                        </select>
                                    </div>
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
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">ความถี่ในการให้อาหารใน 1 วัน(ครั้ง)</label>
                                        </div>
                                        <!-- <select class="custom-select" id="Feeding" name="Feeding" onchange="value_feed();"> -->
                                        <select class="custom-select" id="frequency" name="frequency" required>
                                            <option hidden selected>โปรดเลือก...</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
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
                                    <div class="form-group">
                                        <input name="oxygen1" id="oxygen1" type="text" class="form-control" placeholder="ค่าเกณฑ์มาตรฐานออกซิเจนในน้ำ(ต่ำสุด)">
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="checkbox" value="1" id="oxygen_ck" name="oxygen_ck">
                                            </div>
                                        </div>
                                        <select name="oxygen_operator" id="oxygen_operator" class="custom-select ">
                                            <option value="0" selected>โปรดเลือกตัวดำเนินการ</option>
                                            <option value="1">และ</option>
                                            <option value="2">หรือ</option>

                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <input name="temperature1" id="temperature1" type="text" class="form-control" placeholder="ค่าเกณฑ์มาตรฐานอุณหภูมิในน้ำ(ต่ำสุด)">
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="checkbox" value="1" id="temperature_ck" name="temperature_ck">
                                            </div>
                                        </div>
                                        <select id="temperature_operator" name="temperature_operator" class="custom-select ">
                                            <option value="0" selected>โปรดเลือกตัวดำเนินการ</option>
                                            <option value="1">และ</option>
                                            <option value="2">หรือ</option>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input name="ph1" id="ph1" type="text" class="form-control" placeholder="ค่าเกณฑ์มาตรฐานกรด-เบสในน้ำ(ต่ำสุด)">
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="checkbox" value="1" id="ph_ck" name="ph_ck">
                                            </div>
                                        </div>
                                        <select name="ph_operator" id="ph_operator" class="custom-select ">
                                            <option value="0" selected>โปรดเลือกตัวดำเนินการ</option>
                                            <option value="1">และ</option>
                                            <option value="2">หรือ</option>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input name="turbidity1" id="turbidity1" type="text" class="form-control" placeholder="ค่าเกณฑ์มาตรฐานความขุ่นในน้ำ(ต่ำสุด)">
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="checkbox" value="1" id="turbidity_ck" name="turbidity_ck">
                                            </div>
                                        </div>
                                        <select name="turbidity_operator" id="turbidity_operator" class="custom-select ">
                                            <option value="0" selected>โปรดเลือกตัวดำเนินการ</option>
                                            <option value="1">และ</option>
                                            <option value="2">หรือ</option>

                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <input name="salinity1" id="salinity1" type="text" class="form-control" placeholder="ค่าเกณฑ์มาตรฐานความเค็มในน้ำ(ต่ำสุด)">
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="checkbox" value="1" id="salinity_ck" name="salinity_ck">
                                            </div>
                                        </div>
                                        <select name="salinity_operator" id="salinity_operator" class="custom-select ">
                                            <option value="0" selected>โปรดเลือกตัวดำเนินการ</option>
                                            <option value="1">และ</option>
                                            <option value="2">หรือ</option>

                                        </select>
                                    </div>


                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input name="oxygen2" id="oxygen2" type="text" class="form-control" placeholder="ค่าเกณฑ์มาตรฐานออกซิเจนในน้ำ(สูงสุด)">
                                    </div>
                                    <div class="input-group mb-3">

                                        <select name="oxygen_couple" id="oxygen_couple" class="custom-select ">
                                            <option value="0" selected>โปรดเลือกค่าถัดไป</option>
                                            <option value="1">อุณหภูมิ</option>
                                            <option value="2">กรด-เบส</option>
                                            <option value="3">ความขุ่น</option>
                                            <option value="4">ความเค็ม</option>


                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input name="temperature2" id="temperature2" type="text" class="form-control" placeholder="ค่าเกณฑ์มาตรฐานอุณหภูมิในน้ำ(สูงสุด)">
                                    </div>
                                    <div class="input-group mb-3">

                                        <select name="temperature_couple" id="temperature_couple" class="custom-select ">
                                            <option value="0" selected>โปรดเลือกค่าถัดไป</option>
                                            <option value="5">ออกซิเจน</option>
                                            <option value="2">กรด-เบส</option>
                                            <option value="3">ความขุ่น</option>
                                            <option value="4">ความเค็ม</option>


                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input name="ph2" id="ph2" type="text" class="form-control" placeholder="ค่าเกณฑ์มาตรฐานกรด-เบสในน้ำ(สูงสุด)">
                                    </div>
                                    <div class="input-group mb-3">

                                        <select name="ph_couple" id="ph_couple" class="custom-select ">
                                            <option value="0" selected>โปรดเลือกค่าถัดไป</option>
                                            <option value="5">ออกซิเจน</option>
                                            <option value="1">อุณหภูมิ</option>
                                            <option value="3">ความขุ่น</option>
                                            <option value="4">ความเค็ม</option>


                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input name="turbidity2" id="turbidity2" type="text" class="form-control" placeholder="ค่าเกณฑ์มาตรฐานความขุ่นในน้ำ(สูงสุด)">
                                    </div>
                                    <div class="input-group mb-3">

                                        <select name="turbidity_couple" id="turbidity_couple" class="custom-select ">
                                            <option value="0" selected>โปรดเลือกค่าถัดไป</option>
                                            <option value="5">ออกซิเจน</option>
                                            <option value="1">อุณหภูมิ</option>
                                            <option value="2">กรด-เบส</option>
                                            <option value="4">ความเค็ม</option>


                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input name="salinity2" id="salinity2" type="text" class="form-control" placeholder="ค่าเกณฑ์มาตรฐานความเค็มในน้ำ(สูงสุด)">
                                    </div>
                                    <div class="input-group mb-3">

                                        <select name="salinity_couple" id="salinity_couple" class="custom-select ">
                                            <option value="0" selected>โปรดเลือกค่าถัดไป</option>
                                            <option value="5">ออกซิเจน</option>
                                            <option value="1">อุณหภูมิ</option>
                                            <option value="2">กรด-เบส</option>
                                            <option value="3">ความขุ่น</option>


                                        </select>
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

                            <button name="submit" type="submit" class="btn btn-primary" onclick="start()">ตกลง</button>
                            <button name="reset" type="reset" class="btn btn-primary">รีเซ็ต</button>
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