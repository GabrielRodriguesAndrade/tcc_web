<!DOCTYPE html><!--aqui fica o formulario de cadastro da empresa (tela)-->
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form empresa</title>
</head>
<body>
    <form method="post" action="/empresa/salvar">
        <input type="hidden" name="csrf_token" value="<?= Security::escape(Security::csrfToken()) ?>">
        <label for="nome">Nome</label>
        <input id="nome" name="nome" autocomplete="organization" required>
    </form>
</body>
</html>
