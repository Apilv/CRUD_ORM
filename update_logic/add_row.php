<?php

function addNewEmployee()
{
  global $min_Project_id, $max_Project_id;

  if (isset($_GET["addEmployee"])) {
    echo
      '<form action="index.php?employees" method="post">
          Employee Name<br>
          <input type="text" name="employeeName" required><br>
          Project ID<br>
          <input type="number" name="projectId" min="' . $min_Project_id . '" max="' . $max_Project_id . '"><br>
          <input type="submit" name="addNewEmployee" value="Add"><br>
      </form>';
  }
}

if ($_POST["addNewEmployee"]) {

  $employee_name = ($_POST["employeeName"]);
  $project_id = ($_POST["projectId"]);

  $new_employee = new Employees();
  $new_employee->setName($employee_name);
  $new_employee->setProjectId($project_id);
  $entityManager->persist($new_employee);
  $entityManager->flush();
}



function addNewProject()
{
  if (isset($_GET["addProject"])) {
    echo
      '<form action="index.php?projects" method="post">
          Project Name<br>
          <input type="text" name="projectName" required><br>
          Deadline<br>
          <input type="date" name="projectDeadline" min="' . date("Y-m-d") . '" required><br>
          <input type="submit" name="addNewProject" value="Add"><br>
      </form>';
  }
}

if ($_POST["addNewProject"]) {
  
  $project_name = ($_POST["projectName"]);
  $project_deadline = ($_POST["projectDeadline"]);

  $new_project = new Projects();
  $new_project->setName($project_name);
  $new_project->setDeadline($project_deadline);
  $entityManager->persist($new_project);
  $entityManager->flush();
}

