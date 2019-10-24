#!C:\Program Files\Python37\python.exe
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
password=formdata['password'].value
captcha=formdata['captcha'].value

password=hl.md5(password.encode())
password=password.hexdigest()

rowdata=(username,password)
conn.row_factory=db.Row
cursor.execute("Select * from accounts")
rows=cursor.fetchall()
conn.commit()


for row in rows:
    if rowdata==(row[0],row[1]):
        if row[3]=="T":
            if username=="admin":
                redirectURL="\login.php?user="+username+"&captcha="+captcha
                header("")
    ##            print("<center>")
                print('<head><meta http-equiv="refresh" content="0;url='+str(redirectURL)+'"/></head>')
    ##            print("<h1>Admin Authenticated</h1>")
    ##            print("<p>Logged in</p>")
    ##            print('<form action="\welcome.php" method="post">')
    ##            print('<input type="hidden" name="user" value="'+username+'">')
    ##            print('<input type="submit" name="admin" value="Continue">')
    ##            print("</center>")
                footer()
                break
            elif username==row[0]:
                redirectURL="\login.php?user="+username+"&captcha="+captcha
                header("")
    ##            print("<center>")
    ##            print("<h1>User Authenticated</h1>")
    ##            print("<p>Logged in</p>")
    ##            print('<form action="\welcome.php" method="post">')
    ##            print('<input type="hidden" name="user" value="'+username+'">')
    ##            print('<input type="submit" name="notadmin" value="Continue">')
    ##            print("</center>")

                print('<head><meta http-equiv="refresh" content="0;url='+str(redirectURL)+'"/></head>')
                footer()
                break
        else:
            redirectURL="../loginform.php?locked"
            header("")
            print('<head><meta http-equiv="refresh" content="0;url='+str(redirectURL)+'"/></head>')
            footer()
            break

    else:
        continue
    
if rowdata!=(row[0],row[1]):
    redirectURL="\loginform.php?invalid"
    header("")
##    print("<p>Hello</p>")
    print('<head><meta http-equiv="refresh" content="0;url='+str(redirectURL)+'"/></head>')
    footer()
  
