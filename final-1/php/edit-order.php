<?php

require_once '../vendor/autoload.php';
require 'bootstrap.php';

use Illuminate\Database\Eloquent\Model as Model;

class User extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'id', 'email', 'name', 'phone', 'ip', 'photo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    protected $hidden = [
    ];

    public function orders()
    {
        return $this->hasMany('Order');
    }
}

class Order extends Model

{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'id', 'user_id', 'address', 'comment', 'payment_method', 'callback'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    protected $hidden = [
    ];

    public function user()
    {
        return $this->belongsTo('User');
    }
}

$id = $_POST['edit-id'];
$address = null;
if ($_POST['edit-street'] !== '') {
    $address .= "улица {$_POST['edit-street']}";
}
if ($_POST['edit-home'] !== '') {
    $address .= ", дом {$_POST['edit-home']}";
}
if ($_POST['edit-part'] !== '') {
    $address .= ", корпус {$_POST['edit-part']}";
}
if ($_POST['edit-appt'] !== '') {
    $address .= ", кв. {$_POST['edit-appt']}";
}
if ($_POST['edit-floor'] !== '') {
    $address .= ", этаж {$_POST['edit-floor']}";
}
$order = Order::where('id', '=', $id)->first();
$order->address = $address;
$order->comment = $_POST['edit-comment'];
$order->payment_method = $_POST['edit-payment'];
$callback = ($_POST['edit-callback'] === 'on' ? 1 : 0);
$order->callback = $callback;
if (!$id) {
    echo json_encode(array(
        'status' => false
    ));
    die();
} else {
    $order->save();
    echo json_encode(array(
        'status' => true
    ));
}