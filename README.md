# ระบบกิจกรรมนักเรียน นักศึกษา วิทยาลัยเทคนิคชัยภูมิ

เครื่องมือในการพัฒนา
- Eclipse for PHP
- MAMP (สำหรับ Mac) | Wamp ( สำหรับ Windows)

System Requirements
- Apache 2.4+
- PHP 5.6/7.2
- MySQL 5.5+



1.วิธีการตั้งค่าให้้รันได้บนเครื่อง localhost
1.1.ตั้งค่าไฟล์ hosts
- สำหรับ Windows (C:\Windows\System32\drivers\etc\hosts)
- สำหรับ Mac (/etc/hosts)
- ให้เพิ่มบันทัดนี้ "127.0.0.1  dev.activity64.itchaiyaphum.com"

1.2.สร้างฐานข้อมูลใน localhost
- สร้างฐานข้อมูลผ่าน phpmyadmin โดยดูชื่อ database, username, password ได้จากไฟล์ application/config/database.php

1.3.สร้างฐานข้อมูล
- import ฐานข้อมูลโดยใช้ไฟล์ sql/database.sql ผ่าน phpmyadmin

1.4.รันทดสอบระบบ
- เปิด Web Browser และรัน url (http://dev.activity64.itchaiyaphum.com)
- login โดยใช้ demo user / password ดังนี้
- admin@demo.com / 123456
- advisor@demo.com / 123456


2.วิธีการ deploy to production
- เข้าไปที่ url: http://deploy.itchaiyaphum.com
- username, password สอบถามได้ที่อาจารย์อลงกรณ์
- กด build ที่ Job: "activity64.itchaiyaphum.com - deploy"
- เข้า Browser ไปที่ url (http://activity64.itchaiyaphum.com)


