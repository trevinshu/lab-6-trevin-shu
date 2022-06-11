<?php
session_start();
if (isset($_SESSION['auyfgigafa'])) {
    // echo "Logged in";
} else {
    // echo "Not logged In";
    header("Location: login.php");
}
?>

<?php
include("../includes/header.php");

$pageID = $_GET['id'];
if (!isset($pageID)) {
    $tmp = mysqli_query($con, "Select id from tsh_blog limit 1");
    while ($row = mysqli_fetch_array($tmp)) {
        $pageID = $row['id'];
    }
}


if (isset($_POST['submit'])) {
    $title = trim($_POST['title']);
    $message = trim($_POST['message']);
    $currentDateTime = date('Y-m-d H:i:s');
    $entryselect = ($_POST['entryselect']);

    $valid = 1;
    $msgPreError = "\n<div class=\"alert alert-danger\" role=\"alert\">";
    $msgPreSuccess = "\n<div class=\"alert alert-primary\" role=\"alert\">";
    $msgPost = "\n</div>";

    if ((strlen($title) < 5) || (strlen($title) > 150)) {
        $valid = 0;
        $valTitleMsg .= "Please enter a title between 5 to 150 characters.";
    }

    if ((strlen($message) < 5) || (strlen($message) > 400)) {
        $valid = 0;
        $valMessageMsg .= "Please enter a message between 5 to 400 characters.";
    }

    if ($valid == 1) {
        mysqli_query($con, "update tsh_blog set tsh_title = '$title', tsh_message = '$message', tsh_timedate = '$currentDateTime' where id = '$pageID'") or die(mysqli_error($con));
        $msgSuccess = "Success.The blog entry has been updated.";
    }
}
?>
<br>
<h2>Edit Blog Entry</h2>
<?php
if ($msgSuccess) {
    echo $msgPreSuccess . $msgSuccess . $msgPost;
}
?>
<form id="myform" name="myform" method="post" action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>">
    <div class="form-group">
        <select name="entryselect" id="entryselect" class="form-control" onchange="go()">
            <?php
            $result = mysqli_query($con, "Select * from tsh_blog");
            while ($row = mysqli_fetch_array($result)) {
                $thisTitle = $row['tsh_title'];
                $thisId = $row['id'];
                echo "<option value=\"edit.php?id=$thisId\";>$thisTitle</option>";
            }
            $result = mysqli_query($con, "Select * from tsh_blog where id='$pageID'");
            ?>
        </select>
        <?php
        $result = mysqli_query($con, "Select * from tsh_blog where id='$pageID'");
        while ($row = mysqli_fetch_array($result)) {
            $thisTitle = $row['tsh_title'];
            $thisMessage = $row['tsh_message'];
        }
        ?>
    </div>
    <div class="form-group">
        <label for="title">Title:</label>
        <input type="text" name="title" class="form-control" value="<?php echo $thisTitle ?>">
        <?php
        if ($valTitleMsg) {
            echo $msgPreError . $valTitleMsg . $msgPost;
        }
        ?>
    </div>
    <div class=" form-group">
        <label for="message">Message:</label>
        <textarea name="message" class="form-control"><?php if ($thisMessage) {
                                                            echo $thisMessage;
                                                        } ?></textarea>
        <?php
        if ($valMessageMsg) {
            echo $msgPreError . $valMessageMsg . $msgPost;
        }
        ?>
        <br>
        <div class="form-group">
            <a href="javascript:emoticon(':D')"><img src="../emoticons/icon_biggrin.gif" alt=""></a>
            <a href="javascript:emoticon(':(')"><img src="../emoticons/icon_sad.gif" alt=""></a>
            <a href="javascript:emoticon(';)')"><img src="../emoticons/icon_wink.gif" alt=""></a>
            <a href="javascript:emoticon(':O')"><img src="../emoticons/icon_surprised.gif" alt=""></a>
            <a href="javascript:emoticon(':?')"><img src=" ../emoticons/icon_question.gif" alt=""></a>
            <a href="javascript:emoticon('o.O')"><img src="../emoticons/icon_confused.gif" alt=""></a>
            <a href="javascript:emoticon(':)')"><img src="../emoticons/icon_smile.gif" alt=""></a>
            <a href="javascript:emoticon('B-)')"><img src="../emoticons/icon_cool.gif" alt=""></a>
        </div>
    </div>
    <div class="form-group">
        <label for="submit"></label>
        <input type="submit" name="submit" class="btn btn-info" value="Update Blog Entry">
        &nbsp;
        <a href="delete.php?id=<?php echo $pageID ?>" onclick="return confirm('Are you sure you want to delete this blog entry?')" class="btn btn-danger">Delete Blog Entry</a>
    </div>



</form>
<?php
include("../includes/footer.php");
?>