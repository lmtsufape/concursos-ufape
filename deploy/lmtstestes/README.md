# Deploy na homologação (lmtstestes)

O servidor de testes não tem SSH. Todo push em `develop` dispara o workflow
[`.github/workflows/deploy-lmtstestes.yml`](../../.github/workflows/deploy-lmtstestes.yml):

1. **Imagem** (`Dockerfile` na raiz): [`serversideup/php:8.2-fpm-nginx-alpine`](https://serversideup.net/open-source/docker-php/)
   (Nginx + PHP-FPM no mesmo container) + código + `vendor`, publicada em
   `ghcr.io/lmtsufape/concursos-app:<sha>`.
2. **Deploy** pelo runner self-hosted da organização: gera o `.env`, baixa a imagem, roda
   `php artisan migrate --force` e sobe os containers com [`compose.yml`](compose.yml).

Os assets (`public/css/app.css`, `public/js/app.js`) **não** são compilados no build: continuam
sendo gerados com `npm run prod` e versionados, como antes.

A imagem base acompanha as correções de segurança do PHP 8.2 a cada build. **O PHP 8.2 deixa de
receber correções em 31/12/2026**; o Laravel 10 já roda em PHP 8.3, basta trocar a tag no `Dockerfile`.

Configuração do PHP/Nginx (limites de upload, memória, OPcache) por variáveis de ambiente no
`compose.yml` (`PHP_UPLOAD_MAX_FILE_SIZE`, `NGINX_CLIENT_MAX_BODY_SIZE` etc.).

Endereço: https://lmtsteste11.ufape.edu.br (porta 30091 no servidor).

## Dados

| Volume | Conteúdo |
|---|---|
| `concursos_postgres` | banco PostgreSQL 17 |
| `concursos_storage` | `storage/` do Laravel: editais, documentos dos candidatos, `app/public`, cache de views |

Os dois volumes são `external`: o deploy falha em vez de criar um volume vazio por engano.

O banco foi populado uma única vez com `php artisan db:seed` (usuários `admin@teste.com`,
`coordenador1@teste.com`, `avaliador1@teste.com`, `candidato1@teste.com`... senha `password`).
**O deploy não roda seeders** — o `DatabaseSeeder` apaga as tabelas antes de inserir. Para
recriar os dados de teste, use o *Console* do container no Portainer:
`php artisan db:seed --force`.

## E-mails

Os e-mails (verificação de conta, redefinição de senha, notificações) vão para o Mailpit do
servidor (rede docker `mailpit`), não para a internet. Caixa de entrada: porta 30090 do servidor.

## Configuração

O `.env` vem do secret `DEPLOY_ENV_FILE` do environment `homologacao` (*Settings → Environments*).
Para mudar uma variável, edite o secret e rode o workflow de novo (*Run workflow*, sem `image-tag`).

Variável específica do servidor: `TRUSTED_PROXIES` (IP do proxy HTTPS da STI), lida por
`app/Http/Middleware/TrustProxies.php` para que o Laravel gere URLs com `https`.
Os logs do Laravel vão para a saída do container (`LOG_CHANNEL=stderr`).

## Rollback

*Actions → Deploy lmtstestes → Run workflow* na branch `develop`, informando em `image-tag` o SHA
de um commit já implantado. Atenção: migrations já aplicadas não são desfeitas.

## Logs

Portainer (https://lmtsteste22.ufape.edu.br) → *Containers* → `concursos-app-1` → *Logs*.
