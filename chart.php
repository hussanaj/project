<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
  <script src="https://cdn.zingchart.com/zingchart.min.js"></script>

</head>

<body>
  <div class="contrainer-fluid">
    <div class="row">
      <div class="col-4">
        <div id="turbidity"></div>
      </div>
      <div class="col-4">
        <div id="ldr"></div>
      </div>
      <div class="col-4">
        <div id="temperature"></div>
      </div>
    </div>

    <div class="row">
      <div class="col-4">
        <div id="air_g"></div>
      </div>
      <div class="col-4">
        <div id="soil_g"></div>
      </div>
      <div class="col-4">
        <div id="temp_g"></div>
      </div>
    </div>
    <br>

  </div>
</body>

</html>
<script type="text/javascript" src="graph.js"></script>
<!-- 
<script>

  function watering (){
    $(document).ready(function() {
    $.ajax({
                    url: "http://206.189.146.206:7000/watering",
                    type: "GET",
                    success: function(response) {
                      console.log(JSON.stringify(response))
                      location.reload();
  }
});
});

  }

  function config (){
    var config = $('#config').val();
    console.log(config)
    console.log("33")
    $(document).ready(function() {
    $.ajax({
                    url: "http://206.189.146.206:7000/update",
                    type: "POST",
                    data: {
                        'val': config,
                    },
                    dataType: "json",
                    success: function(response) {
                      console.log(JSON.stringify(response))
                      location.reload();
  }
});
});
}


</script> -->