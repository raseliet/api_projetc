<?php
require '../bootloader.php';

use App\App;

$createForm = new \App\Feedbacks\Views\CreateForm();
$updateForm = new \App\Feedbacks\Views\UpdateForm();
$navigation = new \App\Views\Navigation();
$footer = new \App\Views\Footer();

if (!App::$session->userLoggedIn()) {

    header('Location: /login.php');

}
//        $form['message'] = 'Norite parašyti komentarą? Užsiregistruokite!';

?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Atsiliepimai</title>
        <link rel="stylesheet" href="media/css/normalize.css">
        <link rel="stylesheet" href="media/css/milligram.min.css">
        <link rel="stylesheet" href="media/css/style.css">
<!--        <link rel="stylesheet" href="media/css/mano.css.css">-->

        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    </head>
    <body>
        <header>
<?php print $navigation->render(); ?>
        </header>

        <main>
            <section class="wrapper">
                <div class="block">
                    <h1>Atsiliepimai:</h1>                    
            <?php print $createForm->render(); ?>
                </div>

<!--                <table>
<tr><td>Name: <br><input type="text" name="name"/></td></tr>
<tr><td colspan="2">Comment: </td></tr>
<tr><td colspan="5"><textarea name="comment" rows="5" cols="50"></textarea></td>  </tr>
<tr><td colspan="2"><input type="submit" name="submit" value="Comment"></td></tr>
</table>-->

                <div class="block">
                    <div id="feedbacks-table">
                        <table>
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Vardas</th>
                                    <th>Komentaras</th>
                                    <th>Data</th>
                                    <th>Ištrinti</th>
                                    <th>Redaguoti</th>
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
