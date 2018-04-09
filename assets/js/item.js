$(document).ready(function () {
  fillCategorySelect();
  // Load items table for each category
  $.each(categories, function (i, cat) {
    loadItemTable(cat.id);
  });
});

/* =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=- *
 * Fill categories list select input
 * =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=- */
function fillCategorySelect() {
  $.ajax({
    type: "POST",
    dataType: "json",
    async: false,
    url: base_url + "item/categories",
    success: function(data){
      var option;
      $.each(data, function (index, cat) {
        option = "<option value='" + cat.id + "'>" + cat.name + "</option>";
        $("#txt_category").append(option);
      });
    },
    error: function(e, d, l){
      $("#err").html(e);
      $("#err").show();
    }
  });
}

/* =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=- *
 * Do checks then saves item (new or edited) in DB
 * =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=- */
function saveItem() {
  $("#err").hide();
  $("#success").hide();

  // Fetch values from form and store it into an object
  var vals = {
    category: $("#txt_category").val(),
    name: $("#txt_name").val().trim(),
    description: $("#txt_description").val().trim(),
    bonus_value: $("#nbr_stat_bonus").val(),
    bonus_stat: $("#txt_stat_bonus").val().trim()
  };

  // Check selected item category
  if(vals.category === "-1") {
    $("#err").html("Choisir une catégorie");
    $("#err").show();
    return false;
  }

  // Check item name not empty
  if(vals.name.trim() === "") {
    $("#err").html("Saisir un nom");
    $("#err").show();
    return false;
  }

  // Check item description not empty
  if(vals.description.trim() === "") {
    $("#err").html("Saisir une description");
    $("#err").show();
    return false;
  }

  // If no bonus selected, val must be 0 and stat must be empty
  if(vals.bonus_stat === "-1") {
    vals.bonus_value = 0;
    vals.bonus_stat  = "";
  }

  $.ajax({
    data: {
      edit: $("#hidden_edit_id").val(),
      data: vals
    },
    type: "POST",
    dataType: "text",
    async: false,
    url: base_url + "item/addedit",
    success: function(data){
      if(data === "1") {
        $("#success").html("Objet enregistré");
        $("#success").show().delay(2000).slideUp();
        resetItemForm();
        loadItemTable(vals.category);
        $("#btn_tab_cat" + vals.category).trigger("click");
      }
    },
    error: function(e, d, l){
      $("#err").html(e);
      $("#err").show();
    }
  });
}

/* =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=- *
 * Reset inputs of item add/edit form
 * =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=- */
function resetItemForm() {
  $("#hidden_edit_id").val("-1");
  $("#txt_category").val("-1");
  $("#txt_name").val("");
  $("#txt_description").val("");
  $("#nbr_stat_bonus").val(0);
  $("#txt_stat_bonus").val("-1");
}

/* =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=- *
 * (Re)loads items table for given category's id
 * =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=- */
function loadItemTable(category) {
  $.ajax({
    data: {
      category: category
    },
    type: "POST",
    dataType: "json",
    async: true,
    url: base_url + "item/category",
    success: function(data){
      $("#table_cat" + category + " > tbody").html("");

      $.each(data, function (i, item) {
        var row = "";

        var btn_edit   = "<button class='btn btn-primary   btn-xs' onclick='getItemDetail(" + item.id + ")'><i class='fa fa-edit'></i></button>";
        var btn_dupli  = "<button class='btn btn-secondary btn-xs' onclick='getItemDetail(" + item.id + ", true)'><i class='fa fa-clone'></i></button>";
        var btn_delete = "<button class='btn btn-danger    btn-xs' onclick='deleteItem(" + item.id + "," + category + ")'><i class='fa fa-trash'></i></button>";

        row += "<tr>";
        row += "<td>" + btn_edit + " " + btn_dupli + " " + btn_delete + "</td>";
        row += "<td>" + item.id + "</td>";
        row += "<td>" + item.name + "</td>";
        row += "<td>" + item.description + "</td>";
        row += "<td>" + ( (item.bonus_value != 0) ? ( format(item.bonus_value) + " " + item.bonus_stat.toUpperCase() ) : "" ) + "</td>";
        row += "</tr>";

        $("#table_cat" + category + " > tbody").append(row);
      });
    },
    error: function(e, d, l){
      console.log(e);
    }
  });
}

/* =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=- *
 * Get item info and fill form inputs in order to edit item
 * =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=- */
function getItemDetail(id, duplicate = false) {
  $.ajax({
    data: {
      id: id
    },
    type: "POST",
    dataType: "json",
    async: false,
    url: base_url + "item/info",
    success: function(i){
      if(duplicate === false)
        $("#hidden_edit_id" ).val(i.id);
      $("#txt_category"   ).val(i.category);
      $("#txt_name"       ).val(i.name);
      $("#txt_description").val(i.description);
      $("#nbr_stat_bonus" ).val(i.bonus_value);
      $("#txt_stat_bonus" ).val(i.bonus_stat == "" ? -1 : i.bonus_stat);
    },
    error: function(e, d, l){
      console.log(e);
    }
  });
}

/* =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=- *
 * Delete given item
 * =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=- */
function deleteItem(id, category) {
  $.ajax({
    data: {
      id: id
    },
    type: "POST",
    dataType: "text",
    async: false,
    url: base_url + "item/delete",
    success: function(i){
      console.log(i);
      loadItemTable(category);
    },
    error: function(e, d, l){
      console.log(e);
    }
  });
}

/* =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=- *
 * Adds '+' behind a strictly positive number
 * =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=- */
function format(n) {
    return (n>0?'+':'') + n;
}