# IngaDrive Web

Módulo web do projeto IngaDrive, desenvolvido para administrar empresas, eventos, estacionamentos, funcionários, veículos e informações financeiras. A aplicação segue uma estrutura MVC simples em PHP, acessa um banco MySQL com PDO e apresenta relatórios de arrecadação com Google Charts.

> Este repositório é um protótipo acadêmico em desenvolvimento. Há rotas, consultas e visualizações funcionais, mas alguns formulários, parâmetros e fluxos ainda estão incompletos.

## Funcionalidades

- cadastro, edição, listagem e exclusão de empresas;
- cadastro e gerenciamento de eventos;
- associação de funcionários e candidatos aos eventos;
- gerenciamento de estacionamentos e quantidade de vagas;
- consulta de veículos e observações registradas;
- consulta de funcionários e suas observações;
- relatórios de arrecadação:
  - por hora em um evento;
  - por evento de uma empresa;
  - por mês;
- gráficos em barras gerados com Google Charts.

## Tecnologias

- PHP sem framework;
- MySQL;
- PDO e extensão `pdo_mysql`;
- HTML;
- JavaScript;
- Google Charts.

## Arquitetura

```text
tcc_web/
├── Controller/        # Recebe as requisições e coordena models e views
├── DAO/               # Consultas e persistência no MySQL
├── Helpers/           # Funções auxiliares
├── model/             # Entidades e regras de acesso aos dados
├── view/modules/      # Listagens, formulários e gráficos
├── autoload.php       # Carregamento automático das classes
├── rotas.php          # Roteamento da aplicação
└── index.php          # Ponto de entrada
```

O fluxo principal é:

```text
requisição → rotas.php → Controller → Model/DAO → View
```

## Rotas disponíveis

| Rota | Finalidade |
| --- | --- |
| `/` | página inicial simples |
| `/empresa` | listagem de empresas |
| `/empresa/form` | formulário de empresa |
| `/evento` | listagem de eventos |
| `/eventos/form` | entrada para cadastro de evento |
| `/estacionamento` | entrada do módulo de estacionamento |
| `/pagamento` | arrecadação por hora |
| `/pagamentoEventos` | arrecadação por evento |
| `/pagamentoMes` | arrecadação por mês |

## Como executar

### Pré-requisitos

- PHP com a extensão `pdo_mysql` habilitada;
- servidor MySQL;
- banco compatível com as entidades usadas pelo projeto: empresa, evento, funcionário, estacionamento, carro, pagamento e tabelas de relacionamento;
- acesso à internet para carregar a biblioteca do Google Charts.

### Passos

1. Clone o repositório:

   ```bash
   git clone https://github.com/GabrielRodriguesAndrade/tcc_web.git
   cd tcc_web
   ```

2. Configure no ambiente do processo as variáveis descritas em `.env.example`: `DB_HOST`, `DB_PORT`, `DB_NAME`, `DB_USER`, `DB_PASSWORD` e `APP_ACCESS_TOKEN`.

   O arquivo `.env.example` contém apenas nomes e valores ilustrativos. Não copie uma senha real para um arquivo rastreado pelo Git. Em produção, use o gerenciador de segredos da hospedagem e um usuário MySQL com privilégio mínimo.

3. Inicie o servidor local:

   ```bash
   php -S localhost:8000
   ```

4. Acesse [http://localhost:8000](http://localhost:8000).

   As rotas com dados exigem autenticação HTTP. No navegador, informe qualquer nome de usuário e use `APP_ACCESS_TOKEN` como senha. APIs também podem enviar `Authorization: Bearer <token>`. Em produção, utilize obrigatoriamente HTTPS.

## Observações sobre o protótipo

- o esquema SQL do banco não está versionado neste repositório;
- alguns controllers usam IDs fixos para demonstrar as consultas;
- algumas rotas exibem apenas mensagens temporárias;
- os formulários ainda precisam ser concluídos;
- a conexão do banco é centralizada em `Config/Database.php` e não contém credenciais no código;
- senhas são armazenadas com `password_hash`, e as rotas protegidas exigem um token externo;
- antes de uma publicação definitiva, substitua o token compartilhado por autenticação individual com autorização por função.

## Segurança

Consulte [SECURITY.md](SECURITY.md). O histórico anterior continha uma credencial de banco; portanto, a senha antiga deve ser revogada e os acessos ao servidor devem ser auditados mesmo após a limpeza do Git.

## Projeto relacionado

O aplicativo Android utilizado pelos profissionais está em [tcc.App](https://github.com/GabrielRodriguesAndrade/tcc.App).
