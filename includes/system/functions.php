<?php
include_once 'psl-config.php';

function get_current_time($mysqli) {

    if ($stmt = $mysqli->prepare("SELECT UNIX_TIMESTAMP()")) {
		
		$stmt->execute();    // Execute the prepared query.
        $stmt->store_result();
		
		$stmt->bind_result($time);
        $stmt->fetch();
		
		return $time;
	}
	
	return 0;
}
 
function sec_session_start() {
    $session_name = 'sec_session_id';   // Set a custom session name
    $secure = SECURE;
    // This stops JavaScript being able to access the session id.
    $httponly = true;
    // Forces sessions to only use cookies.
    if (ini_set('session.use_only_cookies', 1) === FALSE) {
        header("Location: ../error.php?err=Could not initiate a safe session (ini_set)");
        exit();
    }
    // Gets current cookies params.
    $cookieParams = session_get_cookie_params();
    session_set_cookie_params($cookieParams["lifetime"],
        $cookieParams["path"], 
        $cookieParams["domain"], 
        $secure,
        $httponly);
    // Sets the session name to the one set above.
    session_name($session_name);
    session_start();            // Start the PHP session 
    session_regenerate_id();    // regenerated the session, delete the old one. 
}

function login($email, $password, $mysqli) {

    // Using prepared statements means that SQL injection is not possible. 
    if ($stmt = $mysqli->prepare(" SELECT members.id, members.name, surname, 
										password, salt, role_id
		  FROM members
		 WHERE email = ?
	     LIMIT 1")) {
		 
		  
        $stmt->bind_param('s', $email);  // Bind "$email" to parameter.
        $stmt->execute();    // Execute the prepared query.
        $stmt->store_result();
 
		$group_id = 1;
		$group_name = "SI241";
 
        // get variables from result.
        $stmt->bind_result($user_id,$name,$surname, $db_password, $salt, $role_id);
        $stmt->fetch();
	
        // hash the password with the unique salt.
        $password = hash('sha512', $password . $salt);
	
        if ($stmt->num_rows == 1) {
            // If the user exists we check if the account is locked
            // from too many login attempts 
            if (checkbrute($user_id, $mysqli) == true) {
                // Account is locked 
                // Send an email to user saying their account is locked
                return false;
            } else {
                // Check if the password in the database matches
                // the password the user submitted.
                if ($db_password == $password) {
                    // Password is correct!
                    // Get the user-agent string of the user.
                    $user_browser = $_SERVER['HTTP_USER_AGENT'];
                    // XSS protection as we might print this value
                    $user_id = preg_replace("/[^0-9]+/", "", $user_id);
                    $_SESSION['user_id'] = $user_id;
                    // XSS protection as we might print this value
                    $username = preg_replace("/[^a-zA-Z0-9_\-]+/", 
                                                                "", 
                                                                $username);
																
					
					 
					$name = preg_replace("/[^a-zA-Z0-9_\-]+/", 
                                                                "", 
                                                                $name);
																
					$_SESSION['name'] = $name;											
																
					$surname = preg_replace("/[^a-zA-Z0-9_\-]+/", 
                                                                "", 
                                                                $surname);
																
					$_SESSION['username'] = "$name $surname";											
																
					$_SESSION['surname'] = $surname;
				   
                    $_SESSION['login_string'] = hash('sha512', 
                              $password . $user_browser);
							  
					$_SESSION['role_id'] = $role_id;		  
					$_SESSION['group_id'] = $group_id;
					
					$group_name = preg_replace("/[^a-zA-Z0-9_\-]+/", 
                                                                "", 
                                                                $group_name);	
					
					$_SESSION['group_name'] = $group_name;
					
                    // Login successful.
					login_successfull($user_id,$mysqli);
			
                    return true;
                } else {
                    // Password is not correct
                    // We record this attempt in the database
                    $time_of_login = time();
									
					$mysqli->query("INSERT INTO _intercessor_a(member_id,transaction_code,field_1)
								VALUES ('$user_id',20,'$time_of_login')");
								
                    return false;
                }
            }
        } else {
            // No user exists.
            return false;
        }
    }
	return false;
}

function login_successfull($user_id, $mysqli)
{
	$time_of_login = time();
	
	$mysqli->query("INSERT INTO _intercessor_a(member_id,transaction_code,field_1)
								VALUES ('$user_id',10,'$time_of_login')");
								
	return true;							
}

function checkbrute($user_id, $mysqli) {
    // Get timestamp of current time 
    $now = time();
 
    // All login attempts are counted from the past 2 hours. 
    $valid_attempts = $now - (2 * 60 * 60);
 
    if ($stmt = $mysqli->prepare("SELECT time 
                             FROM login_attempts 
                             WHERE user_id = ? 
                            AND time > '$valid_attempts'")) {
        $stmt->bind_param('i', $user_id);
 
        // Execute the prepared query. 
        $stmt->execute();
        $stmt->store_result();
 
        // If there have been more than 5 failed logins 
        if ($stmt->num_rows > 5) {
            return true;
        } else {
            return false;
        }
    }
}

function login_check($mysqli) {
    // Check if all session variables are set 

    if (isset($_SESSION['user_id'], 
                        $_SESSION['username'], 
                        $_SESSION['login_string'])) {
 
        $user_id = $_SESSION['user_id'];
		
		
        $login_string = $_SESSION['login_string'];
        $username = $_SESSION['username'];
        // Get the user-agent string of the user.
        $user_browser = $_SERVER['HTTP_USER_AGENT'];

        if ($stmt = $mysqli->prepare("SELECT password 
                                      FROM members 
                                      WHERE id = ? LIMIT 1")) {
            // Bind "$user_id" to parameter. 
            $stmt->bind_param('i', $user_id);
            $stmt->execute();   // Execute the prepared query.
            $stmt->store_result();

            if ($stmt->num_rows == 1) {
                // If the user exists get variables from result.
                $stmt->bind_result($password);
                $stmt->fetch();
                $hashed_password = hash('sha512', $password . $user_browser);
				
                if ($hashed_password == $login_string) {
                    // Logged In!!!! 
                    return true;
                } else {
                    // Not logged in 
                    return false;
                }
            } else {
                // Not logged in 
                return false;
            }
        } else {
            // Not logged in 
            return false;
        }
    } else {
        // Not logged in 
        return false;
    }
	return FALSE;
}

function esc_url($url) {
 
    if ('' == $url) {
        return $url;
    }
 
    $url = preg_replace('|[^a-z0-9-~+_.?#=!&;,/:%@$\|*\'()\\x80-\\xff]|i', '', $url);
 
    $strip = array('%0d', '%0a', '%0D', '%0A');
    $url = (string) $url;
 
    $count = 1;
    while ($count) {
        $url = str_replace($strip, '', $url, $count);
    }
 
    $url = str_replace(';//', '://', $url);
 
    $url = htmlentities($url);
 
    $url = str_replace('&amp;', '&#038;', $url);
    $url = str_replace("'", '&#039;', $url);
 
    if ($url[0] !== '/') {
        // We're only interested in relative links from $_SERVER['PHP_SELF']
        return '';
    } else {
        return $url;
    }
}
function clean_intercessor_b($user_id, $mysqli)
{
	$transaction_code = 280;

	if ($insert_stmt = $mysqli->prepare("INSERT INTO _intercessor_a (member_id, transaction_code) VALUES (?, ?)")) 
	{ 
		
		$insert_stmt->bind_param('ii', $user_id, $transaction_code);
		
		// Execute the prepared query.
		if (!$insert_stmt->execute())
		{
			return FALSE;
		}
		
		return TRUE;
	}
	return FALSE;
}

