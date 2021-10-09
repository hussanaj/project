

var month = [
    "ม.ค.",
    "ก.พ.",
    "มี.ค.",
    "เม.ย.",
    "พ.ค.",
    "มิ.ย.",
    "ก.ค.",
    "ส.ค.",
    "ก.ย.",
    "ต.ค.",
    "พ.ย.",
    "ธ.ค."
];

var pm_lenght
// pm1 //turbidity
var dataFeeds_pm1 = []
var options_pm1_line
var pm1_value;
var options_pm1;

var chart_pm1 = new ApexCharts(document.querySelector("#turbidity"), options_pm1_line = chart_pm1_line());


// // pm2.5 //oxygen
var dataFeeds_pm25 = []
var options_pm25_line
var pm25_value;
var options_pm25;

var chart_pm25 = new ApexCharts(document.querySelector("#oxygen"), options_pm25_line = chart_pm25_line());

// // pm10 //temperature
var dataFeeds_pm10 = []
var options_pm10_line
var pm10_value;
var options_pm10;
// var min_1;
// var max_1;
var chart_pm10 = new ApexCharts(document.querySelector("#temperature"), options_pm10_line = chart_pm10_line());


//ph
var dataFeeds_ph = []
var options_ph_line
var ph_value;
var options_ph;

var chart_ph = new ApexCharts(document.querySelector("#ph"), options_ph_line = chart_ph_line());

var dataFeeds_salinity = []
var options_salinity_line
var salinity_value;
var options_salinity;

var chart_salinity = new ApexCharts(document.querySelector("#salinity"), options_salinity_line = chart_salinity_line());

//ultrareserve
// var dataFeeds_ultrar = []
// var options_ultrar_line
// var ultrar_value;
// var options_ultrar;

// var chart_ultrar = new ApexCharts(document.querySelector("#ultrareserve"), options_ultrar_line = chart_ultrar_line());
//food

// var dataFeeds_food = []
// var options_food_line
// var food_value;
// var options_food;

// var chart_food = new ApexCharts(document.querySelector("#feedd"), options_food_line = chart_food_line());


function getData(y) {

    for (var i = 0; i < datas.length; i++) {

        var raw = {};

        var a = datas[i]['date_sen']
        raw['x'] = Number(a.substring(8, 10)) + ' ' + (
            month[(Number(a.substring(5, 7)) - 1)]
        ) + ' ' + (
                Number((a.substring(0, 4))) + 543
            ) + ' ' + 'เวลา' + ' ' + a.substring(11, 16);
        console.log('Time:' + a);
        raw['y'] = datas[i][y]


        if (y == 'turbidity_w') {
            dataFeeds_pm1.push(raw)
        }
        else if (y == 'oxygen') {
            dataFeeds_pm25.push(raw)
        }
        else if (y == 'temperature_w') {
            dataFeeds_pm10.push(raw)

        }
        else if (y == 'salinity') {
            dataFeeds_salinity.push(raw)

        }
        else if (y == 'ph') {
            dataFeeds_ph.push(raw)

        }

    }

}

// function getData(y) {

//     for (var i = 0; i < datas.length; i++) {

//         var raw1 = {};

//         var a1 = datas[i]['date_food']
//         raw1['x'] = Number(a1.substring(8, 10)) + ' ' + (
//             month[Number(a1.substring(5, 7))]
//         ) + ' ' + (
//                 Number((a1.substring(0, 4))) + 543
//             ) + ' ' + 'เวลา' + ' ' + a1.substring(11, 16);
//         // console.log('Time:'+a)
//         raw1['y'] = datas[i][y]


//         if (y == 'quantity_food') {
//             dataFeeds_food.push(raw1)
//         }



//     }

// }



// function gauge(value) {
//     pm_lenght = datas['arrData'].length

//     if (value == 'sensor_humi_air') {
//         pm1_value = datas['arrData'][Number(pm_lenght) - 1][value]
//         console.log("sensor_humi_air:" + pm1_value)
//     } else if (value == 'sensor_humi_soil') {
//         pm25_value = datas['arrData'][Number(pm_lenght) - 1][value]
//         console.log("sensor_humi_soil:" + pm25_value)
//     } 
// else if (value == 'sensor_temp') {
//     pm10_value = datas['arrData'][Number(pm_lenght) - 1][value]
//     min_1 = Number(pm10_value) - 3
//     max_1 = Number(pm10_value) + 3
//     console.log("sensor_temp:" + pm10_value)
//     console.log("min_1:" + min_1)
//     console.log("max_1:" + max_1)
// }

