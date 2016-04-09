#!/usr/bin/env python
# -*- coding: utf-8 -*-
import sqlite3
import pygame
import time
import subprocess

## Uncomment pygame command for playing sound 

def main():
    conn = sqlite3.connect("ai.sqlite")
    c = conn.cursor()
#    pygame.init()

    print('** DEBUG ** SAY (WRITE) SOMETHING FOR WAKING UP THE ROBOT')
    username=raw_input(" ")

    print('** DEBUG ** SOUND CORRESPONDING TO THE USER IS PLAYED')
#    pygame.mixer.music.load('sound/'+username.lower()+'-en.ogg')
#    pygame.mixer.music.play()
#    time.sleep(2)

    print('** DEBUG ** FREQUENCY OF VOICE IS ANALYSED')
    # use temporary file, need to change that later and catch error !
    return_code = subprocess.call("sox sound/"+username.lower()+"-en.ogg -n stat 2> tmp", shell=True) 
    
    f= open(r'tmp2','w')
    subprocess.call("sed '14!d' tmp | cut -d: -f2", shell=True, stdout=f)
    f.close()

    filename=open('tmp2')
    s=filename.read()
    frequency=s.strip()

#    frequency = subprocess.call("sed '14!d' tmp | cut -d: -f2", shell=True)
    print '** DEBUG ** frequency %d' % int(str(frequency).strip()) 

#    s=subprocess.check_output(["sed", "'14!d'", "tmp |"," cut -d: -f2"])

#    print s

    # improve the frequency with a range: 
    c.execute("select name from user where freq between ? and ?",(int(frequency)-10,int(frequency)+10)) 
    
    row_user=c.fetchone()
    if row_user == None:
       print("** DEBUG ** User don't exist in memory")
       c.execute("insert into user (name, freq) values (?,?)",(username.lower(),frequency))
       name=username.lower()
    else:
       print("** DEBUG ** NAME IS RETRIEVED FROM THE ARTIFICIAL INTELLIGENCE :)")
       print "Hello %s" % row_user[0]
       name=row_user[0]

    c.execute("select favorite, counter from boisson where favorite <> '' and user =? order by counter desc limit 1",(name,))
    row = c.fetchone()
    finsert=False
    fupdate=False
    if  row == None:
        # print("** DEBUG ** No entry found")
        drink=raw_input("What is your favorite drink?")
        finsert=True
        counter=1
    else:
        print('Do you want to drink your favorite drink: %s?(y/n)' % (row[0]))
        drink_confirm=raw_input()
        if drink_confirm.lower()=='y':
            #print("OK")
            fupdate=True
            counter=(row[1])+1
            drink=row[0]
        else:
           drink=raw_input("So what do you want to drink?")
           d = conn.cursor()
           d.execute("select favorite, counter from boisson where user=? and favorite=?",(name.lower(),drink.lower()))
           drik=d.fetchone()
           if  drik== None:
               print("** DEBUG ** New entry")
               finsert=True
               counter=1
           else:
               print("** DEBUG ** Increase preference for this drink")
               fupdate=True
               counter=(drik[1])+1

    if finsert:
        c.execute("INSERT INTO boisson (user, favorite, counter) VALUES (?,?,?)",(name.lower(), drink.lower(), counter))
    if fupdate:
        #print("%d",counter)
        c.execute("update boisson set counter=? where user=? and favorite=?",(counter, name.lower(), drink.lower()))

    print "Your %s is ready!" % drink.lower()

    filecofee= open('Coffe_Machine/order.txt','w')
    filecofee.write(drink.lower())
    filecofee.close()

    conn.commit()
    conn.close()


if __name__ == "__main__":
    main()




