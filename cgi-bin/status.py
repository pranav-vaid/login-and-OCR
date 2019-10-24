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
sno = formdata['sno'].value

try:
    cursor.execute("select * from accounts where sno=?", (sno,))
    rows=cursor.fetchall()
    conn.commit()
except:
    header("Select error")
    footer()

for row in rows:
    if row[3]=="T":
        try:
            cursor.execute("update accounts set status=? where sno=?", ("F", sno))
            conn.row_factory=db.Row
            conn.commit()
        except:
            header("Status set error")
            footer()
    else:
        cursor.execute("update accounts set status=? where sno=?", ("T", sno))
        conn.row_factory=db.Row
        conn.commit()

    redirectURL="../manage.php?statuschanged"
    header("")
    print('<head><meta http-equiv="refresh" content="0;url='+str(redirectURL)+'"/></head>')
    footer()
