<?php 
function get_all_todos()
{
    $selectedVal = null;
    if(isset($_POST['selectedOption'])){
        $selectedVal = $_POST['selectedOption'];
    }
    if($selectedVal == "today"){
         $get_all_tasks_query = "SELECT * FROM tasks WHERE DATE(createdAt) = CURDATE() AND done = 0;";
       
     $response = $GLOBALS['conn']->query($get_all_tasks_query);
    if ($response && $response->num_rows > 0) {
        echo '<ul id="my-list">';
        while ($row = $response->fetch_array()) {
            echo "<li>".'<input type="checkbox" name="checkBoxList[]" value="'.$row["id"].'"><span>'.$row["task"]."</span></li>";
        }
        echo '</ul>';
    } else {
        echo '<h2>Your ToDo list is empty!</h2>';
    }
    }else if($selectedVal == "lastweek"){
        
    $get_all_tasks_query = "SELECT * FROM tasks WHERE YEARWEEK(createdAt, 1) = YEARWEEK(CURDATE() - INTERVAL 1 WEEK, 1) AND done = 0;";
    $response = $GLOBALS['conn']->query($get_all_tasks_query);
    if ($response && $response->num_rows > 0) {
        echo '<ul id="my-list">';
        while ($row = $response->fetch_array()) {
            echo "<li>".'<input type="checkbox" name="checkBoxList[]" value="'.$row["id"].'"><span>'.$row["task"]."</span></li>";
        }
        echo '</ul>';
    } else {
        echo '<h2>Your ToDo list is empty!</h2>';
    }
    }else{
        $get_all_tasks_query = "SELECT id, task, createdAt, done FROM tasks WHERE done = 0;";
    $response = $GLOBALS['conn']->query($get_all_tasks_query);
    if ($response && $response->num_rows > 0) {
        echo '<ul id="my-list">';
        while ($row = $response->fetch_array()) {
            echo "<li>".'<input type="checkbox" name="checkBoxList[]" value="'.$row["id"].'"><span>'.$row["task"]."</span></li>";
        }
        echo '</ul>';
    } else {
        echo '<h2>Your ToDo list is empty!</h2>';
    }

    }
    
}
?>