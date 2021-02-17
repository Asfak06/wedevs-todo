<?php
require('../vendor/autoload.php');
use Wedevs\Todo;

$todo=new Todo();

if(isset($_POST['newtodo'])){
	$todo->store($_POST['newtodo']);
}
if(isset($_POST['rd'])){
	echo $todo->load();
}
if(isset($_POST['load_active'])){
	echo $todo->loadActive();
}
if(isset($_POST['load_completed'])){
	echo $todo->loadCompleted();
}
if(isset($_POST['id']) && isset($_POST['content']) ){
    $todo->update($_POST['id'],$_POST['content']);
}
if(isset($_POST['completed_id'])){
    $todo->complete($_POST['completed_id']);
}
if(isset($_POST['delete_id'])){
    $todo->delete($_POST['delete_id']);
}

if(isset($_POST['anyCompleted'])){
    echo $todo->anyCompleted();
}

if(isset($_POST['clear'])){
   $todo->clear();
}
?>