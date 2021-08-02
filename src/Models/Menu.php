<?php

namespace Marrs\MarrsAdmin\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'link',
        'route',
        'icon_class',
        'menu_id',
        'type',
        'order',
    ];


    public function childs()
    {
        return $this->hasMany('Marrs\MarrsAdmin\Models\Menu');
    }
}
