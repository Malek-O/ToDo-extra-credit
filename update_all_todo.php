<?php 
// Iterate through a list of ids of the todo items
function mark__all_as_done() {
    $update_statement = $GLOBALS['conn']->prepare("UPDATE tasks SET done = 1 ");
        if($update_statement) {
            if (!$update_statement->execute()) {
                print_r('Error executing MySQL update statement: ' . $update_statement->error);
                return;
            }
            // close the prepared statement
            $update_statement->close();
        }
}
?>

