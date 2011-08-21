<?php
	include('../inc/globals.inc');
	extract($_POST);
	$data = file_get_contents(CONFIG_FILE);
	$json = json_decode($data,true);
	
	header("Content-type: text/plain");

	#var_dump($user);
	#var_dump($json);
	if($json[finduser($username,$json)]['password'] == ccrypt($password)){
		$loc = '../../app/';
		setcookie('x-codeita-user', ccrypt($json[finduser($username,$json)]['id']), null, '/');
	}else{
		$loc = '../../index?login=false&badpass=true';
	}
	header("Location: $loc");
	//return json_encode($out);
	
	function finduser($username,$array){
		$i=0;
		foreach($array as $item){
			if($item["username"] == $username){
				return $i;
			}
			$i++;
		}
		return false;
	}
?>