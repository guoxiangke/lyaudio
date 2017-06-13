#!/usr/bin/env bash
pwd
git pull origin master
git push origin master
ssh root@bce.yongbuzhixi.com  << EOF
cd  /var/www/lyaudio
git log -1
date
git checkout .
git pull origin master
git log -1
date
git status
EOF