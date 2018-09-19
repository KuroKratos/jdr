var skill_table;
var item_table;

$(document).ready(function () {

  // Progress bars animation
  $('.progress .progress-bar').css("width",
    function () {
      return ((parseInt($(this).attr("aria-valuenow")) / parseInt($(this).attr("aria-valuemax"))) * 100) + "%";
    }
  );

  // Catch ENTER pressed in caracteristics inputs
  $('.char_val').keyup(function (k) {
    if (k.keyCode == 13) {
      var input = $(this);
      save_char_carac(input);
    }
  });

  // Prevents the deletion of the '%' character in stats inputs
  $('.carac').keydown(function () {
    var field = $(this);
    var oldval = field.val();
    setTimeout(function () {
      var true_val = field.val().substring(0, field.val().length - 1);
      if (field.val().slice(-1) != '%' || isNaN(true_val) || parseInt(true_val) < 0 || parseInt(true_val) > 100) {
        field.val(oldval);
        field[0].setSelectionRange(oldval.length - 1, oldval.length - 1);
      }
    }, 1);
  });

  // Destroys any datatable, just in case
  if ($.fn.DataTable.isDataTable('#skill_table')) {
    $('#skill_table').dataTable().fnDestroy();
  }
  if ($.fn.DataTable.isDataTable('#inv_table')) {
    $('#inv_table').dataTable().fnDestroy();
  }

  // Generates skills datatable
  skill_table = $("#skill_table").DataTable({
    ajax: base_url + "/skill/char/" + char.char_id,
    info: false,
    filter: false,
    paging: false,
    scroller: false,
    scrollCollapse: false,
    sort: false,
    autoWidth: false,
    responsive: {
      details: {
        display: $.fn.dataTable.Responsive.display.modal({
          header: function (row) {
            var data = row.data();
            return 'Details for ' + data[0] + ' ' + data[1];
          }
        }),
        renderer: $.fn.dataTable.Responsive.renderer.tableAll({
          tableClass: 'table'
        })
      }
    },
    columns: [
      {data: "name"},
      {data: "worth"},
      {data: "effect"},
      {data: "edit"}
    ]
  });

  // Generates inventory datatable
  /*item_table = $("#inv_table").DataTable({
    ajax: base_url + "/inventory/char/" + char.char_id,
    info: false,
    filter: false,
    paging: false,
    scroller: false,
    scrollCollapse: false,
    sort: true,
    autoWidth: false,
    responsive: {
      details: {
        display: $.fn.dataTable.Responsive.display.modal({
          header: function (row) {
            var data = row.data();
            return 'Details for ' + data[0] + ' ' + data[1];
          }
        }),
        renderer: $.fn.dataTable.Responsive.renderer.tableAll({
          tableClass: 'table'
        })
      }
    },
    columns: [
      {data: "item_quantity"},
      {data: "name"},
      {data: "description"},
      {data: "edit"}
    ]
  });*/

  refresh_inventory(char.char_id);

  // Set stats values into inputs
  console.log(char);
  $.each(char, function (index, value) {
    $('#' + index).val(value);
    $('#' + index).html(value);
  });

  $('.name').html(char.name);

  // Set HP & MP bars
  change_bar_val(char.hp_cur, char.hp_max, 'hp');
  change_bar_val(char.pp_cur, char.pp_max, 'pp');

  // Set '%' character at the end of stats inputs
  $('.carac').each(function (index) {
    if ($(this).attr('id') != "gold" && $(this).attr('id') != "defense") {
      $(this).val($(this).val() + '%');
    }
  });

  // Refresh GM-set stats every 3 seconds (currently Level and Light/Dark bar)
  refresh_stats();
  setInterval(
          function () {
            refresh_stats();
          },
          3000
          );

});

// Update skill (id, name, description, cost)
function edit_skill(id) {
  $.ajax({
    data: {
      skill_id: id
    },
    type: "POST",
    dataType: "JSON",
    async: false,
    url: base_url + "/skill/info",
    success: function (data) {
      $('#skill_id').val(data.skill_id);
      $('#skill_name').val(data.name);
      $('#skill_cost').val(data.worth);
      $('#skill_desc').val(data.effect);
      open_modal('add_edit_skill');
    },
    error: function (e, d, l) {
      console.log(e);
    }
  });
}

