<?php
/**
 * Author: Jalen Vaughn
 * Date: 11/15/23
 * File: test.php
 * Description:
 */
$page_title = "Video Games in Our Store";
require 'includes/header.php';
require "includes/database.php";
$db = new Database();


$db->runQuery("SELECT * FROM $db->tableGames");

