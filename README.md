## 说明

`pagon/app`是一个基于[pagon](https://github.com/hfcorriez/pagon)框架的应用基本骨架，用来快速创建和开发一套Web应用。

本应用使用[paris](https://github.com/j4mie/paris)做数据库模型，使用[phpmig](https://github.com/davedevelopment/phpmig)来管理数据库升级

## 安装

```shell
composer.phar create-project pagon/app myapp 0.1.0
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

## License 

(The MIT License)

Copyright (c) 2012 hfcorriez &lt;hfcorriez@gmail.com&gt;

Permission is hereby granted, free of charge, to any person obtaining
a copy of this software and associated documentation files (the
'Software'), to deal in the Software without restriction, including
without limitation the rights to use, copy, modify, merge, publish,
distribute, sublicense, and/or sell copies of the Software, and to
permit persons to whom the Software is furnished to do so, subject to
the following conditions:

The above copyright notice and this permission notice shall be
included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED 'AS IS', WITHOUT WARRANTY OF ANY KIND,
EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.
IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY
CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT,
TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE
SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
