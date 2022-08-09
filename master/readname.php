<?php
session_start();

$dbconnect = mysqli_connect("localhost", "root", "", "sign_out_system_db");

$keyword = $_POST['keyword'];

if(!empty($keyword)) {
$query ="SELECT DISTINCT first_name, last_name, student_ID FROM student_transactions WHERE first_name LIKE '%$keyword%' ORDER BY first_name LIMIT 0,3";
$result = mysqli_query($dbconnect, $query);



if(!empty($result)) {
?>
<ul id="country-list">
<?php
    foreach($result as $name) {
?>
<li onClick="selectCountry('<?php echo $name["first_name"]; echo " "; echo $name["last_name"]; $_SESSION['student_ID'] = $name["student_ID"]; ?>');">
                            <?php  echo $name["first_name"]; echo " "; echo $name["last_name"]; ?>

</li>
<?php } ?>
</ul>
<?php } } ?>