#!/bin/bash
#script untuk memulai level 1

killall motion 
kill -9 `pidof mjpg_streamer`
cp /www/injen/script/rc.local.mjpg /etc/rc.local
mjpg_streamer -i "input_uvc.so -d /dev/video0 -r 640x480 -f 30 -y" -o "output_http.so" -b
