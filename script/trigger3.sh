#!/bin/bash

#masukkan port usb modem untuk sms
MOD=/dev/ttyUSB3

#proses insert ke db log
mysql -u root --password=dewi << eof
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

#proses sms
timer=`pgrep -f timer`

if [[ -z "$timer" ]]; 
then
    
	sh /www/injen/script/timer.sh&
	HP=`cat /www/injen/script/nohp.txt`

	echo -e -n "AT+CMGF=1 \015" > $MOD
	echo -e -n "AT+CMGS=\"+62$HP\" \015" > $MOD
	echo -e -n "Perhatian, terdeteksi gerakan mencurigakan pada $(date). Segera lakukan tindakan lebih lanjut  \015" > $MOD
	echo -e -n "\032" > $MOD
						
fi


	