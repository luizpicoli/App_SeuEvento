@extends('principal')

@section('conteudo')

<div class='col-sm-12'>
    <h2> Gráfico de Eventos </h2>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Marca', 'Nº Veículos'],
@foreach ($eventos as $evento)
{!! "['$carro->marca', $carro->num]," !!}          
@endforeach
        ]);

        var options = {
          title: 'Porcentagem de convites para cada evento',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>

    <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
    
</div>

@endsection