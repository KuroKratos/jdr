<div class="col-4 float-left">
  <div class="card z-depth-3 text-white elegant-color" style="border: 1px solid rgb(224,224,224);">
    <div class="card-body p-1 pl-2">
      Ajouter un objet
    </div>
    <div class="card-body py-2 px-0 border-top border-light form-inline">
      <div class="row">
        <input type="hidden" id="hidden_edit_id" value="-1">
        <div class="col-12 mb-2">
          <div class="col-3 float-left text-right">Catégorie :</div>
          <div class="col-9 float-right">
            <select class="form-control input-sm" id="txt_category" style="border-radius: 0; height: 31px; border: 0; width: 100%">
              <option value="-1" >---</option>
            </select>
          </div>
        </div>
        <div class="col-12 mb-2">
          <div class="col-3 float-left text-right">Nom :</div>
          <div class="col-9 float-right">
            <input type="text" class="form-control input-sm" id="txt_name" style="border-radius: 0; height: 31px; border:0; width: 100%;">
          </div>
        </div>
        <div class="col-12 mb-2">
          <div class="col-3 float-left text-right">Description :</div>
          <div class="col-9 float-right">
            <input type="text" class="form-control input-sm" id="txt_description" style="border-radius: 0; height: 31px; border:0; width: 100%;">
          </div>
        </div>
        <div class="col-12 mb-2">
          <div class="col-3 float-left text-right">Bonus :</div>
          <div class="col-9 float-right">
            <div class="row">
              <div class="col-3 pr-2 float-left">
                <input type="number" class="form-control input-sm" id="nbr_stat_bonus" value="0" style="border-radius: 0; height: 31px; border:0; width: 100%;">
              </div>
              <div class="col-9 pl-0 float-left">
                <select class="form-control input-sm" id="txt_stat_bonus" style="border-radius: 0; height: 31px; border: 0; width: 100%;">
                  <option value="-1" >---</option>
                  <option value="str">FORCE</option>
                  <option value="int">INTELLIGENCE</option>
                  <option value="dex">DEXTTÉRITÉ</option>
                  <option value="con">ENDURANCE</option>
                  <option value="edu">CONNAISSANCES</option>
                  <option value="luk">CHANCE</option>
                  <option value="cha">CHARISME</option>
                  <option value="per">PERCEPTION</option>
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 mb-2">
          <div class="col-3 float-left"></div>
          <div class="col-9 float-right">
            <div class="row">
              <div class="col-6 float-left pr-1">
                <button class="btn btn-sm btn-secondary px-3 m-0 col-12" onclick="resetItemForm()"><i class="fa fa-recycle mr-2"></i>Réinitialiser</button>
              </div>
              <div class="col-6 float-left pl-1">
                <button class="btn btn-sm btn-primary px-3 m-0 col-12" onclick="saveItem()"><i class="fa fa-floppy-o mr-2"></i>Enregistrer</button>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12">
          <div class="col-3 float-left"></div>
          <div class="col-9 float-right">
            <div class="color-block-dark danger-color-dark mb-0 p-1 text-center font-weight-bold"  id="err"     style="display: none;"></div>
            <div class="color-block-dark success-color-dark mb-0 p-1 text-center font-weight-bold" id="success" style="display: none;"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="col-8 float-right">
  <div class="card z-depth-3 text-white elegant-color" style="border: 1px solid rgb(224,224,224);">
    <div class="card-body elegant-color p-0">
    
      <!-- Nav tabs -->
      <ul class="nav nav-tabs nav-justified">
      <?php foreach($categories as $i => $cat) { ?>
        <li class="nav-item" style="border-radius: 0;">
          <a class="nav-link <?php if($i === 0) echo "active"; ?> " style="border-radius: 0;" data-toggle="tab" href="#tab_cat<?= $cat["id"] ?>" id="btn_tab_cat<?= $cat["id"] ?>"><?= $cat["name"] ?></a>
        </li>
      <?php } ?>
      </ul>

      <!-- Tab panes -->
      <div class="tab-content">
      <?php foreach($categories as $i => $cat) { ?>
        <div class="tab-pane container-fluid p-0 <?php if($i === 0) echo "active"; ?>" id="tab_cat<?= $cat["id"] ?>">
          <div class="table-responsive">
            <table class="table table-striped table-bordered table-sm table-dark table-hover mb-0" id="table_cat<?= $cat["id"] ?>">
              <thead>
                <tr>
                  <th style="width: 92px !important;"></th>
                  <th style="width: 40px !important;">ID</th>
                  <th>Nom</th>
                  <th>Description</th>
                  <th>Bonus</th>
                </tr>
              </thead>
              <tbody></tbody>
            </table>
          </div>
        </div>
      <?php } ?>
      </div>

    </div>
  </div>
</div>

<script type="text/javascript">
  var categories = <?= json_encode($categories) ?>;
</script>
