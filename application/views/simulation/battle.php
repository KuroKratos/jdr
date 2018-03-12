<style type="text/css">
  input {
    text-align: right;
    border-radius: 0 !important;
    background-color: #ffffff55 !important;
    color: white !important;
  }

  .sim_table {
    width: 400px;
    margin: 0px auto 20px auto;
    font-family: monospace;
  }

  .sim_table td {
    padding:2px 5px;
    border: 1px solid black;
    white-space: pre;
  }
</style>

<div class="row">
  <?php for ($id = 1; $id <= 5; $id++) { ?>
    <div class="col-sm-2">
      <div class="panel panel-default" style="background-color: #00000055; box-shadow: 0 0 5px black; border-color: white; border-radius: 0px;" id="panel_<?=$id?>">
        <div class="panel-heading"><p class="panel-title">Personnage <?=$id?> <input type="checkbox" id="active_<?=$id?>" class="pull-right active-chk"></p></div>
        <div class="panel-body form-horizontal" style="color: white;">
          <div class="form-group"><label class="control-label col-sm-7" for="percent" style="text-align: left;">Points de Vie  </label><div class="col-sm-5"><input type="text" class="form-control" id="hp_<?=$id?>"      value="200"></div></div>
          <div class="form-group"><label class="control-label col-sm-7" for="percent" style="text-align: left;">Stat de toucher</label><div class="col-sm-5"><input type="text" class="form-control" id="percent_<?=$id?>" value="80" ></div></div>
          <div class="form-group"><label class="control-label col-sm-7" for="percent" style="text-align: left;">Dé d'attaque   </label><div class="col-sm-5"><input type="text" class="form-control" id="dice_<?=$id?>"    value="8"  ></div></div>
          <div class="form-group"><label class="control-label col-sm-7" for="percent" style="text-align: left;">Mod d'attaque  </label><div class="col-sm-5"><input type="text" class="form-control" id="mod_<?=$id?>"     value="2"  ></div></div>
        </div>
      </div>
    </div>
  <?php } ?>

  <div class="col-sm-2">
    <div class="panel panel-default" style="background-color: #FF000055; box-shadow: 0 0 5px black; border-color: white; border-radius: 0px;" id="panel_mob">
      <div class="panel-heading"><p class="panel-title">Ennemi</p></div>
      <div class="panel-body form-horizontal" style="color: white;">
        <div class="form-group"><label class="control-label col-sm-7" for="percent" style="text-align: left;">Points de Vie  </label><div class="col-sm-5"><input type="text" class="form-control" id="hp_mob"      value="200"></div></div>
        <div class="form-group"><label class="control-label col-sm-7" for="percent" style="text-align: left;">Stat de toucher</label><div class="col-sm-5"><input type="text" class="form-control" id="percent_mob" value="80" ></div></div>
        <div class="form-group"><label class="control-label col-sm-7" for="percent" style="text-align: left;">Dé d'attaque   </label><div class="col-sm-5"><input type="text" class="form-control" id="dice_mob"    value="8"  ></div></div>
        <div class="form-group"><label class="control-label col-sm-7" for="percent" style="text-align: left;">Mod d'attaque  </label><div class="col-sm-5"><input type="text" class="form-control" id="mod_mob"     value="2"  ></div></div>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-3"><button class="btn btn-default" id="btn-chk"   style="width: 100%"><div class="col-xs-2"><i class="fa fa-check-square"></i></div><div class="col-xs-10">Cocher tous       </div></button></div>
  <div class="col-sm-3"><button class="btn btn-default" id="btn-uchk"  style="width: 100%"><div class="col-xs-2"><i class="fa fa-square"      ></i></div><div class="col-xs-10">Décocher tous     </div></button></div>
  <div class="col-sm-3"><button class="btn btn-default" id="btn-reset" style="width: 100%"><div class="col-xs-2"><i class="fa fa-refresh"     ></i></div><div class="col-xs-10">Réinitialiser tout</div></button></div>
  <div class="col-sm-3"><button class="btn btn-default" id="btn-start" style="width: 100%"><div class="col-xs-2"><i class="fa fa-arrow-right" ></i></div><div class="col-xs-10">Lancer            </div></button></div>
