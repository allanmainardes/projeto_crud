# projeto_crud

## Para este projeto utilizei mysql 5.7 e php 7.0

### 1. Instalar o php 7.0 e a extensão php-mysql:
```
sudo apt-get install php7.0 php7.0-mysql
```


### 2. Tutorial para instalar a versão 5.7 do mysql:
(https://techexpert.tips/pt-br/mysql-pt-br/instalacao-do-mysql-5-7-no-ubuntu-20-04/)

### 3. Após instalar o mysql, acessar como root para criação do banco de dados:
```
CREATE DATABASE db_crud;
CREATE USER 'adminfuncionarios'@'localhost' IDENTIFIED BY 'admin123';
GRANT ALL PRIVILEGES ON db_crud.tb_funcionarios TO 'adminfuncionarios'@'localhost';
FLUSH PRIVILEGES;
EXIT;
```
### 4. Para restaurar o dump do banco de dados acesse a pasta dump no projeto e utilize o comando para restaurar.
```
cd projeto_crud/dump/
mysql -u root -p db_crud < database.sql 
```

### 5. Acessar a pasta public do projeto:
```
cd projeto_crud/public/
Rodar o servidor php:
php -S localhost:8080
```
### 6. Acessar o link: 
(http://localhost:8080/)
