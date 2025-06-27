<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Evento', 'Arrecadação'],
          <?php foreach ($dados as $linha) : ?> 
            ['<?php echo $linha['nome']; ?>', <?php echo $linha['total']; ?>],
          <?php endforeach; ?>
        ]);

        var options = {
          chart: {
            title: 'Arrecadação por Evento',
            subtitle: 'Total arrecadado por Cada Evento',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
  </head>
  <body>
  <div id="columnchart_material" style="width: 1000px; height: 600px;"></div>
  </body>
</html>
