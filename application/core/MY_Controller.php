  <?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

  public function __construct() {
    parent::__construct();
  }

  protected function loadView($content,$params=[]) {

    $this->load->view("layout/html_head",   $params);
    $this->load->view("layout/page_header", $params);

    if(!is_array($content)) $content=[$content];
    foreach ($content as $view)
      $this->load->view($view, $params);

    $this->load->view("layout/page_footer", $params);
  }

}