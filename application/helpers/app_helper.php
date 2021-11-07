<?php

function hashEncrypt($input){

	$hash = password_hash($input, PASSWORD_DEFAULT);
	
	return $hash;
}
	
function hashEncryptVerify($input, $hash){
	
	if(password_verify($input, $hash)){
	  return true;
	}else{
	  return false;
	}
}

function is_login($is_true = false)
{
    $CI =& get_instance();
    if (!@$CI->session->is_login && !$is_true) {
        redirect('auth');
    } elseif ($CI->session->is_login && $is_true) {
        redirect('app');
    }

    return;
}
	
function is_admin()
{
	$CI =& get_instance();
	
	if($CI->session->userdata('role_id') != 1){
		redirect('errors');
	}
}