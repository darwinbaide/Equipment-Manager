import sys
import urllib2
from bs4 import BeautifulSoup
argv= sys.argv

first= 'http://'+sys.argv[1]+'/status/trays.php'
response = urllib2.urlopen('http://192.168.32.13/status/trays.php')
html = response.read()
#print html 
soup = BeautifulSoup(html, 'html.parser')

#print(soup.prettify())
html=list(soup.children)[2]
body=list(html.children)[3]
tag = list(body.children)[3]
inner = list(tag.children)[3]
inner2=list(inner.children)[1]
inner3=list(inner2.children)[3]
trays=list(inner3.children)
ugh1=list(trays[1].children)[3].string
tray1=list(trays[1].children)[3].string
tray2=list(trays[3].children)[3].string
tray3=list(trays[5].children)[3].string
tray4=list(trays[7].children)[3].string

response2 = urllib2.urlopen('http://'+sys.argv[1]+'/status/consumables.php')
html2 = response2.read()
#print html 
soup2 = BeautifulSoup(html2, 'html.parser')
html=list(soup2.children)[2]
body=list(html.children)[3]
body1=list(body.children)[5]
body2=list(body1.children)[1]
body3=list(body2.children)[0]
toners=list(body3.children)
black=list(list(list(list(toners[1].children)[3].children)[0].children)[0].children)[0].string
cyan=list(list(list(list(toners[2].children)[3].children)[0].children)[0].children)[0].string
magenta=list(list(list(list(toners[3].children)[3].children)[0].children)[0].children)[0].string
yellow=list(list(list(list(toners[4].children)[3].children)[0].children)[0].children)[0].string

cwaste1 =list(body.children)[9]
cwaste2 =list(cwaste1.children)[1]
cwaste3 =list(cwaste2.children)[0]
cwaste4 =list(cwaste3.children)[1]
waste =list(cwaste4.children)[2].string# this is ithe container for the waster container


total = tray1 + "|" + tray2 + "|" + tray3 + "|" + tray4 + "|" + black + "|" + yellow + "|" + cyan + "|" + magenta + "|" + waste 

print total 
