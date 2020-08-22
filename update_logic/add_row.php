<?php

function addNewEmployee()
{
  if (isset($_GET["addEmployee"])) {
    global $max_employee_id, $min_Project_id, $max_Project_id;
    $max_employee_id++;
    echo
      '<form action="index.php?employees" method="post">
      Employee id<br>
      <input type="number" value="' . $max_employee_id . '" name="employeeId" readonly><br>
      Employee Name<br>
      <input type="text" name="employeeName" required><br>
      Project ID<br>
      <input type="number" name="projectId" min="' . $min_Project_id . '" max="' . $max_Project_id . '"><br>
      <input type="submit" name="addNewEmployee" value="Add"><br>
    </form>';
  }
}


function addNewProject()
{
  if (isset($_GET["addProject"])) {
    global  $max_Project_id;
    $max_Project_id++;
    echo
      '<form action="index.php?projects" method="post">
      Project id<br>
      <input type="number" value="' . $max_Project_id . '" name="projectId" readonly><br>
      Project Name<br>
      <input type="text" name="projectName" required><br>
      Deadline<br>
      <input type="date" name="projectDeadline" min="' . date("Y-m-d") . '" required><br>
      <input type="submit" name="addNewProject" value="Add"><br>
    </form>';
  }
}
