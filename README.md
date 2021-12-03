# 🚀 MARRS ADMIN

Este pacote foi desenvolvido para facilitar o start de um ambmiente administrativo.
Ao instala-lo na aplicação ele provisiona:
  - Cadastro de usuários administradores
  - Login de administradores
  - Reset de password
  - Cadastro de menus
  - Template para o CMS

Instalação
---
```cmd

composer require narirock/marrs-admin
```

no arquivo config/app.php inclua o service proovider

```php
/*
* Package Service Providers...
*/
Marrs\MarrsAdmin\MarrsAdminServiceProvider::class,
```
para rodar as migrations e seeders necessárias rode o comando:
```terminal
php artisan marrs-admin:install  
```

será criado um usuário administrador para testes :
```txt
admin@teste.com.br
123456
```
* não esqueça de alterar esses dados por segurança
