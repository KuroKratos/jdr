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