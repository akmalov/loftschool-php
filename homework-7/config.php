<?php
require './vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;
$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'shop',
    'username'  => 'root',
    'password'  => '',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

$capsule->setAsGlobal();

$capsule->bootEloquent();

class Good extends Illuminate\Database\Eloquent\Model
{
    public $timestamps = false;
    public function category()
    {
        return $this->belongsTo('Category');
    }
}

class Category extends Illuminate\Database\Eloquent\Model
{
    public $timestamps = false;
}
