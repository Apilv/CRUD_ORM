<?php
if(isset($_GET["deleteEmployees"])){
    $id = $_GET["deleteEmployees"];
        $projects = $entityManager->find("Employees", $id);
        $entityManager->remove($employees);
        $entityManager->flush();
        header('Location: index.php?employees');
} elseif
(isset($_GET["deleteProjects"])) {
    $id = $_GET["deleteProjects"];
    $projects = $entityManager->find("Projects", $id);
    $entityManager->remove($projects);
    $entityManager->flush();
    header('Location: index.php?projects');

}

