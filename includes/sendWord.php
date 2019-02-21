<?php
/**
 * Created by PhpStorm.
 * User: sokhadze
 * Date: 2/21/2019
 * Time: 8:05 PM
 */

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $word_eng = $_POST['word_eng'];
        $word_geo = $_POST['word_geo'];
        $query = "INSERT INTO words (word_eng, word_geo) VALUES ('".$word_eng."', '".$word_geo."')";
        $conn->exec($query);
        echo "new word added!";
    }

?>


<div class="row">
    <div class="col-md-4">
        <form action="" method="post">
            <div class="form-group">
                <input name="word_eng" class="form-control"><br>
                <input name="word_geo" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">დამატება</button>
        </form>
    </div>
    <div class="col-md-4"></div>
    <div class="col-md-4"></div>
</div>
