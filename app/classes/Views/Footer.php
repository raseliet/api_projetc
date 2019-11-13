<?php

namespace App\Views;

use App\App;

class Footer extends \Core\View {
     public function __construct($data = []){
       parent::__construct($data);
       $this->data = ['created_by' => 'Rasa Lietuvnikaitė'];
   }
    
    public function render($template_path = ROOT . '/app/templates/footer.tpl.php') {
        return parent::render($template_path);
    }

}
