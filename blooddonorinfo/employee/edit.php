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
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $sex = $_POST['sex'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $mobile = $_POST['mobile'];
    $dob = $_POST['dob'];
    $dday = $_POST['dday'];
    $lday = $_POST['lday'];
    $reentry = $_POST['reentry'];
    $b_type = $_POST['b_type'];

    $flag = $db->updateDonor($id,$fname,$mname,$lname,$sex, $address, $city, $mobile,$dob, $dday, $lday, $reentry, $b_type);

    if ($flag) {
        $success = "User has been updated successfully!";
    } else {
        $message = "Error updating the employee to the database!";
    }
}


$donors = $db->getDonorsById($id);
$donors = $db->getDonors();

$title = "Donors Details";
$setDonorsActive = "active";
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
                    <h3>Update Record</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="post" action="edit.php">
                        <input type="hidden" name="id" value="<?= $donors[0]['id']; ?>">
                        <div class="form-group">
                            <label class="col-md-3">Name:</label>
                            <div class="col-sm-3"> <input type="text" value="<?= $donors[0]['fname']; ?>" name="fname" class="form-control" placeholder="First Name" required="true"> </div>
                            <div class="col-sm-3"><input type="text" value="<?= $donors[0]['mname']; ?>" name="mname" class="form-control" placeholder="Middle Name"></div>
                            <div class="col-sm-3"><input type="text" value="<?= $donors[0]['lname']; ?>" name="lname" class="form-control" placeholder="Last Name" required="true"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3">Sex:</label>
                            <div class="col-sm-9"><input type="text" value="<?= $donors[0]['sex']; ?>" name="sex" class="form-control" required="true"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3">Address:</label>
                            <div class="col-sm-9"><input type="text" value="<?= $donors[0]['address']; ?>" name="address" class="form-control" required="true"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3">City:</label>
                            <div class="col-sm-9"><input type="text" value="<?= $donors[0]['city']; ?>" name="city" class="form-control" required="true"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3">Mobile:</label>
                            <div class="col-sm-9"><input type="number" value="<?= $donors[0]['mobile']; ?>" name="mobile" class="form-control" required="true"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3">D.O.B:</label>
                            <div class="col-sm-9"><input type="Date" value="<?= $donors[0]['dob']; ?>" name="dob" class="form-control" required="true"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3">Donation Date:</label>
                            <div class="col-sm-9"><input type="text" value="<?= $donors[0]['dday']; ?>" name="dday" class="form-control" required="true"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3">Last Donation Date:</label>
                            <div class="col-sm-9"><input type="text" value="<?= $donors[0]['lday']; ?>" name="lday" class="form-control" required="true"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3">Re-Entry Date:</label>
                            <div class="col-sm-9"><input type="text" value="<?= $donors[0]['reentry']; ?>" name="reentry" class="form-control" required="true"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3">Blood Group:</label>
                            <div class="col-sm-9"><input type="text" value="<?= $donors[0]['b_type']; ?>" name="b_type" class="form-control" required="true"></div>
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
