<?php 
session_start();



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
    <div class="col-12">
<img class=" mb-3 logo title" src="img/newTodo.png">
<span class="btn-blue"><a class="btn" href="index.php">Ajouter une tâche</a> </span>
<span class="btn-blue"><a class="btn" href="index.php?killAll">Supprimer toutes mes tâches !</a></span>
</div>
</div>
<div class="row">
    <div class="col-10 offset-1">
<div class="row">
    <div class="col-4 minHeight p-none mt-5 bg-blanc">
    <table class="w-100">
        <thead >
            <th class="tableau">
                <h3>A faire</h3>
            </th>
        </thead>    
        <tbody>
                <?php 
                foreach($_SESSION['task'] as $key => $task){
                    if($_SESSION['task'][$key]['progress']==='A faire'){?>
                    <tr>
                    <td class="tableauContent">
                    <h2><?php echo $task['title'];?></h2>  <br>
                    <?php echo $task['content'];?>  <br>
                    Commencé le : <?php echo $task['date'];?> <br>
                    État : <?php echo $task['progress'];?>  <br>
                    <span class="btn-success btn "><a href="index.php?inProgress=<?php echo $key;?>">J'ai commencé !</a></span>
                    <span class="btn-danger btn"><a href="index.php?delete=<?php echo $key;?>">Supprimer</a></span>
                    <span class="btn-warning btn "><a href="index.php?edit=<?php echo $key;?>">Modifier</a></span>
                    
                    <hr></td> 
                    </tr>
                   
                <?php 
                    }
                } ?>
        </tbody>
    </table> 
</div>
            

<div class="col-4 minHeight p-none mt-5 bg-blanc">
    <table class="w-100 ">
        <thead>
            <th class="tableau">
                <h3>En cours</h3>
            </th>
        </thead>    
        <tbody>
                <?php 
                foreach($_SESSION['task'] as $key => $task){
                    if($_SESSION['task'][$key]['progress']==='En cours'){?>
                    <tr>
                    <td class="tableauContent">
                    <h2><?php echo $task['title'];?></h2>  <br>
                    <?php echo $task['content'];?>  <br>
                    Commencé le : <?php echo $task['date'];?> <br>
                    État :  <?php echo $task['progress'];?>  <br>
                    <span class="btn-success btn "><a href="index.php?done=<?php echo $key;?>">J'ai terminé !</a></span>
                    <span class="btn-danger btn"><a href="index.php?delete=<?php echo $key;?>">Supprimer</a></span>
                    <span class="btn-warning btn"><a href="index.php?edit=<?php echo $key;?>">Modifier</a></span>
                    <hr></td>
                    </tr>
                    
                <?php 
                    }
                } ?>
        </tbody>
    </table>
</div>
<div class="col-4 minHeight p-none mt-5 bg-blanc">
    <table class="w-100">
        <thead>
            <th class="tableau">
                <h3>Terminé</h3>
            </th>
        </thead>    
        <tbody>
                <?php 
                foreach($_SESSION['task'] as $key => $task){
                    if($_SESSION['task'][$key]['progress']==='Terminé'){?>
                    <tr >
                    <td class="tableauContent">
                    <h2><?php echo $task['title'];?></h2>  <br>
                    <?php echo $task['content'];?>  <br>
                    Commencé le : <?php echo $task['date'];?> <br>
                    État : <?php echo $task['progress'];?>  <br>
                    Tâche terminé le : <?php echo $task['done'];?><br>
                    <span class="btn-danger btn"><a href="index.php?delete=<?php echo $key;?>">Supprimer</a></span>
                    <span class="btn-warning btn "> <a href="index.php?edit=<?php echo $key;?>">Modifier</a></span>
                    <hr></td>
                    </tr>
                    
                <?php 
                    }
                } ?>
        </tbody>
    </table> 
</div>
</div>
</div>
            </div>

    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.js"></script>

   
</body>
</html>