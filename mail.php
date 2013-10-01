<?php

include 'koneksi.php';

$fromAddr = 'injencctv@gmail.com'; $recipientAddr = 'cyanohumanos@gmail.com';
$subjectStr = 'REPORT Log Harian';

$mailBodyText = <<<END89283
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<title>Thank You</title>
</head>
<body>
<p> Ini Adalah email otomatis dari sistem injen cctv, jangan balas email ini
</p>
</body>
</html>
END89283;

$filePath = '/www/injen/backuplog/backuplog.sql';
$fileName = basename($filePath);
$fileType = 'text/plain' ;
/* to find out what string to use for type, see
 http://en.wikipedia.org/wiki/Internet_media_type 
or $_FILES['attachment']['type'];
*/

/* encode the email content */

$mineBoundaryStr='otecuncocehccj8234acnoc231';

$headers= <<<EEEEEEEEEEEEEE
From: $fromAddr
MIME-Version: 1.0
Content-Type: multipart/mixed; boundary="$mineBoundaryStr"

EEEEEEEEEEEEEE;

// Add a multipart boundary above the plain message 
$mailBodyEncodedText = <<<TTTTTTTTTTTTTTTTT
This is a multi-part message in MIME format.

--{$mineBoundaryStr}
Content-Type: text/html; charset=UTF-8
Content-Transfer-Encoding: quoted-printable

$mailBodyText

TTTTTTTTTTTTTTTTT;

$file = fopen($filePath,'rb'); 
$data = fread($file,filesize($filePath)); 
fclose($file);
$data = chunk_split(base64_encode($data));

// file attachment part
$mailBodyEncodedText .= <<<FFFFFFFFFFFFFFFFFFFFF
--$mineBoundaryStr
Content-Type: $fileType;
 name=$fileName
Content-Disposition: attachment;
 filename="$fileName"
Content-Transfer-Encoding: base64

$data

--$mineBoundaryStr--

FFFFFFFFFFFFFFFFFFFFF;

if (
mail( $recipientAddr , $subjectStr , $mailBodyEncodedText, $headers )
) {

$updatelog=mysql_query("insert into log (date,rincian) values (now(),'email log terkirim') ");

} else {

$updatelog2=mysql_query("insert into log (date,rincian) values (now(),'email log tidak terkirim') ");


}

?>