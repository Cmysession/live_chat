### laravel软连接
#### 1. php artisan storage:link
#### 2. ln -s /***/storage/app/public /***/public/storage

#### 开启端口
##### 启动： systemctl start firewalld
##### firewall-cmd --zone=public --add-port=9502/tcp --permanent
##### firewall-cmd --zone=public --add-port=3307/tcp --permanent
##### firewall-cmd --zone=public --add-port=80/tcp --permanent


##### firewall-cmd --zone=public --remove-port=9502/tcp --permanent
##### firewall-cmd --zone=public --remove-port=3307/tcp --permanent
##### firewall-cmd --zone=public --remove-port=80/tcp --permanent
#### 立即生效: firewall-cmd --reload
##### 关闭： systemctl stop firewalld
##### 查看状态： systemctl status firewalld
##### 开机禁用  ： systemctl disable firewalld
##### 开机启用  ： systemctl enable firewalld

#### 安装 Supervisor 守护常驻
##### https://cloud.tencent.com/developer/article/1838132

#### 证书
##### https://github.com/acmesh-official/acme.sh/wiki/%E8%AF%B4%E6%98%8E


