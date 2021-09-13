<?php

function permission($session){
    $logged_user = $session;
    if(logged_user == FALSE){
        return FALSE;
    }
    return $logged_user;
}