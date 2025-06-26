<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Hora', 'Arrecadação'],
          <?php foreach ($dados as $linha) : ?> 
            ['<?php echo $linha['hora']; ?>', <?php echo $linha['total']; ?>],
          <?php endforeach; ?>
        ]);

        var options = {
          chart: {
            title: 'Arrecadação por Hora',
            subtitle: 'Total arrecadado por hora no evento',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
  </head>
  <body>
    <div id="columnchart_material" style="width: 800px; height: 500px;"></div>
  </body>
</html>
