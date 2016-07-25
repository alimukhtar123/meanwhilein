<?php

session_start();
session_destroy();

header('Location: csc343.php');