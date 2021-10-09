

var mqtt = require('mqtt');

const express = require('express');
const { query } = require('express');
const app = express();
app.use(express.json());
///////////////////////////////////////////////////////////
const MQTT_SERVER = "128.199.103.49";
const MQTT_PORT = "1883";
//if your server don't have username and password let blank.
const MQTT_USER = "mymqtt";
const MQTT_PASSWORD = "ken220641";

app.use(function (req, res, next) {
    res.header("Access-Control-Allow-Origin", "*");
    res.header("Access-Control-Allow-Methods", "*");
    res.header("Access-Control-Allow-Headers", "*");
    next();
});

var config = {
    host: "128.199.103.49",
    user: "kkken",
    password: "ken220641",
    database: "projectfeed",
};
//////////////////////////////////// Connect MQTT
var client = mqtt.connect({
    host: MQTT_SERVER,
    port: MQTT_PORT,
    username: MQTT_USER,
    password: MQTT_PASSWORD
});
/////////////////////////////////////// check 
client.on('connect', function () {
    // Subscribe any topic
    console.log("MQTT Connect");
    client.subscribe('mynew/test', function (err) {
        if (err) {
            console.log(err);
        }
    });
    client.subscribe('project/test', function (err) {
        if (err) {
            console.log(err);
        }
    });
    client.subscribe('weigh/do', function (err) {
        if (err) {
            console.log(err);
        }
    });

    client.subscribe('feed/food', function (err) {
        if (err) {
            console.log(err);
        }
    });




});
 ///////เชื่อมต่อฐานข้อมูล
var mysql = require('mysql');
const { json } = require('body-parser');
// const { data } = require('jquery');

var con = mysql.createConnection({
    host: '128.199.103.49',
    user: 'kkken',
    password: 'ken220641',
    database: "projectfeed"
});

function intervalFunc() {       /////////ตรวจสอบเวลา
   
    var now = new Date();
    let nz_date_string1 = new Date(now).toLocaleString("en-US", { timeZone: 'Asia/Bangkok' });
    console.log(nz_date_string1);
    let date_nz1 = new Date(nz_date_string1);
    let hour = ("0" + date_nz1.getHours()).slice(-2);
    console.log(hour);
    let minute = ("0" + date_nz1.getMinutes()).slice(-2);
    console.log(minute);
    // var hour = nz_date_string1.getHours();
    // var minute = nz_date_string1.getMinutes();
    // console.log(hour + ':' + minute)
    var call_detail = "SELECT * FROM `time_food`";
    console.log(call_detail);


    con.query(call_detail, function (err, result) {
        if (err) throw err;
        console.log(result)
        //var status_feed = []
        if (result == "") {
            status_feed =
            {
                "status": 0

            }
            console.log("stop")

            //    document.getElementById("statusjs").value = "stop";


        } else {
            status_feed =
            {
                "status": 1
            }
            // document.getElementById("statusjs").value = "start";
            // status_feed = 1
            console.log("start")
            var key = Object.keys(result);

            for (i = 0; i < key.length; i++) {
                console.log(result[i].fish_pond)
                console.log(result[i].time_1)
                console.log(result[i].time_2)
                console.log(result[i].time_3)
                console.log(result[i].time_4)
                console.log(result[i].time_5)
                var time1 = result[i].time_1.split(":")
                var time2 = result[i].time_2.split(":")
                var time3 = result[i].time_3.split(":")
                var time4 = result[i].time_4.split(":")
                var time5 = result[i].time_5.split(":")
                if (time1[0] == hour && time1[1] == minute) {
                    console.log("เวลา 1");
                    startWorking()
                }
                if (time2[0] == hour && time2[1] == minute) {
                    console.log("เวลา 2");
                    startWorking()
                }
                if (time3[0] == hour && time3[1] == minute) {
                    console.log("เวลา 3");
                    startWorking()
                }
                if (time4[0] == hour && time4[1] == minute) {
                    console.log("เวลา 4");
                    startWorking()
                }
                if (time5[0] == hour && time5[1] == minute) {
                    console.log("เวลา 5");
                    startWorking()
                }

                //  result[i].fish_pond;
                // data['time_1'] = result[i].time_1
                // data['time_2'] = result[i].time_2
                // data['time_3'] = result[i].time_3
                // data['time_4'] = result[i].time_4
                // data['time_5'] = result[i].time_5
            }
        }
    });
}
setInterval(intervalFunc, 60000);

