$(document).ready(function() {
  get_all_char_info();
  setInterval(
    function () { get_all_char_info(); },
    10000
  );

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
      ajax:           "index.php/Ajax/getCharSkill/"+char_id,
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
  $.post('index.php/Ajax/getAllCharDetail',function (result) { console.log(result); fill_char_sheets(result); }, 'json');
}

function fill_char_sheets(chars) {
  $.each(chars, function (index, c) {
    $('#c_lvl_'+c.char_id).html('Niveau ' + c.level);

    $('#c_phy_'+c.char_id).html(c.physic);
    $('#c_soc_'+c.char_id).html(c.social);
    $('#c_men_'+c.char_id).html(c.mental);

    $('#c_gld_'+c.char_id).html(c.gold);

    $('#c_hp_'+c.char_id).attr('aria-valuemax',c.hp_max);
    $('#c_hp_'+c.char_id).attr('aria-valuenow',c.hp_cur);
    $('#c_hp_txt_'+c.char_id).html(c.hp_cur + "/" + c.hp_max);

    $('#c_pp_'+c.char_id).attr('aria-valuemax',c.pp_max);
    $('#c_pp_'+c.char_id).attr('aria-valuenow',c.pp_cur);
    $('#c_pp_txt_'+c.char_id).html(c.pp_cur + "/" + c.pp_max);

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