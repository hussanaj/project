var mqtt = require('mqtt');

const MQTT_SERVER = "128.199.103.49";
const MQTT_PORT = "1883";
//if your server don't have username and password let blank.
const MQTT_USER = "mymqtt"; 
const MQTT_PASSWORD = "ken220641";

// Connect MQTT
var client = mqtt.connect({
    host: MQTT_SERVER,
    port: MQTT_PORT,
    username: MQTT_USER,
    password: MQTT_PASSWORD
});

client.on('connect', function () {
    // Subscribe any topic
    console.log("MQTT Connect");
    client.subscribe('mynew/test', function (err) {
        if (err) {
            console.log(err);
        }
    });
});

// Receive Message and print on terminal
client.on('message', function (topic, message) {
    // message is Buffer
    console.log(message.toString());
});
