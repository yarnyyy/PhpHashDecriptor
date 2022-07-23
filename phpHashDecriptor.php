<?php
if (isset($argv)) {
	if(count($argv)!=3){
		echo "Invalid arguments";
		$pass = password_hash("cat", PASSWORD_DEFAULT);
		echo $pass;
	}
	else{
		$wordlist = $argv[1];
		$hash = $argv[2];
		$result = 0;
		$txt_file = fopen($wordlist,'r');
		while ($line = fgets($txt_file)) {
			$line = str_replace(array("\r", "\n"), '', $line);
			 if (password_verify(strval($line), strval($hash))) {
				    echo "Your password:".$line;
				    $result = 1;
				    break;
				}
		}
		fclose($txt_file);
		if($result == 0){
			echo "No password in dictionary.";
		}
	}
}
else {
	echo "argc and argv disabled\n";
}

?>
