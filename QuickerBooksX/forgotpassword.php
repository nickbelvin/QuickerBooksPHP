<?php
  // variable declaration. These variables will be used in the form
  $user_id = 0;
  $question_id = NULL;
  $username = "";
  $sq1 = "";
  $sq2 ="";
  $sq3 ="";
  $a1 ="";
  $a2 ="";
  $a3 ="";
  $password = "";
  $isEditing = false;
  $users = array();
  $errors = array();

  function getAllQuestions(){
    global $conn;
    $sql = "SELECT id, description FROM questions";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    $questions = $result->fetch_all(MYSQLI_ASSOC);
    return $questions;
  }

// ACTION: update user's security questions
if (isset($_POST[''])) { // if user clicked save button ...
    $username = $_SESSION['username'];
    saveQuestions($user_id);
  }

  function saveQuestions($user_id) {
    global $conn, $errors, $username, $sq1, $sq2, $sq3, $a1, $a2, $a3, $isEditing;
    $errors = validateUser($_POST, ['save_qtn']);
    // receive all input values from the form
    $sq1 = $_POST['sq1'];
    $sq2 = $_POST['sq2'];
    $sq3 = $_POST['sq3'];
    $a1 = password_hash($_POST['a1'], PASSWORD_DEFAULT); 
    $a2 = password_hash($_POST['a2'], PASSWORD_DEFAULT); 
    $a3 = password_hash($_POST['a3'], PASSWORD_DEFAULT); 
        
    if (count($errors) === 0) {
    
      $sql = "UPDATE users SET sq1=?, sq2=?, sq3=?, a1=?, a2=?, a3=? WHERE username=?";
      $result = modifyRecord($sql, 'iiissss', [$sq1, $sq2, $sq3, $a1, $a2, $a3, $username]);
    
      if ($result) {
        $_SESSION['success_msg'] = "Security questions successfully updated";
        header('location: index.php');
        exit(0);
      }
    } else {
      // continue editting if there were errors
      $isEditing = true;
    }
    }