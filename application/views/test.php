<script type="text/javascript">
var mydata = {char_id : 0};
var char_id = 1;

panel = jsPanel.create({
    container:        'body',
    theme:            'bootstrap-success filledlight',
    headerTitle:      'Mon inventaire',
    position:         'right-top 0 50',
    maximizedMargin:  [50,0,0,0],
    syncMargins:      true,
    snap:             true,
    //contentSize: {height: 'auto'},
    contentAjax: {
      url:          "<?= base_url("Ajax/inventoryPanel/") ?>" + char_id,
      //responseType: "json",
      beforeSend: function () {
        this.setRequestHeader('Accept','application/json');
        this.setRequestHeader('Content-Type', 'application/json');
      },
      done: function (panel) {
        panel.content.innerHTML = this.responseText;
        $('.jsPanel-content').css("padding","0px");
        load_inventory_dt(char_id, panel);
        panel.resize({height: 'auto'});
      }
    },
    callback: function () {
        this.content.style.padding = '20px';
    },
    onbeforeclose: function () {
        if (!window.confirm('Do you really want to close the panel?')) {
            return false;
        }
    }
});

</script>