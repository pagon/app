## 说明

`pagon/app`是一个基于[pagon](https://github.com/hfcorriez/pagon)框架的应用基本骨架，用来快速创建和开发一套Web应用。

## 安装

```shell
composer.phar create-project pagon/app myapp
```

## 目录结构（建议）

```
- bin			命令行可执行文件
  - task		命令行任务入口 
- config		配置目录
- migrations	数据库升级和创建文件
- public		网站根目录
  - static		静态文件目录 
  - index.php	网站入口文件 
- src			网站源代码
  - Route		控制器
    - Web		网站控制器
    - Cli		命令行控制器
  - Helper		助手文件
- views			模板文件夹
- tests			测试用例
- vendor		Composer自动生成的依赖库目录
```
