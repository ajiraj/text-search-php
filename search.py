import fnmatch
import os
import sys
import html
 
pattern = '*.php'
rootPath = sys.argv[1]
qry = sys.argv[2]
c=0
for root, dirs, files in os.walk(rootPath):
    for filename in fnmatch.filter(files, pattern):
        search = open(os.path.join(root, filename))
        for n,line in enumerate(search,1):
            if qry in line:
				line.strip()
				line.replace("<", "&lt")
				line.replace(">", "&gt")
				line.replace("\"", "&quot;")
				line.replace("'", "&#39;")
				print( "<div class='filepath'>"+os.path.join(root, filename)+"<span class='line'>("+str(n)+")</span></div >")
				print (unicode("<div class='code'>"+line+"</div>"))
				c=c+1
print("<div class='total'>Total "+str(c)+" Matches found </div >")        
        
