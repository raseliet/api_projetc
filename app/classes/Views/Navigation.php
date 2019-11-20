<?php

namespace App\Views;

use App\App;

class Navigation extends \Core\View {

    public function __construct($data = []) {
        parent::__construct($data);
// kurioje pusėje, dedamas slašas po domeno ir pavadinimas Home
         $this->addLink('left', '/', 'Home');

//        $this->addLink('left', '/', '<a  href="index.php"><img src="..//logo.jpg"  /></a>');

        if (App::$session->userLoggedIn()) {
            $user = App::$session->getUser();
            $label = $user->getName();
            $this->addLink('right', '/logout.php', "Logout($label)");
            //linkas puslapio ir id puslapio i kuri kreipia
             $this->addLink('right', '/cars.php', 'Cars');
            $this->addLink('right', '/index.php', "About");
        } else {
            $this->addLink('right', '/login.php', 'Login');
            $this->addLink('right', '/register.php', 'Register');
           
        }
    }

    public function addLink($section, $url, $title) {
        $link = ['url' => $url, 'title' => $title];

        if ($_SERVER['REQUEST_URI'] == $link['url']) {
            $link['active'] = true;
        }

        $this->data[$section][] = $link;
    }

    public function render($template_path = ROOT . '/app/templates/navigation.tpl.php') {
        return parent::render($template_path);
    }

}
