# TP5的API说明文档



## 获取分类

get /home/category


## 获取分类

get /home/picture

参数
| 参数        | 是否必须    |  说明  |
| --------   | -----   | ---- |
| category        | 否      |  分类   |
| user        | 否      | 用户  |
| keyword        | 否      | 搜索关键词   |
| num        | 否      | 每页数量     |
| page        | 否      |  页码   |

## 获取资源

get /home/hash

参数
| 参数        | 是否必须    |  说明  |
| --------   | -----   | ---- |
| hash        | 是      |  资源hash   |

## 注册账号

post /users/register

参数
| 参数        | 是否必须    |  说明  |
| --------   | -----   | ---- |
| email        | 是      |   邮箱    |
| nick        | 是      |   昵称    |
| password        | 是      |  密码，sha1(明文)     |


## 登陆账号

post /users/login


参数
| 参数        | 是否必须    |  说明  |
| --------   | -----   | ---- |
| email        | 是      |   邮箱    |
| password        | 是      |  密码，sha1(明文)     |



## 添加资源

post /users/add


参数
| 参数        | 是否必须    |  说明  |
| --------   | -----   | ---- |
| hash        | 是      |   资源hash    |
| title        | 是      |  标题     |
| category        | 是      |   类别    |
| description        | 否      |  描述     |
| info        | 否      |  其他信息 json字符串格式    |
| size        | 是      |  文件大小，数字    |


## 更新资源

post /users/update


参数
| 参数        | 是否必须    |  说明  |
| --------   | -----   | ---- |
| hash        | 是      |   资源hash    |
| title        | 是      |  标题     |
| category        | 是      |   类别    |
| description        | 否      |  描述     |
| info        | 否      |  其他信息 json字符串格式    |
| size        | 是      |  文件大小，数字    |


