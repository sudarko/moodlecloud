# moodlecloud
Deploy moodle with docker-compose

0. siapkan VM/baremetal ubuntu 16.04
1. install docker (https://docs.docker.com/engine/install/ubuntu/)
2. install docker-compose (https://docs.docker.com/compose/install/)
3. jalankan perintah sudo docker swarm init
4. git clone https://github.com/sudarko/moodlecloud.git
5. cd moodlecloud
6. edit config.php (ganti domain misalnya)
7. sudo docker stack deploy --compose-file docker-compose.yml moodle
8. sudo docker service ls
9. sudo docker service scale nama-service=jumlah
10. sudo docker swarm join-token manager/worker
11. pasang label pada node (docker node update --label-add label1=labelnya namanode)
