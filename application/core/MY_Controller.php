<?php
namespace {

  class MY_Controller extends CI_Controller {

    public function __construct() {
      parent::__construct();
    }

    protected function loadView($content, $params=[]) {
      if(!empty($params["assets"])) {
        foreach($params["assets"] as $asset) {
          switch($asset) {
            case "font-awesome":
              $params["css"][] = assets_url("font-awesome/css/font-awesome.min.css");
              break;
            case "Bootstrap3":
              $params["css"][] = assets_url("bootstrap3/css/bootstrap.min.css");
              $params["js"][]  = assets_url("bootstrap3/js/bootstrap.min.js");
              break;
            case "Bootstrap4":
              $params["css"][] = assets_url("bootstrap4/css/bootstrap.min.css");
              $params["css"][] = assets_url("mdb/css/mdb.min.css");

              $params["js"][] = assets_url("bootstrap4/js/bootstrap.bundle.min.js");
              $params["js"][] = assets_url("mdb/js/mdb.min.js");
              break;
            case "dataTables":
              // //$params["css"][] = assets_url("datatables/dt/css/jquery.dataTables.min.css");
              $params["css"][] = assets_url("datatables/dt/css/dataTables.bootstrap4.min.css");
              $params["css"][] = assets_url("datatables/responsive/css/responsive.dataTables.min.css");
              $params["css"][] = assets_url("datatables/responsive/css/responsive.bootstrap4.min.css");

              $params["js"][] = assets_url("datatables/dt/js/jquery.dataTables.min.js");
              $params["js"][] = assets_url("datatables/dt/js/dataTables.bootstrap4.min.js");
              $params["js"][] = assets_url("datatables/responsive/js/dataTables.responsive.min.js");
              $params["js"][] = assets_url("datatables/responsive/js/responsive.bootstrap4.min.js");
              break;
            default:
              // Do nothing
              break;
          }
        }
      }

      $this->load->view("layout/html_head", $params);
      $this->load->view("layout/page_header", $params);

      if(!is_array($content)) $content = [$content];
      foreach($content as $view) $this->load->view($view, $params);

      $this->load->view("layout/page_footer", $params);
    }

  }

}
