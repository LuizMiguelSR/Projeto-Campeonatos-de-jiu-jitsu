# Projeto-Campeonatos-de-jiu-jitsu
Projeto destino para o teste da KBRTEC de desenvolvedor back end jr

## Guia de instalação da aplicação
 
- 1º Realizar a instalação dos pacotes do composer
    
    No Terminal
 
        composer install --ignore-platform-req=ext-zip

- 2º Criar o arquivo .env para determinar as variáveis de ambiente basta copiar o arquivo .env.example e apagar o .example

- 3º Gerar a chave de configuração da aplicação e preencher o arquivo .env com as configurações do mysql e do smtp de email
  
  No terminal

        php artisan key:generate

- 4º Realizar as migrações das tabelas
  
  No terminal
  
        php artisan migrate

- 5º Realizar as seeders, comando responsável por criar alguns usuários padrões ao sistema
  
  No terminal
  
        php artisan db:seed --class=UsersTableSeeder
  
  Obs.: Note que o parâmetro UsersTableSeeder pode ser Substituída pelo nome da seeder existente na aplicação

- 6º Edição do arquivo php.ini

    O JCrop pode apresentar problemas se este aquivo não for editado.

    No diretório de instalação do php procure pelo arquivo php.ini

    Ctrl+f e procure por gd se a linha extension=gd e desmarque o ";" presente.

- 7º Pasta arquivos para baixar o modelo de csv é necessário mover este diretório para /storage/app/public

# Pacotes usados

Mews captcha 3.3.2;
DomPDF 2.0;
Intervention 2.7;
Laravel Excel 3.1;
