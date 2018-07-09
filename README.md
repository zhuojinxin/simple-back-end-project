# 开发者信息
- 卓金鑫

# 环境依赖
- php 5.5.12
- MySQL 5.6.37

# 目录结构描述
```
├── README                       // help
├──data.sql                      // 数据库导出文件
├──conn.php                     //数据库连接模块
├──login.php                   //登录模块
├──register.php               //注册模块
```
# 使用说明


1. test目录下有对接口测试的DEMO脚本，先将代码放于www目录下，即可进行测试
1. conn.php为数据库连接模块，已经有一个数据库测试账号， 也可以修改conn.php中的$MYSQL_HOST_DBNAME，$MYSQL_USERNAME，$MYSQL_PASSWORD 并导入项目下的data.sql在其他数据库测试

# 安全性
-防XSS注入
-防SQL注入