#!C:\Users\LENOVO\AppData\Local\Programs\Python\Python37\python.exe
import cgi
import os,sys
import sqlite3 as db
import hashlib as hl

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
username=formdata['username'].value
sno=formdata['sno'].value

cursor.execute("update accounts  set username=? where sno=?", (username, sno))
conn.commit()

redirectURL="../manage.php?usernamechanged"
header("")
print('<head><meta http-equiv="refresh" content="0;url='+str(redirectURL)+'"/></head>')
footer()
