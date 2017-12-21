<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

更新中..........................

- [个人博客地址](http://chen2016php.com).
## 项目手册描述:
	1、bootstrap/helper.php 自定义函数库
	2、布局文件统一存放在 resources/views/layouts
			- app.blade.php —— 主要布局文件，项目的所有页面都将继承于此页面；
			-_header.blade.php —— 布局的头部区域文件，负责顶部导航栏区块；
			-_footer.blade.php —— 布局的尾部区域文件，负责底部导航区块；
	3、所有的css和js统一放到对应的 public/css&&js /bbs.css &&js
	4、本站使用composer require "mews/captcha:~2.0"
	扩展包实现验证码登录mews/captcha(https://github.com/mewebstudio/captcha)
	
## 表结构：
	字段名称	描述	字段类型	加索引缘由	其他
	title	帖子标题	字符串（String）	文章搜索	无
	body	帖子内容	文本（text）	不需要	无
	user_id	用户 ID	整数（int）	数据关联	unsigned()
	category_id	分类 ID	整数（int）	数据关联	unsigned()
	reply_count	回复数量	整数（int）	文章回复数量排序	unsigned(), default(0)
	view_count	查看总数	整数（int）	文章查看数量排序	unsigned(), default(0)
	last_reply_user_id	最后回复的用户 ID	整数（int）	数据关联	unsigned(), default(0)
	order	可用来做排序使用	整数（int）	不需要	default(0)
	excerpt	文章摘要，SEO 优化时使用	文本（text）	不需要	无
	slug	SEO 友好的 URI	字符串（String）	不需要	nullable()