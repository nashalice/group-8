@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            {{--  --}}
<script>
    window.onload = function () {

    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        theme: "light2", // "light1", "light2", "dark1", "dark2"
        title:{
            text: "Member Report"
        },
        axisY: {
            title: "Amount in UGX"
        },
        data: [{
            type: "column",
            showInLegend: true,
            legendMarkerColor: "grey",
            legendText: "Details",
            dataPoints: @json($dataPoints1),
        }]
    });
    chart.render();

    var chart1 = new CanvasJS.Chart("chartContainer1", {
        animationEnabled: true,
        theme: "light2", // "light1", "light2", "dark1", "dark2"
        title:{
            text: "Sacco Report"
        },
        axisY: {
            title: "Amount in UGX"
        },
        data: [{
            type: "column",
            showInLegend: true,
            legendMarkerColor: "grey",
            legendText: "Details",
            dataPoints: @json($dataPoints),
        }]
    });
    chart1.render();

    }
    </script>
    </head>
    <body>
    <div id="chartContainer" style="height: 300px; width: 80%;"></div>
    <br><br><br><br>
    <div id="chartContainer1" style="height: 300px; width: 80%;"></div>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    </body>
@endsection
