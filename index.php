<?php
require "bootstrap.php";

$projects = $entityManager->getRepository('Projects')->findAll();
$employees = $entityManager->getRepository('Employees')->findAll();

$projects_headers = $entityManager->getClassMetadata('Projects')->getColumnNames();
$employees_headers = $entityManager->getClassMetadata('Employees')->getColumnNames();
?>