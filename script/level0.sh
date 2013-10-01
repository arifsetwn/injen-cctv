#!/bin/bash
#script untuk memulai level 0

killall motion 
kill -9 `pidof mjpg_streamer`
cp /www/injen/script/rc.local.asli /etc/rc.local
