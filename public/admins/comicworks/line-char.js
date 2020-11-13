// google.charts.load('current', {'packages': ['line']});
// google.charts.setOnLoadCallback(drawChart);
//
// function drawChart() {
//
//     var data = new google.visualization.DataTable();
//     data.addColumn('number', 'Day');
//     data.addColumn('number', 'Conan');
//     data.addColumn('number', 'Doreamon');
//     data.addColumn('number', 'Thám tử lừng danh conan');
//
//     data.addRows([
//         [1, 0, 0, 0],
//         [2, 30.9, 69.5, 32.4],
//         [3, 25.4, 57, 25.7],
//         [4, -11.7, 18.8, 10.5],
//         [5, 11.9, 17.6, 10.4],
//         [6, 8.8, 13.6, 7.7],
//         [7, 7.6, 12.3, 9.6],
//         [8, 12.3, 29.2, 10.6],
//         [9, 16.9, 42.9, 14.8],
//         [10, 12.8, 30.9, 11.6],
//         [11, 5.3, 7.9, 4.7],
//         [12, 6.6, 8.4, 5.2],
//         [13, 4.8, 6.3, 3.6],
//         [14, 4.2, 6.2, 3.4],
//         [15, 42.2, -16.2, 23.4],
//     ]);
//
//     var options = {
//         chart: {
//             title: 'Biểu đồ thống kê lượng lượt xem so với chỉ tiêu tiêu chuẩn',
//             subtitle: 'Lượt xem lượt tương tác theo thời gian'
//         },
//         width: 900,
//         height: 500,
//         'chartArea': {left: 20, top: 20, right: 20, bottom: 20
//             , 'width': '100%', 'height': '100%'},
//         'legend': {'position': 'in'},
//         annotation: {
//             boxStyle: {
//                 stroke: '#888',
//                 strokeWidth: 1,
//                 gradient:  {
//                     // Start color for gradient.
//                     color1: '#fbf6a7',
//                     // Finish color for gradient.
//                     color2: '#33b679',
//                     // Where on the boundary to start and
//                     // end the color1/color2 gradient,
//                     // relative to the upper left corner
//                     // of the boundary.
//                     x1: '0%', y1: '0%',
//                     x2: '100%', y2: '100%',
//                     // If true, the boundary for x1,
//                     // y1, x2, and y2 is the box. If
//                     // false, it's the entire chart.
//                     useObjectBoundingBoxUnits: true
//                 }
//
//             }
//         }
//     };
//
//     var chart = new google.charts.Line(document.getElementById('line_char_views'));
//
//     chart.draw(data, google.charts.Line.convertOptions(options));
// }


google.charts.load('current', {'packages': ['corechart']});
google.charts.setOnLoadCallback(loadDataAnalysis);

var pieChart;
var pieOption = {
    title: 'Xếp hạng lượt xem của bộ truyện',
    width: 900,
    height: 400
};



function loadDataAnalysis() {
    var category = $('.danh-muc').val();
    var time = $('.thoi-gian').val();
    var load = $('.column .loading');
    var token = document.getElementById('token').content;

    load.show();

    $.ajaxSetup({
        headers: {
            Accept: 'application/json',
            Authorization: 'Bearer ' + token,
        }
    });

    console.log(token);


    $.ajax({
        type: 'GET',
        url: '/api/v1/analysis',
        data: {
            category: category,
            time: time,
        }
    }).done(function (data) {
        var rows = [['label', "views"]];

        for (var i in data) {
            rows.push([data[i].name, data[i].total]);
        }
        var vals = google.visualization.arrayToDataTable(rows);

        load.hide();
        pieChart = new google.visualization.PieChart(document.getElementById('line_char_views'));
        pieChart.draw(vals, pieOption);
    });
}


