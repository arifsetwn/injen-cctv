#!/bin/bash
#script ini akan melakukan pengecekan terhadap kondisi kamera, ketika kamera terputus maka akan membunyikan alarm

#ganti id berikut sesuai id kamera
kamera2="1871:0d01"


kamera=`lsusb | grep $kamera2 | awk '{print $6}'`


if [ $kamera == $kamera2 ];
  then
     echo  "Status Kamera = Tersambung" > /dev/null
  else
      	madplay /www/injen/sound/alarm3.mp3
	
fi


