<?php $c = $character[0] ?? null; ?>

<script type="text/javascript">
  char = <?= json_encode($c) ?>;
</script>

<div id="sidebar" class="elegant-color z-depth-3 border-right border-elegant">
  <button class="btn btn-elegant border border-right-0 border-elegant p-2 m-0 float-right z-depth-0" id="sidebar-toggle">>>></button>
  <div class="clearfix"></div>
  <div class="stat_col text-light">
    <?php 
      sidebar_carac("strength",     "for", "Force");
      sidebar_carac("intellect",    "int", "Intelligence");
      sidebar_carac("dexterity",    "dex", "Dextérité");
      sidebar_carac("constitution", "con", "Constitution");
      sidebar_carac("willpower",    "pou", "Pouvoir");
      sidebar_carac("size",         "tai", "Taille");
      sidebar_carac("charisma",     "cha", "Charisme");
      sidebar_carac("luck",         "luk", "Chance");
      sidebar_carac("gold",         "po",  "Pièces d&apos;Or");
    ?>
  </div>
  <div class="clearfix"></div>
  <p class="text-center text-light border border-light" style="margin:15px 37px;">Total Stats <b><span id="total_stats"></span></b></p>
  <div class="text-light border border-light pt-1 border-left-0 border-right-0" 
       style="width: 100%; font-size: 12px; font-family: monospace; display:none;" 
       id="stats_rules">
    <span class="text-center d-block col-12">Règles</span>
    <hr class="border-light my-1">
    <div class="pl-3 pb-1">
      - 50% au départ pour la chance<br>
      - 40% au départ pour les autres<br>
      - 150 points à ajouter (max 90%)<br>
      - Total de 430 points<br>
      - Ne pas toucher à la chance<br>
      - PV = (CON + TAI) x 2<br>
      - PM = (INT + POU) x 2
    </div>
    <div class="clearfix"></div>
  </div>
</div>

<!-- CHARACTER_SHEET -->
<div class="row mt-2" id="charsheet">

