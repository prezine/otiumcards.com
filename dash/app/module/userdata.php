<?php
	$userID = $otium->getSession('userID');
	$userdata = $user->userData($userID);
	$name = ($userdata['name']) ?? null ;
	@list($fn, $ln) = explode(" ", $name);
	$email = ($userdata['email']) ?? null ;
	$password = ($userdata['password']) ?? null ;
	$gender = ($userdata['gender']) ?? null ;
	$phone = ($userdata['phone']) ?? null ;
	$dob = ($userdata['dob']) ?? null ;
	$nick = ($userdata['nick']) ?? null ;
	$dp = 'https://ui-avatars.com/api/?name='.$name.'&background=03045E&color=fff&rounded=true&bold=true';
	$country = ($userdata['country']) ?? null ;
	$state = ($userdata['state']) ?? null ;
	$country = ($userdata['country']) ?? null ;
	$is_paid = ($userdata['is_paid']) ?? null ;
	$is_deleted = ($userdata['is_deleted']) ?? null ;
	$token = ($userdata['token']) ?? null ;
	$dateJoined = ($userdata['dateJoined']) ?? null ;