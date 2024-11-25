--データベース「bookManage」の作成
CREATE DATABASE IF NOT EXISTS bookManage;

--ユーザの作成(ユーザ名「joe」、パスワード「joepass」)
CREATE USER 'maho'@'localhost' IDENTIFIED BY 'mahopass';

--データベース「bookManage」に対するすべての権限をユーザ「joe」に付与
GRANT ALL PRIVILEGES ON bookManage.* TO 'maho'@'localhost';

--リモートユーザを作成
CREATE USER 'maho'@'172.16.61.%' IDENTIFIED BY 'mahopass';
GRANT ALL PRIVILEGES ON bookManage.* TO 'maho'@'172.16.61.%';
FLUSH PRIVILEGES;