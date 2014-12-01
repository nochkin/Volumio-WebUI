<?php
/*
 *      PlayerUI Copyright (C) 2013 Andrea Coiutti & Simone De Gregori
 *		 Tsunamp Team
 *      http://www.tsunamp.com
 *
 *  This Program is free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3, or (at your option)
 *  any later version.
 *
 *  This Program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with TsunAMP; see the file COPYING.  If not, see
 *  <http://www.gnu.org/licenses/>.
 *
 *
 *	UI-design/JS code by: 	Andrea Coiutti (aka ACX)
 * PHP/JS code by:			Simone De Gregori (aka Orion)
 * 
 * file:							rfid_lib.php
 * version:						1.0
 *
 */

function getRfidlist($db) {
	$dbh = new PDO($db);
	$querystr = 'SELECT tag,tagname,mytime,playfile FROM rfid_tags';
	$result = array();
	$query = $dbh->prepare($querystr);
	if ($query->execute()) {
		$i = 0;
		foreach ($query as $value) {
		    $result[$i] = $value;
		    $i++;
		}
	}
	return $result;
}

function setRfid($db, $path, $tagid) {
	$dbh = new PDO($db);
	$querystr = 'UPDATE rfid_tags set playfile=:path where tag=:tagid';
	$query = $dbh->prepare($querystr);
	return $query->execute(array(':path' => $path, ':tagid' => $tagid));
}

function remRfid($db, $tagid) {
	$dbh = new PDO($db);
	$querystr = 'DELETE from rfid_tags where tag=:tagid';
	$query = $dbh->prepare($querystr);
	return $query->execute(array(':tagid' => $tagid));
}

 
?>
