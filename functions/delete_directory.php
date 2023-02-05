<?php
function deleteDir($dirPath) {
    if (! is_dir($dirPath)) {
		try{
			throw new InvalidArgumentException("$dirPath must be a directory");
		}
		catch(Exception $e) {
		  echo 'Message: ' .$e->getMessage();
		}
    }
    if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
        $dirPath .= '/';
    }
    $files = glob($dirPath . '*', GLOB_MARK);
    foreach ($files as $file) {
        if (is_dir($file)) {
            self::deleteDir($file);
        } else {
            unlink($file);
        }
    }
    rmdir($dirPath);
	echo "123";
}
?>