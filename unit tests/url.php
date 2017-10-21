<?php
if ( isset($_FILES['file']) ) {
    $filename = basename($_FILES['file']['name']);
    $error = true;

    // Only upload if on my home win dev machine
    if ( isset($_SERVER['WINDIR']) ) {
        $path = 'uploads/'.$filename;
        $error = !move_uploaded_file($_FILES['file']['tmp_name'], $path);
    }

    $rsp = array(
        'error' => $error, // Used in JS
        'filename' => $filename,
        'filepath' => '/tests/uploads/' . $filename, // Web accessible
    );
    echo json_encode($rsp);
    exit;
}
?>