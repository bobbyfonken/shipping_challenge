#!/bin/bash

echo "| Starting Docker |"
echo "--------------------------"
echo "Find the UI on 192.168.112.5:5000"
echo "Find the site on 192.168.112.5:8001"
echo "Find phpmyadmin on 192.168.112.5:8000" 

#oude docker map en container verwijderen
docker rm docker-compose-ui

#UI terug activeren en via :5000 accessen
sudo docker run \
    --name docker-compose-ui \
    -v $(pwd):$(pwd) \
    -w $(dirname $(pwd)) \
    -p 5000:5000 \
    -v /var/run/docker.sock:/var/run/docker.sock \
    francescou/docker-compose-ui:1.9.1

echo "Docker Composer UI gesloten."
