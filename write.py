import os
file1=open("classifications.txt" , "r")
if file1.mode == 'r':
    contents = file1.read()
    print(contents)

