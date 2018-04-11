<input type="text" id="item_search" class="form-control">

<div class="card mt-2">
<table class="table table-sm table-striped mb-0">
  <thead>
<!--    <tr>
      <th>ID</th>
      <th>Nom</th>
      <th>Catégorie</th>
      <th>Description</th>
      <th>Valeur</th>
      <th>Stat</th>
    </tr>-->
  </thead>
  <tbody id="result">

  </tbody>
</table>
</div>

<script type="text/javascript">
  $('#item_search').keyup(function () {

    if ($('#item_search').val().trim() != "") {
      var row = "";
      $.ajax({
        data: {
          search: $('#item_search').val().trim()
        },
        type: "POST",
        dataType: "JSON",
        async: true,
        url: base_url + 'item/search',
        success: function(data){
          $.each(data, function(i, item) {
            row += "<tr>";
            row += "<td>" + item.id + "</td>";
            row += "<td>" + item.name + "</td>";
            row += "<td>" + item.cat_name + "</td>";
            row += "<td>" + item.description + "</td>";
            row += "<td>" + item.bonus_value + "</td>";
            row += "<td>" + item.bonus_stat + "</td>";
            row += "</tr>";
          });
          $("#result").html(row);
        },
        error: function(e, d, l){
          console.log(e);
        }
      });
    }
    else {
      $("#result").html("");
    }

  });
</script>