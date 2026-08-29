# Política de segurança

## Configuração sensível

- Nunca envie senhas, tokens, chaves ou arquivos `.env` para o Git.
- Configure o banco exclusivamente pelas variáveis `DB_HOST`, `DB_PORT`, `DB_NAME`, `DB_USER` e `DB_PASSWORD`.
- Use um usuário MySQL exclusivo para a aplicação e conceda apenas as permissões necessárias.
- Mantenha produção atrás de HTTPS e não exponha mensagens internas de erro ao usuário.

## Credenciais anteriormente expostas

O histórico do projeto já conteve uma credencial de banco. Ela deve ser considerada comprometida mesmo depois da limpeza do Git. O responsável pelo ambiente deve:

1. revogar a senha antiga;
2. criar uma senha aleatória nova;
3. revisar logs e acessos ao banco desde a primeira exposição;
4. restringir o acesso de rede ao banco;
5. armazenar a nova senha somente no gerenciador de segredos do ambiente.

## Como reportar

Não abra uma issue pública com detalhes de uma vulnerabilidade. Entre em contato diretamente com o responsável pelo repositório.
