<?php
require_once 'php/DBConnect.php';
$db = new DBConnect();

$news = $db->getNews();

$title="news ";$setCampDateActive="active";
include 'layout/_header.php';

include 'layout/navbar.php';

?>

<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h5>News Record</h5>
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

