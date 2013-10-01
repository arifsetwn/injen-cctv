#!/bin/bash
#script ini akan melakukan perulangan script satpamkamera.sh setiap 5 detik,


while [ true ]
do
 sh /www/injen/script/satpamkamera.sh
 sleep 5
done