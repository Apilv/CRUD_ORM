<?php
require "bootstrap.php";

$projects = $entityManager->getRepository('Projects')->findAll();
$employees = $entityManager->getRepository('Employees')->findAll();

$projects_headers = $entityManager->getClassMetadata('Projects')->getColumnNames();
$employees_headers = $entityManager->getClassMetadata('Employees')->getColumnNames();
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
                foreach ($projects_headers as $th) {
                    echo "<th>$th</th>";
                } ?>
            </tr>
            <?php
            foreach ($projects as $values) {
                echo "<tr>
                        <td>" . $values->getId() . "</td>
                        <td>" . $values->getName() . "</td>
                        <td>" . $values->getDeadline() . "</td>
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
                        <td>" . $values->getProjectId() . "</td>
                    </tr>";
                    }

                }
            ?>
        </table>

    </main>
</body>

</html>