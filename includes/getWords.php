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
        $stmp =  $conn->prepare("delete from words where id = ".$_GET['delete_id']);
        $stmp->execute();
        header('location: /');
    }

    if (!empty($_GET['edit'])) {
        echo "edited - ".$_GET['edit'];
//        $stmp =  $conn->prepare("update `word_eng`, `word_geo` set word_eng='".."', word_geo='".."' where id = ".$_GET['edit']."");
        $stmp->execute();
        header('location: /');
    }

?>

<div class="row" >
    <div class="col-md-12">
        <table class="table table-responsive">
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
                    <td>
                        <a href="?delete_id=<?php echo $data[$i]['id'];?>"><button class="btn btn-danger">წაშლა</button></a>
                        <button type="button" data-toggle="modal" data-target="#exampleModal" id="show_modal" class="btn btn-warning">რედაქტირება</button>
<!--                        <a href="?edit=--><?php //echo $data[$i]['id'];?><!--&word_eng=--><?php //echo $data[$i]['word_eng']?><!--&word_geo=--><?php //echo $data[$i]['word_geo']?><!--"><button type="button" data-toggle="modal" data-target="#exampleModal" id="show_modal" class="btn btn-warning">რედაქტირება</button></a>-->
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="get">
                    <input type="text" value="<?php echo $_GET['word_geo']?>" class="form-control"><br>
                    <input type="text" class="form-control">
                </form>
            </div>
            <div class="modal-footer">
                <a href="?delete_id=<?php echo $data[$i]['id'];?>"><button class="btn btn-success">Save changes</button></a>
            </div>
        </div>
    </div>
</div>55