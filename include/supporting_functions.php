<?php

/**
 * supporting_functions.php 
 *
 * Copyright (c) 2007 Grasslands Regional Division #6
 * All rights reserved
 *
 * Created: May 19, 2007
 * By: M. Nielsen
 * Modified:
 *
 */

/** @fn		no_cash()
 * @brief   Send no-caching order as HTML header
 */
 
function no_cash() {
	echo header('Pragma: no-cache');
}	

/** @fn		confirm_valid_session()
 *  @brief   check validity of credentials and session
 *  @detail	Throw errors if login or session are invalid
 *  @return	False if error
 */

function confirm_valid_session() {
	if(isset($_POST['LOGIN_NAME']) && isset( $_POST['PASSWORD'] )) {
		if(!validate( $_POST['LOGIN_NAME'] ,  $_POST['PASSWORD'] )) {
			$system_message = $system_message . $error_message;
			IPP_LOG($system_message,$_SESSION['egps_username'],'ERROR');
			require(IPP_PATH . 'index.php');
			return False;
		}
	} else {
		if(!validate()) {
			$system_message = $system_message . $error_message;
			IPP_LOG($system_message,$_SESSION['egps_username'],'ERROR');
			require(IPP_PATH . 'index.php');
			return False;
		}
	}
}	

/** @fn set_student_id()
 * 	@brief	clear student id, then get value from post/get form on previous page
 *  
*/

function set_student_id() {
	$student_id=""; //cleared for security
	if(isset($_GET['student_id'])) $student_id= $_GET['student_id'];  //in case of get
	if(isset($_POST['student_id'])) $student_id = $_POST['student_id']; //in case of post
}

/** @fn check_student_id_set()
 * 	@brief	throw error if attempt is made to access page without a student selected 
*/

function check_student_id_set($student_id)
   if($student_id=="") {
   //we shouldn't be here without a student id.
		echo "You've entered this page without supplying a valid student id. Fatal, quitting";
		exit();
}
	
	
//summary: Just a spell check function...dev differentiates from user functions

if(!defined('IPP_PATH')) define('IPP_PATH','../');

//spell checking functions
function checkSpelling ( $string ) //todo: investigate and justify possibly unconventional function syntax
{
   if (!extension_loaded("pspell")) {
      //spell libraries not loaded so just return the same string...
      return $string;
   }

   $pspell = pspell_new("en");
   $words = explode(" ", $string);
   $return = "";
   $trim =  ".!,?();:'\"\n\t\r";

   foreach($words as $word) {
     if (pspell_check($pspell, trim($word,$trim))) {
       // this word is fine; print as-is
       $return .= $word . " ";
     } else {
       //get up to 3 possible spellings for glossover...
       $suggestions = pspell_suggest($pspell,trim($word,$trim));
       $suggest = "";
       for($i = 0; $i < 3; $i++) {
          $suggest .= $suggestions[$i] . ",";
       }
       $suggest = substr($suggest, 0, -1);  //chop off the last comma - good but; todo: why? comment
       $return .= "<span class='mispelt_text' title='$suggest'>$word </span>";
     }
   }
   return $return;
}

?>
