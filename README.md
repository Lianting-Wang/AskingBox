# AskingBox
AskingBox是一个网页版的匿名提问箱
它的外形和工作方式都仿照了Tape
但增加了额外的“问得好”即为问题点赞的功能
## 部署指南
**准备工作**
* 配置完成的LNMP或LAMP环境的服务器
* composer（如果你需要邮件提醒服务非必需）

**配置**
1. 打开database.json
2. 如果你是本地Mysql环境不需要对dbhost做出变动
3. 在dbuser后填入你的Mysql的管理员账号
4. 在dbpass后填入你的Mysql的管理员密码
5. 保存并关闭
6. 在网页访问index.php文件，第一次会出现初始化完毕字样。如有报错请自行判断解决。
7. 如果想更改头像请自行将profile文件更改为你自己的头像
8. 可在index.php中更改用户名称与html标题

**进阶配置**
1. 本程序自动关闭邮件提醒服务
2. 如需开启请使用composer安装[PHPMailer](https://github.com/PHPMailer/PHPMailer)依赖项
3. 打开do.php文件并填入相关STMP信息

## 运行
在浏览器中直接访问index.php文件

## 使用
问题在提问后不会直接显示在前端页面，只有回复之后的问题才会在前端显示。
此外该程序未制作后台回答界面，需要在数据库中进行操作回复。
数据库中的popi_reply列为答复列、popi_good列是点赞列（其中1为点赞 默认为0）。

## 注意事项

目前该版本还为初始版本，未做sql注入防护。会在未来的版本更新中增加。
