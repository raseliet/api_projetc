<?php
require '../bootloader.php';

use App\App;



$createForm = new \App\Cars\Views\CreateForm();
$updateForm = new \App\Cars\Views\UpdateForm();
$navigation = new \App\Views\Navigation();
$footer = new \App\Views\Footer();

if (!App::$session->userLoggedIn()) {
    header('Location: /login.php');
}

//
//$car = new Car([
//    'manufacturer' => 'Audi',
//    'model' => 'Q',
//    'year' => 2001
//]);
//
//var_dump($car);
//
//$carModel = new Model();
////var_dump($carModel->insert($car));
//var_dump($carModel->get());
//





?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Automobiliai</title>
        <link rel="stylesheet" href="media/css/normalize.css">
        <link rel="stylesheet" href="media/css/milligram.min.css">
        <link rel="stylesheet" href="media/css/style.css">
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    </head>
    <body>
        <header>
            <?php print $navigation->render(); ?>
        </header>

        <main>
            <section class="wrapper">
                <div class="block">
                    <h1>Manage cars:</h1>                    
                    <?php print $createForm->render(); ?>
                </div>
                <div class="block">
                    <div id="cars-table">
                        <table>
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Manufacturer</th>
                                    <th>Model</th>
                                    <th>Year</th>
                                    <th>Delete</th>
                                    <th>Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Rows Are Dynamically Populated -->
                            </tbody>
                        </table>
                    </div>                    
                </div>
            </section>

            <!-- Update Modal -->
            <div id="update-modal" class="modal">
                <div class="wrapper">
                    <span class="close">&times;</span>
                    <?php print $updateForm->render(); ?>
                </div>
            </div>            
        </main>

        <!-- Footer -->        
        <footer>
            <?php print $footer->render(); ?>
        </footer>

<!--        <script defer src="media/js/cars.js"></script>-->
                <script defer src="media/js/cars1.js"></script>

    </body>
</html>
