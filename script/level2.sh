#!/bin/bash
#script untuk memulai level 2

killall motion 
kill -9 `pidof mjpg_streamer`
cp /www/injen/script/rc.local.motion /etc/rc.local
cp /www/injen/script/trigger2.sh /www/injen/script/trigger.sh
cp /www/injen/script/motion.conf.lvl2 /etc/motion.conf
motion -c /etc/motion.conf