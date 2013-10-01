#!/bin/bash

#proses insert ke db log
mysql -u root --password=dewi <<eof
use injen;
insert into log (date,rincian) values (now(),"gerakan terdeteksi");
eof

#proses alarm
CEKALARM=`pgrep -f madplay`

if [[ -z "$CEKALARM" ]]; 
then

ALARM=`cat /www/injen/script/sound.txt`
WAKTU=`cat /www/injen/script/waktusound.txt`

#bunyikan alarm sesuai waktu
for i in $(seq 1 $WAKTU); do
madplay $ALARM
done

fi
							