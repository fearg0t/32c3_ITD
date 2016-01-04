#!/bin/sh
gcc -o main main.c
gcc -o get get.c
echo AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA > Xqefkm.txt
echo '32c3-ITruSTDocS$$' > flag
chown root.user Xqefkm.txt flag main get
chmod 440 Xqefkm.txt flag
chmod 2555 main get
# rm -rf main.c get.c make.sh