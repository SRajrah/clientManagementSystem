<?php
    //functions.php
    //clean the form data to prevent injections
    /*
    trim()
    stripslashes()
    htmlspecialchars()
    strip_tags()
    str_replace()
    */
    function validate($formData)
    {
        $formData = trim(stripslashes(htmlspecialchars(strip_tags(str_replace(array('(',')'),'',$formData)),ENT_QUOTES )));
        return $formData;
    }

?>