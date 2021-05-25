<?php
require_once 'php/DBConnect.php';
$db = new DBConnect();
$db->auth();

$success = NULL;
$message = NULL;
if (isset($_POST['submit'])) {
    $date = $_POST['date'];
    $place = $_POST['place'];
    $event = $_POST['event'];
    $coordinator = $_POST['coordinator'];
    $mobile = $_POST['mobile'];
 

    $flag = $db->addNews($date, $place, $event, $coordinator, $mobile);

    if ($flag) {
        $success = "User has been added to the database successfully!";
    } else {
        $message = "Error adding the employee to the database!". $flag;
    }
}
$title = "News Details";
$setAddNewsActive = "active";
include 'layout/_header.php';

include 'layout/navbar.php';
?>

<div class="container">
    <div class="col-md-3"></div>
    <div class="col-md-6">

        <?php if (isset($success)): ?>
            <div class="alert-success"><?= $success; ?></div>
        <?php endif ?>
        <?php if (isset($message)): ?>
            <div class="alert-success"><?= $message; ?></div>
<?php endif ?>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>Add News</h3><button><a href="newsview.php">News View</a></button>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" role="form" method="post" action="newsadd.php">
                    <div class="form-group">
                        <label class="col-md-3">Date:</label>
                        <div class="col-sm-9"><input type="date" name="date" class="form-control" required="true"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3">Place:</label>
                        <div class="col-sm-9"><input type="text" name="place" class="form-control" required="true"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3">Event:</label>
                        <div class="col-sm-9"><input type="text" name="event" class="form-control" required="true"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3">Co-Ordinator:</label>
                        <div class="col-sm-9"><input type="text" name="coordinator" class="form-control" required="true"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3">Mobile No:</label>
                        <div class="col-sm-9"><input type="number" min="0" max="10000000000" name="mobile" class="form-control" required="true"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3"></label>
                        <button type="submit" class="btn btn-success btn-md" name="submit">Add News</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-3"></div>
</div>

<?php include 'layout/_footer.php'; ?>