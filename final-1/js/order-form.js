function authorization() {
  var form = $('#order-form');
  var formData = new FormData();
  formData.append('name', $('#name').val());
  formData.append('phone', $('#phone').val());
  formData.append('email', $('#email').val());
  formData.append('street', $('#street').val());
  formData.append('home', $('#home').val());
  formData.append('part', $('#part').val());
  formData.append('appt', $('#appt').val());
  formData.append('floor', $('#floor').val());
  formData.append('comment', $('#comment').val());
  formData.append('payment', $('#payment').val());
  formData.append('callback', $('#callback').val());
  formData.append('photo', $("#photo").prop('files')[0]);
  $.ajax({
    type: 'POST',
    url: './php/order-form.php',
    processData: false,
    contentType: false,
    data: formData,
    success: function (data) {
      var result = JSON.parse(data);
      var popup = (result["status"] === true) ? '#success' : '#error';
      $.fancybox.open([
        {href: popup}
      ], {
        type: 'inline',
        maxWidth: 250,
        fitToView: false,
        padding: 0,
        afterClose : function () {
          form.trigger('reset');
        }
      });
    }
  })
}

function editOrder() {
  var form = $('#edit-order-form');
  var formData = new FormData();
  formData.append('edit-id', $('#edit-id').val());
  formData.append('edit-street', $('#edit-street').val());
  formData.append('edit-home', $('#edit-home').val());
  formData.append('edit-part', $('#edit-part').val());
  formData.append('edit-appt', $('#edit-appt').val());
  formData.append('edit-floor', $('#edit-floor').val());
  formData.append('edit-comment', $('#edit-comment').val());
  formData.append('edit-payment', $('#edit-payment').val());
  formData.append('edit-callback', $('#edit-callback').val());
  $.ajax({
    type: 'POST',
    url: './php/edit-order.php',
    processData: false,
    contentType: false,
    data: formData,
    success: function (data) {
      var result = JSON.parse(data);
      var popup = (result["status"] === true) ? '#success' : '#error';
      $.fancybox.open([
        {href: popup}
      ], {
        type: 'inline',
        maxWidth: 250,
        fitToView: false,
        padding: 0,
        afterClose : function () {
          form.trigger('reset');
        }
      });
    }
  })
}

$('.status-popup__close').on('click', function(e) {
  e.preventDefault();
  $.fancybox.close();
});