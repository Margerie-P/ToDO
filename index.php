<?php 
session_start();
//session_destroy();
//session_start();
$taskEdit = false;

$date = new \DateTime;
$dateFormat = $date->format('Y-m-d H:i:s');

if(isset($_GET['killAll'])){
    session_destroy();
    header('location: http://localhost:8888/php/exercices/tp7_toDoList/index.php');
} 

if(isset($_GET['delete'])){
        unset($_SESSION['task'][$_GET['delete']]);
        header('location: http://localhost:8888/php/exercices/tp7_toDoList/indexTableau.php');
} 
if(isset($_GET['edit'])){
  
   $taskEdit = true;
   $_SESSION['indiceEdit'] = $_GET['edit'];

} 
if(isset($_GET['inProgress'])){
    $_SESSION['task'][$_GET['inProgress']]['progress'] = 'En cours';
    header('location: http://localhost:8888/php/exercices/tp7_toDoList/indexTableau.php');
} 
if(isset($_GET['done'])){
    $_SESSION['task'][$_GET['done']]['progress'] = 'Terminé';
    $_SESSION['task'][$_GET['done']]['done'] = $dateFormat;
    header('location: http://localhost:8888/php/exercices/tp7_toDoList/indexTableau.php');
} 

if(isset($_POST['titleEdit'],$_POST['contentEdit'],$_POST['progressEdit'])){
    $_SESSION['task'][$_SESSION['indiceEdit']]['title'] = $_POST['titleEdit'];
    $_SESSION['task'][$_SESSION['indiceEdit']]['content'] = $_POST['contentEdit'];
    $_SESSION['task'][$_SESSION['indiceEdit']]['progress'] = $_POST['progressEdit'];
    header('location: http://localhost:8888/php/exercices/tp7_toDoList/indexTableau.php');
};
                   
// Création du tableau task qui comporte à chaque ligne un titre, un contenu et un niveau de progression
if(! isset($_SESSION['task'])){ 
    $_SESSION['task'] = [];
   

}
// Assignation d'une nouvelle ligne au tableau Task qui contient la valeur des input envoyés
if(isset($_POST['title'],$_POST['content'],$_POST['progress'])){
    $_SESSION['task'][]= 
    [
        'date' => $dateFormat,
        'title' => $_POST['title'],
        'content' =>  $_POST['content'],
        'progress' =>  $_POST['progress'],
        'done' => 'la tâche n\'est pas terminé',
        
    ];
    header('location: http://localhost:8888/php/exercices/tp7_toDoList/indexTableau.php');
}

//  unset($task[array_search($element, $task)])  Pour supprimer un element dans le tableau


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" href="css/bootstrap.css"> 
    <title>Document</title>
</head>
<body class="bg">
    <div class="row bg-blanc">
        <div class="col-12 ">
        <img class=" mb-3 logo" src="img/newTodo.png">
        <span class="btn-blue"><a class="btn" href="indexTableau.php" >Mes tâches</a> </span>
        
        <span class="btn-blue"><a href="index.php?killAll" class="btn">Supprimer toutes mes tâches !</a></span>
        </div>
    </div>

    <div class="row">
    <div class="col-6 offset-3 mt-5">
    <?php if($taskEdit == false){ ?>
    <h2 class="color-white">Ajouter une nouvelle tâche : </h2>
        <form action="index.php" method="POST">
            <input class="form-control" type="text" name="title" placeHolder="Entrer le titre de votre tâche"> <br>
            <textarea class="form-control"  name="content" placeHolder="Description de la tâche"></textarea> <br>
            <select class="form-control" name="progress" id="progress">
                <option value="">--Progression--</option>
                <option value="A faire">A faire</option>
                <option value="En cours">En cours</option>
                <option value="Terminé">Terminé</option>
            </select> <br>
            <input class="btn btn-light" type="submit" value="Enregistrer">
        </form>
    <?php
    } ?>
    
    <?php if($taskEdit == true){ ?>
    <h2 class="color-white">Modifier la tâche : </h2>
        <form action="index.php" method="POST">
            <input class="form-control" type="text" name="titleEdit" value="<?php echo $_SESSION['task'][$_SESSION['indiceEdit']]['title'] ?>" > <br>
            <textarea class="form-control"  name="contentEdit"> <?php echo $_SESSION['task'][$_SESSION['indiceEdit']]['content'] ?></textarea> <br>
            <select class="form-control" name="progressEdit" id="progress">
                <option value="">--Progression--</option>
                <option value="A faire"
                <?php if($_SESSION['task'][$_SESSION['indiceEdit']]['progress'] === 'A faire'){echo 'selected';}?>
                >A faire</option>
                <option value="En cours"  
                <?php if($_SESSION['task'][$_SESSION['indiceEdit']]['progress'] === 'En cours'){echo 'selected';}?>
                >En cours</option>
                <option value="terminé"  <?php if($_SESSION['task'][$_SESSION['indiceEdit']]['progress'] === 'terminé'){
                    echo 'selected';
                }?>>Terminé</option>
            </select> <br>
            <input class="btn btn-light" type="submit" value="Enregistrer">
        </form>
    <?php
    } ?>
    
    </div>
    </div>

  



    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.js"></script>

  


</body>
</html>

