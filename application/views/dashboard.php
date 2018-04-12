<!-- CHARACTERS SUMMARY -->
  <div class="col-lg-4 pull-left">
    <?php foreach($characters as $c) { ?>
    <div class="col-6 float-left px-1 mb-2">
      <div class="card z-depth-3" style="border: 1px solid <?= $c["color"] ?>">
        <div class="card-body text-dark elegant-color-dark pl-2 pr-0 py-1" style="background-color: <?= $c["color"] ?> !important;">
          <h6 class="card-title mb-0 font-weight-bold card-char-title">
            <?= $c["name"] ?> (<?= $c["race"] ?> <?= $c["class_name"] ?>)
            <button class="btn btn-xs btn-elegant float-right mr-1 p-0 btn-char" title="Sorts"      data-toggle="tooltip" data-modal="skill"     data-char="<?= $c["char_id"] ?>"><i class="fa fa-book"></i></button>
            <button class="btn btn-xs btn-elegant float-right mr-1 p-0 btn-char" title="Inventaire" data-toggle="tooltip" data-modal="inventory" data-char="<?= $c["char_id"] ?>"><i class="fa fa-shopping-bag"></i></button>
          </h6>
        </div>
        <div class="card-body text-white elegant-color p-1">
          <!-- MAIN STATS, 1 PANEL/EACH -->
          <div class="row mx-0">
            <div class="char-stats col-6 mt-1">
              <div class="row">
                <?php char_stat_block("FORCE", "FO", "c_str_".$c["char_id"], $c["strength"]); ?>
                <?php char_stat_block("DEXTÉRITÉ", "DX", "c_dex_".$c["char_id"], $c["dexterity"]); ?>
                <?php char_stat_block("INTELLIGENCE", "IN", "c_int_".$c["char_id"], $c["intelligence"]); ?>
              </div>
              <div class="row">
                <?php char_stat_block("ENDURANCE", "EN", "c_con_".$c["char_id"], $c["constitution"]); ?>
                <?php char_stat_block("CHANCE", "CH", "c_luk_".$c["char_id"], $c["luck"]); ?>
                <?php char_stat_block("CONNAISSANCES", "CN", "c_edu_".$c["char_id"], $c["education"]); ?>
              </div>
              <div class="row">
                <?php char_stat_block("CHARISME", "CA", "c_cha_".$c["char_id"], $c["charisma"], null, 1); ?>
                <?php char_stat_block("PERCEPTION", "PR", "c_per_".$c["char_id"], $c["perception"], null, 1); ?>
                <?php char_stat_block("PIÈCES D&#39;OR", "PO", "c_po_".$c["char_id"], $c["gold"], true, 1); ?>
              </div>
                <table style="width: 100%">
                  <tr>
                    <td class="text-center" style='width: 50%; font-family: monospace; font-weight: bold;'>NIVEAU</td>
                    <td style='text-align: center; padding: 5px; font-weight: bold;'>
                      <input type="text" class="input-underline carac char_val text-info" id="level-<?= $c["char_id"] ?>" value="<?= $c["level"] ?>" style="border-color: white; width: 100%;">
                    </td>
                  </tr>
                </table>
                <!--<span class="col-12">Niveau. : <input type="text" class="input-underline carac char_val col-2" value="<?= $c["level"] ?>" id="level-<?= $c["char_id"] ?>"></span>-->
            </div>
            <div class="col-6 mt-1 px-1">
              <!-- HP BAR -->
              <div class="progress skill-bar border border-light hp-bar mb-2 z-depth-1" style="height:17px;">
                <div class="progress-bar bg-success progress-bar-striped" role="progressbar" aria-valuenow="<?= $c["hp_cur"] ?>" aria-valuemin="0" aria-valuemax="<?= $c["hp_max"] ?>" id="c_hp_<?= $c["char_id"] ?>"></div>
                <span class="skill" style="line-height:16px; font-size:12px !important;"><span class="lbl">PV</span><i class="val" id="c_hp_txt_<?= $c["char_id"] ?>"><?= ($c["hp_cur"]."/".$c["hp_max"]) ?></i></span>
              </div>
              <!-- MP BAR -->
              <div class="progress skill-bar border border-light pp-bar z-depth-1 mb-2" style="height:17px;">
                <div class="progress-bar bg-primary progress-bar-striped" role="progressbar" aria-valuenow="<?= $c["pp_cur"] ?>" aria-valuemin="0" aria-valuemax="<?= $c["pp_max"] ?>" id="c_pp_<?= $c["char_id"] ?>"></div>
                <span class="skill" style="line-height:16px; font-size:12px !important;"><span class="lbl">PM</span><i class="val" id="c_pp_txt_<?= $c["char_id"] ?>"><?= ($c["pp_cur"]."/".$c["pp_max"]) ?></i></span>
              </div>
              <!-- ALIGNMENT BAR -->
              <div class="progress z-depth-1 border border-light mb-1" style="height: 17px;">
                <div class="progress-bar progress-bar-warning progress-bar-striped" id="bar_light_<?= $c["char_id"] ?>" role="progressbar" style="width:<?= $c["alignement"] ?>%; background-color: #eebb33; text-align: center; line-height:16px; text-shadow: 1px 1px 3px black;">
                  <b>L</b>
                </div>
                <div class="progress-bar progress-bar-success progress-bar-striped" id="bar_dark_<?= $c["char_id"] ?>"  role="progressbar" style="width:<?= (100 - $c["alignement"]) ?>%; background-color: #000033; text-align: center; line-height:16px;">
                  <b>O</b>
                </div>
              </div>
              <!-- ALIGNMENT INPUT -->
              <table style="width: 100%">
                <tr>
                  <td class="text-center" style='width: 50%; font-family: monospace; font-weight: bold;'>ALIGNEMENT</td>
                  <td style='text-align: center; padding: 5px; font-weight: bold;'>
                    <input type="text" class="input-underline carac char_val text-info" id="alignement-<?= $c["char_id"] ?>" value="<?= $c["alignement"] ?>%" style="border-color: white; width: 100%;">
                  </td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php } ?>
  </div>
