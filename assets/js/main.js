$(document).ready(function() {
  $('#comp_modal').on('shown.bs.modal', function() {
    var char_id = global.char_id;

    if( $.fn.DataTable.isDataTable('#comp_modal_table') ) {
      $('#comp_modal_table').dataTable().fnDestroy();
    }
    $("#comp_modal_table").DataTable({
      ajax:           "index.php/Ajax/getCharComp/"+char_id,
      info:           false,
      filter:         true,
      paging:         true,
      scroller:       true,
      scrollCollapse: true,
      scrollY:        410,
      columns: [
        {data: "name"},
        {data: "val"}
      ]
    });
  });

  $('#skill_modal').on('shown.bs.modal', function() {
    var char_id = global.char_id;

    if( $.fn.DataTable.isDataTable('#skill_modal_table') ) {
      $('#skill_modal_table').dataTable().fnDestroy();
    }
    $("#skill_modal_table").DataTable({
      ajax:           "index.php/skill/char/"+char_id,
      info:           false,
      filter:         false,
      paging:         true,
      scroller:       true,
      scrollCollapse: true,
      scrollY:        410,
      columns: [
        {data: "name"},
        {data: "effect"},
        {data: "worth"}
      ]
    });
  });
  
});

function get_all_char_info() {
  $.post('index.php/character/all',function (result) { console.log(result); fill_char_sheets(result); }, 'json');
}

function fill_char_sheets(chars) {
  $.each(chars, function (index, c) {

    // LEVEL
    //$('#c_lvl_'+c.char_id).html('Niveau ' + c.level);

    // STATS
    $('#c_str_'+c.char_id).html(c.strength     + '%');
    $('#c_dex_'+c.char_id).html(c.dexterity    + '%');
    $('#c_luk_'+c.char_id).html(c.luck         + '%');
    $('#c_con_'+c.char_id).html(c.constitution + '%');
    $('#c_cha_'+c.char_id).html(c.charisma     + '%');
    $('#c_per_'+c.char_id).html(c.perception   + '%');
    $('#c_edu_'+c.char_id).html(c.education    + '%');
    $('#c_int_'+c.char_id).html(c.intelligence + '%');

    // FIGHT
    $('#c_wpn_'+c.char_id).html(c.fight_melee    + '%');
    $('#c_hnd_'+c.char_id).html(c.fight_bare     + '%');
    $('#c_dst_'+c.char_id).html(c.fight_distance + '%');

    // MONEY
    $('#c_po_'+c.char_id).html(c.gold + ' PO');

    // HEALTH
    $('#c_hp_'+c.char_id).attr('aria-valuemax',c.hp_max);
    $('#c_hp_'+c.char_id).attr('aria-valuenow',c.hp_cur);
    $('#c_hp_txt_'+c.char_id).html(c.hp_cur + "/" + c.hp_max);

    // MANA
    $('#c_pp_'+c.char_id).attr('aria-valuemax',c.pp_max);
    $('#c_pp_'+c.char_id).attr('aria-valuenow',c.pp_cur);
    $('#c_pp_txt_'+c.char_id).html(c.pp_cur + "/" + c.pp_max);

    // HEALTH & MANA BARS
    $('.progress .progress-bar').css("width",
      function() {
        return ( ( parseInt($(this).attr("aria-valuenow")) / parseInt($(this).attr("aria-valuemax")) ) * 100 )  + "%";
      }
    );

  });
}

function loadPage (link, base_url) {
  var dataUrl = link.attr("href");
  if (dataUrl != "") {
    $.ajax({
      type: 'POST',
      data: { ajax: 1 },
      async: true,
      url: base_url + dataUrl,
      success: function(html){
        history.pushState(null, null, dataUrl);
        $(document).prop('title', link.attr('title'));
        $('#menu li').removeClass('active');
        link.parent().addClass('active');
        $('.site-content').html(html);
      },
      error: function(e, d, l){
        console.log(e);
      }
    });
  }
}

var global = {};

function get_char_comp (char_id, char_name) {
  global.char_id = char_id;
  $('#comp_modal_title').html('Compétences de ' + char_name);
  $('#comp_modal').modal('show');
}

function get_char_skill (char_id, char_name) {
  global.char_id = char_id;
  $('#skill_modal_title').html('Dons de ' + char_name);
  $('#skill_modal').modal('show');
  $('#skill_modal_dlg').addClass("modal-lg");
}

// Update item (id, name, description, quantity)
  function edit_item (id) {
    $.ajax({
      data: {
        item_id: id
      },
      type: "POST",
      dataType: "JSON",
      async: false,
      url: base_url + "/inventory/item",
      success: function(data){
        $('#item_id').val(data.item_id);
        $('#item_name').val(data.name);
        $('#item_qty').val(data.quantity);
        $('#item_desc').val(data.description);
        open_modal('add_edit_item');
      },
      error: function(e, d, l){
        console.log(e);
      }
    });
  }

  // Open any modal and closes any other
  function open_modal(id) {
    $('.modal').modal('hide');
    $('#'+id).modal('show');
  }

function load_inventory_dt(char_id, panel) {
  // Generates inventory datatable
  item_table = $("#inv_table").DataTable({
    ajax:           base_url + "/inventory/char/" + char_id,
    info:           false,
    filter:         false,
    paging:         false,
    scroller:       false,
    scrollCollapse: false,
    sort:           true,
    autoWidth:      false,
    responsive: {
      details:    {
                    display: $.fn.dataTable.Responsive.display.modal( {
                      header: function ( row ) {
                        var data = row.data();
                        return 'Details for '+data[0]+' '+data[1];
                      }
                    }),
                    renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
                      tableClass: 'table'
                    })
                  }
                },
    columns:  [
                {data: "quantity"},
                {data: "name"},
                {data: "description"},
                {data: "edit"}
              ],
    initComplete: function () {
      setTimeout( function () { panel.resize( { "height" : $('#inv_table').outerHeight()+37 } ); console.log($('#inv_table').outerHeight()); } , 1000);
    }
  });
}