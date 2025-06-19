<!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lista de empresas</title>
 </head>
 <body>
    <table>
        <tr>
            <br>
            <tr>  nome  </tr>
            <tr>  cidade  </tr>
            <tr>  local  </tr>
            <tr>  localização </tr>
            <tr>  valor  </tr>
            <tr>  data_inicio </tr>
            <tr>  data_fim  </tr>
            <tr>  pagamento  </tr>
            <tr>  vagas  </tr>
            <tr>  id_empresa  </tr>
            <br>
        </tr>

        <?php foreach($model->rows as $item): ?>
        <tr>
            <td><?= $item->nome  ?></td>
            <td><?= $item->cidade  ?></td>
            <td><?= $item->local  ?></td>
            <td><?= $item->localizacao  ?></td>
            <td><?= $item->valor  ?></td>
            <td><?= $item->dataInicio  ?></td>
            <td><?= $item->dataFim  ?></td>
            <td><?= $item->pagamento  ?></td>
            <td><?= $item->vagas  ?></td>
            <td><?= $item->id_empresa  ?></td>
        </tr>
        <?php endforeach ?>
    </table>
 </body>
 </html>