<?php

require_once('initialize.php');

if(!isset($_GET['id'])) {
  redirect_to('../jobs.php');
}


if(is_post_request()) {

  $id = $_GET['id'];
  $job = [];
  $job = find_job_by_id($id);
  //File handling
  $file = $_FILES['resume'];

  $fileName = $_FILES['resume']['name'];
  $fileTmpName = $_FILES['resume']['tmp_name'];
  $fileSize = $_FILES['resume']['size'];
  $fileError = $_FILES['resume']['error'];
  $fileType = $_FILES['resume']['type'];
  $errors = FALSE;

  $fileExt = explode('.', $fileName);
  $fileActualExt = strtolower(end($fileExt));
  $last = explode(' ', $_POST['name']);

  $allowed = array('doc','docx');

  if (in_array($fileActualExt, $allowed)) {
    if ($fileError === 0) {
      if ($fileSize < 5000000000) {
        $resumeNameNew = strtolower(end($last)) . "_resume." . $fileActualExt;
        $fileDestination = '../applications/' . $resumeNameNew;
        move_uploaded_file($fileTmpName, $fileDestination);
      } else {
        echo "Your file is too large!";
        $errors = TRUE;
      }
    } else {
      $errors = TRUE;
      echo "There was an error uploading your file!";
    }
  } else {
    $errors = TRUE;
    echo "You cannot upload files of this type!";
    redirect_to('../erfiletype.php?id=' . $id);
  }

  // Handle form values sent by apply.php

  $resumeLink = explode("/", $fileDestination);

  $application = [];
  $application['name'] = $_POST['name'];
  $application['job'] = $job['name'] . "/" . $job['location'];
  $application['phone'] = $_POST['phone'];
  $application['email'] = $_POST['email'];
  $application['comment'] = $_POST['comment'];
  $application['resume'] = strtolower(end($resumeLink));
 
 if (!$errors){
      $result = insert_application($application);
  redirect_to('../thankyou.php');
 }


} else {
  redirect_to('../jobs.php');
}

?>