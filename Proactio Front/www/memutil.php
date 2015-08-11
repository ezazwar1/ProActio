<?php 
/*******************************************************************************
 *******************************************************************************
 **                                                                           **
 **                                                                           **
 **  Copyright 2015-2017 JK Technosoft                  					  **
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
 * Author:
 *
 *	JK Technosoft
 *	http://www.jktech.com
 *	August 11, 2015
 *
 *
 * History:
 *
 */
include('profile.php');
$current=$_SESSION['dbid'];?>
<div class="pad">
<div class="container">
<div class="row">
	    <div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">     
<p>Memory Utilization</p></h3>
  </div>
  <div class="panel-body">
<table data-toggle="table"
 data-show-export="true"
       data-url="ajax/memutil.php"
	   data-query-params="queryParams"
       data-sort-order="desc"
	   data-show-refresh="true"
	   	   id="tab1"
	>
   <thead>
    <tr>
        <th data-field="MemTotal">Total Memory</th>
        <th data-field="MemFree">Free Memory</th>
        <th data-field="SwapTotal">Swap Total</th>
        <th data-field="SwapFree">Swap Free</th>
    </tr>
    </thead>
</table>
</div>
</div>
</div>
</div>
<script>
$('#tab1').bootstrapTable({
    formatNoMatches: function () {
        return '<img src="images/serverinaccessible.gif"></img>';
    },
	formatLoadingMessage: function () {
   return '<img src="/images/connectingser.gif"></img>';
    }
});
function queryParams() {
    return {
       dbuid:<?php echo "'$current'" ;?>
    };
}
</script>