<?php
  // Accept a user ID and returns true if user is admin and false if otherwise
  function isAdmin($user_id) {
    global $conn;
    $sql = "SELECT * FROM users WHERE id=? AND role_id =1";
    $user = getSingleRecord($sql, 'i', [$user_id]); // get single user from database
    if (!empty($user)) {
      return true;
    } else {
      return false;
    }
  }

  function isManager($user_id) {
    global $conn;
    $sql = "SELECT * FROM users WHERE id=? AND role_id =2";
    $user = getSingleRecord($sql, 'i', [$user_id]); // get single user from database
    if (!empty($user)) {
      return true;
    } else {
      return false;
    }
  }

  function isAccountant($user_id) {
    global $conn;
    $sql = "SELECT * FROM users WHERE id=? AND role_id =3";
    $user = getSingleRecord($sql, 'i', [$user_id]); // get single user from database
    if (!empty($user)) {
      return true;
    } else {
      return false;
    }
  }

  function loginById($user_id) {
    global $conn;
    $sql = "SELECT u.id, u.role_id, u.username, r.name as role FROM users u LEFT JOIN roles r ON u.role_id=r.id WHERE u.id=? LIMIT 1";
    $user = getSingleRecord($sql, 'i', [$user_id]);

    if (!empty($user)) {
      // put logged in user into session array
      $_SESSION['user'] = $user;
      $_SESSION['success_msg'] = "You are now logged in";
      // redirect to dashboard
        header('location: ' . BASE_URL . 'layout.php');
      
    }
  }

// Accept a user object, validates user and return an array with the error messages
  function validateUser($user, $ignoreFields) {
  		global $conn;
      $errors = [];

     // password check
     if (in_array('signup_btn', $ignoreFields) && isset($user['password']))  {
     
      // Validate password strength
      $string = $user['password'];
      $firstCharacter = $string[0];
      $uppercase = preg_match('@[A-Z]@', $user['password']);
      $lowercase = preg_match('@[a-z]@',$user['password']);
      $number    = preg_match('@[0-9]@', $user['password']);
      $specialChars = preg_match('@[^\w]@', $user['password']);
      $isletter = preg_match('/[a-zA-Z]/', $firstCharacter);
     
      if(!$uppercase){
        $errors['password'] = ' Password must contain an upper-case letter';
      }   
      if(!$lowercase ){
        $errors['password'] = ' Password must contain a lower-case letter';
      }      
      if(!$number){
        $errors['password'] = ' Password must contain at least one number';
      }
      if(!$specialChars){
        $errors['password'] = ' Password must contain a special character';
      }
      if(!$isletter) {
        $errors['password'] = ' Password must start with a letter';
      }
      if(strlen($user['password']) < 8) {
        $errors['password'] = ' Password must be 8 or more characters';
      }
  }
      
      // password confirmation
      if (isset($user['passwordConf']) && ($user['password'] !== $user['passwordConf'])) {
        $errors['passwordConf'] = " The two passwords do not match";
      }
      // if passwordOld was sent, then verify old password
      if (isset($user['passwordOld']) && isset($user['user_id'])) {
        $sql = "SELECT * FROM users WHERE id=? LIMIT 1";
        $oldUser = getSingleRecord($sql, 'i', [$user['user_id']]);
        $prevPasswordHash = $oldUser['password'];
        if (!password_verify($user['passwordOld'], $prevPasswordHash)) {
          $errors['passwordOld'] = " The old password does not match";
        }
      }
      // the email should be unique for each user for cases where we are saving admin user or signing up new user
      if (in_array('save_user', $ignoreFields) || in_array('signup_btn', $ignoreFields)) {
        $sql = "SELECT * FROM users WHERE email=? OR username=? LIMIT 1";
        $oldUser = getSingleRecord($sql, 'ss', [$user['email'], $user['username']]);
        if (!empty($oldUser['email']) && $oldUser['email'] === $user['email']) { // if user exists
          $errors['email'] = " Email address already exists";
        }
        if (!empty($oldUser['username']) && $oldUser['username'] === $user['username']) { // if user exists
          $errors['username'] = " Username already exists";
        }
      }

      // required validation
  	  foreach ($user as $key => $value) {
        if (in_array($key, $ignoreFields)) {
          continue;
        }
  			if (empty($user[$key])) {
  				$errors[$key] = "This field is required";
  			}
  	  }
  		return $errors;
  }
  // upload's user profile profile picture and returns the name of the file
  function uploadProfilePicture()
  {
    // if file was sent from signup form ...
    if (!empty($_FILES) && !empty($_FILES['profile_picture']['name'])) {
        // Get image name
        $profile_picture = date('Y.m.d') . $_FILES['profile_picture']['name'];
        // define Where image will be stored
        $target = "assets/images/" . $profile_picture;
        // upload image to folder
        if (move_uploaded_file($_FILES['profile_picture']['tmp_name'], $target)) {
          return $profile_picture;
          exit();
        }else{
          echo "Failed to upload image";
        }
    }
  }

  function getAccounts(){
    global $conn;
    $sql = "SELECT a.debit, a.credit, a.user_id, a.accountname, a.accountnumber, a.normalside, a.category, a.subcategory, a.balance, a.dateadded, a.statement, a.comment
            FROM chartofaccounts a";
            //WHERE user_id IS NULL ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
   $result = $stmt->get_result();
   $accounts = $result->fetch_all(MYSQLI_ASSOC);
   
   //$accounts = getMultipleRecords($sql, 'i');
   return $accounts;
    }

