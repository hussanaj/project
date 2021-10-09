

var month = [
    "ม.ค.",
    "ก.พ.",
    "มี.ค",
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


// pm1 //feed
var dataFeeds_feed = []
var options_feed_line
var feed_value;
var options_feed;

var chart_feed = new ApexCharts(document.querySelector("#feed"), options_feed_line = chart_feed_line());





function getData(y) {

    for (var i = 0; i < datas.length; i++) {

        var raw = {};

        var a = datas[i]['date_food']
        raw['x'] = Number(a.substring(8, 10)) + ' ' + (
            month[(Number(a.substring(5, 7)) - 1)]
        ) + ' ' + (
                Number((a.substring(0, 4))) + 543
            ) + ' ' + 'เวลา' + ' ' + a.substring(11, 16);
        // console.log('Time:'+a)
        raw['y'] = datas[i][y]


        if (y == 'quantity_food') {
            dataFeeds_feed.push(raw)
        }


    }
}



$.getJSON('http://128.199.103.49:3000/feed/feeding', function (data) {
    var key = Object.keys(data)
    datas = data
    console.log(data)

    // // pm1
    // gauge('sensor_humi_air')
    // options_pm1_1();
    // pm1_line
    getData('quantity_food')
    chart_feed_line()
    chart_feed.render()


})


function chart_feed_line() {
    options_feed_line = {
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

                name: "ปริมาณอาหาร",
                data: dataFeeds_feed
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
    return options_feed_line
}











window.setInterval(function () {
    dataFeeds_feed = []

    $.getJSON('http://128.199.103.49:3000/feed/feeding', function (data) {
        datas = data
        console.log(datas);
        // pm1
        // gauge('sensor_humi_air');
        // options_pm1_1();
        // pm1_line
        getData('quantity_food')
        chart_feed.updateSeries([{
            data: dataFeeds_feed
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
