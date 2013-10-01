#!/bin/bash
#Digunakan untuk mengecek proses motion berjalan atau tidak

motion=$(pgrep motion)

if [[ -z "$motion" ]]; 
then
	echo "0"	
else
	echo "1"
fi