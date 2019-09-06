<?php

function isAdmin()
{
 	return session('admin') == true ? true : false;
}

function isClient()
{
 	return session('client') == true ? true : false;
}

function userSession()
{
 	return session('user');
}

?>