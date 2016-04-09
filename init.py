#!/usr/bin/env python
import sqlite3

sqlite_file = 'ai.sqlite'    # name of the sqlite database file


# Connecting to the database file
conn = sqlite3.connect(sqlite_file)
c = conn.cursor()

# Creating a new SQLite table with 1 column
c.execute('CREATE TABLE boisson (user VARCHAR NOT NULL, favorite VARCHAR NOT NULL, counter INTEGER)')

c.execute('CREATE TABLE user (name VARCHAR NOT NULL, freq INTEGER)')

# Committing changes and closing the connection to the database file
conn.commit()
conn.close()

