#!/usr/bin/python

import sqlite3

conn = sqlite3.connect('ai.sqlite')
print "table user";

cursor = conn.execute("SELECT Name, freq from user")
for row in cursor:
   print "Name = %s, Freq = %d \n" % (row[0],row[1])

print "Operation done successfully";
conn.close()
