<?php

include("includes/header.php");
include("includes/_functions.php");

//////////// pagination
$getcount = mysqli_query($con, "SELECT COUNT(*) FROM tsh_blog");
$postnum = mysqli_result($getcount, 0); // this needs a fix for MySQLi upgrade; see custom function below
$limit = 5;
if ($postnum > $limit) {
  $tagend = round($postnum % $limit, 0);
  $splits = round(($postnum - $tagend) / $limit, 0);
  if ($tagend == 0) {
    $num_pages = $splits;
  } else {
    $num_pages = $splits + 1;
  }
  if (isset($_GET['pg'])) {
    $pg = $_GET['pg'];
  } else {
    $pg = 1;
  }
  $startpos = ($pg * $limit) - $limit;
  $limstring = "LIMIT $startpos,$limit";
} else {
  $limstring = "LIMIT 0,$limit";
}
// MySQLi upgrade: we need this for mysql_result() equivalent
function mysqli_result($res, $row, $field = 0)
{
  $res->data_seek($row);
  $datarow = $res->fetch_array();
  return $datarow[$field];
}

?>

<div class="jumbotron clearfix">
  <h1><?php echo APP_NAME ?></h1>
</div>
<?php $result = mysqli_query($con, "select * from tsh_blog ORDER BY id DESC $limstring"); ?>
<?php while ($row = mysqli_fetch_array($result)) : ?>
  <div class="listbox clearfix">
    <p class="float-right">
      <em>
        <?php
        $thisDate = strtotime($row["tsh_timedate"]);
        $thisDate = date("F j, Y g:i a", $thisDate);
        echo $thisDate; ?>
      </em>
    </p>
    <h2><?php echo $row['tsh_title'] ?></h2>
    <p><?php echo nl2br(makeClickableLinks(addEmoticons($row['tsh_message']))) ?></p>
  </div>
<?php endwhile; ?>

<?php
///////////////// pagination links: perhaps put these BELOW where your results are echo'd out.
if ($postnum > $limit) {
  $n = $pg + 1;
  $p = $pg - 1;
  $thisroot = $_SERVER['PHP_SELF'];

  echo "<ul class=\"pagination\">";

  echo "<li class=\"page-item\">";
  if ($pg > 1) {
    echo "<a class=\"page-link\" href=\"$thisroot?pg=$p\">PREVIOUS</a>&nbsp;&nbsp;";
  }

  echo "</li>";

  for ($i = 1; $i <= $num_pages; $i++) {
    echo "<li class=\"page-item\">";
    if ($i != $pg) {
      echo "<a class=\"page-link\" href=\"$thisroot?pg=$i\">$i</a>&nbsp;&nbsp;";
    } else {
      echo "<a class=\"page-link\">$i</a>&nbsp;&nbsp;";
    }
    echo "</li>";
  }
  echo "<li class=\"page-item\">";
  if ($pg < $num_pages) {
    echo "<a class=\"page-link\" href=\"$thisroot?pg=$n\">NEXT</a>";
  }
  echo "</li>";
  echo "</ul>";
}
// ambitious students may want to reformat this. Perhaps use Bootstraps pagination markup.
////////////// end pagination
?>
<?php
include("includes/footer.php");
?>