# 基于Hyperf3.0 的个人项目

## 目的
```
重构之前的老项目，更新技术栈，深入学习
```
## 技术栈
```
语言：PHP 8.1
框架：Hyperf 3.0
数据库：MySQL 8.0
中间件：Redis 5.7.4
搜索引擎：ElasticSearch 8.4
日志记录：MongoDB
```

## 项目的板块
### gym
```

```
### code
```
先不做
```

### 目录结构

```
|-- src
|   |-- Request------------------------------------- 验证器目录
|   |-- Exception----------------------------------- 异常类目录
|   |-- Middleware---------------------------------- 中间件目录
|   |-- Controller---------------------------------- 控制器目录
|   |-- Contract------------------------------------ 服务接口契约目录(放Enum, ErrorCode等)
|   |-- Job----------------------------------------- 异步任务目录
|   |-- Listener------------------------------------ 事件监听器目录
|   |-- Logic--------------------------------------- 业务逻辑目录
|   |-- Model--------------------------------------- 模型目录
|   |-- RPC----------------------------------------- Interface目录 
```

### 增加中间件
```
用户身份中间件，看用户是否登录，登录状态。
用户保存的菜单。嗯这个应该修改一下，改成角色所对应的菜单的，当且仅当角色菜单信息被修改时，调用重新生成菜单缓存的方法
```

### 游戏名字随机生成解决方案
``` 
闪侠 17:08:04
我教你一个用的比较多的做法，去找个ai或者分词工具，把小说或者剧本拉下来，从里面提取名词@Setnx
如果怕有敏感词的话，还可以再做一遍脏词过滤 
通过分词器，获取一个类型的剧本或者小说，提取里面的名字，然后通过过滤器过滤掉不符合社会主义核心价值观的东西
```