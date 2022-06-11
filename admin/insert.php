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

if (isset($_POST['submit'])) {
	$title = trim($_POST['title']);
	$message = trim($_POST['message']);

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
		mysqli_query($con, "insert into tsh_blog(tsh_title, tsh_message) values('$title', '$message')") or die(mysqli_error($con));
		$msgSuccess = "Success. A new blog entry has been added.";
	}
}
?>
<h2>Insert Blog Entry</h2>
<?php
if ($msgSuccess) {
	echo $msgPreSuccess . $msgSuccess . $msgPost;
}
?>
<form id="myform" name="myform" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
	<div class="form-group">
		<label for="title">Title:</label>
		<input type="text" name="title" class="form-control">
		<?php
		if ($valTitleMsg) {
			echo $msgPreError . $valTitleMsg . $msgPost;
		}
		?>
	</div>
	<div class=" form-group">
		<label for="message">Message:</label>
		<textarea name="message" class="form-control"></textarea>
		<?php
		if ($valMessageMsg) {
			echo $msgPreError . $valMessageMsg . $msgPost;
		}
		?>
		<br>
		<div>
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
		<label for="submit">&nbsp;</label>
		<input type="submit" name="submit" class="btn btn-info" value="Submit">
	</div>



</form>
<?php
include("../includes/footer.php");
?>