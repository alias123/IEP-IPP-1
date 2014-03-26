<?php
define('IPP_PATH','./');






if(!defined('IPP_PATH')) define('IPP_PATH','./');

//check if we are running install wizard
if(!is_file(IPP_PATH . "etc/init.php")){
	require_once(IPP_PATH . 'install/index.php');
	exit();
}
/* eGPS required files. */
require_once(IPP_PATH . "etc/init.php");
require_once(IPP_PATH . 'include/auth.php');
require_once(IPP_PATH . 'etc/init.php');
include_once(IPP_PATH . 'include/db.php');

header('Pragma: no-cache'); //don't cache this page!

if(isset($system_message)) $system_message = $system_message; else $system_message="";
if(isset($LOGIN_NAME)) $LOGIN_NAME = $LOGIN_NAME; else $LOGIN_NAME="";

?> 
<!DOCTYPE html>
<html lang="en">
<HEAD>
    <META HTTP-EQUIV="CONTENT-TYPE" CONTENT="text/html; charset=UTF-8">
    <TITLE><?php echo $page_title; ?></TITLE>
    <style type="text/css" media="screen">
        <!--
            @import "<?php echo IPP_PATH;?>layout/greenborders.css";
        -->
    </style>

</HEAD>
    <BODY>
        <table class="shadow" border="0" cellspacing="0" cellpadding="0" align="center">  
        <tr>
          <td class="shadow-topLeft"></td>
            <td class="shadow-top"></td>
            <td class="shadow-topRight"></td>
        </tr>
        <tr>
            <td class="shadow-left"></td>
            <td class="shadow-center" valign="top">
                <table class="frame" width=620px align=center border="0">
                    <tr align="Center">
                    <td><center><img src="<?php echo $page_logo_path; ?>"></center></td>
                    </tr>
                    <tr>
                        <td valign="top">
                        <div id="main">
                                <?php if ($system_message) { echo "<center><table width=\"80%\"><tr><td><p class=\"message\">" . $system_message . "</p></td></tr></table></center>";} ?>
<BR><BR>
                        <center><table><tr><td><center><p class="header">MyIEP Login -</p></center></td></tr></table></center>
                        <form enctype="multipart/form-data" action="<?php echo IPP_PATH . 'main.php'; ?>" method="post">
                        <center><table>
                            <tr>
                                <td>
                                    <p class="text">Login Name
                                </td>
                                <td width="50">
                                    <input type="text" size="28" name="LOGIN_NAME" value="<?php echo $LOGIN_NAME;?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p class="text">Password
                                </td>
                                <td width="50">
                                    <input type="password" size="30" name="PASSWORD" value="">
                                </td>
                            </tr>
                        </table>
                                    <input class="sbutton" type="submit" value="Submit">
                        </center>
                        </form>
                        </div>
                        </td>
                    </tr>
                </table> 
            </td>
            <td class="shadow-right"></td>   
        </tr>
        <tr>
            <td class="shadow-left">&nbsp;</td>
            <td class="shadow-center" valign="top">&nbsp;</p></right></td>
            <td class="shadow-right">&nbsp;</td>
        </tr>
        <tr>
            <td class="shadow-left">&nbsp;</td>
            <td class="shadow-center" halign="right">
            &nbsp;</td>
            <td class="shadow-right">&nbsp;</td>
        </tr>
        <tr>
            <td class="shadow-bottomLeft"></td>
            <td class="shadow-bottom"></td>
            <td class="shadow-bottomRight"></td>
        </tr>
        </table> 
        <center></center>
    </BODY>
</HTML>
