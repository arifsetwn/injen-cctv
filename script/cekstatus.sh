#!/bin/bash
#Script ini digunakan untuk melakukan pengecekan terhadap perangkat-perangkat yang terhubung ke router

hub2="1d6b:0002"
kamera2="1871:0d01"
sound2="0d8c:000e"
modem2="1199:6880"
fd2="0781:556c"

hub=`lsusb | grep $hub2 | awk '{print $6}'`
kamera=`lsusb | grep $kamera2 | awk '{print $6}'`
sound=`lsusb | grep $sound2 | awk '{print $6}'`
modem=`lsusb | grep $modem2 | awk '{print $6}'`
fd=`lsusb | grep $fd2| awk '{print $6}'`
inet=`ping -w 1 8.8.8.8 | grep 'received' | awk -F',' '{ print $2 }' | awk '{ print $1 }'`

if [ $hub == $hub2 ];
then
echo  "Status HUB = OKE ";
else
echo  "Status HUB = Tidak Tersambung "
fi

if [ $kamera == $kamera2 ];
then
echo "Status Kamera = OKE";
else
echo "Status Kamera = Tidak Tersambung"
fi

if [ $sound == $sound2 ];
then
echo "Status Sound = OKE";
else
echo "Status Sound = Tidak Tersambung"
fi

if [ $modem == $modem2 ];
then
echo "Status Modem = OKE";
else
echo "Status Modem = Tidak Tersambung"
fi

if [ $fd == $fd2 ];
then
echo "Status Flash Drive = OKE";
else
echo "Status Flash Drive = Tidak Tersambung"
fi

if [ $inet != 0 ]; then

    echo "Status Internet = Tersambung";
else

    echo "Status Internet = Tidak Tersambung";
fi
