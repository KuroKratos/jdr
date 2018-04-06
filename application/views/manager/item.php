<div class="col-4 ml-md-auto mr-md-auto">
  <div class="card z-depth-3 text-white elegant-color" style="border: 1px solid rgb(224,224,224);">
    <div class="card-body p-1 pl-2">
      Ajouter un objet
    </div>
    <div class="card-body py-2 px-0 border-top border-light form-inline">
      <div class="row">
        <div class="col-12 mb-2">
          <div class="col-3 float-left">Catégorie :</div>
          <div class="col-9 float-right">
            <select class="form-control input-sm" id="txt_category" style="border-radius: 0; height: 31px; border: 0; width: 100%"></select>
          </div>
        </div>
        <div class="col-12 mb-2">
          <div class="col-3 float-left">Nom :</div>
          <div class="col-9 float-right">
            <input type="text" class="form-control input-sm" id="txt_name" style="border-radius: 0; height: 31px; border:0; width: 100%;">
          </div>
        </div>
        <div class="col-12 mb-2">
          <div class="col-3 float-left">Description :</div>
          <div class="col-9 float-right">
            <input type="text" class="form-control input-sm" id="txt_description" style="border-radius: 0; height: 31px; border:0; width: 100%;">
          </div>
        </div>
        <div class="col-12 mb-2">
          <div class="col-3 float-left">Bonus :</div>
          <div class="col-9 float-right">
            <div class="row">
              <div class="col-3 pr-2 float-left">
                <input type="number" class="form-control input-sm" id="nbr_stat_bonus" value="0" style="border-radius: 0; height: 31px; border:0; width: 100%;">
              </div>
              <div class="col-9 pl-0 float-left">
                <select class="form-control input-sm" id="txt_stat_bonus" style="border-radius: 0; height: 31px; border: 0; width: 100%;">
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
        <div class="col-12">
          <div class="col-3 float-left"></div>
          <div class="col-9 float-right">
            <div class="row">
              <div class="col-6 float-left pr-1">
                <button class="btn btn-sm btn-secondary px-3 m-0 col-12"><i class="fa fa-recycle mr-2"></i>Réinitialiser</button>
              </div>
              <div class="col-6 float-left pl-1">
                <button class="btn btn-sm btn-primary px-3 m-0 col-12"><i class="fa fa-floppy-o mr-2"></i>Enregistrer</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
