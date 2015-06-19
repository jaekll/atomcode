# 如何安装 #

**复制文件到您的目录**

框架包含三部分文件: system, application, index.php。

分别表示：框架目录，应用目录，入口文件。在此框架上进行的开发，所有代码将存在于 application 目录下。而访问则全部通过入口文件进行。

这三部分的名字可以随意更改。只需要在入口文件中指定另外两部分即可。

**修改目录权限**

以下将以 application 作为应用目录进行介绍。

需要读写权限的目录：

application/cache

application/log

**创建配置文件**

框架运行至少需要一个配置文件：config.php ，你可以将 `system/config/config.php` 复制到 `application/config/config.php`

详细配置信息请参考 [配置选项](Configure.md)

**配置 Web Server**

干净的URL需要使用 Rewrite，以下是框架默认的URL规则需要的配置方法：

**Nginx:**

```
server {
        listen       80;
        server_name  www.example.com;
        root /data/www/www.example.com;
        if (!-e $request_filename)
        {
              rewrite ^/(.*)$ /index.php? last;
        }

        index index.php;

        location ~ \.php$ {
                fastcgi_pass   127.0.0.1:9000;
                fastcgi_index  index.php;
                include fcgi.conf;
        }
}
```

**Apache** ：你可以将这些代码写在 .htaccess

```
RewriteEngine on
RewriteCond $1 !^(index\.php|images|robots\.txt)
RewriteRule ^(.*)$ /index.php/$1 [L]
```

通过以上两种 Rewrite 规则，你就可以使用 /path/info 这样格式的URL

# 如何部署到生产环境 #

**1. 修改入口文件**

测试模式关闭、工作环境改为生产环境配置目录名

```
/**
 * 
 * 是否测试模式，控制错误输出和允许调试、测试、记录日志, 不定义则表示 TEST_MODEL 为 FALSE
 * @var Boolean
 */
define("TEST_MODEL", FALSE);
/**
 * 定义环境，如果不定义则使用 /application/config/目录下配置，否则使用 /application/config/ENV/目录下配置
 * @var String
 */
define('ENV', '');
```

**2. 修改配置** （公共配置中应该提前配置好）

这两项要修改为正确的配置：

```
$config['base_url']	= 'http://www.example.com/';
$config['index_page'] = '';
```

检查配置项：

  * 是否关闭评测
```
$config['enable_benchmark'] = FALSE;
```

  * 数据库配置

**关闭数据库日志**

```
$config['database']['log'] = FALSE;
```

**关闭调试模式**

```
$config['database']['db_debug'] = FALSE;
```

**关闭查询记录功能**

```
$config['database']['save_queries'] = FALSE;
```

**在开发过程中增加的配置要同步到公共配置中**

**3. 设置目录权限**
| application/cache | 777 |
|:------------------|:----|
| application/log   | 777 |

**4. 删除可能存在的多余文件**

清空cache目录

**提交应注意**

以下文件不要提交(给使用Dreamweaver和Zend Studio或Eclipse的同学提示)：

> .settings

> .buildpath

> .project

> application/cache/

> application/log/

除第一次外，入口文件也尽量不要提交，因为它包含了您的私有配置

配置及其他文件均可提交