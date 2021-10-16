<?php

return [
    "template" => [
        "admin" => "marrs-admin::layouts.app",
        "front" => "marrs-admin::layouts.blank"
    ],
    "logo" => "/vendor/marrs-admin/img/logo.svg",
    "favicon" => "/vendor/marrs-admin/img/logo.svg",
    "models" => [
        "admin"          => \Marrs\MarrsAdmin\Models\Admin::class,
        //'role'           => Bitfumes\Multiauth\Model\Role::class,
        //'permission'     => Bitfumes\Multiauth\Model\Permission::class,
    ],
];
