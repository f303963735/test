function addSeries(chart, options){
    chart.addSeries(options.xAxis);
	chart.xAxis[0].setCategories(options.categories);
}