<?php
require "bootstrap.php";
require "update_logic/delete_row.php";
require "update_logic/add_row.php";
require "update_logic/edit_row.php";

$projects = $entityManager->getRepository('Projects')->findAll();
$employees = $entityManager->getRepository('Employees')->findAll();

$projects_headers = $entityManager->getClassMetadata('Projects')->getColumnNames();
$employees_headers = $entityManager->getClassMetadata('Employees')->getColumnNames();

$max_employee_id = max($employees)->getId();

$max_Project_id = max($projects)->getId();
$min_Project_id = min($projects)->getId();

        //------------HELPER FUNCTIONS-------------




function teamMembers($query)
{

    if (empty($query)) {
        return "-";
    }
    $squad = "";
    foreach ($query as $name) {
        foreach ($name as $value) {
            $squad .= "$value, ";
        }
    }
    return substr($squad, 0, -2);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <title>CRUD Aplication</title>
</head>

<body>
    <header>
        <h1>Projects Manager</h1>
        <a href="index.php?projects">Projects</a>
        <a href="index.php?employees">Employees</a>
    </header>
    <main>
        <table>
            <?php ob_start(); ?>
            <tr>
                <?php
                $column_count = 0;
                foreach ($projects_headers as $th) {
                    $column_count++;
                    echo "<th>$th</th>";
                    if ($column_count === 3) {
                        echo "<th>Team</th>
                              <th>Update</th>";
                    } else {
                        continue;
                    }
                } ?>
            </tr>
            <?php
            foreach ($projects as $values) {
                $id = $values->getid();
                $query = $entityManager->createQuery("SELECT u.name FROM Employees u WHERE u.project_id = $id GROUP BY u.id")->getResult();

                $project_name = $values->getName();
                $project_deadline = $values->getDeadline();

                echo "<tr>
                        <td>" . $values->getId() . "</td>
                        <td>" . $values->getName() . "</td>
                        <td>" . $values->getDeadline() . "</td>
                        <td>" . teamMembers($query) . "</td>
                        <td><a href=\"index.php?editProject=$id&projectName=$project_name&projectDeadline=$project_deadline\">Edit</a>
                            <a href=\"index.php?addProject=$projects\">Add</a>
                            <a href=\"index.php?deleteProjects=$id\">Delete</a>
                        </td>
                    </tr>";
            }
            ?>
            <?php
            if ((isset($_GET["employees"]) || isset($_GET["editEmployee"]))                                 ||
                (isset($_GET["deleteEmployees"]) || isset($_GET["addEmployee"]))
            ) {
                ob_clean(); ?>
                <tr>
                    <?php
                    foreach ($employees_headers as $th) {
                        echo "<th>$th</th>";
                    }
                    echo  "<th>Update</th>";
                    ?>
                </tr>
            <?php
                foreach ($employees as $values) {
                    $employee_id = $values->getid();
                    $employee_name = $values->getName();
                    $project_id = $values->getProjectId();
                    echo "<tr>
                        <td>" . $values->getId() . "</td>
                        <td>" . $values->getName() . "</td>
                        <td>" . $values->getProjectId() . "</td>
                        <td><a href=\"index.php?editEmployee=$employee_id&employeeName=$employee_name&projectId=$project_id\">Edit</a>
                            <a href=\"index.php?addEmployee=$employees\">Add</a>
                            <a href=\"index.php?deleteEmployees=$employee_id\">Delete<a>
                        </td>
                    </tr>";
                }
            }
            ?>
        </table>
        <?= addNewEmployee();
        addNewProject();
        editEmployee();
        editProject();
?>
    </main>
</body>

</html>