<!-- /CHARACTERS SUMMARY -->

<!-- CENTRAL COLUMN -->
  <div class="col-lg-4 float-left">

  <!-- /ENNEMY PICKER -->
  <div class="card text-white elegant-color mb-4 z-depth-3" style="border: 1px solid rgb(224,224,224);">
      <div class="card-body form-inline p-1 pl-2">
        Zone :
        <select id="ennemy_region" class="form-control input-sm mx-2" style="border-radius: 0; height: 31px; border:0;">
          <option value="-1">Toutes zones</option>
        </select>
        Nombre :
        <input type="number" class="form-control input-sm ml-2 mr-1" id="ennemy_nbr" value="1" style="border-radius: 0; height: 31px; border:0; width: 50px;">
        <button class="btn btn-sm btn-blue-grey" style="color:black;" onclick="pick_random_ennemy($('#ennemy_region').val())">Ennemi(s) aléatoire(s)</button>
      </div>
      <div class="card-body p-0 border-top border-light scrollbar-black" id="ennemy_detail" style="height: 30vh; overflow-y: auto; overflow-x: hidden;">
        <table class="table table-dark table-striped table-sm table-hover text-center mb-0">
            <thead>
              <th style='text-align:center;'>Nom</th>
              <th style='text-align:center;'>PV</th>
              <th style='text-align:center;'>Défense</th>
              <th style='text-align:center;'>Attaque</th>
              <th style='text-align:center;'>Rareté</th>
            </thead>
            <tbody id='picked_ennemies'>
            </tbody>
          </table>
      </div>
    </div>
  <!-- /ENNEMY PICKER -->

  <!-- /CAMPAIGN SUMMARY -->
    <div class="card z-depth-3 text-white elegant-color" style="border: 1px solid rgb(224,224,224);">
      <div class="card-body form-inline p-1 pl-2">
        Résumé de la campagne
      </div>
      <div class="card-body p-0 border-top border-light scrollbar-black" id="campaign_txt" style="height: 38vh; overflow-y: auto;">
      </div>
    </div>
  <!-- /CAMPAIGN SUMMARY -->

  </div>
<!-- /CENTRAL COLUMN -->

<!-- DICE ROLLER -->
  <div class="col-lg-4 pull-right">
    <div class="card z-depth-3" style="border: 1px solid rgb(224,224,224);">
      <div class="card-body bg-dark p-0 scrollbar-black" id="roll_result_wrapper" style="height: 75vh !important; overflow-y: auto;">
        <table class="table table-dark table-striped table-sm table-hover">
          <thead>
            <th style='text-align:center;'>Time</th>
            <th style='text-align:center;'>Roll</th>
            <th style='text-align:center;'>Detail</th>
            <th style='text-align:center;' >Result</th>
          </thead>
          <tbody id='roll_result'>
          </tbody>
        </table>
      </div>
      <div class="card-body form-inline text-right p-0">
        <!-- COMMON ROLLS -->
        <button class="btn btn-elegant btn-sm common-dice" id="1d4"  ><b>d4</b></button>
        <button class="btn btn-elegant btn-sm common-dice" id="1d6"  ><b>d6</b></button>
        <button class="btn btn-elegant btn-sm common-dice" id="1d8"  ><b>d8</b></button>
        <button class="btn btn-elegant btn-sm common-dice" id="1d10" ><b>d10</b></button>
        <button class="btn btn-elegant btn-sm common-dice" id="1d12" ><b>d12</b></button>
        <button class="btn btn-elegant btn-sm common-dice" id="1d20" ><b>d20</b></button>
        <button class="btn btn-elegant btn-sm common-dice" id="1d100"><b>d100</b></button>
        <!-- CUSTOM ROLL -->
        <div style="position: absolute; right: 0;">
          <input type="text" class="input-sm" value="1d8+2" id="txt_custom_dice" style="width:100px;">
          <button class="btn btn-elegant btn-sm" id="btn_custom_dice">Roll</button>
        </div>
      </div>
    </div>
  </div>
<!-- /DICE ROLLER -->


<!-- INVENTORY MODAL -->
<div class="modal fade" id="inventoryModal" tabindex="-1" role="dialog" aria-labelledby="inventoryModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content elegant-color-dark text-light">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Inventaire de <span id="inv_name"></span></h5>
                <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-elegant" data-dismiss="modal"><i class="fa fa-times"></i> Fermer</button>
            </div>
        </div>
    </div>
</div>
