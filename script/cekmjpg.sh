#!/bin/bash
# Digunakan untuk mengecek proses mjpg_streamer sedang berjalan atau tidak

mjpg=$(pgrep mjpg_streamer)

if [[ -z "$mjpg" ]]; 
then
	echo "0"	
else
	echo "1"
fi