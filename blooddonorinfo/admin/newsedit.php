<?php
if(isset($_GET['id'])){
    $id = $_GET['id']; // get the employee id
}

require_once 'php/DBConnect.php';
$db = new DBConnect();
$db->auth();

$success = NULL;
$message = NULL;
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $date = $_POST['date'];
    $place = $_POST['place'];
    $event = $_POST['event'];
    $coordinator = $_POST['coordinator'];
    $mobile = $_POST['mobile'];

    $flag = $db->updateNews( $id, $date, $place, $event, $coordinator, $mobile);

    if ($flag) {
        $success = "User has been updated successfully!";
		header("Location: newsview.php");

    } else {
        $message = "Error updating the news to the database!";
    }
}

$news = $db->getNewsById($id);

$news = $db->getNews();

$title="Employee"; $setNewsActive="active";
include 'layout/_header.php'; 
include 'layout/navbar.php';

?>

<div class="container">
    <div class="row">
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
                    <h3>News Record</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="post" action="newsedit.php">
                        <input type="hidden" name="id" value="<?= $id; ?>">
                       
                        <div class="form-group">
                            <label class="col-md-3">Date:</label>
                            <div class="col-sm-9"><input type="date" value="<?= $news[0]['date']; ?>" name="date" class="form-control" required="true"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3">Place:</label>
                            <div class="col-sm-9"><input type="text" value="<?= $news[0]['place']; ?>" name="place" class="form-control" required="true"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3">Event:</label>
                            <div class="col-sm-9"><input type="text" value="<?= $news[0]['event']; ?>" name="event" class="form-control" required="true"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3">Co-Ordinator:</label>
                            <div class="col-sm-9"><input type="text" value="<?= $news[0]['coordinator']; ?>" name="coordinator" class="form-control" required="true"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3">Mobile:</label>
                            <div class="col-sm-9"><input type="number" value="<?= $news[0]['mobile']; ?>" min="0" max="10000000000" name="mobile" class="form-control" required="true"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3"></label>
                            <button type="submit" class="btn btn-success btn-md" name="submit">Update Info</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>

<?php include 'layout/_footer.php'; ?>
