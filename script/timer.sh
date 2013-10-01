#!/bin/bash
#script ini akan menjalankan timer sesuai waktu yang ditentukan


WAKTU=`cat /www/injen/script/timer.txt`
sleep $WAKTU;
