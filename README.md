garmin-reverse-time
===================

GPX file had a jump in it of 16,000 days - this script removes it.


## GARMIN REALLY BROKE.


Looked on my garmin it had one point at 2014 (current year) and the next point was 2019

I worked the diff and created the $timeToRemove var - then chnaged all the time vals in the XML to be correct.
