ระบบกิจกรรมนักเรียน นักศึกษา


วิธีการรันบน localhost

- install dev environment by appserv (windows), mamp (mac)
require php 7.3+

- setup hosts file on localhost

(Mac): sudo vi /etc/hosts
1227.0.0.1  dev.activity64.itchaiyaphum.com

- install node.js
- install Browser Sync for automation refresh page when changing code
npm install -g browser-sync
browser-sync start --proxy "dev.activity64.itchaiyaphum.com" --files "**/**.*"

