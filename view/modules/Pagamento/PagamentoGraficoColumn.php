<html>
  <head>
    <script nonce="<?= Security::escape(Security::nonce()) ?>" src="https://www.gstatic.com/charts/loader.js"></script>
    <script nonce="<?= Security::escape(Security::nonce()) ?>">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        const rows = <?= json_encode(array_merge(
          [['Hora', 'Arrecadação']],
          array_map(static function ($linha) {
            return [(string) $linha['hora'], (float) $linha['total']];
          }, $dados)
        ), JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) ?>;
        var data = google.visualization.arrayToDataTable(rows);

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
