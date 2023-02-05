<?php
session_start();
require_once ('functions/page_loader.php');
if(!isset($_GET['page'])) {
    page_loader("index");
}
else {
    page_loader($_GET['page']);
}