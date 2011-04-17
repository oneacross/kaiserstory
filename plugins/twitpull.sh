#!/bin/bash

kw=$1
[ -z "$kw" ] && echo "please supply track keywords" && exit

echo "track=$kw" > tracking

while true; do
    filename="twitraw/$(date +'%b_%d_%Y_%H_%M_%S').txt"
    curl -o $filename -d @tracking http://stream.twitter.com/1/statuses/filter.json -umpmendell:sanjose
    sleep 30s
done