function startWorking() {   ////ส่งข้อมูลต่างๆไปยัง mqtt
    var con = mysql.createConnection(config);

    // var car_id = req.body.car_id;
    con.connect(function (err) {
        if (err) throw err;
        console.log("Mysql Connected!");
        var food = []
        var call_detail = "SELECT * FROM `aquatic_animals` AS d1 INNER JOIN sensor_standard AS d2 ON (d1.fish_pond = d2.fish_pond) INNER JOIN operator AS d3 ON (d1.fish_pond = d3.fish_pond) INNER JOIN couple AS d4 ON (d1.fish_pond = d4.fish_pond) INNER JOIN ratio_food AS d5 ON (d1.fish_pond = d5.fish_pond)";
        console.log(call_detail);
        con.query(call_detail, function (err, result) {
            if (err) throw err;
            // console.log(result[0].id_animal)
            var key = Object.keys(result);
            var jsonData = []
            for (i = 0; i < key.length; i++) {
                var data = {}

                data['quantity'] = result[i].quantity_food
                data['reduce'] = result[i].reduce_food
                data['time'] = result[i].time_feed
                data['r_1'] = result[i].ratio_1
                data['r_2'] = result[i].ratio_2
                data['r_3'] = result[i].ratio_3

                data['ox_min'] = result[i].value1_min
                data['ox_max'] = result[i].value1_max
                data['tem_min'] = result[i].value2_min
                data['tem_max'] = result[i].value2_max
                data['ph_min'] = result[i].value3_min
                data['ph_max'] = result[i].value3_max
                data['tu_min'] = result[i].value4_min
                data['tu_max'] = result[i].value4_max
                data['sal_min'] = result[i].value5_min
                data['sal_max'] = result[i].value5_max



                data['tem_op'] = result[i].operator_1
                data['ph_op'] = result[i].operator_2
                data['tu_op'] = result[i].operator_3
                data['ox_op'] = result[i].operator_4


                data['ox_co'] = result[i].sensor_1
                data['tem_co'] = result[i].sensor_2
                data['ph_co'] = result[i].sensor_3
                data['tu_co'] = result[i].sensor_4
                data['sal_co'] = result[i].sensor_5
                jsonData.push(data)
            }
            console.log(jsonData)
            var dd = JSON.stringify(data)
            client.publish("project/start", dd);
        });
    });
}


