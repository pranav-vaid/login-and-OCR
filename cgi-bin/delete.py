#!C:\Program Files\Python37\python.exe
import cgi
import os,sys
import sqlite3 as db


def header(s):
    print("Content-type: text/html\r\n\r\n")
    print("")
    print('<html><title>'+s+'</title>')
    print('<body>')

def footer():
    print("</body></html>")
    

conn=db.connect("useraccounts.db")
cursor=conn.cursor()
formdata=cgi.FieldStorage()
sno = formdata['sno'].value

cursor.execute("delete from accounts where sno=?",(sno,))
conn.commit()

num=[]
cursor.execute("Select * from accounts")
rows=cursor.fetchall()
conn.commit()
for row in rows:
    num.append(row[2])
    continue
a=max(num)
cursor.execute("Update sqlite_sequence set seq=? where name=?", (str(a), "accounts"))
conn.commit()


redirectURL="../manage.php?deleted"

header("")
print('<head><meta http-equiv="refresh" content="0;url='+str(redirectURL)+'"/></head>')
footer()
