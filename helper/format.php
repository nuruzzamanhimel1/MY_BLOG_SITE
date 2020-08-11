<?php 
	
	class format{

		public function formatDate($date)
		{
			return date('F j, Y, g:i a',strtotime($date));
			//June 21, 2018, 11:53 am
		}

		public function textShort($text,$limit = 400)
		{
			$text = substr($text,0,$limit);
			$text = substr($text,0,strrpos($text, ' '));
			$text = $text."....";
			return $text;
		}

		public function validation($data)
		{
			$data = trim($data);
			$data = stripcslashes($data);
			$data = htmlentities($data);
			return $data;
		}

		public function title()
		{ // tutorial 30
			$path = $_SERVER['SCRIPT_FILENAME']; // we get full path from URL
			$title = basename($path,'.php');
			$title = str_replace("_"," ",$title); // ex: contuct_us
			if($title == "index")
			{
				$title = "Home";
			}
			else if($title == "contuct")
			{
				$title = "contuct";
			}
			else if($title == "about")
			{
				$title = "About";
			}
			
			$title = ucwords($title);
			return $title;
		}
	}
?>