// Receive Message and print on terminal
client.on('message', function (topic, message) {   ////บันทึกค่าตัวรับรุ้ลงฐานข้อมูล
    // message is Buffer
    if (topic === "mynew/test") {
        var gg = (message.toString());
        tt = JSON.parse(gg)
        console.log(tt["Temperature"])
        tem = tt["Temperature"];
        var ans = tem.split(",");
        var temperature = ans[0];
        console.log(temperature)
        var turbidity = ans[1];
        console.log(turbidity)
        var distance1 = ans[2];
        console.log(distance1)
        var distance2 = ans[3];
        console.log(distance2)
        var ph = ans[4];
        console.log(ph)
        var oxygen = ans[5];
        console.log(oxygen)
        var salinity = ans[6];
        console.log(salinity)

        var con = mysql.createConnection({
            host: '128.199.103.49',
            user: 'kkken',
            password: 'ken220641',
            database: "projectfeed"
        });
        con.connect(function (err) {
            if (err) throw err;
            console.log('---Con mysql---');
            var temperature_ck
            var turbidity_ck
            var distance1_ck
            var distance2_ck
            var ph_ck
            var oxygen_ck
            var salinity_ck

            var check_value = "SELECT * FROM `sensor` ORDER BY `id_senser` DESC LIMIT 1";
            con.query(check_value, function (err, result2) {
                if (err) throw err;
                console.log(result2);
                temperature_ck = result2[0].temperature_w;
                turbidity_ck = result2[0].turbidity_w;
                distance1_ck = result2[0].ultrasonic_main;
                distance2_ck = result2[0].ultrasonic_reserve;
                ph_ck = result2[0].ph;
                oxygen_ck = result2[0].oxygen;
                salinity_ck = result2[0].salinity;


                if (temperature != temperature_ck || turbidity != turbidity_ck || distance1 != distance1_ck || distance2 != distance2_ck || ph != ph_ck || oxygen != oxygen_ck || salinity != salinity_ck) {

                    var sql = "INSERT INTO `sensor`(`temperature_w`, `turbidity_w`, `ultrasonic_main`, `ultrasonic_reserve`, `ph`, `oxygen`, `salinity`) VALUES (" + temperature + "," + turbidity + "," + distance1 + "," + distance2 + "," + ph + "," + oxygen + "," + salinity + ")";
                    // console.log(result);
                    con.query(sql, function (err, result) {
                        if (err) throw err;
                        console.log("1 record inserted");
                    });
                } else {
                    console.log(" not")
                }
                con.end();
            });

            // var sql = "INSERT INTO `sensor`(`temperature_w`, `turbidity_w`, `ultrasonic_main`, `ultrasonic_reserve`, `ldr`) VALUES (" + temperature + "," + turbidity + "," + distance1 + "," + distance2 + "," + ldr + ")";
            // con.query(sql, function (err, result) {
            //     if (err) throw err;
            //     console.log("1 record inserted");
            // });
            
        });
        
    }
});


////////////////////////////////////บันทึกปริมาณอาหารที่ให้

client.on('message', function (topic, message) {   
    // message is Buffer
    if (topic === "weigh/do") {
        var data_t = (message.toString());
        data_w = JSON.parse(data_t)
        console.log(data_w["weigh"])
        data_weigh = data_w["weigh"];
        var ansv = data_weigh.split(",");
        var weigh_do = ansv[0];
        console.log(weigh_do)


        var con = mysql.createConnection({
            host: '128.199.103.49',
            user: 'kkken',
            password: 'ken220641',
            database: "projectfeed"
        });
        con.connect(function (err) {
            if (err) throw err;
            console.log('---Con mysql---');

            var sql1 = "INSERT INTO `food`(`fish_pond`,`quantity_food`) VALUES (" + 1 + " ," + weigh_do + ")";
            con.query(sql1, function (err, result) {
                if (err) throw err;
                console.log("1 record inserted");
            });

            con.end();
        });
    }
});




////////////////////////////////////// แจ้งเตือนอาหารเหลือในบ่อ
var status_al

client.on('message', function (topic, message) {
    // message is Buffer
    if (topic === "feed/food") {
        var data_f = (message.toString());
        status_al = JSON.parse(data_f)
        // console.log(data_fee["feed"])
        // status_feed = data_fee["feed"];
        // var ansve = status_feed.split(",");
        // var status_al = ansve[0];
        // console.log(status_al)




    }
});



var distance1 
var distance2
// var dd

client.on('message', function (topic, message) {   /////ค่าปริมาณอาหารในถัง
    // message is Buffer
    if (topic === "mynew/test") {
        var gg = (message.toString());
        tt = JSON.parse(gg)
       // console.log(tt["Temperature"])
        tem = tt["Temperature"];
        var ans = tem.split(",");
        // var temperature = ans[0];
        // console.log(temperature)
        // var turbidity = ans[1];
        // console.log(turbidity)
         distance1 = ans[2];
       console.log(distance1)
         distance2 = ans[3];
       console.log(distance2)


        // var ph = ans[4];
        // console.log(ph)
        // var oxygen = ans[5];
        // console.log(oxygen)
        // var salinity = ans[6];
        // console.log(salinity)



    }
});



