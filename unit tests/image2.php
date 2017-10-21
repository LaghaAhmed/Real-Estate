<?php
    /*
     *
     * @ Multiple File upload script.
     *
     * @ Can do any number of file uploads
     * @ Just set the variables below and away you go
     *
     * @ Author: Kevin Waterson
     *
     * @copywrite 2008 PHPRO.ORG
     *
     */

    error_reporting(E_ALL);
 
    /*** the upload directory ***/
    $upload_dir= './uploads';

    /*** numver of files to upload ***/
    $num_uploads = 5;

    /*** maximum filesize allowed in bytes ***/
    $max_file_size  = 51200;
 
    /*** the maximum filesize from php.ini ***/
    $ini_max = str_replace('M', '', ini_get('upload_max_filesize'));
    $upload_max = $ini_max * 1024;

    /*** a message for users ***/
    $msg = 'Please select files for uploading';

    /*** an array to hold messages ***/
    $messages = array();

    /*** check if a file has been submitted ***/
    if(isset($_FILES['userfile']['tmp_name']))
    {
        /** loop through the array of files ***/
        for($i=0; $i < count($_FILES['userfile']['tmp_name']);$i++)
        {
            // check if there is a file in the array
            if(!is_uploaded_file($_FILES['userfile']['tmp_name'][$i]))
            {
                $messages[] = 'No file uploaded';
            }
            /*** check if the file is less then the max php.ini size ***/
            elseif($_FILES['userfile']['size'][$i] > $upload_max)
            {
                $messages[] = "File size exceeds $upload_max php.ini limit";
            }
            // check the file is less than the maximum file size
            elseif($_FILES['userfile']['size'][$i] > $max_file_size)
            {
                $messages[] = "File size exceeds $max_file_size limit";
            }
            else
            {
                // copy the file to the specified dir 
                if(@copy($_FILES['userfile']['tmp_name'][$i],$upload_dir.'/'.$_FILES['userfile']['name'][$i]))
                {
                    /*** give praise and thanks to the php gods ***/
                    $messages[] = $_FILES['userfile']['name'][$i].' uploaded';
                }
                else
                {
                    /*** an error message ***/
                    $messages[] = 'Uploading '.$_FILES['userfile']['name'][$i].' Failed';
                }
            }
        }
    }
?>
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
 <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
 <head>
 <title>Multiple File Upload</title>
 </head>

 <body>
 
 <h3><?php echo $msg; ?></h3>
 <p>
 <?php
    if(sizeof($messages) != 0)
    {
        foreach($messages as $err)
        {
            echo $err.'<br />';
        }
    }
 ?>
 </p>
 <form enctype="multipart/form-data" action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="post">
 <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $max_file_size; ?>" />
 <?php
    $num = 0;
    while($num < $num_uploads)
    {
        echo '<div><input name="userfile[]" type="file" /></div>';
        $num++;
    }
 ?>

 <input type="submit" value="Upload" />
 </form>

 </body>
 </html>