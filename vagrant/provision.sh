echo "provision start"

wget -O - http://dl.hhvm.com/conf/hhvm.gpg.key | apt-key add -
echo deb http://dl.hhvm.com/debian wheezy main | tee /etc/apt/sources.list.d/hhvm.list

echo "running update"
apt-get update

echo "installing vim"
apt-get install vim -y

echo "installing nginx"
apt-get install nginx -y

cat /etc/nginx/sites-enabled/default | sed -e "s/index index.html index.htm;/index index.php index.html;/" > /etc/nginx/sites-enabled/default-temp
mv /etc/nginx/sites-enabled/default-temp /etc/nginx/sites-enabled/default

echo "installing hhvm"
apt-get install hhvm -y
/usr/share/hhvm/install_fastcgi.sh
/etc/init.d/hhvm restart
/etc/init.d/nginx restart

ln -s /hack-playground/ /usr/share/nginx/www/

echo "provision end"