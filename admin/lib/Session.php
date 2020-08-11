<?php 
	
	
	class Session 
	{
		public static function sess_start()
		{
			session_start();
		}

		public static function sess_set($k,$v)
		{
			$_SESSION[$k] = $v;
		}
		public static function sess_get($k)
		{
			if(isset($_SESSION[$k]))
			{
				return $_SESSION[$k];
			}else{
				return FALSE;
			}
		}

		public static function sess_destroy()
		{
			session_destroy();
			header("Location: login.php");
					exit();
		}

		public static function getLogOut()
		{	
			
			if(self::sess_get("login") === FALSE)
				{
					self::sess_destroy();
					header("Location: login.php");
					exit();
				}
		}

		public static function getLogIn()
		{
			
			if(self::sess_get("login") == TRUE)
				{
					header("Location: index.php");

				}
		}
		
	}
?>