<?php

function isAdmin()
{
 	return session('admin') == true ? true : false;
}

?>