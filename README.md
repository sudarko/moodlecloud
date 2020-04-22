# moodlecloud
Deploy moodle with docker-compose

0. siapkan VM/baremetal ubuntu 16.04
1. install docker (https://docs.docker.com/engine/install/ubuntu/)
2. jalankan perintah sudo docker swarm init (ada muncul perintah untuk join node berikutnya)
3. git clone https://github.com/sudarko/moodlecloud.git
4. cd moodlecloud
5. edit config.php (ganti domain misalnya), atau bisa juga edit www.conf jika mau disesuaikan hardwarenya
6. jika ada VM kedua, joinkan ke swarm dengan perintah sudo docker swarm join ...
7. sudo docker stack deploy --compose-file docker-compose.yml moodle
8. login to http://domain (nama domain sesuai di config.php), user: admin pSw: MoodleCloud!
8. sudo docker service ls
9. sudo docker service scale nama-service=jumlah
10. sudo docker swarm join-token manager/worker
11. pasang label pada node (docker node update --label-add label1=labelnya namanode)

Hasil benchmark dengan loader.io: 250 request/detik selama 1 menit: rata2 2223 ms/request,dengan 2 VM masing-masing 8 core HT dan RAM 16 GB, VM pertama untuk webserver, VM kedua untuk Database, hasil bisa dilihat di https://bit.ly/2RJa7uL
