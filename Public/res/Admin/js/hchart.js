
var _default;
var _line_default;
var _pie_default;

_line_default = {
	chart : {
        renderTo: "container"  // 注意这里一定是 ID 选择器
    },
	title: {
    	useHTML: true,
        text: '<input size="16" type="text" value="{:date(\'Y-m-d\')}" readonly class="form_datetime time">',
        x: -20 //center
    },
    /*
    subtitle: {
        text: 'Source: WorldClimate.com',
        x: -20
    },
    */
    xAxis: {
    	/*
    	plotLines:[{
   	        color:'red',           //线的颜色，定义为红色
   	        dashStyle:'longdashdot',     //默认值，这里定义为实线
   	        value:3,               //定义在那个值上显示标示线，这里是在x轴上刻度为3的值处垂直化一条线
   	        width:2                //标示线的宽度，2px
   	    }],
   	    */
        //categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
    yAxis: {
		labels: {
    		formatter:function(){	// 格式化y轴标签
    			return this.value;
	    	}
  		},
    	title: {
            text: 'Time (min)'
        },
        plotLines: [{
            value: 0,
            width: 1,
            color: '#808080'
        }]
    },
    tooltip: {
        valueSuffix: 'min'
    },
    credits: {
    	enabled: false
    },
    legend: {
        layout: 'horizontal',
        align: 'center',
        verticalAlign: 'top',
        borderWidth: 0
    },
    /*
    plotOptions: {
	    line: {
	        dataLabels: {
	            enabled: true,
	            //formatter: function() {
	            //    return this.x + "-" + this.y;
	            //},
	            format: "{x}-{y}"
	        }
	    }
	},
	*/
    series: [
       	{
        	name: 'Tokyo',
        	data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
    	}, 
        {
            name: 'New York',
            data: [-0.2, 0.8, 5.7, 11.3, 17.0, 22.0, 24.8, 24.1, 20.1, 14.1, 8.6, 2.5]
        }, 
        {
            name: 'Berlin',
            data: [-0.9, 0.6, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 9.0, 3.9, 1.0]
        }, 
        {
            name: 'London',
            data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
        }
    ]
};

_pie_default = {
	chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: ''
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                }
            }
        }
    },
    credits: {
    	enabled: false
    },
    series: [{
        name: '占比',
        colorByPoint: true,
        data: [{
            name: '中国移动',
            y: 15
        }, 
        {
            name: '中国联通',
            y: 15
        }, 
        {
            name: '中国电信',
            y: 15
        }, 
        {
            name: 'wifi',
            y: 55,
            sliced: true,
            selected: true
        }]
    }]
};

function initCharts(id, options, type){
	
	switch (type){
		case 'pie':
			_default = _pie_default;
			break;
		default:
			_default = _line_default;
			break;
	}
	_default.chart.renderTo = id;
	_default = $.extend(_default,options);
	
	return new Highcharts.Chart(_default);
}






































