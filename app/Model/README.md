# 数据库-表结构

## 用户表
```mysql
CREATE TABLE `gcode_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT '名字',
  `sex` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 未知 1 男 2 女',
  `password` varchar(255) NOT NULL COMMENT '密码',
  `salt` varchar(16) NOT NULL COMMENT '密码盐',
  `phone` varchar(20) DEFAULT NULL COMMENT '手机号',
  `icon` varchar(255) DEFAULT NULL COMMENT '头像',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `create_time` timestamp NULL DEFAULT NULL,
  `update_time` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户表'; 
```

## 用户权限组
```mysql
CREATE TABLE `gcode_auth_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT '0' COMMENT '添加的用户',
  `name` char(100) NOT NULL DEFAULT '' COMMENT '用户组中文名称',
  `menus` text COMMENT '允许菜单',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '为1正常，为0禁用',
  `create_time` timestamp NULL DEFAULT NULL COMMENT '创建时间',
  `update_time` timestamp NULL DEFAULT NULL COMMENT '更新时间t',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='权限表';
```

## 菜单表

包含菜单id
菜单路由
菜单描述
菜单等级
菜单上级