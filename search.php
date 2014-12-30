<?php
require_once 'configs'.DIRECTORY_SEPARATOR.'config.inc.php';
require_once 'configs'.DS.'core.inc.php';
 
require_once VIEW_PATH.'common'.DS.'header.php';
require_once VIEW_PATH.'common'.DS.'navbar.php';
?>
<?php
require_once VIEW_PATH.'search.view.php';

// Check if Cancel button pressed
if (isset($_POST['btnCancel'])) {
    redirect_to('index.php');
    exit();
}

// Initialize variables
$keyword = null;

// Check for postback
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $keyword = $_POST['keyword'];
    

    // Get matching posts
    $posts = post_search($keyword);

    // Reset variable
    $keyword = null;

    // Display matching posts
    post_display_all($posts);
}

// footer
require_once VIEW_PATH.'common'.DS.'footer.php';
?>
