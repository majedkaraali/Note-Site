<html lang="en">
<head>
   
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"  href="..\res\css\dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>important</title>


</head>


<body>
    <?php
    require('menu.php');

    ?>

    <div class="board">
        <div class="head-box">
            <h1>Important Tasks</h1>
            <hr>
        </div>

   

     <table class="task" >
        <thead>             
            <tr>
                <th>TASK</th>
                <th>STATUS</th>
            </tr>
        </thead>

     

        <?php
        $user_id = $_SESSION['user_id'];
        
      
        $qr = "SELECT * FROM common_tasks WHERE user_id = $user_id AND (important = '1' OR list_tag = 'important') AND status != 'done'";

        $qr_run=get_record("common_tasks",$qr);
        
        if (mysqli_num_rows($qr_run)>0){
           foreach ($qr_run as $val){
            
            ?>
            <tr>
            <td><?=$val['task_name'] ?></td>
            <td><?=$val['status'] ?></td>
            <td><button id="done_btn" class="done" onclick="complete_task(<?=$val['task_id']?>)">Done</button></td>
            
   
            </tr>


            <?php
           }
        }

        ?>
         </table>


    <div class="n_task">

        <form class="form_2" action="../php/insert.php" method="post" onsubmit="submitForm(event)">
            <label for="tname">Task</label>
            <input type="text" id="tname" name="tname" required>
            <br>
            <input type="hidden" name="tlist" value="important">
            <input class='send' type="submit" value="Add task">
            
        </form>

        
    </div>

    

    
 

</div>


</body>

<?php
require('scripts.php');
?>



