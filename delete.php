
<?php
session_start();

require('new_users.class.php');
include('config/database.php');

//DELETE l'UTILISATEUR
$actual_user = new Membre($conn);
$actual_user->getIdUser($_SESSION['id_user']);
$actual_user->deleteProfile();

//DELETE PHOTOS user delete
$photos_delete = new Picture($conn);
$photos_delete->getIdUser($_SESSION['id_user']);
$photos_delete->deletePhotoUser();

header('Location: index.php');
session_destroy();
?>