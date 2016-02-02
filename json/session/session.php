<?php
    $sid = session_id();
    if ( empty($sid) )
    {
        session_start();
    }
?>
