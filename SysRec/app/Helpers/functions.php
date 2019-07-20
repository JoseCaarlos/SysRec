<?php

function isAdmin()
{
 	return session('admin') == true ? true : false;
}

function userSession()
{
 	return session('user');
}

?>