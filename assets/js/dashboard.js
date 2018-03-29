$(document).ready(function () {
  $('.progress .progress-bar').css("width",
    function() {
      return ( ( parseInt($(this).attr("aria-valuenow")) / parseInt($(this).attr("aria-valuemax")) ) * 100 )  + "%";
    }
  );

  $.ajax({
    type: "POST",
    dataType: "json",
    async: false,
    url: base_url + 'ennemy/region',
    success: function(data){
      var option;
      $.each(data, function (index, region) {
        option = "<option value='" + region.id + "'>" + region.name + "</option>";
        $('#ennemy_region').append(option);
      });
    },
    error: function(e, d, l){
      console.log(e);
    }
  });

  $.ajax({
    dataType: "text",
    url: "assets/campaign.txt",
    success: function(data){
      $('#campaign_txt').html(data);
    }
  });

  get_all_char_info();
  setInterval(
    function () { get_all_char_info(); },
    3000
  );
});

$('#btn_custom_dice').click(function () {
  var RollStr, RollResult;

  RollStr = $('#txt_custom_dice').val().trim();
  RollResult = diceRoll(RollStr);

  appendRollToTable(RollResult,"roll_result");

});

$('.common-dice').click(function () {
  var RollStr, RollResult;

  RollStr = $(this).attr('id').trim();
  RollResult = diceRoll(RollStr);

  appendRollToTable(RollResult,"roll_result");

});

$('.char_val').keyup(function (k) {
  if (k.keyCode == 13) {
    var input = $(this);
    save_char_carac(input);
  }
});

function save_char_carac (input) {
  var old_bg = input.css('background-color');
  var char   = input.attr('id').split('-')[1];
  var val    = input.val().replace('%','');

  $.ajax({
    data: {
      char_id: char,
      column:  input.attr('id').split('-')[0],
      value:   val
    },
    type: "POST",
    async: false,
    url: base_url + "/character/update",
    success: function(data){
      input.css('background-color',"lightgreen");
      setTimeout( function () {
        input.css('background-color', old_bg);
      }, 500);
      input.blur();

      if(input.attr('id').match('align')) {
        $('#bar_light_' + char).css('width',val+'%');
        $('#bar_dark_'  + char).css('width',(100 - val)+'%');
      }

    },
    error: function(e, d, l){
      console.log(e);
    }
  });
}

function pick_random_ennemy (region) {
  $('#picked_ennemies > tr').removeClass("active");
  $('#picked_ennemies > tr').css('border-top','none');
  $('#picked_ennemies > tr:first').css('border-top','3px solid darkred');
  var iterations = parseInt($("#ennemy_nbr").val());
  if (iterations > 0) {
    for(i = 0; i < iterations; i++) {
      $.ajax({
        data: {
          region: region
        },
        type: "POST",
        dataType: "json",
        async: false,
        url: base_url + 'ennemy/random',
        success: function(e){
          var tr  = "<tr class='active'>";
          tr += "<td>" + e.name + "</td>";
          tr += "<td>" + e.hp + " PV</td>";
          tr += "<td>" + e.defense + " DEF</td>";
          tr += "<td>" + e.attack + "</td>";
          tr += "<td>" + e.rarity + "</td>";
          tr += "</tr>";
          $('#picked_ennemies').prepend(tr);
        },
        error: function(e, d, l){
          console.log(e);
        }
      });
    }
    $('#picked_ennemies > tr:first').css('border-top','3px solid darkred');
  }
}