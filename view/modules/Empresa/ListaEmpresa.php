<!-- aqui onde mostra os dados da empresa -->
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
            <tr>  email  </tr>
            <tr>  cnpj  </tr>
            <br>
        </tr>

        <?php foreach($model->rows as $item): ?>
        <tr>
            <td><?= $item->nome  ?></td>
            <td><?= $item->email  ?></td>
            <td><?= $item->cnpj  ?></td>
        </tr>
        <?php endforeach ?>
    </table>
 </body>
 </html>