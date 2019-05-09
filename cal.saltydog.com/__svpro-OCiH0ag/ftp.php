<?php

	$SV_CALL_FUNC_STARTED = false;
	$SV_IGNORE_ERRORS = false;
	$SV_USE_KEY = null;
	
	if (!isset($SV_EXTRA_KEYS))
		$SV_EXTRA_KEYS = array();
		
	if (!function_exists("scandir"))
	{
		function scandir($dir)
		{
			if (!is_dir($dir))
				return false;
			$dh = opendir($dir);
			if (!$dh)
				return false;
			
			$ret = array();
			while (($itm = readdir($dh)) !== false)
				$ret[] = $itm;
			closedir($dh);
			
			return $ret;
		}
	}

	error_reporting(E_ALL & ~(E_NOTICE | E_WARNING | E_STRICT));

	if (is_null(ini_get("date.timezone")))
		ini_set("date.timezone", "");
	if (strlen(trim(ini_get("url_rewriter.tags"))))
		ini_set("url_rewriter.tags","");
	
	// header("Content-Type: text/plain");
	header("Content-Type: application/octet-stream");
	header('Content-Transfer-Encoding: binary');
	header("Cache-Control: no-cache");
	header('Expires: 0');
	header('Cache-Control: must-revalidate, post-check=0, pre-check=0');

	// var_dump( ini_set("mbstring.func_overload", "0") );
	define("SV_ARRAY_ITEM_LONG",			0);
	define("SV_ARRAY_ITEM_STRING",			1);
	define("SV_ARRAY_ITEM_ARRAY",			2);
	define("SV_ARRAY_ITEM_BINARY",			3); // (unsigned char*), need length
	define("SV_ARRAY_ITEM_FLOAT",			4);
	define("SV_READ_BUFF_LENGTH",	 		65536);
	define("SV_END_OF_STREAM",				"#|");
	define("SV_END_OF_STREAM_TAG",			"#");
	define("SV_FUNCTION_KEY",				"___func");
	define("SV_VERIFY_KEY_KEY",				"___svkey");
	define("SV_ERROR_KEY",					"____errors");

	define("SV_SQL_ITEM_TYPE_UNKNOWN",		0);
	define("SV_SQL_ITEM_TYPE_TABLE",		1);
	define("SV_SQL_ITEM_TYPE_VIEW",			2);
	define("SV_SQL_ITEM_TYPE_DATABASE",		3);

	define("SV_MAX_INT", pow(2, (PHP_INT_SIZE*8)));
	
	// try to establish a time diff with the FTP
	
	/*
	if (file_exists("modif_d.html"))
	{
		$ftp_time = @file_get_contents("modif_d.html");
		if ($ftp_time)
		{
			$main_p = explode(" ", $ftp_time);
			if ($main_p && (count($main_p) == 2))
			{
				$parts_1 = explode("-", $main_p[0]);
				$parts_2 = explode(":", $main_p[1]);
				if ($parts_1 && $parts_2 && (count($parts_1) == 3) && (count($parts_2) == 2)
					&& is_numeric($parts_1[0]) && is_numeric($parts_1[1]) && is_numeric($parts_1[2]) 
					&& is_numeric($parts_2[0]) && is_numeric($parts_2[1]) )
				{
					$ts = gmmktime($parts_2[0], $parts_2[1], null, $parts_1[1], $parts_1[2], $parts_1[0]);
					$s = @lstat("modif_d.html");
					if ($ts && $s && isset($s["mtime"]) && (is_numeric($s["mtime"])) && ($s["mtime"] > 0))
					{
						// var_dump($ts , $s["mtime"]);
						$diff = (int)(round( ($ts - $s["mtime"]) / 3600 )) * 3600;
						define("SV_FTP_SECONDS_DIFF", (int)($diff - date('Z')));
					}
				}
			}
		}
	}
	*/
	
	if (!defined("SV_FTP_SECONDS_DIFF"))
		define("SV_FTP_SECONDS_DIFF", 0);

	function Sv_ErrorHandler($errno, $errstr, $errfile, $errline)
	{
		global $SV_IGNORE_ERRORS, $SV_CALL_FUNC_STARTED;
		if ($SV_IGNORE_ERRORS)
			return true;
		switch ($errno)
		{
			case E_USER_NOTICE:
			case E_USER_WARNING:
	    	case E_USER_ERROR:
	    	case E_ERROR:
    		{
    			if ($SV_CALL_FUNC_STARTED)
    			{
					Sv_Send_Output_Array(array(SV_ERROR_KEY => 
						array( array(
							"type" => $errno,
							"message" => $errstr,
							"file" => $errfile,
							"line" => $errline)) ));
					echo SV_END_OF_STREAM;
    			}
    			else 
    			{
    				header("HTTP/1.1 500 Internal Server Error");
    				header("SiteVaultProErrNo: {$errno}");
    				header("SiteVaultProErrLine: {$errline}");
    				header("SiteVaultProErrFile: ".str_replace("\n", "\\n", $errfile));
    				header("SiteVaultProErrMessage: ".str_replace("\n", "\\n", $errstr));
    			}
				die();
    		}
    		default:
			{
				break;
			}
		}
		return true;
	}
	
	set_error_handler("Sv_ErrorHandler");

	$func_overload = ini_get("mbstring.func_overload");
	if ((strlen($func_overload) > 0) && ($func_overload > 1))
		ini_set("mbstring.func_overload", 1);
	// now retest
	$func_overload = ini_get("mbstring.func_overload");
	if ((strlen($func_overload) > 0) && ($func_overload > 1))
		trigger_error("mbstring.func_overload must be set to zero or one");

	class Sv_Binary
	{
		var $length = 0;
		var $data = null;
		
		function Sv_Binary($data, $length = null)
		{
			$this->data = $data;
			$this->length = is_null($length) ? strlen($data) : $length;
		}
	}
	
	function Sv_Ajax_ReadFolders($folders)
	{
		$result = array();
		$r_count = 0;
		$uids = array();
		$gids = array();
		
		if ((!$folders) || (!is_array($folders)))
			return null;
		
		$SV_IGNORE_ERRORS = true;
		Sv_readFolders($folders, $result, $r_count, $uids, $gids, true);
	}
	
	function Sv_Ajax_ReadFiles($files)
	{
		$SV_IGNORE_ERRORS = true;
		Sv_readFiles($files, true);
	}
	
	function Sv_Ajax_WriteFiles($files)
	{
		$SV_IGNORE_ERRORS = true;
		return Sv_writeFiles($files);
	}
	
	/**
	 * Creates a Sv_MySql connection from the input array
	 *
	 * @param array $array
	 * @return Sv_MySql
	 */
	function Sv_CreateSqlConnectionFromInputArray($array)
	{
		// function Sv_MySql($host,         $user,          $pass,          $port = 3306,    $quote = "`", $db = null)
		return new Sv_MySql($array["host"], $array["user"], $array["pass"], $array["port"], $array["quote"]);
	}
	
	function Sv_Ajax_MySqlGetDatabases($array)
	{
		$conn = Sv_CreateSqlConnectionFromInputArray($array);
		return $conn->getDatabases();
	}
	
	function Sv_Ajax_MySqlGetTableCreate($array)
	{
		$database = $array["database"];
		$table = $array["table"];
		// $if_not_exists = (isset($array["if_not_exists"]) && $array["if_not_exists"]) ? true : false;
		
		$conn = Sv_CreateSqlConnectionFromInputArray($array);
		return array("sql" => $conn->getTableCreate($database, $table));
	}
	
	function Sv_Ajax_MySqlGetViewCreate($array)
	{
		$database = $array["database"];
		$view = $array["view"];
		
		$conn = Sv_CreateSqlConnectionFromInputArray($array);
		return array("sql" => $conn->getViewCreate($database, $view));
	}
	
	function Sv_Ajax_MySqlGetTablesAndMisc($array)
	{
		$database = $array["database"];
		$filter = isset($array["filter"]) ? $array["filter"] : null;
		
		$conn = Sv_CreateSqlConnectionFromInputArray($array);
		return $conn->getTablesAndMisc($database, $filter);
	}
	
	function Sv_Ajax_MySqlRunQueries($array)
	{
		$database = isset($array["database"]) ? $array["database"] : null;
		$queries = isset($array["queries"]) ? $array["queries"] : null;
		if (!$queries)
			return null;
		
		$conn = Sv_CreateSqlConnectionFromInputArray($array);
		if (!empty($database))
			$conn->query("USE `{$database}`;");
		
		foreach ($queries as $q)
			$conn->query($q);
		// if all ok we don't get an error
		return true;
	}
	
	function Sv_Ajax_MySqlGetSinglePkColumn($array)
	{
		$database = $array["database"];
		$table = $array["table"];
		
		$conn = Sv_CreateSqlConnectionFromInputArray($array);
		return array("column" => $conn->getSinglePkColumn($database, $table));
	}
	
	function Sv_Ajax_MySqlDumpRecords($array)
	{
		// $database, $table, $unbuffered = true, $use_file_dump = false
		$database = $array["database"];
		$table = $array["table"];
		$unbuffered = $array["unbuffered"];
		$no_record_info = (isset($array["no_record_info"]) && $array["no_record_info"]) ? true : false;
		
		$conn = Sv_CreateSqlConnectionFromInputArray($array);
		$conn->dumpRecords($database, $table, $unbuffered, $no_record_info);
	}
	
	function Sv_Ajax_RemoveSqlDump($array)
	{
		$f_name = $array["f_name"];
		// check pattern: dump.*.sql
		if ($f_name && (substr($f_name, 0, 5) === "dump.") && (substr($f_name, -4) === ".sql") && file_exists($f_name))
			unlink($f_name);
			
		// TO DO: also cleanup old entries !
	}

	function Sv_Ajax_GetEnviromentInfo($params = null)
	{
		$data = array();
		
		if (defined("SV_FTP_JAIL"))
			$data["sv_ftp_jail"] = SV_FTP_JAIL;

		$data["os_type"] = PHP_OS;
		$data["os_script_type"] = "php";
		$data["os_script_ver"] = PHP_VERSION;
		$data["os_eol"] = PHP_EOL;
		$data["os_sep"] = DIRECTORY_SEPARATOR;
		$data["os_web_server"] = isset($_SERVER["SERVER_SOFTWARE"]) ? $_SERVER["SERVER_SOFTWARE"] : null;

  		$data["os_web_root"] = rtrim( substr(__FILE__, 0, -strlen($_SERVER["REQUEST_URI"])), 
  			"\\/".DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;

		if (function_exists('posix_getpwuid'))
		{
			$user = posix_getpwuid(posix_geteuid());
			$group = posix_getgrgid($user["gid"]);
			
			$data["os_run_user"] = isset($user["name"]) ? $user["name"] : null;
			$data["os_run_user_id"] = isset($user["uid"]) ? $user["uid"] : null;
			$data["os_run_group_id"] = isset($user["gid"]) ? $user["gid"] : null;
			$data["os_run_group"] = isset($group["name"]) ? $group["name"] : null;
			$data["os_run_group_members"] = isset($group["members"]) && is_array($group["members"]) ? 
				implode(";", $group["members"]) : null;

		}
		else if (isset($_ENV["APACHE_RUN_USER"]) && (strlen($_ENV["APACHE_RUN_USER"]) > 0))
		{
			$data["os_run_user"] = isset($_ENV["APACHE_RUN_USER"]) ? $_ENV["APACHE_RUN_USER"] : null;
			$data["os_run_group"] = isset($_ENV["APACHE_RUN_GROUP"]) ? $_ENV["APACHE_RUN_GROUP"] : null;
		}
		else 
		{
			// To properly get the running user, test if function_exists('posix_getpwuid') and if not, assume you're running on Windows and call getenv('USERNAME'). 
			$data["os_run_user"] = getenv('USERNAME');
		}
		
		return $data;
	}
	
	function Sv_Handle_Request()
	{
		global $SV_CALL_FUNC_STARTED, $SV_EXTRA_KEYS, $SV_USE_KEY;
		
		$serializer = new Sv_Serializer();
		
		$put_end_of_stream = false;
		
		$array = null;
		$stream = fopen("php://input", "r");
		while ($array = $serializer->deserializeStream($stream))
		{
			// see if there is more to read
			$function = isset($array[SV_FUNCTION_KEY]) ? $array[SV_FUNCTION_KEY] : null;
			$key = isset($array[SV_VERIFY_KEY_KEY]) ? $array[SV_VERIFY_KEY_KEY] : null;
			
			if ((!$key) || (strlen(trim($key)) == 0) || 
				(($key != SV_KEY) && (!in_array($key, $SV_EXTRA_KEYS))))
				trigger_error("604:Invalid specified key");
				
			$SV_USE_KEY = $key;
			
			if ((!$function) || (strlen(trim($function)) == 0))
				trigger_error("601:No action was specified");
				
			if (!function_exists("Sv_Ajax_{$function}"))
				trigger_error("602:The specified action does not exists");
			
			// =============================================================================================
			// HERE WE MAKE SURE THAT IF FTP IS IN JAILED MODE WE ARE AWARE OF IT AND WE HANDLE THINGS RIGHT
			// =============================================================================================
			$ftp_upload_path = isset($array["___SV_HTTP_FTP_PATH"]) ? $array["___SV_HTTP_FTP_PATH"] : null;
			$ftp_upload_path_dir = isset($array["___SV_HTTP_FTP_PATH_DIR"]) ? $array["___SV_HTTP_FTP_PATH_DIR"] : null;
			
			$jail_dir = sv_detect_ftp_jail($ftp_upload_path, $ftp_upload_path_dir);
			define("SV_FTP_JAIL", $jail_dir);
			// END JAIL FTP DETECTION
			
			unset($array[SV_FUNCTION_KEY]);
			unset($array[SV_VERIFY_KEY_KEY]);
			if (isset($array["___SV_HTTP_FTP_PATH"]))
				unset($array["___SV_HTTP_FTP_PATH"]);
			if (isset($array["___SV_HTTP_FTP_PATH_DIR"]))
				unset($array["___SV_HTTP_FTP_PATH_DIR"]);
				
			$SV_CALL_FUNC_STARTED = true;
			$return = call_user_func("Sv_Ajax_{$function}", $array);
			if ($return)
			{
				$put_end_of_stream = true;
				Sv_Send_Output_Array($return);
			}
		}
		// no more data | the end
		if ($put_end_of_stream)
			echo SV_END_OF_STREAM;
	}
	
	function Sv_Send_Output_Array($array)
	{
		$serializer = new Sv_Serializer();
		$stream = fopen("php://output", "w");
		$serializer->serializeToStream($array, $stream);
	}
	
	function Sv_readFiles($files)
	{
		$_readfile_exists = function_exists("readfile");
		
		if (!$files)
			return ;
		if (!is_array($files))
			return ;
			
		$refs = null;
		if (isset($files["_refs"]))
		{
			$refs = $files["_refs"];
			unset($files["_refs"]);
		}
		
		$r_pos = 0;
		foreach ($files as $f)
		{
			if (is_array($f))
				// we have an offset and chunk specified ... to do
				continue;
			
			$reference = ($refs && isset($refs[$r_pos])) ? $refs[$r_pos] : ($r_pos + 1);
			$r_pos++;
			
			if (!is_file(sv_get_abs_path_for_jailed_file($f)))
			{
				echo "{$reference}|ERR_NO_FILE|0|0|{$f}\n";
			}
			else 
			{
				$error = null;
				$f_size = sv_filesize(sv_get_abs_path_for_jailed_file($f));
				if ($f_size < 0)
				{
					echo "{$reference}|ERR_SIZE|0|0|{$f}\n";
					continue;
				}

				// test for correct file size, this is also needed for huge files to make sure they are the right length
				$file_handle = @fopen(sv_get_abs_path_for_jailed_file($f), "rb");
				if (!$file_handle)
					$error = "ERR_READ";
				else 
				{
					$is_ok = @fseek($file_handle, $f_size);
					if ($is_ok != 0)
						$error = "ERR_SEEK";
					else 
					{
						$one_byte = @fread($file_handle, 1);
						if (strlen($one_byte) != 0)
							$error = "ERR_SIZE";
					}
					
					@fclose($file_handle);
				}
				
				if ($error)
					echo "{$reference}|{$error}|0|0|{$f}\n";
				else 
				{
					ob_start();
					
					// start output
					echo "{$reference}|{$f_size}|0|{$f_size}|{$f}\n";
					$pos_1 = ob_get_length();
					if ($_readfile_exists)
						$sz = readfile(sv_get_abs_path_for_jailed_file($f));
					else 
					{
						echo file_get_contents(sv_get_abs_path_for_jailed_file($f));
						$sz = $f_size;
					}
					$pos_2 = ob_get_length();
					echo "\n";
					
					if (($sz !== false) && ($sz == $f_size) && (($pos_2 - $pos_1) == $f_size))
					{
						// all ok flush it here
						ob_end_flush();
					}
					else 
					{
						// stop & Clean the buffering
						ob_end_clean();
						echo "{$reference}|ERR_SIZE|0|0|{$f}\n";
					}
				}
			}
		}
	}

	function Sv_writeFiles($files)
	{
		if (!$files)
			return ;
		if (!is_array($files))
			return ;
			
		$return = array();

		$r_pos = 0;
		foreach ($files as $f)
		{
			if (!is_array($f))
			{
				// should not happen
				$return[] = "ERR_BAD_FORMAT";
				continue;
			}
			
			/*
				pattern: path, data, id (optional), date, size, type, owner, group, link, perms
			*/
			// must have : path & type
			$path = isset($f["path"]) ? $f["path"] : null;
			$type = isset($f["type"]) ? $f["type"] : null;
			$data = isset($f["data"]) ? $f["data"] : null;

			// $id = isset($f["id"]) ? $f["id"] : null;
			$date = isset($f["date"]) ? $f["date"] : null;
			$size = isset($f["size"]) ? $f["size"] : null;
			// $owner = isset($f["owner"]) ? $f["owner"] : null;
			// $group = isset($f["group"]) ? $f["group"] : null;
			$link = isset($f["link"]) ? $f["link"] : null;
			$perms = isset($f["perms"]) ? $f["perms"] : null;
			$set_date = isset($f["set_date"]) ? $f["set_date"] : null;
			$set_perms = isset($f["set_perms"]) ? $f["set_perms"] : null;
			
			if (!$path)
			{
				$return[] = "ERR_INVALID_PATH";
				continue;
			}
			
			$full_path = sv_get_abs_path_for_jailed_file($path);
			
			if (!$type)
			{
				$return[] = "ERR_INVALID_TYPE";
				continue;
			}
			if (!is_dir(dirname($full_path)))
			{
				$return[] = "ERR_INVALID_TARGET_FOLDER";
				continue;
			}
			if (!is_writable(dirname($full_path)))
			{
				$return[] = "ERR_UNWRITABLE_TARGET";
				continue;
			}
			
			$info_size = null;
			
			if ($type == SV_FILE_TYPE)
			{
				if (!$data)
				{
					$return[] = "ERR_INVALID_DATA";
					continue;
				}
				if (is_null($size))
				{
					$return[] = "ERR_INVALID_SIZE";
					continue;
				}
				
				$ret = @file_put_contents($full_path, $data);
				if (($ret === false) || ($ret != $size))
				{
					$return[] = "ERR_WRITE_ERROR";
					continue;
				}
			}
			else if ($type == SV_FOLDER_TYPE)
			{
				$ret = @mkdir($full_path);
				if (!$ret)
				{
					$return[] = "ERR_MKDIR";
					continue;
				}
			}
			else if ($type == SV_SYMLINK_TYPE)
			{
				if (!$link)
				{
					$return[] = "ERR_INVALID_LINK";
					continue;
				}
				$ret = @symlink($full_path, $link);
				if (!$ret)
				{
					$return[] = "ERR_SYMLINK";
					continue;
				}
			}
			else 
			{
				// error
				$return[] = "ERR_INVALID_TYPE";
				continue;
			}

			// apply: date & perms
			$info = "OK:1";
			if ($set_date)
				$info .= "|DATE:".(@touch($full_path, $date) ? 1 : 0);
			if ($set_perms)
				$info .= "|PERMS:".(@chmod($full_path, $perms) ? 1 : 0);
			$return[] = $info;
		}
		
		return $return;
	}

	function Sv_readFolders($folders, &$result, &$r_count, &$uids, &$gids, $first = false, $max = 4096, $follow_symlinks = false)
	{
		if (!$folders)
			return ;
		if (!is_array($folders))
			return ;
			
		if (isset($folders["_follow_sym_links"]) && $folders["_follow_sym_links"])
		{
			$follow_symlinks = $folders["_follow_sym_links"];
			unset($folders["_follow_sym_links"]);
		}
		
		$refs = null;
		if (isset($folders["_refs"]))
		{
			$refs = $folders["_refs"];
			unset($folders["_refs"]);
		}
		
		// global $folders_count;
		$indx = -1;
		foreach ($folders as $f)
		{
			$indx++;
			
			$itm_ref = $refs ? $refs[$indx] : ($first ? ($indx + 1) : null);
			
			if ($r_count >= $max)
				return;
				
			$items = @scandir(sv_get_abs_path_for_jailed_file($f));
			
			$p_f = str_replace("\n", "\\n", $f);
			if (substr($p_f, -1, 1) != "/")
				$p_f .= "/";
			
			if ($items === false)
			{
				// not good 
				if ($itm_ref > 0)
					echo "#{$itm_ref}|ERR_SCAN|{$p_f}\n";
				else 
					echo "#0|ERR_SCAN|{$p_f}\n";
				
				continue;
			}
			else 
			{
				if ($itm_ref > 0)
					echo "#{$itm_ref}|0|{$p_f}\n";
				else 
					echo "#0|0|{$p_f}\n";
			}
			
			$new_dirs = array();
			$new_dirs_count = 0;
			
			foreach ($items as $itm)
			{
				if (strlen(trim($itm, ".")) == 0)
					continue;
					
				$full_path = $p_f.$itm;
				$stat = @lstat(sv_get_abs_path_for_jailed_file($full_path));
				
				if ($stat === false)
				{
					// we have an error
					// to do something in the future
					continue;
				}
				
				if (!isset($uids[$stat["uid"]]))
					$uids[$stat["uid"]] = Sv_getUserName($stat["uid"]);
				if (!isset($gids[$stat["gid"]]))
					$gids[$stat["gid"]] = Sv_getGroupName($stat["gid"]);
				
				/* Consider a time to be recent if it is within the past six
		         months.  A Gregorian year has 365.2425 * 24 * 60 * 60 ==
		         31556952 seconds on the average.  Write this value as an
		         integer constant to avoid floating point hassles.  */
				$show_year = (time() - $stat["mtime"]) > (15778476); // 8.640.000; // 15.552.000 // 15778476
				
				// year or last hour:minute
				if ($show_year)
					$date = date("M j Y", ($stat["mtime"] + SV_FTP_SECONDS_DIFF));
				else 
					$date = date("M j H:i", ($stat["mtime"] + SV_FTP_SECONDS_DIFF));
				
				$perms_info = Sv_humanReadablePerms($stat["mode"]);
				$is_link = substr($perms_info, 0, 1) == "l";
				
				$f_size = sv_filesize($stat);
				
				if ($f_size < 0)
				{
					// we must reconsider this
					// echo "#{$itm_ref}|ERR_SIZE|{$p_f}\n";
					
					$f_size = 1024; // put some random file size that will be checked again on download
				}
				
				// owner    group
				echo "{$perms_info} {$stat["nlink"]} ".
					($uids[$stat["uid"]] ? $uids[$stat["uid"]] : "owner")." ".
					($gids[$stat["gid"]] ? $gids[$stat["gid"]] : "group")." ".
					"{$f_size} {$date} {$itm}".($is_link ? " -> ".readlink(sv_get_abs_path_for_jailed_file($full_path)) : "")."\n";

				if(((!$is_link) || $follow_symlinks) && is_dir(sv_get_abs_path_for_jailed_file($full_path)))
				{
					$new_dirs[] = $full_path."/";
					$new_dirs_count++;
				}
				
				$r_count++;
				
				/*
			   -rw-r--r--   1 root     other        531 Jan 29 03:26 README
			   dr-xr-xr-x   2 root     other        512 Apr  8  1994 etc
			   dr-xr-xr-x   2 root     				512 Apr  8  1994 etc
			   lrwxrwxrwx   1 root     other          7 Jan 25 00:17 bin -> usr/bin
			   drwxr-xr-x   2 root 	   root  	   4096 2010-12-07 12:49 sbin
		   		*/
			}
			
			if (($r_count < $max) && ($new_dirs_count > 0))
				Sv_readFolders($new_dirs, $result, $r_count, $uids, $gids, false, $max, $follow_symlinks);
		}
	}
	
	function Sv_getUserName($uid)
	{
		if (function_exists('posix_getpwuid'))
		{
  			$info = @posix_getpwuid($uid);
  			if ($info)
  				return $info["name"];
		}
  		return null;
	}
	
	function Sv_getGroupName($gid)
	{
		if (function_exists('posix_getgrgid'))
		{
  			$info = @posix_getgrgid($gid);
  			if ($info)
  				return $info["name"];
		}
  		return null;
	}
	
	function Sv_humanReadablePerms($perms)
	{
		// $perms = fileperms('/etc/passwd');
		
		if (($perms & 0xC000) == 0xC000) {
		// Socket
		$info = 's';
		} elseif (($perms & 0xA000) == 0xA000) {
		// Symbolic Link
		$info = 'l';
		} elseif (($perms & 0x8000) == 0x8000) {
		// Regular
		$info = '-';
		} elseif (($perms & 0x6000) == 0x6000) {
		// Block special
		$info = 'b';
		} elseif (($perms & 0x4000) == 0x4000) {
		// Directory
		$info = 'd';
		} elseif (($perms & 0x2000) == 0x2000) {
		// Character special
		$info = 'c';
		} elseif (($perms & 0x1000) == 0x1000) {
		// FIFO pipe
		$info = 'p';
		} else {
		// Unknown
		$info = 'u';
		}
		
		// Owner
		$info .= (($perms & 0x0100) ? 'r' : '-');
		$info .= (($perms & 0x0080) ? 'w' : '-');
		$info .= (($perms & 0x0040) ?
		(($perms & 0x0800) ? 's' : 'x' ) :
		(($perms & 0x0800) ? 'S' : '-'));
		
		// Group
		$info .= (($perms & 0x0020) ? 'r' : '-');
		$info .= (($perms & 0x0010) ? 'w' : '-');
		$info .= (($perms & 0x0008) ?
		(($perms & 0x0400) ? 's' : 'x' ) :
		(($perms & 0x0400) ? 'S' : '-'));
		
		// World
		$info .= (($perms & 0x0004) ? 'r' : '-');
		$info .= (($perms & 0x0002) ? 'w' : '-');
		$info .= (($perms & 0x0001) ?
		(($perms & 0x0200) ? 't' : 'x' ) :
		(($perms & 0x0200) ? 'T' : '-'));
		
		return $info;
	}
	
	class Sv_Serializer
	{
		var $buff;
		var $string;
		var $stream;
		var $index;
		var $stream_mode;
		var $buff_len;
		var $buff_pos;
		
		function deserializeString($string)
		{
			$this->string = $string;
			$this->stream = null;
			$this->index = 0;
			$this->stream_mode = false;
			
			return $this->deserializeWorker();
		}
		
		function deserializeStream($stream)
		{
			$this->stream = $stream;
			$this->string = null;
			$this->pos = 0;
			$this->stream_mode = true;
			$this->buff = null;
			
			return $this->deserializeWorker();
		}
		
		function serializeToString($array)
		{
			$this->string = "";
			$this->stream = null;
			$this->index = 0;
			$this->stream_mode = false;
			
			$this->serializeWorker($array);
			
			return $this->string;
		}
		
		function serializeToStream(&$array, $stream)
		{
			$this->stream = $stream;
			$this->string = null;
			$this->pos = 0;
			$this->stream_mode = true;
			
			$this->serializeWorker($array);
			fflush($stream);
		}
		
		function streamReadMoreBytes()
		{
			$this->buff = fread($this->stream, SV_READ_BUFF_LENGTH);
			$this->buff_len = strlen($this->buff);
			$this->buff_pos = 0;
		}
		
		function deserializeReadToChar($char = "|")
		{
			if ($this->stream_mode)
			{
				if ((is_null($this->buff)) || ($this->buff_pos >= $this->buff_len))
				{
					$this->streamReadMoreBytes();
					if ($this->buff_len == 0)
						return false;
				}
				// now search
				$pos = strpos($this->buff, $char, $this->buff_pos);
				if ($pos === false)
				{
					// try to read more bytes
					$cache = substr($this->buff, $this->buff_pos, $this->buff_len - $this->buff_pos);
					$this->buff_pos = $this->buff_len;
					return $cache . $this->deserializeReadToChar($char);
				}
				else 
				{
					$ret = substr($this->buff, $this->buff_pos, $pos - $this->buff_pos);
					$this->buff_pos = $pos + 1;
					return $ret;
				}
			}
			else 
			{
				$pos = strpos($this->string, $char, $this->index);
				if ($pos === false)
					return false;
				$ret = substr($this->string, $this->index, $pos - $this->index);
				$this->index = $pos + 1;
				return $ret;
			}
		}
		
		function deserializeReadToLength($length)
		{
			if ($this->stream_mode)
			{
				if ((is_null($this->buff)) || ($this->buff_pos >= $this->buff_len))
				{
					$this->streamReadMoreBytes();
					if ($this->buff_len == 0)
						return false;
				}
				// add one for separator ($length + 1)
				if (($length + 1) > ($this->buff_len - $this->buff_pos))
				{
					$bytes_to_read = $this->buff_len - $this->buff_pos;
					$cache = substr($this->buff, $this->buff_pos, $bytes_to_read);
					$this->buff_pos = $this->buff_len;
					return $cache . $this->deserializeReadToLength($length - $bytes_to_read);
				}
				else 
				{
					$ret = substr($this->buff, $this->buff_pos, $length);
					$this->buff_pos += $length + 1; // add one for separator
					return $ret;
				}
			}
			else 
			{
				$ret = substr($this->string, $this->index, $length);
				$this->index += $length + 1;
				return $ret;
			}
		}
		
		function deserializeWorker()
		{
			$len = $this->deserializeReadToChar();
			if ($len === false)
				return null;
				
			// no more data
			if ($len == SV_END_OF_STREAM_TAG)
				return null;

			$array = array();
			
			for ($i = 0; $i < $len; $i++)
			{
				$type = $this->deserializeReadToChar();
				if ($type === false)
					return null;

				$encoding = $this->deserializeReadToChar();
				if ($encoding === false)
					return null;
				
				$key_len = $this->deserializeReadToChar();
				if ($key_len === false)
					return null;
				
				$key = $i;
				if ($key_len > 0)
					$key = $this->deserializeReadToLength($key_len);
				
				switch ($type)
				{
					case SV_ARRAY_ITEM_LONG:
					{
						$value = $this->deserializeReadToChar();
						if ($value === false)
							return null;
						
						$array[$key] = (int)$value;
						break;
					}
					case SV_ARRAY_ITEM_FLOAT:
					{
						$value = $this->deserializeReadToChar();
						if ($value === false)
							return null;
						
						$array[$key] = (float)$value;
						break;
					}
					case SV_ARRAY_ITEM_STRING:
					{
						$val_len = $this->deserializeReadToChar();
						if ($val_len === false)
							return null;
						
						if ($val_len > 0)
							$value = $this->deserializeReadToLength($val_len);
						else 
							$value = "";
							
						$array[$key] = $value;
				
						break;
					}
					case SV_ARRAY_ITEM_BINARY:
					{
						$val_len = $this->deserializeReadToChar();
						if ($val_len === false)
							return null;
						
						if ($val_len > 0)
							$value = $this->deserializeReadToLength($val_len);
						else 
							$value = "";
							
						$array[$key] = $value;
				
						break;
					}
					case SV_ARRAY_ITEM_ARRAY:
					{
						$array[$key] = $this->deserializeWorker();
						break;
					}
					default:
						break;
				}
			}
			
			return $array;
		}
		
		
		function serializeWrite($str, $length = null)
		{
			if (!$this->stream_mode)
			{
				if (is_null($length))
					$this->string .= $str;
				else	
					$this->string .= substr($str, 0, $length);
			}
			else 
			{
				if (is_null($length))
					fwrite($this->stream, $str);
				else 
					fwrite($this->stream, $str, $length);
			}
		}
		
		function serializeWorker(&$array)
		{
			if (is_null($array))
			{
				$this->serializeWrite("0|");
				return ;
			}
			// make sure it's an array
			if (!is_array($array))
				$array = array($array);
	
			$len = count($array);
			$this->serializeWrite("{$len}|");
			
			foreach ($array as $k => $val)
			{
				// floats", "doubles", or "real 
				$type = SV_ARRAY_ITEM_LONG;
				if (is_null($val))
					$type = SV_ARRAY_ITEM_LONG;
				else if (is_string($val))
					$type = SV_ARRAY_ITEM_STRING;
				else if (is_float($val))
					$type = SV_ARRAY_ITEM_FLOAT;
				else if (is_int($val))
					$type = SV_ARRAY_ITEM_LONG;
				else if (is_array($val))
					$type = SV_ARRAY_ITEM_ARRAY;
				else if (is_a($val, "Sv_Binary"))
					$type = SV_ARRAY_ITEM_BINARY;
				else 
					trigger_error("603:Unalloed data type: ".gettype($val));
					
				$this->serializeWrite($type."|0|");
				if (is_string($k))
				{
					$k_len = strlen($k);
					$this->serializeWrite($k_len."|".$k."|");
				}
				else 
					$this->serializeWrite("0|");
	
				switch ($type)
				{
					case SV_ARRAY_ITEM_LONG:
					case SV_ARRAY_ITEM_FLOAT:
					{
						$this->serializeWrite($val."|");
						break;
					}
					case SV_ARRAY_ITEM_STRING:
					{
						$this->serializeWrite(strlen($val)."|".$val."|");
						break;
					}
					case SV_ARRAY_ITEM_BINARY:
					{
						// we need to pack it 
						$this->serializeWrite($val->length."|");
						if ($val->length > 0)
						{
							$this->serializeWrite($val->data, $val->length);
							$this->serializeWrite("|");
						}
						break;
					}
					case SV_ARRAY_ITEM_ARRAY:
					{
						$this->serializeWorker($val);
						break;
					}
					default:
						break;
				}
			}
		}
		
	}
	
	function sv_filesize($stat_or_path)
	{
		if (is_string($stat_or_path))
			$f_size = @filesize($stat_or_path);
		else 
			$f_size = $stat_or_path["size"];
			
		if (is_null($f_size) || ($f_size === false))
			return -1;
		else if ($f_size < 0)
			return (float)(SV_MAX_INT + (float)$f_size);
		else
			return $f_size;
	}
	
	function sv_hex_char_to_val($hex)
	{
		return (($hex >= 48) && ($hex <= 57)) ? ($hex - 48) :
			(	
				(($hex >= 65) && ($hex <= 70)) ? ($hex - 55) :
				(  (($hex >= 97) && ($hex <= 102)) ? ($hex - 87) : 0 )
			);
	}
	
	function sv_decr($source, $k)
	{
		$k_len = strlen($k);
		$ret = "";
		$len = strlen($source)/2;
		$pos = 0;
		for ($i = 0; $i < $len; $i++)
		{
			$pos = $i % $k_len;
			$ret .= chr(sv_hex_char_to_val(ord(substr($source, $i*2, 1))) * 16 + 
				sv_hex_char_to_val(ord(substr($source, $i*2+1, 1))) - ord(substr($k, $pos, 1)));
		}
		
		return $ret;
	}
	
	class Sv_MySql
	{
		var $conn = null;
		var $version = null;
		var $subversion = null;
		var $quote = "`";
		
		function Sv_MySql($host, $user, $pass, $port = 3306, $quote = "`", $db = null)
		{
			global $SV_USE_KEY;
			
                        $c_string = "";
                        if (strpos($host, ":") !== false)
                            $c_string = $host;
                        else
                            $c_string = $host . ":" . $port;
                        
			$this->conn = mysql_connect($c_string, $user, sv_decr($pass, $SV_USE_KEY));
			@mysql_query("SET NAMES 'utf8'");
			/*
			if (!$ok)
			{
				trigger_error("Unable to SET NAMES `utf8`.", E_USER_ERROR);
				return false;
			}
			*/
			if (!$this->conn)
			{
				trigger_error("Unable to connect to MySQL using {$user}@{$host}:{$port}. ".
					"Using password: ".(($pass && (strlen(trim($pass)) > 0)) ? "yes" : "no").".", E_USER_ERROR);
				return false;
			}
			if ($db)
			{
				$ok = mysql_select_db($db);
				if (!$ok)
				{
					trigger_error("Unable to select database `{$db}` using {$user}@{$host}:{$port}. ".
						"Using password: ".(($pass && (strlen(trim($pass)) > 0)) ? "yes" : "no").".", E_USER_ERROR);
					return false;
				}
			}
			
			$v = $this->queryValue("SELECT VERSION();");
			$v_parts = explode(".", $v, 3);
			$this->version = isset($v_parts[0]) ? $v_parts[0] : null;
			$this->subversion = isset($v_parts[1]) ? $v_parts[1] : null;
			
			$this->quote = $quote;

			// now try to set the charset

			/*
			$v = $this->queryValue("SHOW CHARACTER SET LIKE 'utf8';");
			if ($v)
				$this->query("SET NAMES 'utf8';");
			*/
		}
		
		function queryOneRow($q, $trigger_error = true, $result_type = MYSQL_ASSOC)
		{
			$res = $this->query($q, $trigger_error);
			if (!$res)
				return false;
			
			return mysql_fetch_array($res, $result_type);
		}
		
		function queryValue($q, $trigger_error = true)
		{
			$row = $this->queryOneRow($q, $trigger_error, MYSQL_NUM);
			if ($row && isset($row[0]))
				return $row[0];
			
			return null;
		}
		
		function query($q, $trigger_error = true, $unbuffered = false)
		{
			if ($unbuffered)
				//$res = mysql_unbuffered_query($q, $this->conn);
				$res = mysql_query($q, $this->conn);
			else 
				$res = mysql_query($q, $this->conn);
			
			if (mysql_errno($this->conn) != 0)
			{
				if ($trigger_error)
					trigger_error(mysql_error($this->conn), E_USER_ERROR);
				else 
					return false;
			}
			else 
				return $res;
		}
		
		function getDatabases()
		{
			$res = $this->query("SHOW DATABASES;");

			$dbs = array();
			if ($res)
			{
				while ($r = mysql_fetch_array($res, MYSQL_NUM))
				{
					$dbs[] = array("name" => trim($r[0]), "type" => SV_SQL_ITEM_TYPE_DATABASE);
				}
			}
			
			return $dbs;
		}
		
		function getTableCreate($database, $table)
		{
			$q = "SHOW CREATE TABLE {$this->quote}{$database}{$this->quote}.{$this->quote}{$table}{$this->quote};";

			$row = $this->queryOneRow($q, true, MYSQL_BOTH);
			
			return isset($row["Create Table"]) ? $row["Create Table"] : (isset($row[1]) ? $row[1] : null);
		}
		
		function getViewCreate($database, $view)
		{
			$q = "SHOW CREATE VIEW {$this->quote}{$database}{$this->quote}.{$this->quote}{$view}{$this->quote};";

			$row = $this->queryOneRow($q, true, MYSQL_BOTH);
			
			return isset($row["Create View"]) ? $row["Create View"] : (isset($row[1]) ? $row[1] : null);
		}
		
		function getTablesAndMisc($database, $filter = null)
		{
			$items = array();
			
			// LIKE 'filter'
			$like_str = $filter ? (" LIKE '".mysql_real_escape_string($filter)."'") : "";
			
			if ($this->version >= 5)
				$res = $this->query("SHOW TABLE STATUS FROM ".$this->quote.$database.$this->quote.$like_str);
			else 
				$res = $this->query("SHOW TABLES FROM ".$this->quote.$database.$this->quote.$like_str);
			
			while($r = mysql_fetch_array($res, MYSQL_BOTH))
			{
				if ($this->version >= 5)
				{
					$is_view = is_null($r["Engine"]) || (strtoupper($r["Comment"] == "VIEW"));
					if ($is_view)
						$items[] = array("name" => trim($r[0]), "type" => SV_SQL_ITEM_TYPE_VIEW);
					else 
						$items[] = array("name" => trim($r[0]), "type" => SV_SQL_ITEM_TYPE_TABLE);
				}
				else 
					$items[] = array("name" => trim($r[0]), "type" => SV_SQL_ITEM_TYPE_TABLE);
			}
			
			if ($this->version >= 5)
			{
				// SHOW PROCEDURE STATUS WHERE `Db`='qBaseRomguide'
				
				// SHOW CREATE PROCEDURE proc_name
				// SHOW CREATE PROCEDURE qBaseRomguide.update_regions
				
				// Procedure 	sql_mode 	Create Procedure
			}
			
			return $items;
		}
		
		function getSinglePkColumn($database, $table)
		{
			$res = $this->query( "DESCRIBE {$this->quote}{$database}{$this->quote}.{$this->quote}{$table}{$this->quote};" );
			
			$field = null;
			while ($r = mysql_fetch_assoc($res))
			{
				$pri = (strtoupper($r["Key"]) == "PRI");
				if ($pri)
				{
					// if there is a PK on multiple fields we don't need it
					if ($field)
						return null;
					else 
					{
						// int(11) unsigned
						list($f_type, $f_length, $f_values, $f_unsigned) = $this->parseFieldType($r["Type"]);
						$f_type = strtoupper($f_type);
						
						switch ($f_type)
						{
							case "TINYINT":
							case "SMALLINT":
							case "MEDIUMINT":
							case "INT":
							case "BIGINT":
							{
								$field = $r["Field"];
								break;
							}
							default:
							{
								// the PK is not numeric
								return null;
							}
						}
					}
				}
			}
			
			// if we only have one numeric column in the PK
			return $field;
		}
		
		function dumpRecords($database, $table, $unbuffered = true, $no_record_info = false, $use_file_dump = false)
		{
			$use_file_dump = false;
			@set_time_limit(0);

			$q = "SELECT * FROM {$this->quote}{$database}{$this->quote}.{$this->quote}{$table}{$this->quote};";
			
			$f_handle = null;
			$f_name = null;

			if ($use_file_dump)
			{
				$f_name = "dump.{$database}.{$table}.".uniqid().".sql";
				$f_handle = fopen($f_name, "wb");
				
				fwrite($f_handle, "~{$f_name}\n");
			}
			
			$encoding = mysql_client_encoding($this->conn);
			
			$reliable_pk_column = $this->getSinglePkColumn($database, $table);
			$has_reliable_pk_column = $reliable_pk_column ? true : false;
			if (!$reliable_pk_column)
				$reliable_pk_column = "";
			
			if (!$no_record_info)
			{
				if ($use_file_dump)
					fwrite($f_handle, "%{$encoding}\n\${$reliable_pk_column}\n#");
				else 
					echo              "%{$encoding}\n\${$reliable_pk_column}\n#";
			}

			$res = $this->query($q, true, $unbuffered);

			$pk_index = -1;

			$field_types = array();
			$n = mysql_num_fields($res);
			for($i = 0; $i < $n; $i++)
			{
				if ($use_file_dump)
					fwrite($f_handle, (($i > 0) ? "," : "").$this->quote.mysql_field_name($res, $i).$this->quote);
				else 
					echo              (($i > 0) ? "," : "").$this->quote.mysql_field_name($res, $i).$this->quote;
				$field_types[$i] = mysql_field_type($res, $i);
				
				if ($has_reliable_pk_column && ($pk_index < 0) && (mysql_field_name($res, $i) == $reliable_pk_column))
					$pk_index = $i;
			}
			if ($use_file_dump)
				fwrite($f_handle, "\n");
			else 
				echo              "\n";
			
			$i = 0;
			$pk_val = null;
			while ($r = mysql_fetch_row($res))
			{
				if (!$no_record_info)
				{
					if (($pk_index >= 0) && isset($r[$pk_index]))
					{
						if ($use_file_dump)
							fwrite($f_handle, "&{$r[$pk_index]}|");
						else 
							echo              "&{$r[$pk_index]}|";
					}
					else 
					{
						if ($use_file_dump)
							fwrite($f_handle, "+");
						else 
							echo              "+";
					}
				}
				
				for($i = 0; $i < $n; $i++)
				{
					if ($i > 0)
					{
						if ($use_file_dump)
							fwrite($f_handle, ",");
						else 
							echo              ",";
					}
						
					// "int", "real", "string", "blob",

					if (is_null($r[$i]))
					{
						if ($use_file_dump)
							fwrite($f_handle, "NULL");
						else 
							echo              "NULL";
					}
					else 
					{
						switch ($field_types[$i])
						{
							case "int":
							case "real":
							{
								if ($use_file_dump)
									fwrite($f_handle, $r[$i]);
								else 
									echo              $r[$i];
								break;
							}
							default:
							{
								if ($use_file_dump)
								{
									fwrite($f_handle, "'");
									fwrite($f_handle, mysql_real_escape_string($r[$i], $this->conn));
									fwrite($f_handle, "'");
								}
								else 
								{
									echo "'";
									echo mysql_real_escape_string($r[$i], $this->conn);
									echo "'";
								}
								break;
							}
						}	
					}
					// $r[$i] = null;
				}
				
				if ($use_file_dump)
					fwrite($f_handle, "\n");
				else 
					echo "\n";
			}
			if ($use_file_dump)
				fwrite($f_handle, "--- done ---\n");
			else 
				echo              "--- done ---\n";
				
			if ($use_file_dump)
			{
				fclose($f_handle);
				
				$http = ($_SERVER["HTTPS"] && (strtolower($_SERVER["HTTPS"]) !== "off")) ? "https" : "http";
				$port = ($_SERVER["SERVER_PORT"] != 80) ? $_SERVER["SERVER_PORT"] : null;
				$req = dirname($_SERVER["REQUEST_URI"])."/".$f_name;
				
				header("Location: {$http}://{$_SERVER["SERVER_NAME"]}".($port ? ":{$port}" : "").$req);
				die();
			}
			else
				flush();
		}
		
		function parseFieldType($field_type)
		{
			$f_type = null;
			$f_length = null;
			$f_values = null;
			$f_unsigned = false;
			
			$end_type = strpos($field_type, "(");
			if ($end_type !== false)
			{
				$f_type = trim(substr($field_type, 0, $end_type));
				$end_length = strpos($field_type, ")", $end_type + 1);
				if ($end_length === false)
					return null;
					
				if ((strtoupper($f_type) == "ENUM") || (strtoupper($f_type) == "SET"))
				{
					$f_length = null;
					$f_values = substr($field_type, $end_type + 1, $end_length - $end_type - 1);
				}
				else 
				{
					$f_length = substr($field_type, $end_type + 1, $end_length - $end_type - 1);
					$f_values = null;
				}
				
				$parts = explode(" ", trim(substr($field_type, $end_length + 1)));
				$c_parts = count($parts);
				
				for ($i = 0; $i < $c_parts; $i++)
				{
					if (strtolower(trim($parts[$i])) == "unsigned")
					{
						$f_unsigned = true;
						break;
					}
				}
			}
			else 
			{
				$end_type = strpos($field_type, " ");
				if ($end_type !== false)
				{
					// $f_type = trim(substr($field_type, 0, $end_type));
					$parts = explode(" ", $field_type);
					$f_type = $parts[0];
					
					$c_parts = count($parts);
	
					for ($i = 1; $i < $c_parts; $i++)
						if (strtolower(trim($parts[$i])) == "unsigned")
						{
							$f_unsigned = true;
							break;
						}
				}
				else 
				{
					// only type is specified
					$f_type = trim($field_type);
				}
			}
			
			return array($f_type, $f_length, $f_values, $f_unsigned);
		}
	}
	
	function sv_detect_ftp_jail($ftp_upload_path, $ftp_upload_path_dir)
	{
		// =============================================================================================
		// HERE WE MAKE SURE THAT IF FTP IS IN JAILED MODE WE ARE AWARE OF IT AND WE HANDLE THINGS RIGHT
		// =============================================================================================
		$ftp_upload_path .= "/".$ftp_upload_path_dir;
		
		$ftp_upload_path = str_replace("\\", "/", $ftp_upload_path);
		while (strpos($ftp_upload_path, "//") !== false)
			$ftp_upload_path = str_replace("//", "/", $ftp_upload_path);
		$ftp_upload_path = strtolower($ftp_upload_path);
		
		//trigger_error("ERR2: " . realpath($_SERVER["PHP_SELF"]));
		$script_dir = strtolower(dirname(__FILE__));
		$script_dir = str_replace("\\", "/", $script_dir);
		
		$ftp_upload_path = rtrim($ftp_upload_path, "\\/");
		$script_dir = rtrim($script_dir, "\\/");
		
		if ($script_dir == $ftp_upload_path)
		{
			return false;
		}
		else if (substr($script_dir, -(strlen($ftp_upload_path))) == $ftp_upload_path)
		{
			return substr( dirname(__FILE__), 0, strlen($script_dir) - strlen($ftp_upload_path) );
		}
		else 
			return false;
		
		// END JAIL FTP DETECTION
	}
	
	function sv_get_ftp_jail_prefix()
	{
		return (defined("SV_FTP_JAIL") && SV_FTP_JAIL) ? SV_FTP_JAIL : "";
	}
	
	function sv_get_abs_path_for_jailed_file($file)
	{
		$ret =  ((defined("SV_FTP_JAIL") && SV_FTP_JAIL) ? (SV_FTP_JAIL . "/" . ltrim($file, "\\/")) : $file);
		return $ret;
	}
	
?>