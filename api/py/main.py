#-*-encoding:utf-8-*_

import requests
from bs4 import BeautifulSoup
import sys
import json
import re
if __name__ =="__main__":
    headers = {
        'Accept':'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8',
        'Accept-Encoding':'gzip, deflate, br',
        'Accept-Language':'ko-KR,ko;q=0.9,en-US;q=0.8,en;q=0.7',
        'Cache-Control':'max-age=0',
        'Connection':'keep-alive',
        'Content-Length':'53',
        'Content-Type':'application/x-www-form-urlencoded',
        'Cookie':'ORA_WX_SESSION="163.180.96.225:80-0"; JSESSIONID=a3b460e1ce5fd52bcbb042944a2ae74b674f2ba204e.nQjPpkrvpArtmgTFo7iImkaIoR8UaNaKahD3lN4QaMSLc30IchmIax8P-x4TakeSmN4Iah0Kn3zvmQ8Lbx4I-huKa30xoQvPolaInQjPpkrvpArtmgTFo7iImkaIoR8xahiSb3qMbNmLawb48QHCrkzN8QfznA5Pp7ftolbGmkTy; _ga=GA1.3.911711337.1506663336; WMONID=PfcDgf0dvtK',
        'Host':'khuis.khu.ac.kr',
        'Origin':'https://khuis.khu.ac.kr',
        'Referer':'https://khuis.khu.ac.kr/',
        'Upgrade-Insecure-Requests':'1',
        'User-Agent':'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36'
    }
    login = {
        'user_id': '',
        'password': '',
        'RequestData':''
    }

    data = []

    login['user_id'] = sys.argv[1]
    login['password'] = sys.argv[2]
    res = requests.post("https://khuis.khu.ac.kr/java/servlet/khu.cosy.login.loginCheckAction", headers=headers,data=login)
    res2 = requests.get("https://khuis.khu.ac.kr/java/servlet/controllerCosy?action=19&menuId=hsip&startpage=start",cookies=res.cookies)
    bs = BeautifulSoup(res2.text, "html.parser")
    div = bs.find("div", id="GNB-student")
    if div == None:
        data = ["ERROR", "NULL", "NULL"]
    else:
        p = div.find_all("p")
        list=[]
        for i in p:
            list.append(i.get_text())

        name = list[0].split(':')[1].replace(' ', '')

        temp = list[1].split(':')[1].replace('\n', '').split(' ')[0:3]
        major = temp[1].encode('utf-8')
        college = temp[2].encode('utf-8')

        data = [name, major, college]

        major, college = ( re.split('[:. \n]+', list[1])[2:4] )
        print ( name, major, college)
        asd = name.replace('님', '')
        f = open(sys.argv[1]+'.txt', 'w')
        f.write(sys.argv[1]+'\n')
        f.write(sys.argv[2]+'\n')
        f.write(asd+'\n'+major+'\n'+college)
        f.close()


    '''data = 1
    asd = {"firstname": 4, "lastname": 4, "password": 4}
    resp = requests.post('./test.php', params=asd)


    mydata = [('one', data[1]), ('two', data[2])] # The first is the var name the second is the value
    mydata = urllib.urlencode(mydata)
    path = './test.php'  # the url you want to POST to
    req = urllib.request.Request(path, mydata)
    req.add_header("Content-type", "application/x-www-form-urlencoded")
    page = urllib.request.urlopen(req).read()
    print(page)
'''