<?php

class Home extends Controller {
  function __construct() {
    parent::Controller();
    $this->load->helper('form');
#    $GLOBALS['login_check'] = TRUE;
  }
  function index() {
    $data['title'] = 'Home';
    $p = new Project();
    $p->order_by('updated', 'desc')->get(10);
    foreach ($p as $pp) {
      $pp->user->get();
      $pp->projecttext->get();
    }
    $data['posts'] = $p;
    $this->load->view('home_index', $data);
  }

  function info() {
    echo phpinfo();
  }
  
  function cgi_info() {
    echo '<pre>';
    echo passthru("php --info");
    echo '</pre>';
  }

  function emp() {
    if($this->input->post('dne')) {
      echo 'bar';
    } else {
      echo 'baz';
    }
  }

  function models() {
    $t = new Tag();
    $t->get();
    foreach ($t->all as $myt) {
      echo $myt;
    }
  }

  function db2() {
    $q = $this->db->get('tags');
    var_dump($q);
  }

}
?>
