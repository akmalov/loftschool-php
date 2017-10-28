$('#order-form').on('submit', function(e){
  e.preventDefault();

  var
    form = $(this),
    formData = form.serialize();

  $.ajax({
    url: './php/order-form.php',
    type: 'POST',
    data: formData,
    success: function (data) {
      var popup = data ? '#success' : '#error';
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
});

$('.status-popup__close').on('click', function(e) {
  e.preventDefault();
  $.fancybox.close();
});