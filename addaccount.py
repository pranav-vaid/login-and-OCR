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

try:
    conn=db.connect("useraccounts.db")
except:
    header("DB error")
    footer()

cursor=conn.cursor()

formdata=cgi.FieldStorage()
username=formdata['username'].value
password=formdata['password'].value
add=formdata['create'].value

password=hl.md5(password.encode())
password=password.hexdigest()


##if login=='Add User':
##    header("Valid")
##    footer()
##else:
##    header("invalid")
##    footer()
##try:
##    cursor.execute("Select * from accounts")
##    rowid=row
try:
    rowdata=(username,password,"T")
except:
    header("Data Finding Error")
    footer()
##
try:
    cursor.execute("Insert into accounts (username, password, status) values(?,?,?)",rowdata)
except:
    header("Adding data in db error")
    footer()
conn.row_factory=db.Row
conn.commit()

header("")
redirectURL="../manage.php?added"
print('<head><meta http-equiv="refresh" content="0;url='+str(redirectURL)+'"></head>')
footer()
##cursor.execute("Select * from accounts")
##rows=cursor.fetchall()
##
##header("Successful Addition")
##for row in rows:
##    print("Username:"+row[0]+"<br>")
##    print("Password:"+row[1]+"<br>")
##    continue
##footer()
