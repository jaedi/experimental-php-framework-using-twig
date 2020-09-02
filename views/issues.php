<?php
session_start();

if(!isset($_SESSION['loggedin'])) {
    header('Location: index.html');
    exit;
}
include_once('includes/header.php');
?>

<div class="container mx-auto mt-16 lg:px-16 md:px-8 sm:px-8 grid grid-rows-3 grid-flow-col gap-4">
</div>
<?php include_once('includes/footer.php');?>