$(document).ready(function () {
  $.ajax({
    type: "POST",
    dataType: "json",
    async: false,
    url: base_url + 'item/categories',
    success: function(data){
      var option;
      $.each(data, function (index, cat) {
        console.log(cat);
        option = "<option value='" + cat.id + "'>" + cat.name + "</option>";
        $('#txt_category').append(option);
      });
    },
    error: function(e, d, l){
      console.log(e);
    }
  });
});

function add_edit_item() {
  $.ajax({
    data: {
      category: $('#txt_category').val(),
      name: $('#txt_name').val().trim(),
      description: $('#txt_description').val().trim(),
      bonus_value: parseInt($('#nbr_stat_bonus').val()),
      bonus_stat: $('#txt_stat_bonus').val()
    },
    type: "POST",
    async: false,
    url: base_url + 'item/addedit',
    success: function(data){
      $('#txt_category').val('-1');
      $('#txt_name').val('');
      $('#txt_description').val('');
      $('#nbr_stat_bonus').val(0);
      $('#txt_stat_bonus').val('-1');
    },
    error: function(e, d, l){
      console.log(e);
    }
  });
}