<?php
/**
 * Created by PhpStorm.
 * User: sokhadze
 * Date: 2/28/2019
 * Time: 7:10 PM
 */

    include "db.php";

    $db = new db();

    $data = $db->getQuestions();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $question = $_POST['question'];
        $answer = (int)$_POST['answer'];
        $db->addQuestion($question,$answer);
    }

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        echo $_GET["delete"];
    }



?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <title>Document</title>
    </head>
    <body>
        <div class="container">
            <form method="post" class="form">
                <div class="row">
                    <div class="col-lg-4">
                        <input type="text" name="question" class="form-control">
                    </div>
                    <div class="col-lg-4">
                        <input type="text" name="answer" class="form-control">
                    </div>
                    <div class="col-lg-4">
                        <button type="submit" class="btn btn-primary">damateba</button>
                    </div>
                </div>
            </form>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">კითხვები</th>
                        <th scope="col">პასუხები</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        for ($i = 0; $i < count($data); $i++) {
                    ?>

                    <tr>
                        <th scope="row"><?php echo $data[$i]['id'] ?></th>
                        <td><?php echo $data[$i]['question'] ?></td>
                        <td><?php echo $data[$i]['answer'] != 1 ? "მცდარია" : "ჭეშმარიტია"; ?></td>
                        <td><a href="?delete=<?php echo $data[$i]['id']?>"><button class="btn btn-danger">წაშლა</button></a></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </body>
</html>
