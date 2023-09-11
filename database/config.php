<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "g2_store");

if (mysqli_connect_errno()) {
  echo "Connection failed: " . mysqli_connect_error();
  exit();
} else {
  //echo "Connection successful";
}
