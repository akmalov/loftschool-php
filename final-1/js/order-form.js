function send() {
  var letter = $('#order-form').serialize();
  $.ajax({
    type: 'POST',
    url: '../php/order-form.php',
    data: letter,
    success: function (data) {
      alert(data);
    }
  });
}