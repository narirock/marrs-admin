<?php

namespace Marrs\MarrsAdmin\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

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

        $this->warn('2. Publicando assets');
        Artisan::call('vendor:publish --tag=marrs-admin-assets --force');

    }
}
