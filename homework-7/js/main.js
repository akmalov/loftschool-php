$('#get').on('click', function(){
  $.ajax({
    url: 'rest.php',
    method: 'GET',
    dataType: 'json'
  }).done(function (data){
    goodsTable = '<table><tr><td>id</td><td>Фотография</td><td>Название</td><td>Категория</td><td>Цена</td><td></td></tr>';
    for (var key = 0; key < data.length; key++) {
      goodsTable +='<tr id="'+data[key].id+'"><td width="10%">'+data[key].id+'</td>';
      goodsTable +='<td width="20%"><img src="'+data[key].photo+'" width="200"> </td>';
      goodsTable +='<td width="20%">'+data[key].name+'</td>';
      goodsTable +='<td width="10%">'+data[key].category_id+'</td>';
      goodsTable +='<td width="10%">'+data[key].price+'</td>';
      goodsTable +='<td width="30%"><a href="#" onClick="show('+data[key].id+')">Просмотр</a> ' +
        '<a href="#" onClick="edit('+data[key].id+')">Редактировать</a> ' +
        '<a href="#" onClick="destroy('+data[key].id+')">Удалить</a></td></tr>';
    }
    goodsTable += '</table>';
    $('#goods').html(goodsTable);
  });
});
$('#create').on('click', function(){
  if(!$("form").is('#createform'))
  {
    $( '<form id="createform">' +
      'Фото <input type="file" name="photo"><br>' +
      'Имя <input type="text" name="name"><br>' +
      'Категория <input type="text" name="category_id"><br>' +
      'Цена <input type="text" name="price"><br>' +
      'Описание <textarea name="description" cols="35" rows="10"></textarea><br>' +
      '<a href="#" onClick="return store();">Сохранить</a>' +
      '</form>' ).insertBefore( "#goods" );
  }
});
function store(){
  var form = $('#createform');
  var dataForm=form.serialize();
  $.ajax({
    url: 'rest.php',
    type: 'POST',
    dataType: 'json',
    data: dataForm
  }).done(function (data){
    $('#createform').remove();
    good='<tr id="'+data['id']+'"><td width="10%">'+data['id']+'</td>';
    good +='<td width="20%"><img src="'+data['photo']+'" width="200"> </td>';
    good +='<td width="20%">'+data['name']+'</td>';
    good +='<td width="10%">'+data['category_id']+'</td>';
    good +='<td width="10%">'+data['price']+'</td>';
    good +='<td width="30%"><a href="#" onClick="show('+data['id']+')">Просмотр</a> ' +
      '<a href="#" onClick="edit('+data['id']+')">Редактировать</a> ' +
      '<a href="#" onClick="destroy('+data['id']+')">Удалить</a></td></tr>';
    $( good ).insertAfter( "tr:last" );
  });
}

function show(id){
  if(!$("tr").is('#show'+id)) {
    $.ajax({
      url: 'rest.php?id='+id,
      method: 'GET',
      dataType: 'json'
    }).done(function (data){
      good = '<tr id="show'+data['id']+'"><td colspan="5">'+data['description']+'</td><td><a href="#" onClick="removetr('+id+')">Закрыть</a></td></tr>';
      $( good ).insertAfter( "#"+id );
    });
  }

}

function save(id){
  var form = $('#editform'+id);
  var dataForm=form.serialize();
  $.ajax({
    url: 'rest.php',
    method: 'PUT',
    dataType: 'json',
    data: dataForm
  }).done(function (data){
    $("#"+id).remove();
    good='<tr id="'+data['id']+'"><td width="10%">'+data['id']+'</td>';
    good +='<td width="20%"><img src="'+data['photo']+'" width="200"> </td>';
    good +='<td width="20%">'+data['name']+'</td>';
    good +='<td width="10%">'+data['category_id']+'</td>';
    good +='<td width="10%">'+data['price']+'</td>';
    good +='<td width="30%"><a href="#" onClick="show('+data['id']+')">Просмотр</a> ' +
      '<a href="#" onClick="edit('+data['id']+')">Редактировать</a> ' +
      '<a href="#" onClick="destroy('+data['id']+')">Удалить</a></td></tr>';
    $( good ).insertAfter( "#edit"+id );
    $("#edit"+id).remove();
  });
}

function removetr(id)
{
  $("#show"+id).remove();
  $("#edit"+id).remove();
  $("#"+id).show();
}
function edit(id){
  $("#"+id).hide();
  if(!$("tr").is('#edit'+id)) {
    $.ajax({
      url: 'rest.php?id='+id,
      method: 'GET',
      dataType: 'json'
    }).done(function (data){
      good = '<tr id="edit'+data['id']+'"><td><form id="editform'+data['id']+'">'+
        '<input type="hidden" name="id" value="'+data['id']+'">' +
        '<img src="'+data['photo']+'" width="200">' +
        '<input type="text" name="name" value="'+data['name']+'">' +
        '<input type="text" name="category_id" value="'+data['category_id']+'">' +
        '<input type="text" name="price" value="'+data['price']+'">'+
        '<textarea name="description" cols="35" rows="10">'+data['description']+'</textarea>'+
        '<input type="hidden" value="'+data['id']+'">'+
        '<a href="#"  onClick="save('+data['id']+')">Сохранить</a><a href="#" onClick="removetr('+id+')">Закрыть</a></form></td></tr>';
      $( good ).insertAfter( "#"+id );
    });
  }
}

function destroy(id){
  $.ajax({
    url: 'rest.php?id='+id,
    method: 'DELETE'
  }).done(function (data){
    $("#"+id).remove();
  });
}