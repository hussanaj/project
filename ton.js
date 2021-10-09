
var mqtt = require('mqtt');
var request = require('request');
const express = require('express');

const port = process.env.PORT || 9999
const app = express();
app.use(express.json());


const MQTT_SERVER = "178.128.119.168";
const MQTT_PORT = "1883";
//if your server don't have username and password let blank.
const MQTT_USER = "tm";
const MQTT_PASSWORD = "tm";

app.use(function (req, res, next) {
    res.header("Access-Control-Allow-Origin", "*");
    res.header("Access-Control-Allow-Methods", "*");
    res.header("Access-Control-Allow-Headers", "*");
    next();
});

// Connect MQTT
var client = mqtt.connect({
    host: MQTT_SERVER,
    port: MQTT_PORT,
    username: MQTT_USER,
    password: MQTT_PASSWORD,
    clean: true
});


client.subscribe('esp32test', function (err) {
})



var air = "";
var twreal = "";
var atreal = "";

client.on('message', function (topic, message) {

    var ton = (message.toString());
    
    ton = JSON.parse(ton)


    var temone = [
        {
            'tem': ton
        }
    ];
    console.log(ton)



    air = temone;



    var mysql = require('mysql');

    var con = mysql.createConnection({
        host: '178.128.119.168',
        user: 'coekra',
        password: 'coekra',
        database: "test"
    });


    con.connect(function (err) {
        if (err) throw err;



        console.log('---Con mysql---');

        var sql = "INSERT INTO SensorData (temwater) VALUES ('"+ ton +"')";
        con.query(sql, function (err, result) {
          if (err) throw err;
          console.log("1 record inserted");
        });



        con.query("SELECT temwater,airtem FROM compare", function (err, result, fields) {
            if (err) throw err;
            // console.log(result);
            twreal = result[0].temwater;
            atreal = result[0].airtem;

            if (ton == 0) {
                message = "error:อุณหภูมิในอากาศ"
                console.log(message);
                client.publish("test", message);

            } else if (ton < atreal) {
                message = "ON"
                console.log(message);
                client.publish("test", message);

            } else if (ton >= atreal) {
                message = "OFF"
                console.log(message);
                client.publish("test", message);
            }

        });
    });



});


app.get('/api/tem', function (req, res) {
    res.send(air);
    air = "";
});

app.listen(port, () => console.log(`Listening on port${port}...`));

//index.js
//กำลังแสดง index.js