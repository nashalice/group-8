@extends('layouts.admin')

@section('content')
    <div class="row p-3">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="py-12">
                        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                        <script type="text/javascript">
                            // Load the Visualization API and the corechart package.
                            google.charts.load('current', {
                                'packages': ['corechart']
                            });

                            // Set a callback to run when the Google Visualization API is loaded.
                            google.charts.setOnLoadCallback(drawChart);

                            // Callback that creates and populates a data table,
                            // instantiates the pie chart, passes in the data and
                            // draws it.
                            function drawChart() {
                                var data = new google.visualization.DataTable();
                                data.addColumn('string', 'source');
                                data.addColumn('number', 'amount');
                                data.addRows([
                                    ['Mushrooms', 3],
                                    ['Onions', 1],
                                    ['Olives', 1],
                                    ['Zucchini', 1],
                                    ['Pepperoni', 2]
                                ]);

                                // Set chart options
                                var options = {
                                    'title': 'Deposit Activity',
                                    'width': 400,
                                    'height': 400,
                                    'pieHole':0.3
                                };

                                // Instantiate and draw our chart, passing in some options.
                                var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
                                chart.draw(data, options);
                            }
                        </script>



                        <!--Div that will hold the pie chart-->
                        <div id="chart_div"></div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Your application script -->
    <script>
        const chart = new Chartisan({
            el: '#chart',
            url: "@chart('deposits_chart')",
            // hooks: new ChartisanHooks()
            // .beginAtZero()
            // .colors()
            // .datasets([{type:'line', fill:false,borderColor:'green'}, 'bar'])
        });
    </script>
@endsection
