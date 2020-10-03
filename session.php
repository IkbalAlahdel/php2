<?php
//session_id
function session_valid_id($session_id)
{
    return preg_match('/^[-,a-zA-Z0-9]{1,128}$/', $session_id) > 0;
}

?>

<?php
//session_is_registered

$test = 'Here';
session_register('test');
?>

It is better :

<?php
$_SESSION['test'] = 'Here';
?>

//session_regenerate_id
<?php
//session_regenerate_id

// NOTE: This code is not fully working code, but an example!

session_start();

// Check destroyed time-stamp
if (isset($_SESSION['destroyed'])
    && $_SESSION['destroyed'] < time() - 300) {
    // Should not happen usually. This could be attack or due to unstable network.
    // Remove all authentication status of this users session.
    remove_all_authentication_flag_from_active_sessions($_SESSION['userid']);
    throw(new DestroyedSessionAccessException);
}

$old_sessionid = session_id();

// Set destroyed timestamp
$_SESSION['destroyed'] = time(); // Since PHP 7.0.0 and up, session_regenerate_id() saves old session data

// Simply calling session_regenerate_id() may result in lost session, etc.
// See next example.
session_regenerate_id();

// New session does not need destroyed timestamp
unset($_SESSION['destroyed']);

$new_sessionid = session_id();

echo "Old Session: $old_sessionid<br />";
echo "New Session: $new_sessionid<br />";

print_r($_SESSION);
?>


<?php
//session_abort:1

    // First of all choose your path , For e.g. C:/session
    session_save_path('Your Path here !');
   
    session_start();
   
    // Define a Session Variable
    $_SESSION['Key'] = 'value' ;
   
    Var_dump(session_status() == PHP_SESSION_ACTIVE);
   
    // Output : bool(True) , it means you have an open session !
?>

Then you should execute this code :

<?php
//session_abort:2

    // Choose the path that you used it in first part 
    session_save_path('Your path here');
   
    session_start();
   
    // If you want to close session and keep your original data in your path , you should use session_abort()
    session_abort();
   
    var_dump(session_status()== PHP_SESSION_ACTIVE);
   
    // Output : bool(False) , it means your session closed .
?>

