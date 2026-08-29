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
            <td><?= Security::escape($item->nome) ?></td>
            <td><?= Security::escape($item->cidade) ?></td>
            <td><?= Security::escape($item->local) ?></td>
            <td><?= Security::escape($item->localizacao) ?></td>
            <td><?= Security::escape($item->valor) ?></td>
            <td><?= Security::escape($item->dataInicio) ?></td>
            <td><?= Security::escape($item->dataFim) ?></td>
            <td><?= Security::escape($item->pagamento) ?></td>
            <td><?= Security::escape($item->vagas) ?></td>
            <td><?= Security::escape($item->id_empresa) ?></td>
        </tr>
        <?php endforeach ?>
    </table>
 </body>
 </html>
