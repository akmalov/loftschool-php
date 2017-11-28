<?php

// configuration //

require_once '../vendor/autoload.php';
require 'bootstrap.php';
require_once 'validationImage.php';

use Intervention\Image\ImageManager;
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

//$remoteIp = $_SERVER['REMOTE_ADDR'];
//$gRecaptchaResponse = $_REQUEST['g-recaptcha-response'];
//$recaptcha = new \ReCaptcha\ReCaptcha('6Le4Xi4UAAAAAIDgujIdBshZIjjkVnHEYZaQ9-SD');
//$resp = $recaptcha->verify($gRecaptchaResponse, $remoteIp);
//if (!$resp->isSuccess()) {
//    echo 'Неудача';
//    echo json_encode(array(
//        'status' => false
//    ));
//    die;
//}

// Phase 1 - users' registration and authorization //
$email = trim(strtolower($_POST['email']));
$name = trim(strtolower($_POST['name']));
$phone = trim(strtolower($_POST['phone']));
$IP = $_SERVER['REMOTE_ADDR'];
if (array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER)) {
    $IP = array_pop(explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']));
}

$uploadedImage = validationImage($_FILES['photo'], $extension);

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    return null;
}

$user = User::with('orders')->where('email', '=', $email)->first();

if (!$user) {
    $user = new User();
    $user->email = $email;
    $user->name = $name;
    $user->phone = $phone;
    $user->ip = $IP;
    $user->save();
    $user_id = $user->id;
    if ($uploadedImage) {
        $filename = "$user_id.$extension";
        $path = '../photos/' . $filename;
        $tmp_name = $_FILES['photo']['tmp_name'];
        $user->photo=$filename;
        move_uploaded_file($tmp_name, $path);
        $manager = new ImageManager();
        $image = $manager->make($path)->resize(480, 480);
        $image->save();
        $user->save();
    }
} else {
    $user_id = $user->id;
}

// Phase 2 - ordering //
$address = "улица {$_POST['street']}, дом {$_POST['home']}";
if ($_POST['part'] !== '') {
    $address .= ", корпус {$_POST['part']}";
}
if ($_POST['appt'] !== '') {
    $address .= ", кв. {$_POST['appt']}";
}
if ($_POST['floor'] !== '') {
    $address .= ", этаж {$_POST['floor']}";
}

$order = new Order();
$order->user_id = $user_id;
$order->address = $address;
$order->comment = $_POST['comment'];
$order->payment_method = $_POST['payment'];
$callback = ($_POST['callback'] === 'on' ? 1 : 0);
$order->callback = $callback;
$order->save();

// Phase 3 - dispatch letter //
$result = Order::where('user_id', '=', $user_id)->count();

$message = "<h1>Заказ №$result</h1><br>
Ваш заказ будет доставлен по адресу:<br>
$address<br>
DarkBeefBurger за 500 рублей, 1 шт<br>";
if ($result < 2) {
    $message .= "<p>Спасибо - это ваш первый заказ</p>";
} else {
    $message .= "<p>Спасибо! Это уже $result заказ</p>";
}

include 'mail-forward.php';
echo json_encode(array(
    'status' => true
));
