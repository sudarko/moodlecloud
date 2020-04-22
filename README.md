# moodlecloud
Deploy moodle with docker-compose

0. siapkan VM/baremetal ubuntu 16.04
1. install docker (https://docs.docker.com/engine/install/ubuntu/)
2. jalankan perintah sudo docker swarm init (ada muncul perintah untuk join node berikutnya)
3. git clone https://github.com/sudarko/moodlecloud.git
4. cd moodlecloud
5. edit config.php (ganti domain misalnya), atau bisa juga edit www.conf jika mau disesuaikan hardwarenya
6. jika ada VM kedua, joinkan ke swarm dengan perintah sudo docker swarm join ...
7. sudo docker stack deploy moodle -c docker-compose.yml
8. login to http://domain (nama domain sesuai di config.php), user: admin pSw: MoodleCloud!
8. sudo docker service ls
9. sudo docker service scale nama-service=jumlah
10. sudo docker swarm join-token manager/worker
11. pasang label pada node (docker node update --label-add label1=labelnya namanode)
12. Jika menggunakan data yang sudah ada silahkan mount sourcecode moodle dan juga moodledata ke semua vm ke folder /moodle, selanjutnya edit docker-compose.yml pada bagian:

    volumes:
      - /moodle/html:/var/www/html
#      - ./config.php:/var/www/html/config.php
      - ./www.conf:/etc/php/7.3/php-fpm.d/www.conf
      - /moodle/moodledata:/var/www/moodledata
  config.php akan menggunakan config.php yang lama yang sudah ada disourcecode yang sudah dimiliki, termasuk koneksi databasenya juga akan mengarah sesuai config.php yang dipakai
  service db bisa dicomment:
  
#   db:
#   image: postgres:11.5
#    deploy:
#      placement:
#        constraints: [node.hostname == node1] # ganti check hostname dengan perintah sudo docker node ls
#      resources:
#        limits:
#          cpus: '2'
#          memory: 2G
#        reservations:
#          cpus: '1'
#          memory: 1G
#    networks:
#      - moodle
#    environment:
#      POSTGRES_USER: moodle
#      POSTGRES_PASSWORD: pass_CLOUD
#    volumes:
#      - db-data:/var/lib/postgresql/data
#comment ini jika deploy lagi dengan data yang sudah tersimpan
#      - ./moodlecloud.sql:/docker-entrypoint-initdb.d/init.sql

Hasil benchmark dengan loader.io: 250 request/detik selama 1 menit: rata2 2223 ms/request,dengan 2 VM masing-masing 8 core HT dan RAM 16 GB, VM pertama untuk webserver, VM kedua untuk Database, hasil bisa dilihat di https://bit.ly/2RJa7uL
