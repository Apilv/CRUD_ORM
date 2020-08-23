<?php

function editEmployee()
{
    if (isset($_GET["editEmployee"])) {
        global  $project_id, $min_Project_id, $max_Project_id;
        $employee_id = $_GET["editEmployee"];
        $employee_name = $_GET["employeeName"];
        $project_id = $_GET["projectId"];
        echo
            '<form action="index.php?employees" method="post">
                Employee id<br>
                <input type="number" value="' . $employee_id . '" name="employeeId" readonly><br>
                Employee Name<br>
                <input type="text" name="employeeName" value="' . $employee_name . '"><br>
                Project ID<br>
                <input type="number" name="projectId" value="' . $project_id . '" min="' . $min_Project_id . '" max="' . $max_Project_id . '"><br>
                <input type="submit" name="editEmployee" value="Submit"><br>
            </form>';
    }
}

if (isset($_POST["editEmployee"])) {

    $editEmployee = $_POST['employeeId'];
    $employees = $entityManager->getRepository('Employees')->findAll();
    $employee = $entityManager->find('Employees', $editEmployee);

    $employee_name = ($_POST["employeeName"]);
    $project_id = ($_POST["projectId"]);
    
    $employee->setName($employee_name);
    $employee->setProjectId($project_id);
    $entityManager->flush();

}



function editProject()
{
    if (isset($_GET["editProject"])) {

        $project_id = $_GET["editProject"];
        $project_name = $_GET["projectName"];
        $project_deadline = $_GET["projectDeadline"];

        echo
            '<form action="index.php?projects" method="post">
                Project id<br>
                <input type="number" value="' . $project_id . '" name="projectId" readonly><br>
                Project Name<br>
                <input type="text" name="projectName" value="' . $project_name . '" required><br>
                Deadline<br>
                <input type="date" name="projectDeadline" value="' . $project_deadline . '" min="' . date("Y-m-d") . '" required><br>
                <input type="submit" name="editProject" value="Submit"><br>
            </form>';
    }
}


if (isset($_POST["editEmployee"])) {

    $editEmployee = $_POST['employeeId'];
    $employees = $entityManager->getRepository('Employees')->findAll();
    $employee = $entityManager->find('Employees', $editEmployee);

    $employee_name = ($_POST["employeeName"]);
    $project_id = ($_POST["projectId"]);

    $employee->setName($employee_name);
    $employee->setProjectId($project_id);
    $entityManager->flush();
}
