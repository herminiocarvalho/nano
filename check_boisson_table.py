#!/usr/bin/python

import sqlite3

conn = sqlite3.connect('ai.sqlite')
print "table boisson";

cursor = conn.execute("SELECT user, favorite, counter from boisson")
for row in cursor:
   print "user = %s, favorite = %s, counter = %d \n" % (row[0],row[1], row[2])

print "Operation done successfully";
conn.close()
