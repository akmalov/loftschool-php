<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Админка
  </title>
  <link rel="stylesheet" href="css/vendors.min.css">
  <link rel="stylesheet" href="css/main.min.css">
</head>
<?php
require_once 'vendor/autoload.php';
require 'php/bootstrap.php';

use Illuminate\Database\Eloquent\Model as Model;

class User extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'id',
        'email',
        'name',
        'phone',
        'ip',
        'photo'
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
        'id',
        'user_id',
        'address',
        'comment',
        'payment_method',
        'callback'
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

$resultUsers = User::all()->toArray();
$resultOrders = Order::all()->toArray();
echo "<h2>Список пользователей</h2>";
echo "<table width=60% border=\"1px solid black\" cellspacing=\"0\" cellpadding=\"0\" style=\"margin-bottom: 30px;\">";
foreach ($resultUsers as $user) {
    foreach ($user as $key => $value) {
        echo "<tr><td>$key</td><td>$value</td></tr>";
    }
    echo "<tr><td></td><td></td></tr>";
}
echo "</table>";
echo "<br>";
echo "<h2>Список заказов</h2>";
echo "<table width=60% border=\"1px solid black\" cellspacing=\"0\" cellpadding=\"0\">";
foreach ($resultOrders as $order) {
    foreach ($order as $key => $value) {
        echo "<tr><td>$key</td><td>$value</td></tr>";
    }
    echo "<tr><td></td><td></td></tr>";
}
echo "</table>";
echo "<br>";
?>

<h2>Добавление заказа</h2>
<div style="background: black" class="order__form">
  <form class="order__form-tag" id="order-form" action="javascript:void(0);" onsubmit="authorization()">
    <div class="order__form-col">
      <div class="order__form-row order__form-row_double">
        <label class="order__form-block">
          <div class="order__form-label">Имя</div>
          <input class="order__form-input" name="name" id="name" type="text" placeholder="">
        </label>
        <label class="order__form-block">
          <div class="order__form-label">Телефон</div>
          <input class="order__form-input phone-mask" name="phone" id="phone" type="text" placeholder="">
        </label>
      </div>
      <div class="order__form-row order__form-row_double">
        <label class="order__form-block">
          <div class="order__form-label">email</div>
          <input class="order__form-input" name="email" id="email" type="email" placeholder="">
        </label>
        <label class="order__form-block">
          <div class="order__form-label">Улица</div>
          <input class="order__form-input" name="street" id="street" type="text" placeholder="">
        </label>
      </div>
      <div class="order__form-row order__form-row_quatro">
        <label class="order__form-block">
          <div class="order__form-label">Дом</div>
          <input class="order__form-input" name="home" id="home" type="text" placeholder="">
        </label>
        <label class="order__form-block">
          <div class="order__form-label">Корпус</div>
          <input class="order__form-input" name="part" id="part" type="text" placeholder="">
        </label>
        <label class="order__form-block">
          <div class="order__form-label">Квартира</div>
          <input class="order__form-input" name="appt" id="appt" type="text" placeholder="">
        </label>
        <label class="order__form-block">
          <div class="order__form-label">Этаж</div>
          <input class="order__form-input" name="floor" id="floor" type="text" placeholder="">
        </label>
      </div>
    </div>
    <div class="order__form-col">
      <div class="order__form-row">
        <label class="order__form-block">
          <div class="order__form-label">Комментарий</div>
          <textarea class="order__form-input order__form-input_textarea" id="comment" name="comment"></textarea>
        </label>
      </div>
      <div class="order__form-buttons">
        <div class="order__form-row">
          <label class="order__radio">
            <input class="order__radio-elem" name="payment" id="payment" type="radio">
            <div class="order__radio-fake"></div>
            <div class="order__radio-title">Потребуется сдача</div>
          </label>
          <label class="order__radio">
            <input class="order__radio-elem" name="payment" id="payment" type="radio">
            <div class="order__radio-fake"></div>
            <div class="order__radio-title">Оплата по карте</div>
          </label>
        </div>
        <div class="order__form-row">
          <label class="order__radio order__radio_checkbox">
            <input class="order__radio-elem" name="callback" id="callback" type="checkbox">
            <div class="order__radio-fake"></div>
            <div class="order__radio-title">Не перезванивать</div>
          </label>
        </div>
        <div>
          <input name="photo" type="file" id="photo" placeholder="Загрузить фото">
        </div>
        <div class="order__form-row">
          <input class="order__form-button" name="" type="submit" value="Заказать">
          <input class="order__form-button order__form-button_reset" name="" type="reset" value="Очистить">
        </div>
      </div>
    </div>
  </form>
