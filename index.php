<?php
require "bootstrap.php";

$projects = $entityManager->getRepository('Projects')->findAll();
$employees = $entityManager->getRepository('Employees')->findAll();

$projects_headers = $entityManager->getClassMetadata('Projects')->getColumnNames();
$employees_headers = $entityManager->getClassMetadata('Employees')->getColumnNames();



function teamMembers($query){
    if(empty($query)){
        return "-";
    }
    $squad = "";
    foreach ($query as $name) {
        foreach ($name as $value) {
            $squad .= "$value, ";
        }
    }       
    return substr($squad, 0,-2);
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
                        echo "<th>Team</th>";
                    } else {
                        continue;
                    }
                } ?>
            </tr>
            <?php
            foreach ($projects as $values) {
                $id = $values->getid();
                $query = $entityManager->createQuery("SELECT u.name FROM Employees u WHERE u.project_id = $id GROUP BY u.id")->getResult();
                echo "<tr>
                        <td>" . $values->getId() . "</td>
                        <td>" . $values->getName() . "</td>
                        <td>" . $values->getDeadline() . "</td>
                        <td>" . teamMembers($query) . "</td>
                    </tr>";
            }
            ?>
            <?php
            if (isset($_GET["employees"])) {
                ob_clean(); ?>
                <tr>
                    <?php
                    foreach ($employees_headers as $th) {
                        echo "<th>$th</th>";
                    }
                    ?>
                </tr>
            <?php
                foreach ($employees as $values) {
                    echo "<tr>
                        <td>" . $values->getId() . "</td>
                        <td>" . $values->getName() . "</td>
                        <td>" . $values->getProject() . "</td>
                        <td>" . $values->getProjectId() . "</td>
                    </tr>";
                }
            }
            ?>
        </table>

    </main>
</body>

</html>