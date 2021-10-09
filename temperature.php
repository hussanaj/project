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

    <script src="cdn/js/jquery.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <script src="https://js-agent.newrelic.com/nr-1169.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
  <script src="cdn/js/jquery.dataTables.min.js"></script>
  <script src="cdn/js/dataTables.bootstrap4.min.js"></script>
  <script src="/assets/application-3f4ce5ba43587ff2c664d8328149599907aade9dd461e6eff614bf274cdad604.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

 
  <script type="text/javascript" src="https://pubnub.github.io/eon/v/eon/1.0.0/eon.js"></script>
  <link type="text/css" rel="stylesheet" href="https://pubnub.github.io/eon/v/eon/1.0.0/eon.css" />

    <style>
        body {
            font-family: 'Kanit', sans-serif;

        }


        #card1 {
            margin-left: 10px;
            margin-top: 50px;
            margin-right: 40px;
        }
       #logout{
        margin-left: 750px;
       }
    </style>
</head>

<body>

    <div class="row">

        <div class="col-sm-12">
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary" >
                <a class="navbar-brand" href="main.php">
                    
                <img src="logo2.png" alt="logo" style="width:70px;" >
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
                            <a class="nav-link dropdown-toggle"  id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                ข้อมูลสัตว์น้ำ
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="data.php">ข้อมูลโดยรวม</a>
                                <a class="dropdown-item" href="add-data.php">เพิ่มข้อมูล</a>
                                <a class="dropdown-item" href="edit-data.php">แก้ไขข้อมูล</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle"  id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                ข้อมูลการให้อาหาร
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="#">ปริมาณการให้อาหาร</a>
                                <a class="dropdown-item" href="#">ปริมาณอาหารในถัง</a>
                                <a class="dropdown-item" href="#">ปริมาณอาหารที่เหลือในบ่อ</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle"  id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                ข้อมูลปัจจัยต่างๆ
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="temperature.php">ปัจจัยโดยรวม</a>
                               
                            </div>
                        </li>
                        <li class="nav-item active">
                            <a class="navbar-brand " href="main.php">
                            <img src="logout1.png" alt="logo" style=" margin-left: 750px" > </a>
                        </li>
                        
                    </ul>
                </div>
            </nav>
        </div>
    </div>
<div class="container" style="margin-top:30px">
    <div class="row">
        <div class="col-sm-1">

        </div>
        <div class="col-sm-10">

            <div class="card " id="card1">
                <div class="card-body shadow-lg  bg-white rounded ">
                    
                <div class="row">
      <div class="col-lg-2"></div>
      <div class="col-lg-8">

        <div id="chart"></div>
        </n>
        <input type="text" class="form-control" id="temdata">
        

      </div>
      <div class="col-lg-3"></div>
    </div>
                </div>
            </div>


        </div>
        <div class="col-sm-1">

        </div>

    </div>

    </div>

    <script>
    


    $(document).ready(function() {

      var call = function() {
        $.ajax({
          url: "http://localhost:3000/api/tem",
          type: "GET",
          success: function(response) {

            var tem = response['Temperature']
            
            document.getElementById('temdata').value = response['Temperature'];
           
            console.log("tem : " + tem);
          },

          error: function(jqXHR, textStatus, errorThrown) {}
        });
      }
      setInterval(call, 5000);

      var pubnub = new PubNub({
        publishKey: 'demo', // replace with your own pub-key
        subscribeKey: 'demo' // replace with your own sub-key
      });

      eon.chart({
        pubnub: pubnub,
        channels: ["c3-spline"],
        generate: {
          bindto: '#chart',
          data: {
            labels: true
          }
        }
      });


      var pubnub = new PubNub({
        publishKey: 'demo', // replace with your own pub-key
        subscribeKey: 'demo' // replace with your own sub-key
      });

      setInterval(function() {
        pubnub.publish({
          channel: 'c3-spline',
          message: {
            eon: {
              'tem': Math.floor($("#temdata").val()),
            }
          }
        });

      }, 5000);

    });
  </script>












</body>


</html>