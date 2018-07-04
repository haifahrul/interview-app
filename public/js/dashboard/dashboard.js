/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/*
 * DONUT CHART
 * -----------
 */
function chartDonut(donutData) {
    var donutData;
//    var donutData = [
//        {label: 'Series2', data: 30, color: '#3c8dbc'},
//        {label: 'Series3', data: 20, color: '#0073b7'},
//        {label: 'Series4', data: 50, color: '#00c0ef'}
//    ]
    $.plot('#donut-chart', donutData, {
        series: {
            pie: {
                show: true,
                radius: 1,
                innerRadius: 0,
                label: {
                    show: true,
                    radius: 2 / 3,
                    formatter: labelFormatter,
                    threshold: 0.1
                }

            }
        },
        legend: {
            show: false
        }
    })
}
/*
 * END DONUT CHART
 */

/*
 * Custom Label formatter
 * ----------------------
 */
function labelFormatter(label, series) {
    return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">'
            + label
            + '<br>'
            + series.data[0][1] + '</div>'
}