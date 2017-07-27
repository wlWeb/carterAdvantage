<?php

  function find_all_messages() {
    global $db;

    $sql = "SELECT * FROM messages ";
    $sql .= "ORDER BY id DESC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }

  function find_all_jobs() {
    global $db;

    $sql = "SELECT * FROM jobs ";
    $sql .= "ORDER BY id ASC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }

  function find_three_jobs() {
    global $db;

    $sql = "SELECT * FROM jobs ";
    $sql .= "ORDER BY id DESC ";
    $sql .= "LIMIT 3";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }

    

  function find_job_by_id($id) {
    global $db;

    $sql = "SELECT * FROM jobs ";
    $sql .= "WHERE id='" . $id . "'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $job = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $job; // returns an assoc. array
  }  


function insert_message($message) {
    global $db;

    $sql = "INSERT INTO messages ";
    $sql .= "(name, email, subject, message) ";
    $sql .= "VALUES (";
    $sql .= "'" . db_escape($db,$message['name']) . "',";
    $sql .= "'" . db_escape($db,$message['email']) . "',";
    $sql .= "'" . db_escape($db,$message['subject']) . "',";
    $sql .= "'" . db_escape($db,$message['message']) . "'";
    $sql .= ")";
    $result = mysqli_query($db, $sql);
    if($result) {
        return true;
    } else {
        echo mysqli_error($db);
        db_disconnect($db);
        redirect_to('contact.php');
    }
}

  function delete_message($id) {
    global $db;

    $sql = "DELETE FROM messages ";
    $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);

    // For DELETE statements, $result is true/false
    if($result) {
      return true;
    } else {
      // DELETE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

  function insert_job($job) {
    global $db;

    $sql = "INSERT INTO jobs ";
    $sql .= "(name, class, type, location, description, date) ";
    $sql .= "VALUES (";
    $sql .= "'" . db_escape($db,$job['name']) . "',";
    $sql .= "'" . db_escape($db,$job['class']) . "',";
    $sql .= "'" . db_escape($db,$job['type']) . "',";
    $sql .= "'" . db_escape($db,$job['location']) . "',";
    $sql .= "'" . db_escape($db,$job['description']) . "',";
    $sql .= "'" . db_escape($db,$job['date']) . "'";
    $sql .= ")";
    $result = mysqli_query($db, $sql);
    // For INSERT statements, $result is true/false
    if($result) {
      return true;
    } else {
      // INSERT failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }   

function insert_application($application) {
    global $db;
    global $job;
    global $errors;

    $errid = $job['id']; 

    $sql = "INSERT INTO applications ";
    $sql .= "(name, job, phone, email, comment, resume) ";
    $sql .= "VALUES (";
    $sql .= "'" . db_escape($db,$application['name']) . "',";
    $sql .= "'" . db_escape($db,$application['job']) . "',";
    $sql .= "'" . db_escape($db,$application['phone']) . "',";
    $sql .= "'" . db_escape($db,$application['email']) . "',";
    $sql .= "'" . db_escape($db,$application['comment']) . "',";
    $sql .= "'" . db_escape($db,$application['resume']) . "'";
    $sql .= ")";
    $result = mysqli_query($db, $sql);
    if($errors) {
        db_disconnect($db);
        redirect_to("../erfiletype.php?id=$errid");
    }else if($result) {
        return true;
    } else {
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}

  function find_all_applications() {
    global $db;

    $sql = "SELECT * FROM applications ";
    $sql .= "ORDER BY id ASC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }
  
  function find_all_admin() {
    global $db;

    $sql = "SELECT * FROM admins ";
    $sql .= "ORDER BY last_name ASC, first_name ASC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }

  function find_admin_by_id($id) {
    global $db;

    $sql = "SELECT * FROM admins ";
    $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $admin = mysqli_fetch_assoc($result); // find first
    mysqli_free_result($result);
    return $admin; // returns an assoc. array
  }

  function find_admin_by_username($username) {
    global $db;

    $sql = "SELECT * FROM admins ";
    $sql .= "WHERE username='" . db_escape($db, $username) . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $admin = mysqli_fetch_assoc($result); // find first
    mysqli_free_result($result);
    return $admin; // returns an assoc. array
  }
 



  function validate_admin($admin) {
    if(is_blank($admin['first_name'])) {
      $errors[] = "First name cannot be blank.";
    } elseif (!has_length($admin['first_name'], array('min' => 2, 'max' => 255 ))) {
      $errors[] = "First name must be between 2 and 255 characters.";
    }

    if(is_blank($admin['last_name'])) {
      $errors[] = "Last name cannot be blank.";
    } elseif (!has_length($admin['last_name'], array('min' => 2, 'max' => 255 ))) {
      $errors[] = "Last name must be between 2 and 255 characters.";
    }

    if(is_blank($admin['email'])) {
      $errors[] = "Email cannot be blank.";
    } elseif (!has_length($admin['last_name'], array('max' => 255 ))) {
      $errors[] = "Email ust be less than 255 characters.";
    } elseif (!has_valid_email_format($admin['email'])) {
      $errors[] = "Email must be a valid format.";
    }

    if(is_blank($admin['username'])) {
      $errors[] = "username cannot be blank.";
    } elseif(!has_length($admin['username'], array('min' => 6, 'max' => 255))) {
      $errors[] = "Username must be between 6 and 255 charaacters.";
    } elseif(!has_unique_username($admin['username'], $admin['id'] ?? 0)) {
      $errors[] = "username not allowed. Try another.";
    }

    if(is_blank($admin['password'])) {
      $errors[] = "Password cannot be blank.";
    } elseif (!has_length($admin['password'], array('min' => 10))) {
      $errors[] = "Password must contain 10 or more characters";
    } elseif(!preg_match('/[A-Z]/', $admin['password'])) {
      $errors[] = "Password must contain at least 1 uppercase letter";
    } elseif(!preg_match('/[a-z]/', $admin['password'])) {
      $errors[] = "Password must contain at least 1 lowercase letter"; 
    } elseif(!preg_match('/[0-9]/', $admin['password'])) {
      $errors[] = "Password must contain at least 1 number";
    } elseif(!preg_match('/[^A-Za-z0-9\s]/', $admin['password'])) {
      $errors[] = "Password must contain at least 1 symbol";
    }

    if(is_blank($admin['confirm_password'])) {
      $errors[] = "Confrim password cannot be blank.";
    } elseif ($admin['password'] !== $admin['confirm_password']) {
      $errors[] = "Password and confirm password must match.";
    }

    return $errors;
  }


function insert_admin($admin) {
    global $db;

    $errors = validate_admin($admin);
    if (!empty($errors)) {
      return $errors;
    }

    $hashed_password = password_hash($admin['password'], PASSWORD_BCRYPT);

    $sql = "INSERT INTO admins ";
    $sql .= "(first_name, last_name, email, username, hashed_password) ";
    $sql .= "VALUES (";
    $sql .= "'" . db_escape($db, $admin['first_name']) . "',";
    $sql .= "'" . db_escape($db, $admin['last_name']) . "',";
    $sql .= "'" . db_escape($db, $admin['email']) . "',";
    $sql .= "'" . db_escape($db, $admin['username']) . "',";
    $sql .= "'" . db_escape($db, $hashed_password) . "'";
    $sql .= ")";
    $result = mysqli_query($db, $sql);

    // For INSERT statements, $result is true/false
    if($result) {
      return true;
    } else {
      // INSERT failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }


  function delete_admin($admin) {
    global $db;

    $sql = "DELETE FROM admins ";
    $sql .= "WHERE id='" . db_escape($db, $admin['id']) . "' ";
    $sql .= "LIMIT 1;";
    $result = mysqli_query($db, $sql);

    // For DELETE statements, $result is true/false
    if($result) {
      return true;
    } else {
      // DELETE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }
  
?>