// Update item (id, name, description, quantity)
function edit_item(id) {
  $.ajax({
    data: {
      item_id: id
    },
    type: "POST",
    dataType: "JSON",
    async: false,
    url: base_url + "/inventory/info",
    success: function (data) {
      $('#item_id').val(data.item_id);
      $('#item_name').val(data.name);
      $('#item_qty').val(data.quantity);
      $('#item_desc').val(data.description);
      open_modal('add_edit_item');
    },
    error: function (e, d, l) {
      console.log(e);
    }
  });
}

// Open any modal and closes any other
function open_modal(id) {
  $('.modal').modal('hide');
  $('#' + id).modal('show');
}

// Clear inputs of add_edit_skill modal
function reset_skill_modal() {
  $('#skill_id').val('-1');
  $('#skill_name').val('');
  $('#skill_cost').val('');
  $('#skill_desc').val('');
  close_modal("add_edit_skill");
}

// Clear inputs of add_edit_item modal
function reset_item_modal() {
  $('#item_id').val('-1');
  $('#item_name').val('');
  $('#item_qty').val('');
  $('#item_desc').val('');
  close_modal("add_edit_item");
}

function close_modal(id = null) {
  if (id == null) {
    $('.modal').modal('hide');
  } else {
    $("#" + id).modal('hide');
}
}

function prompt_delete_skill(id) {
  $.ajax({
    data: {
      skill_id: id
    },
    type: "POST",
    dataType: "JSON",
    async: false,
    url: base_url + "/skill/info",
    success: function (data) {
      console.log(data);
      $('#delete_skill_name').html(data.name);
      $('#delete_skill_confirm').val(id);
      open_modal("delete_skill");
    },
    error: function (e, d, l) {
      console.log(e);
    }
  });
}

function prompt_delete_item(id) {
  $.ajax({
    data: {
      item_id: id
    },
    type: "POST",
    dataType: "JSON",
    async: false,
    url: base_url + "/inventory/item",
    success: function (data) {
      console.log(data);
      $('#delete_item_name').html(data.name);
      $('#delete_item_confirm').val(id);
      open_modal("delete_item");
    },
    error: function (e, d, l) {
      console.log(e);
    }
  });
}

function delete_skill() {
  $.ajax({
    data: {
      skill_id: $('#delete_skill_confirm').val()
    },
    type: "POST",
    async: false,
    url: base_url + "/skill/delete",
    success: function (data) {
      close_modal();
      skill_table.ajax.reload();
    },
    error: function (e, d, l) {
      console.log(e);
    }
  });
}

function delete_item() {
  $.ajax({
    data: {
      item_id: $('#delete_item_confirm').val()
    },
    type: "POST",
    async: false,
    url: base_url + "/inventory/delete",
    success: function (data) {
      close_modal();
      item_table.ajax.reload();
    },
    error: function (e, d, l) {
      console.log(e);
    }
  });
}

function add_edit_skill() {
  if ($('#skill_name').val() != '' && $('#skill_desc').val() != '' && $('#skill_cost').val() != '') {
    $.ajax({
      data: {
        char_id: char.char_id,
        id: $('#skill_id').val(),
        name: $('#skill_name').val(),
        desc: $('#skill_desc').val(),
        cost: $('#skill_cost').val()
      },
      type: "POST",
      async: false,
      url: base_url + "/skill/addEdit",
      success: function (data) {
        skill_table.ajax.reload();
        reset_skill_modal();
      },
      error: function (e, d, l) {
        console.log(e);
      }
    });
  }
}

function add_edit_item() {
  if ($('#item_name').val() != '' && $('#item_desc').val() != '' && $('#item_qty').val() != '') {
    $.ajax({
      data: {
        char_id: char.char_id,
        id: $('#item_id').val(),
        name: $('#item_name').val(),
        desc: $('#item_desc').val(),
        qty: $('#item_qty').val()
      },
      type: "POST",
      async: false,
      url: base_url + "/inventory/AddEdit",
      success: function (data) {
        item_table.ajax.reload();
        reset_item_modal();
      },
      error: function (e, d, l) {
        console.log(e);
      }
    });
  }
}

function refresh_stats() {
  $.ajax({
    data: {
      char_id: char.char_id,
      columns: ['alignement', 'level']
    },
    type: "POST",
    dataType: "json",
    async: false,
    url: base_url + "character/info",
    success: function (data) {
      $('#alignement').val(data.alignement + '%');
      $('#level').val(data.level);
      $('#bar_light').css('width', data.alignement + '%');
      $('#bar_dark').css('width', (100 - data.alignement) + '%');
    },
    error: function (e, d, l) {
      console.log(e);
    }
  });
}

