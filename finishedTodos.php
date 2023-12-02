<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link type="text/css" rel="stylesheet" href="./style.css">
  <title>finished Todos</title>
</head>
  <body>
    <?php 
    // enable mysql error reporting for debugging only
    // $driver = new mysqli_driver();
    // $driver->report_mode = MYSQLI_REPORT_ALL;
    require_once('./db_connection.php');
    require('./get_finished_todos.php');
   
?>

    <div id="content">
        <nav>
            <a href="./index.php">Todos</a>
            <a href="./finishedTodos.php">Finished Todos</a>
        </nav>
        <h1>Finished Todos</h1>
        <?php get_all_finished_todos();?>
    </div>
  </body>
</html>