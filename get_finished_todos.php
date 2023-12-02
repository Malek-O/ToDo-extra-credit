<?php 
function get_all_finished_todos()
{
    $get_all_tasks_query = "SELECT id, task, createdAt, done FROM tasks WHERE done > 0;";
    $response = $GLOBALS['conn']->query($get_all_tasks_query);
    if ($response && $response->num_rows > 0) {
        echo '<ul id="my-list">';
        while ($row = $response->fetch_array()) {
            echo "<li>".'<span>'.$row["task"]."</span></li>";
        }
        echo '</ul>';
    } else {
        echo '<h2>Your ToDo list is empty!</h2>';
    }
}
?>