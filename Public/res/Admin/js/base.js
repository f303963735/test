function addSeries(chart, options){
    chart.addSeries(options.xAxis);
	chart.xAxis[0].setCategories(options.categories);
}

// 初始化左侧菜单
function init_bar(url){
	$(".menu-second").find("li > a[data-url='"+url+"']").closest("li").addClass("menu-second-selected").parents("div").addClass("in");
//	$(".menu-second").find("li > a[href='"+url+"']").closest("li").addClass("menu-second-selected").parents("div").addClass("in");
}