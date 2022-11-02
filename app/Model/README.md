# 关于
model 都要继承 GModel

## 关于操作
Exp:
$condition = ['=', '!=', '<', '<=', '>', '>=', 'LIKE', 'NOT LIKE', '<>','IN','NOT IN','BETWEEN','NULL','NOT NULL'];
$where = [
    ['id',$condition[$i],...],
];
$option = [
    'orderByRaw' => 'id desc name asc',
    'with'      => [function($q){....},],
    'perLimit' => '1'
];