//}

$.getJSON('http://128.199.103.49:3000/feed/data', function (data) {
    var key = Object.keys(data)
    datas = data
    console.log(data)

    // // pm1
    // gauge('sensor_humi_air')
    // options_pm1_1();
    // pm1_line
    getData('turbidity_w')
    chart_pm1_line()
    chart_pm1.render()
    // // pm25
    // gauge('sensor_humi_soil')
    // options_pm25_1();
    // // pm25_line
    getData('oxygen')
    chart_pm25_line()
    chart_pm25.render()
    // // pm10
    // gauge('sensor_temp')
    // options_pm10_1();
    // // pm10_line
    getData('temperature_w')
    chart_pm10_line()
    chart_pm10.render()

    getData('salinity')
    chart_salinity_line()
    chart_salinity.render()

    getData('ph')
    chart_ph_line()
    chart_ph.render()
    ////ultramain
    // getData('ultrasonic_main')
    // chart_ultram_line()
    // chart_ultram.render()

    ////ultrareserve
    // getData('ultrasonic_reserve')
    // chart_ultrar_line()
    // chart_ultrar.render()

    // zingchart.render({id: 'air_g', data: options_pm1, height: 350, width: '100%'});
    // zingchart.render({id: 'soil_g', data: options_pm25, height: 350, width: '100%'});
    // zingchart.render({id: 'temp_g', data: options_pm10, height: 350, width: '100%'});

})

// $.getJSON('http://128.199.103.49:3000/feed/feeding', function (data) {
//     var key1 = Object.keys(data)
//     datas = data
//     console.log(data)


//     getData('quantity_food')
//     // getData('left_f')
//     chart_food_line()
//     chart_food.render()




// })
// function options_pm1_1() {
//     options_pm1 = {
//         type: "gauge",
//         'scale-r': {
//             aperture: 200,
//             values: "0:100:20",
//             center: { // Pivot Point
//                 size: 5,
//                 'background-color': "#66CCFF #FFCCFF",
//                 'border-color': "none"
//             }
//         },
//         plot: {
//             csize: "5%",
//             size: "100%",
//             'background-color': "#000000"
//         },
//         scaleR: {
//             aperture: 180,
//             minValue: 0,
//             maxValue: 200
//         },
//         title: {
//             text: 'Air humidity Chart',
//             align: 'left'
//         },
//         series: [
//             {
//                 values: [pm1_value],
//                 animation: {
//                     effect: 2,
//                     method: 1,
//                     sequence: 4,
//                     speed: 900
//                 }
//             }
//         ]

//     }
// }
function chart_pm1_line() {
    options_pm1_line = {
        chart: {
            height: 350,
            type: 'line',
            animations: {
                enabled: true,
                easing: 'linear',
                dynamicAnimation: {
                    speed: 1000
                }
            },
            zoom: {
                enabled: true,
                type: 'x',
                zoomedArea: {
                    fill: {
                        color: '#90CAF9',
                        opacity: 0.4
                    },
                    stroke: {
                        color: '#0D47A1',
                        opacity: 0.4,
                        width: 1
                    }
                }
            }
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'straight'
        },
        colors: ['#00E396'],
        markers: {
            size: 6,
            hover: {
                size: 10
            }
        },
        title: {
            text: '',
            align: 'left'
        },
        series: [
            {

                name: "Turbidity",
                data: dataFeeds_pm1
            }
        ],
        grid: {
            row: {
                colors: [
                    '#f3f3f3', 'transparent'
                ],
                opacity: 0.5
            }
        }
    }
    return options_pm1_line
}


// function options_pm25_1() {
//     options_pm25 = {
//         type: "gauge",
//         'scale-r': {
//             aperture: 200,
//             values: "0:100:20",
//             center: { // Pivot Point
//                 size: 5,
//                 'background-color': "#66CCFF #FFCCFF",
//                 'border-color': "none"
//             }
//         },
//         plot: {
//             csize: "5%",
//             size: "100%",
//             'background-color': "#000000"
//         },
//         scaleR: {
//             aperture: 180,
//             minValue: 0,
//             maxValue: 200
//         },
//         title: {
//             text: 'Soil humidity Chart',
//             align: 'left'
//         },
//         series: [
//             {
//                 values: [pm25_value],
//                 animation: {
//                     effect: 2,
//                     method: 1,
//                     sequence: 4,
//                     speed: 900
//                 }
//             }
//         ]

