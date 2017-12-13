<table class='table table-striped table-hover table-condensed table-bordered' id='inv_table' cellspacing='0' width='100%' style="margin: -2px 0 !important;">
  <thead>
    <tr>
      <th></th>
      <th>Nom</th>
      <th>Desc.</th>
      <th style="width:30px;"></th>
    </tr>
  </thead>
</table>

<div class="modal fade" id="add_edit_item" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header"><h4 class="modal-title">Ajouter / Modifier un objet</h4></div>
      <div class="modal-body">
        <input type="hidden" id="item_id" value="-1">
        <div class="row">
          <div class="col-sm-8"><label>Nom de l'objet</label><input type="text" class="form-control"  id="item_name"></div>
          <div class="col-sm-4"><label>Quantité</label><input type="text" class="form-control" id="item_qty"></div>
        </div>
        <hr>
        <label>Description / Effets</label><input type="text" class="form-control" id="item_desc">
      </div>
      <div class="modal-footer">
        <div class="btn-group btn-group-justified">
          <a href="#" class="btn btn-danger  btn-lg" onclick="reset_item_modal()" data-dismiss="modal"><i class="fa fa-remove"></i> Annuler</a>
          <a href="#" class="btn btn-success btn-lg" onclick="add_edit_item()"                        ><i class="fa fa-save"  ></i> Valider</a>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="delete_item" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header"><h4 class="modal-title">Supprimer un objet</h4></div>
      <div class="modal-body nowrap">
        <p class="nowrap">Supprimer l'objet <b><i id="delete_item_name"></i></b> ?</p>
        <input type="hidden" value="" id="delete_item_confirm">
      </div>
      <div class="modal-footer">
        <div class="btn-group btn-group-justified">
          <a href="#" class="btn btn-danger  btn-lg" onclick="reset_skill_modal()" data-dismiss="modal"><i class="fa fa-remove"></i> NON</a>
          <a href="#" class="btn btn-success btn-lg" onclick="delete_item()"                          ><i class="fa fa-check"  ></i> OUI</a>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">

  

</script>