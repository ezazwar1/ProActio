<?php
/*******************************************************************************
 *******************************************************************************
 **                                                                           **
 **                                                                           **
 **  Copyright 2015-2017 J K Technosoft                  					  **
 **  http://www.jktech.com                                           		  **
 **                                                                           **
 **  ProActio is free software; you can redistribute it and/or modify it      **
 **  under the terms of the GNU General Public License (GPL) as published     **
 **  by the Free Software Foundation; either version 2 of the License, or     **
 **  at your option) any later version.                                       **
 **                                                                           **
 **  ProActio is distributed in the hope that it will be useful, but WITHOUT  **
 **  ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or    **
 **  FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License     **
 **  for more details.                                                        **
 **                                                                           **
 **  See TNC.TXT for more information regarding the Terms and Conditions    **
 **  of use and alternative licensing options for this software.              **
 **                                                                           **
 **  A copy of the GPL is in GPL.TXT which was provided with this package.    **
 **                                                                           **
 **  See http://www.fsf.org for more information about the GPL.               **
 **                                                                           **
 **                                                                           **
 *******************************************************************************
 *******************************************************************************
 *
 * {program name}
 *
 * Known Bugs & Issues:
 *
 *
 * Author:Ezaz Ul Shafi War
 *
 *	J K Technosoft
 *	http://www.jktech.com
 *	August 11, 2015
 *
 *
 * History:
 *
 */

header('Content-type: application/json');
@$option=$_GET['dbuid'];
require_once ("../sqlconnect.php");
if(isset($_SESSION['sql'])){
@$query = mysqli_query($connect,"SELECT * FROM configureddb where dbuid='$option'");
while($query_row=mysqli_fetch_assoc($query)){
$hostname =$query_row['server'];
$sslusername =$query_row['sslusername'];
$sslpassword =$query_row['sslpassword'];
}
$path=getcwd();
chdir('..');
chdir('..');
$path=getcwd();
chdir('php/pear');
 $path=getcwd();
 set_include_path($path);
set_include_path(get_include_path() .'/'. 'phpsec');
include('Net/SSH2.php');
include('File/ANSI.php');
include('/Net/SFTP.php');
$sftp = new Net_SFTP(@$hostname);
if (@$sftp->login(@$sslusername, @$sslpassword)) {
	$contents=$sftp->get('/proc/meminfo');
 $data = explode("\n",$contents);
    $meminfo = array();
    foreach ($data as $line) {
    	@list($key, $val) = explode(":", $line);
    	$meminfo[$key] = trim($val);
    }
	$json[]=$meminfo;
echo json_encode($json);
}
else 
echo "[]";
}
else 
echo "[]";
?>