function change_bar_val(cur, max, which) {
  $('#' + which + '_bar').attr('aria-valuenow', cur);
  $('#' + which + '_bar').attr('aria-valuemax', max);
  $('#' + which + '_lbl').html(cur + '/' + max);

  $('.progress .progress-bar').css("width",
    function () {
      return ((parseInt($(this).attr("aria-valuenow")) / parseInt($(this).attr("aria-valuemax"))) * 100) + "%";
    }
  );
}

function change_comp(id, sign) {
  var field = $('#comp_val_' + id);
  var newval;

  if (sign == "+") {
    newval = parseInt(field.html()) + 5;
  } else {
    newval = parseInt(field.html()) - 5;
  }

  var send_sign = sign == "+" ? "plus" : "minus";

  $.post(base_url + "/Ajax/changeCompVal/" + char.char_id + '/' + id + '/' + send_sign);

  field.html(newval);
}

function save_char_carac(input) {
  var old_bg = input.css('background-color');

  $.ajax({
    data: {
      char_id: char.char_id,
      column: input.attr('id'),
      value: input.val().replace('%', '')
    },
    type: "POST",
    async: false,
    url: base_url + "/character/update",
    success: function (data) {
      input.css('background-color', "lightgreen");
      setTimeout(function () {
        input.css('background-color', old_bg);
      }, 500);
      input.blur();

      if (input.attr('id').match('hp')) {
        change_bar_val($('#hp_cur').val(), $('#hp_max').val(), 'hp');
      }

      if (input.attr('id').match('pp')) {
        change_bar_val($('#pp_cur').val(), $('#pp_max').val(), 'pp');
      }

    },
    error: function (e, d, l) {
      console.log(e);
    }
  });
}

$('#save_story').click(function () {
  var input = $('#story');
  save_char_carac(input);
});

$('#save_inventory').click(function () {
  var input = $('#inventory');
  save_char_carac(input);
});

$('#inventory').bind('keydown', function (e) {
  if (e.ctrlKey && (e.which == 83)) {
    e.preventDefault();
    var input = $('#inventory');
    save_char_carac(input);
    return false;
  }

});

$('#story').bind('keydown', function (e) {
  if (e.ctrlKey && (e.which == 83)) {
    e.preventDefault();
    var input = $('#story');
    save_char_carac(input);
    return false;
  }
});

$(document).bind('keydown', function (e) {
  if (e.ctrlKey && (e.which == 83)) {
    e.preventDefault();
    return false;
  }
});

function refresh_inventory(char_id) {
  var tbody     = "";
  $.ajax({
    data: {
      char_id: char_id
    },
    type: "POST",
    dataType: "JSON",
    async: false,
    url: base_url + 'inventory/char',
    success: function(data){

      $.each(data, function (i, item) {
        var pop_title = "";
        var pop       = "";
        
        pop_title += "<b>" + escapeHtml(item.name) + "</b> (" + item.category_name + ")";

        pop  += "<i>" + item.description.replace('<code>','Attaque : <code>').replace("</code>","</code><hr class='p-0 my-1 border-light'>") + "</i>";
        pop  += "<hr class='p-0 my-1 border-light'>";
        pop  += "<b>ID :</b> " + item.item_id;
        
        tbody += "<tr>";
        tbody += "<td>" + item.item_quantity + "</td>";
        tbody += "<td><i class='fa fa-info-circle' data-toggle='popover' data-html='true' data-placement='left' title='" + escapeHtml(pop_title) + "' data-content='" + escapeHtml(pop) + "'></i> " + item.name + "</td>";
        tbody += "<td>" + format(item.bonus_value) + " " + item.bonus_stat.toString().toUpperCase() +  "</td>";
        tbody += "</tr>";
      });
      $("#inv_table tbody").html(tbody);

      $("[data-toggle='popover']").popover();
    },
    error: function(e, d, l){
      console.log(e);
    }
  });
}

function format(n) {
    return (n>0?'+':'') + n;
}

var entityMap = {
  '&': '&amp;',
  '<': '&lt;',
  '>': '&gt;',
  '"': '&quot;',
  "'": '&#39;',
  '/': '&#x2F;',
  '`': '&#x60;',
  '=': '&#x3D;'
};

function escapeHtml (string) {
  return String(string).replace(/[&<>"'`=\/]/g, function (s) {
    return entityMap[s];
  });
}