const port = process.env.PORT || 3000
app.get('/api/status', function (req, res) {   ////สถานะการทำงานของระบบ
    res.json(status_feed)
});

app.get('/api/alert', function (req, res) {    ////การแจ้งเตือนอาหารเหลือในบ่อ

    res.send(status_al)

    status_al = "";
});


app.get('/api/alertt/:status', function (req, res) { ////สถานะสั่งการทำงานต่อหรือไม่ จากเว็บไซต์

    console.log(req.params.status);
    res.status(200).send()


    status = req.params.status;

    var text = JSON.stringify({ status: status })


    client.publish("project/alert", text);

    console.log(text);

    res.end()



});


app.get('/api/time/:time_sensor', function (req, res) { ////สถานะสั่งการทำงานต่อหรือไม่ จากเว็บไซต์

    console.log(req.params.time_sensor);
    res.status(200).send()


    time_sensor = req.params.time_sensor;

    var text_time = JSON.stringify({ time_sensor: time_sensor })


    client.publish("project/time", text_time);

    console.log(text_time);

    res.end()



});


app.post('/api/dis', function (req, res) {  ////ค่านำไปใช้กราฟปริมาณอาหารในถัง
    var text = {
        ultra1: distance1,
        ultra2: distance2
    }
    res.send(text)
});


app.get("/feed/data", function (req, res) {   ////ค่านำไปใช้กราฟตัวรับรู้ต่างๆ
    var con = mysql.createConnection(config);
    // var car_id = req.body.car_id;
    con.connect(function (err) {
        if (err) throw err;
        console.log("Mysql Connected!");
        var food = []
        var call_detail = "SELECT * FROM `sensor` ORDER BY date_sen DESC ";
        console.log(call_detail);
        con.query(call_detail, function (err, result) {
            if (err) throw err;

            console.log(result[0]['id_senser']);
            var key = Object.keys(result[0]);
            console.log(key.length);
            for (var i = 0; i < key.length; i++) {
                var data = {};
                
                data["id_senser"] = result[i]["id_senser"];
                data["date_sen"] = result[i]["date_sen"];
                // console.log(data["date_sen"]);
                data["temperature_w"] = result[i]["temperature_w"];
                data["turbidity_w"] = result[i]["turbidity_w"];
                data["ultrasonic_main"] = result[i]["ultrasonic_main"];
                data["ultrasonic_reserve"] = result[i]["ultrasonic_reserve"];
                data["ph"] = result[i]["ph"];
                data["oxygen"] = result[i]["oxygen"];
                data["salinity"] = result[i]["salinity"];

                food.push(data);
            }
            res.send(food);
        });
    });


});

app.get("/feed/feeding", function (req, res) {  ////ค่านำไปใช้กราฟปริมาณอาหารที่ให้
    var con = mysql.createConnection(config);
    // var car_id = req.body.car_id;
    con.connect(function (err) {
        if (err) throw err;
        console.log("Mysql Connected!");
        var food = []
        var call_detail = "SELECT * FROM `food` ORDER BY date_food DESC ";
        console.log(call_detail);
        con.query(call_detail, function (err, result) {
            if (err) throw err;

            console.log(result[0]['id_food']);
            var key = Object.keys(result[0]);
            console.log(key.length);
            for (var i = 0; i < key.length; i++) {
                var data = {};
                // data["id_food"] = result[i]["id_food"];
                data["date_food"] = result[i]["date_food"];
                data["quantity_food"] = result[i]["quantity_food"];
                // data["surplus_food"] = result[i]["surplus_food"];


                food.push(data);
            }
            res.send(food);
        });
    });


});

// app.get('/api/start/:food/:level_f/:salinity1/:salinity2/:temperature1/:temperature2/:ph1/:ph2/:turbidity1/:turbidity2/:oxygen1/:oxygen2', function (req, res) {
//     console.log(req.params.id);
//     console.log(req.params.status);
//     res.status(200).send()