//     }
// }
function chart_pm25_line() {
    options_pm25_line = {
        chart: {
            height: 350,
            type: 'line',
            animations: {
                enabled: true,
                easing: 'linear',
                dynamicAnimation: {
                    speed: 1000
                }
            },
            zoom: {
                enabled: true,
                type: 'x',
                zoomedArea: {
                    fill: {
                        color: '#90CAF9',
                        opacity: 0.4
                    },
                    stroke: {
                        color: '#0D47A1',
                        opacity: 0.4,
                        width: 1
                    }
                }
            }
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'straight'
        },
        colors: ['#00E396'],
        markers: {
            size: 6,
            hover: {
                size: 10
            }
        },
        title: {
            text: '',
            align: 'left'
        },
        series: [
            {

                name: "DO",
                data: dataFeeds_pm25
            }
        ],
        grid: {
            row: {
                colors: [
                    '#f3f3f3', 'transparent'
                ],
                opacity: 0.5
            }
        }
    }
    return options_pm25_line
}



//////////////////
function chart_ph_line() {
    options_ph_line = {
        chart: {
            height: 350,
            type: 'line',
            animations: {
                enabled: true,
                easing: 'linear',
                dynamicAnimation: {
                    speed: 1000
                }
            },
            zoom: {
                enabled: true,
                type: 'x',
                zoomedArea: {
                    fill: {
                        color: '#90CAF9',
                        opacity: 0.4
                    },
                    stroke: {
                        color: '#0D47A1',
                        opacity: 0.4,
                        width: 1
                    }
                }
            }
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'straight'
        },
        colors: ['#00E396'],
        markers: {
            size: 6,
            hover: {
                size: 10
            }
        },
        title: {
            text: '',
            align: 'left'
        },
        series: [
            {

                name: "ph",
                data: dataFeeds_ph
            }
        ],
        grid: {
            row: {
                colors: [
                    '#f3f3f3', 'transparent'
                ],
                opacity: 0.5
            }
        }
    }
    return options_ph_line
}



function chart_pm10_line() {
    options_pm10_line = {
        chart: {
            height: 350,
            type: 'line',
            animations: {
                enabled: true,
                easing: 'linear',
                dynamicAnimation: {
                    speed: 1000
                }
            },
            zoom: {
                enabled: true,
                type: 'x',
                zoomedArea: {
                    fill: {
                        color: '#90CAF9',
                        opacity: 0.4
                    },
                    stroke: {
                        color: '#0D47A1',
                        opacity: 0.4,
                        width: 1
                    }
                }
            }
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'straight'
        },
        colors: ['#00E396'],
        markers: {
            size: 6,
            hover: {
                size: 10
            }
        },
        title: {
            text: '',
            align: 'left'
        },
        series: [
            {

                name: "temperature",
                data: dataFeeds_pm10
            }
        ],
        grid: {
            row: {
                colors: [
                    '#f3f3f3', 'transparent'
                ],
                opacity: 0.5
            }
        }
    }
    return options_pm10_line
}
// // pm10
// function options_pm10_1() {
//     options_pm10 = {
//         type: "gauge",
//         'scale-r': {
//             aperture: 200,
//             values: "0:100:20",
//             center: { // Pivot Point
//                 size: 5,
//                 'background-color': "#66CCFF #FFCCFF",
//                 'border-color': "none"
//             }
//         },
//         plot: {
//             csize: "5%",
//             size: "100%",
//             'background-color': "#000000"
//         },
//         scaleR: {
//             aperture: 180,
//             minValue: 0,
//             maxValue: 200
//         },
//         title: {
//             text: 'Temperature Chart',
//             align: 'left'
//         },
//         series: [
//             {
//                 values: [pm10_value],
//                 animation: {
//                     effect: 2,
//                     method: 1,
//                     sequence: 4,
//                     speed: 900
//                 }
//             }
//         ]

//     }
// }
function chart_salinity_line() {
    options_salinity_line = {
        chart: {
            height: 350,
            type: 'line',
            animations: {
                enabled: true,
                easing: 'linear',
                dynamicAnimation: {
                    speed: 1000
                }
            },
            zoom: {
                enabled: true,
                type: 'x',
                zoomedArea: {
                    fill: {
                        color: '#90CAF9',
                        opacity: 0.4
                    },
                    stroke: {
                        color: '#0D47A1',
                        opacity: 0.4,
                        width: 1
                    }
                }
            }
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'smooth'
        },
        yaxis: {
            min: 25,
            max: 30
        },

        colors: ['#00E396'],
        markers: {
            size: 6,
            hover: {
                size: 10
            }
        },
        title: {
            text: '',
            align: 'left'
        },

        series: [
            {
                name: "salinity",
                data: dataFeeds_salinity
            }
        ],
        grid: {
            row: {
                colors: [
                    '#f3f3f3', 'transparent'
                ],
                opacity: 0.5
            }
        }
    }
    return options_salinity_line
}






