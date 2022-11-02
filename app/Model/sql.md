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

```msyql
CREATE TABLE `gcode_auth_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '菜单ID',
  `icon` varchar(200) CHARACTER SET utf8 DEFAULT '#' COMMENT '菜单图标',
  `name` varchar(200) CHARACTER SET utf8 DEFAULT '#' COMMENT '菜单名称',
  `level` tinyint(1) DEFAULT '1' COMMENT '菜单层级 1-4 最高三级',
  `route` varchar(300) CHARACTER SET utf8 DEFAULT NULL COMMENT '菜单路由',
  `parent` int(11) DEFAULT '0' COMMENT '上级菜单',
  `create_time` timestamp NULL DEFAULT NULL COMMENT '创建时间',
  `status` int(1) NOT NULL DEFAULT '0',
  `update_time` timestamp NULL DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='权限表';
```
