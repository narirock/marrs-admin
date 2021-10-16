<?php

namespace Marrs\MarrsAdmin\Console\Commands;

use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Marrs\MarrsAdmin\Models\Menu;
use Marrs\MarrsAdmin\Models\Admin;
use Illuminate\Support\Facades\Artisan;
use Marrs\MarrsAdmin\Database\Seeders\AdminPackageSeeder;

class Install extends Command
{
    protected $signature = 'marrs-admin:install';

    protected $description = 'instala e configura o pacote marrs-admin';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $this->warn('1. Criando tabelas');
        Artisan::call('migrate');
        $this->info(Artisan::output());

        $this->warn('2. Criando registros iniciais');
        $this->seeder();

        $this->warn('3. Publicando assets');
        Artisan::call('vendor:publish --tag=marrs-admin-assets --force');
    }


    public function seeder()
    {
        //criando usuario administrador
        $user = Admin::create([
            'name'  => "ADMIN",
            'avatar' => '',
            'email' => "admin@teste.com.br",
            'email_verified_at' => now(),
            'password' => bcrypt('123456'),
            'remember_token' => Str::random(10),
        ]);


        //menus do modulo
        Menu::insert([
            [
                'name' => 'Painel',
                'route' => null,
                'icon_class' => null,
                'type' => 'title',
                'menu_id' => null
            ],
            [
                'name' => 'Avançado',
                'route' => null,
                'icon_class' => null,
                'type' => 'title',
                'menu_id' => null
            ],
            [
                'name' => 'Dashboard',
                'route' => 'admin.dashboard',
                'icon_class' => 'fas fa-chart-line',
                'type' => 'menu',
                'menu_id' => 1
            ],
            [
                'name' => 'Usuários',
                'route' => 'admin.users.index',
                'icon_class' => 'fas fa-user',
                'type' => 'menu',
                'menu_id' => 2
            ],
            [
                'name' => 'Menus',
                'route' => 'admin.menus.index',
                'icon_class' => 'fas fa-list',
                'type' => 'menu',
                'menu_id' => 2
            ]
        ]);
    }
}
