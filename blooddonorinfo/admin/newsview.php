<?php
require_once 'php/DBConnect.php';
$db = new DBConnect();
$db->auth();

$news = $db->getNews();

$title="news"; $setNewsActive="active";
include 'layout/_header.php'; 
include 'layout/navbar.php';

?>

<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h5>News Record</h5> <button><a href="newsadd.php">Back</a></button>
            </div>
            <div class="panel-body">
                <?php if(isset($news)): ?>
                <table class="table table-condensed">
                    <thead>
                    <th>Id</th>
                    <th>Date</th>
                    <th>Place</th>
                    <th>Event</th>
                    <th>Co-Ordinator</th>
                    <th>Mobile</th>
                    <th>Action</th>
                    </thead>
                    
                    <tbody>
                        <?php foreach($news as $n): ?>
                        <tr>
                            <td><?= $n['id']; ?></td>
                            <td><?= $n['date']; ?></td>
                            <td><?= $n['place']; ?></td>
                            <td><?= $n['event']; ?></td>
                            <td><?= $n['coordinator']; ?></td>
                            <td><?= $n['mobile']; ?></td>
                            <td><a href="newsedit.php?id=<?= $n['id']; ?>">Edit</a> || <a href="newsdelete.php?id=<?= $n['id']; ?>">Delete</a></td>  
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?php endif; ?>
            </div>
        </div>
                 
    </div>
</div>

<?php include 'layout/_footer.php'; ?>

