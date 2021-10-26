#!/bin/bash

if [ "$#" -eq "0" ]
then
echo pass 1 search term
exit
fi
typeset trm=$1
echo Searching for $trm 

for i in *.php; do
tmp=`cat $i | grep $trm | wc -l `
if [ "$tmp" != "0" ]
then
  echo $i
fi 
done
