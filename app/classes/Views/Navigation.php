<?php

namespace App\Views;

use App\App;

class Navigation extends \Core\View {

    public function __construct($data = []) {
        parent::__construct($data);
// kurioje pusėje, dedamas slašas po domeno ir pavadinimas Home
        $this->addLink('left', '/', 'Home');
        
        if (App::$session->userLoggedIn()) {
            $user = App::$session->getUser();
            $label = $user->getEmail();
            $this->addLink('right', '/logout.php', "Logout($label)");
            //linkas puslapio ir id puslapio i kuri kreipia
            $this->addLink('right', '/index.php#about', "About");
        } else {
             $this->addLink('right', 'https://google.lt', 'About google');
            $this->addLink('right', '/login.php', 'Prisijungti');
            $this->addLink('right', '/register.php', 'Registruotis');            
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
