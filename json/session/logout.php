<?php
    $sid = session_id();
    if ( empty($sid) )
    {
        session_start();
    }
    session_unset();
    session_destroy();
    
    header('Location: /admin');
?> 