</div>

<div class="row" style="margin-top: 20px;">
  <div class="col-sm-12">
    <div id="sim_result" class="well well-sm" style="height: 450px; overflow-y: auto;"></div>
  </div>
</div>

<script type="text/javascript">
  var battle_data = {};
  battle_data.pj  = {};
  battle_data.mob = {};

  // DEFAULT INPUTS VALUES
  var default_hp      = 200;
  var default_percent = 80;
  var default_dice    = 8;
  var default_mod     = 2;
  var panel_color     = ['FFaa8855','aa88FF55','00dd8855','88aaFF55','FF88aa55'];

  // CHECK ALL ACTIVE
  $('#btn-chk').click(function () {
    $('.active-chk').attr("checked","checked");
  });

  // UNCHECK ALL ACTIVE
  $('#btn-uchk').click(function () {
    $('.active-chk').removeAttr("checked");
    $('#active_1').attr("checked","checked");
  });

  // RESET ALL INPUTS
  $('#btn-reset').click(function () {
    $('[id^=hp_]'     ).val(default_hp);
    $('[id^=percent_]').val(default_percent);
    $('[id^=dice_]'   ).val(default_dice);
    $('[id^=mod_]'    ).val(default_mod);
  });

  // ON PAGE LOADED
  $(document).ready(function () {
    // CHECK PLAYER 1 BY DEFAULT
    $('#active_1').attr("checked","checked");
    // APPLY COLORS TO PANELS
    $("[id^=panel_]").each(function (index) {
      $(this).css('background-color',"#"+panel_color[index]);
    });
  });

  $('#btn-start').click(function(){
    // VARIABLES INITIALIZATION
    var roll_test, td_roll,
        damage,
        mob_target, mob_roll, mob_damage, td_mob_dmg,
        player_style, tr_style, 
        td_dmg, td_mob,
        turn = 1,
        table = "";
    // POPULATE PLAYERS & FOE OBJECT
    generate_battle_stat();
    // RESET DISPLAY DIV
    $('#sim_result').html('');
    // LOOP THROUGH BATTLE TURNS
    table = "<table class='sim_table'>";
    while(parseInt(battle_data.mob.hp) > 0) {
      // RANDOMLY SELECT TARGET
      mob_target = Math.floor(Math.random()*Object.keys(battle_data.pj).length) + 1;
      console.log(battle_data.pj);

      // INIT TURN TABLE
      //table  += "<table class='sim_table'><tr><td colspan='4'>TOUR n°" + turn + "</td></tr>";
      table  += "<tr><td colspan='5' style='border:none; padding-top:10px;'>TOUR n°" + turn + "</td></tr>";

      /* =============== */
      /* PLAYERS ACTIONS */
      /* =============== */

      // LOOP THROUGH BATTLE PLAYERS
      $.each(battle_data.pj, function (index, pj) {
        
        // ROLL FOR HIT %
        roll_test    = Math.floor(Math.random() * 100) + 1;
        td_roll      = "Roll : " + roll_test.toString().padStart(3);

        // GENERATE PLAYER COLOR BG
        player_style = "background-color: #" + panel_color[index-1].slice(0,-2) + ";";

        // CRITICAL FAILURE
        if (roll_test >= 96) {
          damage   = 0;
          tr_style = "background-color: #dd0000; color:white";
          td_dmg   = 'CRIT !';
        }

        // CRITICAL SUCCESS
        else if (roll_test <= 5) {
          damage   = Math.floor((parseInt(pj.dice) + parseInt(pj.mod))*1.5);
          tr_style = "background-color: #ffdd00";
          td_dmg   = "Dégâts : " + damage.toString().padStart(3);
        }

        // SUCCESS
        else if(roll_test <= pj.percent) {
          damage   = (Math.floor(Math.random() * parseInt(pj.dice)) + 1) + parseInt(pj.mod);
          tr_style = "background-color: #aaffaa";
          td_dmg   = "Dégâts : " + damage.toString().padStart(3);
        }

        // FAILURE
        else {
          damage = 0;
          tr_style = "background-color: #ffaaaa";
          td_dmg   = "Échec";
        }

        // UPDATE FOE HP
        battle_data.mob.hp -= parseInt(damage);
        td_mob = 'PV Ennemi : ' + ( (battle_data.mob.hp > 0) ? battle_data.mob.hp.toString().padStart(3) : "<b>DEAD</b>" );

        // IF CURRENT PLAYER IS TARGETED
        if(mob_target == index) {
          /* =============== */
          /* MONSTER ACTIONS */
          /* =============== */

          // FOE HIT % ROLL
          mob_roll = Math.floor(Math.random() * 100) + 1;

          // FOE CRITICAL SUCCESS
          if (mob_roll >= 96) {
            mob_damage = 0;
            td_mob_dmg = "<b style='color:red'>ECHEC CRIT.</b>";
          }
          // FOE CRITICAL FAILURE
          if (mob_roll <= 5) {
            mob_damage   = Math.floor((parseInt(battle_data.mob.dice) + parseInt(battle_data.mob.mod))*1.5);
            td_mob_dmg   = "Dégâts mob : " + mob_damage.toString().padStart(3);
          }
          // FOE SUCCESS
          else if(roll_test <= battle_data.mob.percent) {
            mob_damage   = (Math.floor(Math.random() * parseInt(battle_data.mob.dice)) + 1) + parseInt(battle_data.mob.mod);
            td_mob_dmg   = "Dégâts mob : " + mob_damage.toString().padStart(3);
          }
          // FOE FAILURE
          else {
            mob_damage = 0;
            td_mob_dmg = "<b class='text-danger'>Échec</b>";
          }

          // APPLY DAMAGE TO PLAYER
          battle_data.pj[mob_target].hp -= mob_damage;
        }
        else {
          td_mob_dmg = "";
        }

        // BUILD PLAYER ACTION ROW
        table += "<tr style='"+tr_style+"'><td style='"+player_style+"'>Joueur "+index+" ("+pj.hp+" HP) </td><td>"+td_roll+"</td><td>"+td_dmg+"</td><td>"+td_mob+"</td><td>"+td_mob_dmg+"</td></tr>";


        // WHEN PJ IS DEAD
        if (battle_data.pj[index].hp <= 0) {
          console.log(battle_data.pj[index].hp);
          return false;
        }

        // WHEN FOE IS DEAD
        else if (battle_data.mob.hp <= 0) {
          console.log(battle_data.mob.hp <= 0);
          return false;
        }
        else {
          return true;
        }


      });

      // CLOSE TURN TABLE
      //table += "</table>";
      // DISPLAY TURN TABLE
      //log(table);
      // NEXT TURN
      turn++;
    }
    table += "</table>";
    log(table);
  });

  function log (string, br = false) {
    $("#sim_result").append(string + (br === true ? "<br>" : ""));
  }

  function generate_battle_stat () {
    battle_data = {};
    battle_data.pj  = {};
    battle_data.mob = {};

    $('[id^=panel_]').each(function (index) {
      if ($('#active_'+index).is(":checked")) {
        battle_data['pj'][index] = {};
        battle_data['pj'][index].hp      = $('#hp_'     + index).val();
        battle_data['pj'][index].percent = $('#percent_'+ index).val();
        battle_data['pj'][index].dice    = $('#dice_'   + index).val();
        battle_data['pj'][index].mod     = $('#mod_'    + index).val();
      }
      if ($(this).attr('id') == 'panel_mob') {
        battle_data['mob'] = {};
        battle_data['mob'].hp      = $('#hp_mob'     ).val();
        battle_data['mob'].percent = $('#percent_mob').val();
        battle_data['mob'].dice    = $('#dice_mob'   ).val();
        battle_data['mob'].mod     = $('#mod_mob'    ).val();
      }
    });
  }

</script>