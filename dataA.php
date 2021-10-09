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
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@100&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
    </style>
</head>

<body>

    <div class="row">

        <div class="col-sm-12">
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                <a class="navbar-brand" href="main.php">

                    <img src="logo2.png" alt="logo" style="width:50px;">
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
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                ข้อมูลการให้อาหาร
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="#">ปริมาณการให้อาหาร</a>
                                <a class="dropdown-item" href="#">ปริมาณอาหารในถัง</a>
                                <a class="dropdown-item" href="#">ปริมาณอาหารที่เหลือในบ่อ</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                ข้อมูลปัจจัยต่างๆ
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="temperature.php">ปัจจัยโดยรวม</a>
                               
                            </div>
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
        <form action="/upload" class="dropzone dropzone-custom needsclick add-professors" id="demo1-upload">
            <div class="row">
                <div class="col-sm-1">

                </div>
                <div class="col-sm-10">

                    <div class="card " id="card1">
                        <div class="card-body shadow-lg  bg-white rounded ">

                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <br>
                            <?php
                            require 'config.php';
                            $sql1 = "SELECT * FROM `aquatic_animals` where 2 ";
                            $result1 = $conn->query($sql1);
                            ?>
                            <?php

                            while ($row1  = $result1->fetch_assoc()) {

                            ?>

                                <tr>
                                    <p>
                                        <td align="left" bgcolor="#FFFFFF">ข้อมูลสัตว์น้ำ </td>
                                    </p>
                                </tr>
                                <tr>
                                    <p>
                                        <td align="left" bgcolor="#FFFFFF">ชื่อพันธุ์สัตว์น้ำ : </span><?php echo $row1["name_animal"]; ?></td>
                                    </p>
                                </tr>

                                <tr>
                                    <p>
                                        <td align="left" bgcolor="#FFFFFF">อายุสัตว์น้ำ : </span><?php echo $row1["year_age"]; ?> ปี </span><?php echo $row1["month_age"]; ?> เดือน</td>
                                    </p>
                                </tr>
                                <tr>
                                    <p>
                                        <td align="left" bgcolor="#FFFFFF">จำนวนสัตว์น้ำ (ตัว) : </span><?php echo $row1["amount_animal"]; ?></td>
                                    </p>
                                </tr>
                                <tr>
                                    <p>
                                        <td align="left" bgcolor="#FFFFFF">วันที่ปล่อยสัตว์น้ำ : </span><?php echo $row1["date_release"]; ?></td>
                                    </p>
                                </tr>

                                <tr>
                                    <p>
                                        <td align="left" bgcolor="#FFFFFF">ปริมาณอาหารที่ให้ (กก.) : </span><?php echo $row1["quantity_food"]; ?> </td>
                                    </p>
                                </tr>
                                <tr>
                                    <p>
                                        <td align="left" bgcolor="#FFFFFF">ความถี่ในการให้อาหารใน 1 วัน (ครั้ง) : </span><?php echo $row1["frequency_food"]; ?></td>
                                    </p>
                                </tr>
                                <tr>
                                    <p>
                                        <td align="left" bgcolor="#FFFFFF">เวลาในการให้อาหาร : </span><?php echo $row1["id_time"]; ?></td>
                                    </p>
                                </tr>

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

                    <div class="card " id="card2">
                        <div class="card-body shadow-lg  bg-white rounded ">

                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <tr>
                                    <p>
                                        <td align="left" bgcolor="#FFFFFF">ค่าเกณฑ์มาตรฐานออกซิเจนในน้ำ(ต่ำสุด) : </span><?php echo $row1["oxygen_min"]; ?></td>
                                    </p>
                                </tr>
                                <tr>
                                    <p>
                                        <td align="left" bgcolor="#FFFFFF">ค่าเกณฑ์มาตรฐานอุณหภูมิในน้ำ(ต่ำสุด) : </span><?php echo $row1["temperature_min"]; ?></td>
                                    </p>
                                </tr>
                                <tr>
                                    <p>
                                        <td align="left" bgcolor="#FFFFFF">ค่าเกณฑ์มาตรฐานกรด-เบสในน้ำ(ต่ำสุด) : </span><?php echo $row1["ph_min"]; ?></td>
                                    </p>
                                </tr>
                                <tr>
                                    <p>
                                        <td align="left" bgcolor="#FFFFFF">ค่าเกณฑ์มาตรฐานความขุ่นในน้ำ(ต่ำสุด) : </span><?php echo $row1["turbidity_min"]; ?></td>
                                    </p>
                                </tr>
                                <tr>
                                    <p>
                                        <td align="left" bgcolor="#FFFFFF">ค่าเกณฑ์มาตรฐานความเค็มในน้ำ(ต่ำสุด) : </span><?php echo $row1["salinity_min"]; ?></td>
                                    </p>
                                </tr>


                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <tr>
                                    <p>
                                        <td align="left" bgcolor="#FFFFFF">ค่าเกณฑ์มาตรฐานออกซิเจนในน้ำ(สูงสุด) : </span><?php echo $row1["oxygen_max"]; ?></td>
                                    </p>
                                </tr>
                                <tr>
                                    <p>
                                        <td align="left" bgcolor="#FFFFFF">ค่าเกณฑ์มาตรฐานอุณหภูมิในน้ำ(สูงสุด) : </span><?php echo $row1["temperature_max"]; ?></td>
                                    </p>
                                </tr>

                                <tr>
                                    <p>
                                        <td align="left" bgcolor="#FFFFFF">ค่าเกณฑ์มาตรฐานกรด-เบสในน้ำ(สูงสุด) : </span><?php echo $row1["ph_max"]; ?></td>
                                    </p>
                                </tr>

                                <tr>
                                    <p>
                                        <td align="left" bgcolor="#FFFFFF">ค่าเกณฑ์มาตรฐานความขุ่นในน้ำ(สูงสุด) : </span><?php echo $row1["turbidity_max"]; ?></td>
                                    </p>
                                </tr>

                                <tr>
                                    <p>
                                        <td align="left" bgcolor="#FFFFFF">ค่าเกณฑ์มาตรฐานความเค็มในน้ำ(สูงสุด) : </span><?php echo $row1["salinity_max"]; ?></td>
                                    </p>
                                </tr>
                            <?php
                            }

                            ?>

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
                    
                <button name="ok" type="submit" class="btn btn-primary">ตกลง</button>
                <button name="reset"  type="submit" class="btn btn-primary">รีเซ็ต</button>
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

    $('#timepicker').timepicker({
        uiLibrary: 'bootstrap4'
    });

    function value_feed() {
        var value = $('#Feeding').val();
        console.log(value);
        var i;
        for (i = 0; i < value; i++) {
            console.log("loop = " + i)
            $('#gen_time_feed').append('<input name="department' + i + '" class="form-control" placeholder="เวลาในการให้อาหาร" id="timepicker' + i + '">');
        }
    }
</script>

</html>