//      food = req.params.food;
//      level_f = req.params.level_f;
//      salinity1 = req.params.salinity1
//      salinity2 = req.params.salinity2
//      temperature1 = req.params.temperature1
//      temperature2 = req.params.temperature2
//      ph1 = req.params.ph1
//      ph2 = req.params.ph2
//      turbidity1 = req.params.turbidity1
//      turbidity2= req.params.turbidity2
//      oxygen1 = req.params.oxygen1
//      oxygen2 = req.params.oxygen2

//     var data_feed = JSON.stringify({ id: id, status: status, food: food, level_f: level_f, salinity1: salinity1, salinity2: salinity2, temperature1: temperature1, temperature2: temperature2, ph1: ph1, ph2: ph2, turbidity1: turbidity1, turbidity2: turbidity2, oxygen1: oxygen1, oxygen1: oxygen1  })


//     client.publish("project/start",data_feed);

//     console.log(data_feed); 

//      res.end()


// });

// app.get("/feed/datafood", function (req, res) {
//     var con = mysql.createConnection(config);

//     // var car_id = req.body.car_id;
//     con.connect(function (err) {
//         if (err) throw err;
//         console.log("Mysql Connected!");
//         var food = []
//         var call_detail = "SELECT * FROM `aquatic_animals` AS d1 INNER JOIN sensor_standard AS d2 ON (d1.fish_pond = d2.fish_pond) INNER JOIN food AS d3 ON (d1.fish_pond = d3.fish_pond)";
//         console.log(call_detail);
//         con.query(call_detail, function (err, result) {
//             if (err) throw err;
//             // console.log(result[0].id_animal)
//             var key = Object.keys(result);
//             var jsonData = []
//             for (i = 0; i < key.length; i++) {
//                 var data = {}

//                 data['quantity_food'] = result[i].quantity_food
//                 data['level_f'] = result[i].level_f
//                 data['reduce_food'] = result[i].reduce_food
//                 data['surplus_food'] = result[i].surplus_food
//                 // data['time_1'] = result[i].time_1
//                 // data['time_2'] = result[i].time_2
//                 // data['time_3'] = result[i].time_3
//                 // data['time_4'] = result[i].time_4
//                 // data['time_5'] = result[i].time_5
//                 data['oxygen_min'] = result[i].oxygen_min
//                 data['oxygen_max'] = result[i].oxygen_max
//                 data['temperature_min'] = result[i].temperature_min
//                 data['temperature_max'] = result[i].temperature_max
//                 data['ph_min'] = result[i].ph_min
//                 data['ph_max'] = result[i].ph_max
//                 data['turbidity_min'] = result[i].turbidity_min
//                 data['turbidity_max'] = result[i].turbidity_max
//                 data['salinity_min'] = result[i].salinity_min
//                 data['salinity_max'] = result[i].salinity_max
//                 jsonData.push(data)
//             }
//             res.send(jsonData);
//             console.log(jsonData)
//             var dd = JSON.stringify(jsonData)
//             client.publish("project/start", dd);


//             // setInterval( client.publish("project/start", dd) , 3000);






//             res.end()

//         });


//     });


// });

// app.get("/test/sendmqtt", function (req, res) {
//     client.publish("project/start", '{"quantity_food":2,"level_food":1,"reduce_food":30,"surplus_food":20,"remainder":40,"oxygen_min":3,"oxygen_max":3.5,"temperature_min":25.4,"temperature_max":26,"ph_min":0,"ph_max":0,"turbidity_min":0,"turbidity_max":0,"salinity_min":0,"salinity_max":0,"temperature_operator":0,"ph_operator":0,"turbidity_operator":0,"oxygen_operator":1}')
//     var response = {
//         status: 200
//     }
//     res.json(response)
// });

app.listen(port, () => console.log(`Listening on port${port}...`));
