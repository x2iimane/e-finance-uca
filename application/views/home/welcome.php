<!-- start: BREADCRUMB -->
<div class="breadcrumb-wrapper">
	<h4 class="mainTitle no-margin">Tableau de Board</h4>
	<span class="mainDescription">Graph &amp; Situations </span>
	<ul class="pull-right breadcrumb">
		<li>
			<a href="/welcome"><i class="fa fa-home margin-right-5 text-large text-dark"></i>Accueil</a>
		</li>		
	</ul>
</div>
<!-- end: BREADCRUMB -->
<!-- start: LINE CHART -->
<div class="container-fluid container-fullw">
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-white">
				<div class="panel-body">
					<h5 class="over-title margin-bottom-15">Line <span class="text-bold">Chart</span></h5>
					<div class="row">
						<div class="col-sm-6">
							<canvas id="lineChart" class="full-width"></canvas>
						</div>
						<div class="col-sm-6">
							<p class="margin-bottom-20">
								A line chart is a way of plotting data points on a line.
								Often, it is used to show trend data, and the comparison of two data sets.
							</p>
							<p>
								The line chart requires an array of labels for each of the data points. This is shown on the X axis. The data for line charts is broken up into an array of datasets. Each dataset has a colour for the fill, a colour for the line and colours for the points and strokes of the points. These colours are strings just like CSS. You can use RGBA, RGB, HEX or HSL notation.
							</p>
							<p>
								The label key on each dataset is optional, and can be used when generating a scale for the chart.
							</p>
							<p class="margin-top-20">
								<div id="lineLegend" class="chart-legend"></div>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end: LINE CHART -->
<!-- start: BAR CHART -->
<div class="container-fluid container-fullw">
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-white">
				<div class="panel-body">
					<h5 class="over-title margin-bottom-15">Bar <span class="text-bold">Chart</span></h5>
					<div class="row">
						<div class="col-sm-6">
							<p class="margin-bottom-20">
								A bar chart is a way of showing data as bars.
								It is sometimes used to show trend data, and the comparison of multiple data sets side by side.
							</p>
							<p>
								The bar chart has the a very similar data structure to the line chart, and has an array of datasets, each with colours and an array of data. Again, colours are in CSS format.
								We have an array of labels too for display. In the example, we are showing the same data as the previous line chart example.
							</p>
							<p>
								The label key on each dataset is optional, and can be used when generating a scale for the chart.
							</p>
							<p class="margin-top-20">
								<div id="barLegend" class="chart-legend"></div>
							</p>
						</div>
						<div class="col-sm-6">
							<canvas id="barChart" class="full-width"></canvas>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end: BAR CHART -->
<!-- start: DOUGHNUT CHART -->
<div class="container-fluid container-fullw">
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-white">
				<div class="panel-body">
					<h5 class="over-title margin-bottom-15">Doughnut <span class="text-bold">Chart</span></h5>
					<div class="row">
						<div class="col-sm-6">
							<div class="text-center margin-bottom-15">
								<canvas id="doughnutChart" class="full-width"></canvas>
							</div>
						</div>
						<div class="col-sm-6">
							<p>
								Pie and doughnut charts are probably the most commonly used chart there are. They are divided into segments, the arc of each segment shows the proportional value of each piece of data.
							</p>
							<p>
								They are excellent at showing the relational proportions between data.
							</p>
							<p>
								Pie and doughnut charts are effectively the same class in Chart.js, but have one different default value - their
								<code>
									percentageInnerCutout
								</code>
								. This equates what percentage of the inner should be cut out. This defaults to
								<code>
									0
								</code>
								for pie charts, and
								<code>
									50
								</code>
								for doughnuts.
							</p>
							<p class="margin-top-20">
								<div id="doughnutLegend" class="chart-legend"></div>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end: DOUGHNUT CHART -->
<!-- start: PIE CHART -->
<div class="container-fluid container-fullw">
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-white">
				<div class="panel-body">
					<h5 class="over-title margin-bottom-15">Pie <span class="text-bold">Chart</span></h5>
					<div class="row">
						<div class="col-sm-6">
							<p>
								Pie and doughnut charts are probably the most commonly used chart there are. They are divided into segments, the arc of each segment shows the proportional value of each piece of data.
							</p>
							<p>
								They are excellent at showing the relational proportions between data.
							</p>
							<p>
								Pie and doughnut charts are effectively the same class in Chart.js, but have one different default value - their
								<code>
									percentageInnerCutout
								</code>
								. This equates what percentage of the inner should be cut out. This defaults to
								<code>
									0
								</code>
								for pie charts, and
								<code>
									50
								</code>
								for doughnuts.
							</p>
							<p class="margin-top-20">
								<div id="pieLegend" class="chart-legend"></div>
							</p>
						</div>
						<div class="col-sm-6">
							<div class="text-center margin-bottom-15">
								<canvas id="pieChart" class="full-width"></canvas>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end: PIE CHART -->
<!-- start: POLAR AREA CHART -->
<div class="container-fluid container-fullw">
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-white">
				<div class="panel-body">
					<h5 class="over-title margin-bottom-15">Polar Area <span class="text-bold">Chart</span></h5>
					<div class="row">
						<div class="col-sm-6">
							<div class="text-center margin-bottom-15">
								<canvas id="polarChart" class="full-width"></canvas>
							</div>
						</div>
						<div class="col-sm-6">
							<p>
								Polar area charts are similar to pie charts, but each segment has the same angle - the radius of the segment differs depending on the value.
							</p>
							<p>
								This type of chart is often useful when we want to show a comparison data similar to a pie chart, but also show a scale of values for context.
							</p>
							<p>
								As you can see, for the chart data you pass in an array of objects, with a value and a colour. The value attribute should be a number, while the color attribute should be a string. Similar to CSS, for this string you can use HEX notation, RGB, RGBA or HSL.
							</p>
							<p class="margin-top-20">
								<div id="polarLegend" class="chart-legend"></div>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end: POLAR AREA CHART -->
<!-- start: RADAR CHART -->
<div class="container-fluid container-fullw">
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-white">
				<div class="panel-body">
					<h5 class="over-title margin-bottom-15">Radar <span class="text-bold">Chart</span></h5>
					<div class="row">
						<div class="col-sm-6">
							<p>
								A radar chart is a way of showing multiple data points and the variation between them.
							</p>
							<p>
								They are often useful for comparing the points of two or more different data sets.
							</p>
							<p>
								For a radar chart, to provide context of what each point means, we include an array of strings that show around each point in the chart.
								For the radar chart data, we have an array of datasets. Each of these is an object, with a fill colour, a stroke colour, a colour for the fill of each point, and a colour for the stroke of each point. We also have an array of data values.
							</p>
							<p class="margin-top-20">
								<div id="radarLegend" class="chart-legend"></div>
							</p>
						</div>
						<div class="col-sm-6">
							<canvas id="radarChart" class="full-width"></canvas>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end: RADAR CHART -->
<!-- end: BAR CHART -->
	