<!-- HEALTH AND MANA -->
<!-- <div class="row mb-4"> -->
      <div class="col-12 char_panel mb-4">
        <div class="card z-depth-3 text-white elegant-color md-form mt-0  border border-light">
          <div class="card-header">
            <span class="float-right d-none d-md-block"><kbd>&crarr;</kbd> pour enregistrer</span>
            <p class="">
              <a data-toggle="collapse" href="#collapse0" class="float-left">
                <i class="fa fa-eye"></i>
              </a>
              &#xA0;&#xA0;<span id="name"></span>, <span id="race"></span> <span id="class_name"></span> de niveau <span id="level"></span>.
            </p>
          </div>
          <div class="panel-collapse collapse show" id="collapse0">
            <div class="card-body p-2">
              <div class="row">
                <div class="col-md-12 col-lg-4">
                  <div class="row px-2">
                    <div class="col-6 float-left">Santé</div>
                    <div class="col-6 float-right text-right">
                      <input type="text" id="hp_cur" class="char_val">
                      <span class="">/</span>
                      <input type="text" id="hp_max" class="char_val">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <div class="progress skill-bar resource-bar">
                        <div class="progress-bar progress-bar-striped bg-success" 
                             role="progressbar" 
                             aria-valuenow="0" 
                             aria-valuemin="0" 
                             aria-valuemax="100" 
                             id="hp_bar">
                        </div>
                        <span class="skill">
                          <span class="lbl">PV</span>
                          <i class="val" id="hp_lbl"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-12 col-lg-4">
                  <hr class="d-block d-sm-none d-block d-md-none">
                  <div class="row px-2">
                    <div class="col-6 float-left">Mana</div>
                    <div class="col-6 float-right text-right">
                      <input type="text" id="pp_cur" class="char_val">
                      <span class="">/</span>
                      <input type="text" id="pp_max" class="char_val">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <div class="progress skill-bar resource-bar">
                        <div class="progress-bar progress-bar-striped bg-primary" 
                             role="progressbar" 
                             aria-valuenow="0" 
                             aria-valuemin="0" 
                             aria-valuemax="100" 
                             id="pp_bar">
                        </div>
                        <span class="skill">
                          <span class="lbl">PM</span>
                          <i class="val" id="pp_lbl"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-12 col-lg-4">
                  <hr class="d-block d-sm-none d-block d-md-none">
                  <div class="row px-2">
                    <div class="col-6 float-left">Lumière</div>
                    <div class="col-6 float-right text-right">
                      <input type="text" id="alignement" class="char_val">
                    </div>
                  </div>
                  <div class="progress resource-bar" id="orientation">
                    <div class="progress-bar progress-bar-striped progress-bar-warning" id="bar_light" role="progressbar">
                      <b>Lumi&#xE8;re</b>
                    </div>
                    <div class="progress-bar progress-bar-striped progress-bar-success" id="bar_dark" role="progressbar">
                      <b>Ombre</b>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <!-- </div> -->
  <!-- /HEALTH AND MANA -->

  <div class="col-md-12 col-lg-12 col-xl-12">

    <div class="row">

    <!-- CHARACTERISTICS -->
      <div class="col-lg-12 col-xl-4 char_panel">

      <!-- STORY -->
        <div class="card z-depth-3 text-white elegant-color border border-light mb-4 col-lg-6 col-xl-12 float-right">
            <div class="card-header">
              <span class="float-right">
                <kbd>Ctrl</kbd> + <kbd>S</kbd> ou cliquer <i class="fa fa-arrow-right"></i>
                <button class="btn btn-secondary btn-xs" id="save_story"><i class="fa fa-save"></i></button>
              </span>
              <p class="">
                <a data-toggle="collapse" href="#collapse1" class="float-left">
                  <i class="fa fa-eye"></i>
                </a>
                &#xA0;&#xA0;Histoire
              </p>
            </div>
            <div id="collapse1" class="panel-collapse show">
              <div class="card-body p-2" id="story-card-body">
                <textarea id="story" class="form-control"></textarea>
              </div>
            </div>
          </div>
      </div>
    <!-- /CHARACTERISTICS -->

    <!-- SKILLS -->
      <!-- <div class="row mb-4"> -->
        <div class="col-lg-6 col-xl-4 char_panel mb-4">
          <div class="card z-depth-3 text-white elegant-color border border-light">
            <div class="card-header">
              <button class="btn btn-success btn-xs float-right" onclick="open_modal('add_edit_skill')"><i class="fa fa-plus"></i>
              </button>
              <p class="">Dons de <span class="name"></span></p>
            </div>
            <div class="card-body scrollbar-black" id="skills">
              <table class="table table-striped table-hover table-sm dt-responsive nowrap" id="skill_table" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>Don</th>
                    <th>Co&#xFB;t</th>
                    <th>Effet</th>
                    <th class="th-modif-btn">Modif.</th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      <!-- </div> -->
    <!-- /SKILLS -->

    <!-- INVENTORY -->
      <!-- <div class="row"> -->
        <div class="col-lg-6 col-xl-4 char_panel mb-4">
          <div class="card z-depth-3 text-white elegant-color border border-light">
            <div class="card-header">
              <button class="btn btn-success btn-xs float-right" onclick="open_modal('add_edit_item')"><i class="fa fa-plus"></i>
              </button>
              <p class="">Inventaire</p>
            </div>
            <div class="card-body scrollbar-black" id="inventory">
              <table class="table table-striped table-hover table-sm dt-responsive nowrap" id="inv_table" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Desc</th>
                    <th class="th-modif-btn"></th>
                  </tr>
                </thead>
                <tbody></tbody>
              </table>
            </div>
          </div>
        </div>
      <!-- </div> -->
    <!-- /INVENTORY -->

    </div>
  </div>

  <div class="clearfix"></div>

