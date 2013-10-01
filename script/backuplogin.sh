#!/bin/bash
#script ini dijalankan setelah setting tanggal, digunakan untuk backup gambar dan backup database

datebackup=`cat /www/injen/logcam/current/date.txt`
tglbackup=`cat /www/injen/logcam/current/date.txt | awk '{print $1}' `
tgl=`date | awk '{print $3}'`
date=`date | awk '{print $3$2$6}'`


if [ $tglbackup != $tgl ]; then
#membuat folder untuk backup hasil tangkapan webcam dan melakukan backup
mkdir /www/injen/logcam/backup/$datebackup
mv /www/injen/logcam/current/*.* /www/injen/logcam/backup/$datebackup

#backup database log
mysqldump -u root --password=dewi injen log > /www/injen/backuplog/backuplog.sql

#set tanggal
echo $date > /www/injen/logcam/current/date.txt 

fi


