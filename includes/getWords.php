<?php
/**
 * Created by PhpStorm.
 * User: sokhadze
 * Date: 2/21/2019
 * Time: 8:27 PM
 */


    $stmp =  $conn->prepare("select * from words");
    $stmp->execute();
    $result = $stmp->setFetchMode(PDO::FETCH_ASSOC);
    $data = $stmp->fetchAll();

    if (!empty($_GET['delete_id'])) {
        echo "deleted - ".$_GET['delete_id'];
        $stmp =  $conn->prepare("delete from words where id = ".$_GET['delete_id']."");
        $stmp->execute();
        header('location: /');
    }


?>

<div class="row">
    <div class="col-md-auto">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ინგლისურად</th>
                    <th>ქართულად</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 0; $i < count($data); $i++) {?>
                <tr>
                    <td scope="row"><?php echo $data[$i]['id'];?></td>
                    <td><?php echo $data[$i]['word_eng'];?></td>
                    <td><?php echo $data[$i]['word_geo'];?></td>
                    <td><a href="?delete_id=<?php echo $data[$i]['id'];?>"><button class="btn btn-danger">წაშლა</button></a></td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
</div>