</div>
<!-- /CHARACTER_SHEET -->

<!-- SKILL ADD/EDIT MODAL -->
<div class="modal fade" id="add_edit_skill" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <p class="modal-title">Ajouter un don</p>
      </div>
      <div class="modal-body">
        <input type="hidden" id="skill_id" value="-1">
        <div class="row">
          <div class="col-md-8">
            <label>Nom du don</label>
            <input type="text" class="form-control" id="skill_name">
          </div>
          <div class="col-md-4">
            <label>Co&#xFB;t du don</label>
            <input type="text" class="form-control" id="skill_cost">
          </div>
        </div>
        <hr>
        <label>Description du don</label>
        <input type="text" class="form-control" id="skill_desc">
      </div>
      <div class="modal-footer">
        <div class="btn-group btn-group-justified">
          <a href="#" class="btn btn-danger  btn-lg" onclick="reset_skill_modal()" data-dismiss="modal"><i class="fa fa-remove"></i> Annuler</a>
          <a href="#" class="btn btn-success btn-lg" onclick="add_edit_skill()"><i class="fa fa-save"></i> Valider</a>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /SKILL ADD/EDIT MODAL -->

<!-- ITEM ADD/EDIT MODAL -->
<div class="modal fade" id="add_edit_item" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <p class="modal-title">Ajouter / Modifier un objet</p>
      </div>
      <div class="modal-body">
        <input type="hidden" id="item_id" value="-1">
        <div class="row">
          <div class="col-md-8">
            <label>Nom de l&apos;objet</label>
            <input type="text" class="form-control" id="item_name">
          </div>
          <div class="col-md-4">
            <label>Quantit&#xE9;</label>
            <input type="text" class="form-control" id="item_qty">
          </div>
        </div>
        <hr>
        <label>Description / Effets</label>
        <input type="text" class="form-control" id="item_desc">
      </div>
      <div class="modal-footer">
        <div class="btn-group btn-group-justified">
          <a href="#" class="btn btn-danger  btn-lg" onclick="reset_item_modal()" data-dismiss="modal"><i class="fa fa-remove"></i> Annuler</a>
          <a href="#" class="btn btn-success btn-lg" onclick="add_edit_item()"><i class="fa fa-save"></i> Valider</a>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /ITEM ADD/EDIT MODAL -->

<!-- SKILL DELETE MODAL -->
<div class="modal fade" id="delete_skill" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <p class="modal-title">Supprimer un don</p>
      </div>
      <div class="modal-body nowrap">
        <p class="nowrap">Supprimer le don <i id="delete_skill_name"></i> ?</p>
        <input type="hidden" value="" id="delete_skill_confirm">
      </div>
      <div class="modal-footer">
        <div class="btn-group btn-group-justified">
          <a href="#" class="btn btn-danger  btn-lg" onclick="reset_skill_modal()" data-dismiss="modal"><i class="fa fa-remove"></i> NON</a>
          <a href="#" class="btn btn-success btn-lg" onclick="delete_skill()"><i class="fa fa-check"></i> OUI</a>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /SKILL DELETE MODAL -->

<!-- ITEM DELETE MODAL -->
<div class="modal fade" id="delete_item" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <p class="modal-title">Supprimer un objet</p>
      </div>
      <div class="modal-body nowrap">
        <p class="nowrap">Supprimer l&apos;objet <b><i id="delete_item_name"></i></b> ?</p>
        <input type="hidden" value="" id="delete_item_confirm">
      </div>
      <div class="modal-footer">
        <div class="btn-group btn-group-justified">
          <a href="#" class="btn btn-danger  btn-lg" onclick="reset_skill_modal()" data-dismiss="modal"><i class="fa fa-remove"></i> NON</a>
          <a href="#" class="btn btn-success btn-lg" onclick="delete_item()"><i class="fa fa-check"></i> OUI</a>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /ITEM DELETE MODAL -->
