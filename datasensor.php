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


    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>



    <style>
        body {
            font-family: 'Kanit', sans-serif;


        }

        table {
            font-size: 120%;
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
            <div class="col-sm-12">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <!-- <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">ค่าอุณหภูมิในน้ำ</h6>

                    </div> -->
                    <!-- Card Body -->
                    <div class="card-body">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#calibrate">Data Simpling Time</button>
                        <div class="modal fade" id="calibrate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="calibrate">Data Simpling Time</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form>

                                       






                                        <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">เวลา</label>
                                        </div>
                                        <input name="time_sensor" id="time_sensor" type="text" class="form-control" placeholder="นาที" value="">
                                    </div>





                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                                        <button type="button" class="btn btn-primary" id="data_time" onclick="time_s()" data-dismiss="modal">ตกลง</button>
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
                        <h6 class="m-0 font-weight-bold text-primary">ค่าอุณหภูมิในน้ำ</h6>

                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div id="temperature"></div>
                    </div>
                </div>


            </div>

            <div class="col-sm-6">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">ค่าออกซิเจนในน้ำ</h6>

                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div id="oxygen"></div>
                    </div>
                </div>


            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">

                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">ค่าความเค็มในน้ำ</h6>

                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div id="salinity"></div>


                    </div>
                </div>
            </div>

            <div class="col-sm-4">

                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">ค่าความเป็นกรด-เบสในน้ำ</h6>

                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div id="ph"></div>


                    </div>
                </div>

            </div>
            <div class="col-sm-4">

                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">ค่าความขุ่นในน้ำ</h6>

                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div id="turbidity"></div>


                    </div>
                </div>

            </div>
        </div>

    </div>


    <!-- </div>

    </div> -->



</body>


</html>
<script type="text/javascript" src="graph.js"></script>
<script>

function time_s() {
        var time_s = document.getElementById("time_sensor").value;


        console.log(JSON.stringify(time_s));
        $.ajax({
            type: "GET",
            url: 'http://128.199.103.49:3000/api/time/' + time_s,
            success: function(response) {


            }
        });

    }

</script>