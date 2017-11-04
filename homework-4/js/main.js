function submitRegistration() {
  var formData = new FormData();
  formData.append('login', $("#registration-login").val());
  formData.append('password', $("#registration-password").val());
  formData.append('password-repeat', $("#registration-password-repeat").val());
  formData.append('name', $("#registration-name").val());
  formData.append('age', $("#registration-age").val());
  formData.append('description', $("#registration-description").val());
  formData.append('photo', $("#registration-photo").prop('files')[0]);
  $.ajax({
    type: 'POST',
    url: './php/registration.php',
    processData: false,
    contentType: false,
    data: formData,
    success: function (data) {
      alert(data);
    }
  });
}