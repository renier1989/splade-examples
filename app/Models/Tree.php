<?php

namespace App\Models;

use App\Traits\Uuids;
use Fureev\Trees\Config\Base;
use Fureev\Trees\NestedSetTrait;
use Fureev\Trees\Config\TreeAttribute;
use Illuminate\Database\Eloquent\Model;
use Fureev\Trees\Contracts\TreeConfigurable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tree extends Model implements TreeConfigurable
{
    use HasFactory,NestedSetTrait,Uuids;

    protected $keyType = 'uuid';

    protected $fillable = [
        'title',
        // 'lft',
        // 'rgt',
        // 'lvl',
        // 'parent_id',
        // 'tree_id',
        // 'created_at',
        // 'updated_at',
        // 'deleted_at',
    ];

    protected static function buildTreeConfig(): Base
    {
        $config= new Base(true);
        // $config->parent()->setType('uuid'); <-- `parent type` set up automatically from `$model->keyType`
        return $config;
    }

    // protected static function buildTreeConfig(): Base
    // {
    //     return new Base(TreeAttribute::make('uuid')->setAutoGenerate(false));
    // }
}
