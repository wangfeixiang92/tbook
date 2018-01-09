##数据库说明：
###app_user 第三方登录表
    CREATE TABLE `app_users` (
    `app_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `user_id` int(11) NOT NULL,
    `source_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '网站登录类型'
    ) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
 
* app_id为回去的第三方唯一标识符
* user_id即为用户自动注册生成的id
* source_type为微信和QQ的区分。。。

###book_categories 分类表
    CREATE TABLE `book_categories` (
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `create_uid` int(11) DEFAULT NULL COMMENT '创建人id',
    `update_uid` int(11) DEFAULT NULL COMMENT '修改人id',
    `create_time` datetime DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
    `update_time` datetime DEFAULT CURRENT_TIMESTAMP COMMENT '修改时间',
    `module_id` int(11) NOT NULL COMMENT '模块id',
    `cate_name` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '分类名称',
    `parent_id` int(11) NOT NULL DEFAULT '0' COMMENT '父级id',
    `is_show` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '是否显示',
    PRIMARY KEY (`id`),
    KEY `book_categories_cate_name_index` (`cate_name`)
    ) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
比如：网站模板，js,php类文件。。。
* module_id:这个是为区分模块比如：前端，后端，sql。。。

###book_collects 收藏信息表
    CREATE TABLE `book_collects` (
      `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
      `content_id` int(11) NOT NULL,
      `user_id` int(11) NOT NULL,
      PRIMARY KEY (`id`),
      KEY `book_collects_content_id_user_id_index` (`content_id`,`user_id`)
    ) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

* content_id为收藏内容的id即book_content->id    

###book_content_tags
    CREATE TABLE `book_content_tags` (
      `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
      `content_id` int(11) NOT NULL COMMENT 'bookid',
      `tag_id` int(11) NOT NULL COMMENT '标签id',
      PRIMARY KEY (`id`),
      KEY `book_content_tags_content_id_tag_id_index` (`content_id`,`tag_id`)
    ) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
这个是tag标签和content的关联表，二者是多对多的关系

###book_contents 内容填写的表
    CREATE TABLE `book_contents` (
      `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
      `create_uid` int(11) DEFAULT NULL COMMENT '创建人id',
      `update_uid` int(11) DEFAULT NULL COMMENT '修改人id',
      `create_time` datetime DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
      `update_time` datetime DEFAULT CURRENT_TIMESTAMP COMMENT '修改时间',
      `user_id` int(11) NOT NULL COMMENT '用户id',
      `category_id` int(11) NOT NULL COMMENT '模块id',
      `title` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '标题',
      `images` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '图片',
      `keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '关键字',
      `desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '描述',
      `is_show` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '是否显示',
      `browse_num` int(11) NOT NULL DEFAULT '1' COMMENT '浏览数',
      `collect_num` int(11) NOT NULL DEFAULT '1' COMMENT '收藏数',
      `favorite_num` int(11) NOT NULL DEFAULT '1' COMMENT '喜爱数',
      `publish_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '发布时间',
      PRIMARY KEY (`id`),
      KEY `book_contents_title_index` (`title`)
    ) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
* user_id 
* category_id 
* title 
* images 
* keywords 
* desc 
* browse_num 浏览数
* collect_num 收藏数，这个在点击收藏时添加1，为冗余字段
* favorite_num 喜爱数

###book_favorites 用户喜爱表
    CREATE TABLE `book_favorites` (
      `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
      `content_id` int(11) NOT NULL,
      `user_id` int(11) NOT NULL,
      PRIMARY KEY (`id`),
      KEY `book_favorites_content_id_user_id_index` (`content_id`,`user_id`)
    ) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


###book_tags 标签tag表
    CREATE TABLE `book_tags` (
      `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
      `create_uid` int(11) DEFAULT NULL COMMENT '创建人id',
      `update_uid` int(11) DEFAULT NULL COMMENT '修改人id',
      `create_time` datetime DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
      `update_time` datetime DEFAULT CURRENT_TIMESTAMP COMMENT '修改时间',
      `tag_name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '标签名称',
      `is_show` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '是否显示',
      PRIMARY KEY (`id`)
    ) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

###modules 模块表
    CREATE TABLE `modules` (
      `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
      `create_uid` int(11) DEFAULT NULL COMMENT '创建人id',
      `update_uid` int(11) DEFAULT NULL COMMENT '修改人id',
      `create_time` datetime DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
      `update_time` datetime DEFAULT CURRENT_TIMESTAMP COMMENT '修改时间',
      `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '模块名称',
      `is_show` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '是否前端显示',
      PRIMARY KEY (`id`),
      KEY `modules_name_index` (`name`)
    ) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
    
###user 用户表
    CREATE TABLE `users` (
      `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
      `create_uid` int(11) DEFAULT NULL COMMENT '创建人id',
      `update_uid` int(11) DEFAULT NULL COMMENT '修改人id',
      `create_time` datetime DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
      `update_time` datetime DEFAULT CURRENT_TIMESTAMP COMMENT '修改时间',
      `login_item` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'E' COMMENT '默认登录方式:E:email;M:mobile..',
      `user_level` int(11) DEFAULT '1' COMMENT '用户等级',
      `username` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '用户名',
      `email` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '邮件',
      `mobile` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '手机',
      `sex` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '性别',
      `password` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '密码',
      `status` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '状态',
      `reg_date` date DEFAULT NULL COMMENT '注册时间',
      `reg_ip` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '注册时间',
      PRIMARY KEY (`id`),
      UNIQUE KEY `users_email_unique` (`email`),
      UNIQUE KEY `users_username_unique` (`username`),
      UNIQUE KEY `users_mobile_unique` (`mobile`),
      KEY `users_status_index` (`status`)
    ) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
* login_item 用户登录类型，暂时默认 U:username;E:email;M:mobile  

###websites 网站基本信息表
    CREATE TABLE `websites` (
      `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
      `create_uid` int(11) DEFAULT '1' COMMENT '创建人id',
      `update_uid` int(11) DEFAULT '1' COMMENT '修改人id',
      `create_time` datetime DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
      `update_time` datetime DEFAULT CURRENT_TIMESTAMP COMMENT '修改时间',
      `site_name` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '网站名称',
      `site_url` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '网站url连接地址',
      `site_logo` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '网站logo图片地址',
      `site_title` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '网站标题',
      `site_keywords` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '网站关键字',
      `site_desc` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '网站描述',
      `site_record_no` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '网站备案号',
      `origin_url` varchar(255) CHARACTER SET utf8mb4 NOT NULL DEFAULT '' COMMENT '源文件包资源路径',
      `status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '0 -删除 1-上线',
      `ischeck` tinyint(2) NOT NULL DEFAULT '0' COMMENT '-1 审核未通过 0-审核中 1-审核通过',
      `show_img` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '' COMMENT '预览图',
      PRIMARY KEY (`id`)
    ) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
    

    