</div>
<br><br>
<h2>Редактирование заказа</h2>
<div style="background: black" class="order__form">
  <form class="order__form-tag" id="edit-order-form" action="javascript:void(0);" onsubmit="editOrder()">
    <div class="order__form-col">
      <div class="order__form-row order__form-row_double">
        <label class="order__form-block">
          <div class="order__form-label">id заказа</div>
          <input class="order__form-input" name="edit-id" id="edit-id" type="text" placeholder="">
        </label>
      </div>
      <div class="order__form-row order__form-row_double">
        <label class="order__form-block">
          <div class="order__form-label">Улица</div>
          <input class="order__form-input" name="edit-street" id="edit-street" type="text" placeholder="">
        </label>
      </div>
      <div class="order__form-row order__form-row_quatro">
        <label class="order__form-block">
          <div class="order__form-label">Дом</div>
          <input class="order__form-input" name="edit-home" id="edit-home" type="text" placeholder="">
        </label>
        <label class="order__form-block">
          <div class="order__form-label">Корпус</div>
          <input class="order__form-input" name="edit-part" id="edit-part" type="text" placeholder="">
        </label>
        <label class="order__form-block">
          <div class="order__form-label">Квартира</div>
          <input class="order__form-input" name="edit-appt" id="edit-appt" type="text" placeholder="">
        </label>
        <label class="order__form-block">
          <div class="order__form-label">Этаж</div>
          <input class="order__form-input" name="edit-floor" id="edit-floor" type="text" placeholder="">
        </label>
      </div>
    </div>
    <div class="order__form-col">
      <div class="order__form-row">
        <label class="order__form-block">
          <div class="order__form-label">Комментарий</div>
          <textarea class="order__form-input order__form-input_textarea" id="edit-comment" name="edit-comment"></textarea>
        </label>
      </div>
      <div class="order__form-buttons">
        <div class="order__form-row">
          <label class="order__radio">
            <input class="order__radio-elem" name="edit-payment" id="edit-payment" type="radio">
            <div class="order__radio-fake"></div>
            <div class="order__radio-title">Потребуется сдача</div>
          </label>
          <label class="order__radio">
            <input class="order__radio-elem" name="edit-payment" id="edit-payment" type="radio">
            <div class="order__radio-fake"></div>
            <div class="order__radio-title">Оплата по карте</div>
          </label>
        </div>
        <div class="order__form-row">
          <label class="order__radio order__radio_checkbox">
            <input class="order__radio-elem" name="edit-callback" id="edit-callback" type="checkbox">
            <div class="order__radio-fake"></div>
            <div class="order__radio-title">Не перезванивать</div>
          </label>
        </div>
        <div class="order__form-row">
          <input class="order__form-button" name="" type="submit" value="Заказать">
          <input class="order__form-button order__form-button_reset" name="" type="reset" value="Очистить">
        </div>
      </div>
    </div>
  </form>
</div>
<div class="status-popup popup" id="success">
  <div class="status-popup__inner">
    <div class="status-popup__message">Сообщение отправлено</div><a class="status-popup__close btn" href="#">Закрыть</a>
  </div>
</div>
<div class="status-popup popup" id="error">
  <div class="status-popup__inner">
    <div class="status-popup__message error-message">Произошла ошибка</div><a class="status-popup__close btn" href="#">Закрыть</a>
  </div>
</div>
<script src="js/vendors.min.js"></script>
<script src="js/main.min.js"></script>
<script src="js/order-form.js"></script>
</html>