/////////////////////////////////////////
//function chart_food_line() {
// options_food_line = {
//     series: [{
//         name: "food_d",
//         data: dataFeeds_food
//       },
//       {
//         name: "feed_d",
//         data: dataFeeds_feed
//       },
//       {
//         name: 'Total Visits',
//         data: [87, 57, 74, 99, 75, 38, 62, 47, 82, 56, 45, 47]
//       }
//     ],
//       chart: {
//       height: 350,
//       type: 'line',
//       zoom: {
//         enabled: false
//       },

//     },
//     dataLabels: {
//       enabled: false
//     },
//     stroke: {
//       width: [5, 7, 5],
//       curve: 'straight',
//       dashArray: [0, 8, 5]
//     },
//     title: {
//       text: 'Page Statistics',
//       align: 'left'
//     },
//     legend: {
//       tooltipHoverFormatter: function(val, opts) {
//         return val + ' - ' + opts.w.globals.series[opts.seriesIndex][opts.dataPointIndex] + ''
//       }
//     },
//     markers: {
//       size: 0,
//       hover: {
//         sizeOffset: 6
//       }
//     },

//     tooltip: {
//       y: [
//         {
//           title: {
//             formatter: function (val) {
//               return val + " (mins)"
//             }
//           }
//         },
//         {
//           title: {
//             formatter: function (val) {
//               return val + " per session"
//             }
//           }
//         },
//         {
//           title: {
//             formatter: function (val) {
//               return val;
//             }
//           }
//         }
//       ]
//     },
//     grid: {
//       borderColor: '#f1f1f1',
//     }

// }


// return options_food_line
//}


window.setInterval(function () {
    dataFeeds_pm1 = []
    dataFeeds_pm25 = []
    dataFeeds_pm10 = []
    dataFeeds_ph = []
    dataFeeds_salinity = []
    // dataFeeds_ultram = []
    // dataFeeds_ultrar = []
    //dataFeeds_food = []
    // dataFeeds_feed = []
    $.getJSON('http://128.199.103.49:3000/feed/data', function (data) {
        datas = data
        console.log(datas);
        // pm1
        // gauge('sensor_humi_air');
        // options_pm1_1();
        // pm1_line
        getData('turbidity_w')
        chart_pm1.updateSeries([{
            data: dataFeeds_pm1
        }])
        // pm2.5
        // gauge('sensor_humi_soil');
        // options_pm25_1();
        // // pm2.5_line
        getData('oxygen')
        chart_pm25.updateSeries([{
            data: dataFeeds_pm25
        }])
        // // pm10
        // gauge('sensor_temp');
        // options_pm10_1();
        // // pm10_line
        getData('temperature_w')
        chart_pm10.updateSeries([{
            data: dataFeeds_pm10
        }])


        //////////////
        getData('ph')
        chart_ph.updateSeries([{
            data: dataFeeds_ph
        }])

        getData('salinity')
        chart_salinity.updateSeries([{
            data: dataFeeds_salinity
        }])
        /////ultramain

        // getData('ultrasonic_main')
        // chart_ultram.updateSeries([{
        //     data: dataFeeds_ultram
        // }])

        /////ultrareserve

        //  getData('ultrasonic_reserve')
        //  chart_ultrar.updateSeries([{
        //      data: dataFeeds_ultrar
        //  }])
        // zingchart.render({id: 'air_g', data: options_pm1, height: 350, width: '100%'});
        // zingchart.render({id: 'soil_g', data: options_pm25, height: 350, width: '100%'});
        // zingchart.render({id: 'temp_g', data: options_pm10, height: 350, width: '100%'});
    })
    // $.getJSON('http://128.199.103.49:3000/feed/feeding', function (data) {
    //     datas = data
    //     console.log(datas);
    //     ///
    //     getData('quantity_food')
    //     chart_food.updateSeries([{
    //         data: dataFeeds_food
    //     }])
    //     //
    //     // getData('left_f')
    //     // chart_food.updateSeries([{
    //     //     data: dataFeeds_feed
    //     // }])




    // })
}, 60000)
