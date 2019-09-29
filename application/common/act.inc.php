<?php
$acl_inc = array();
$i = 0;

$acl_inc[$i]['name'] = '管理员管理';
$acl_inc[$i]['globar'] = array(
	"Userinfo" => array(
		"公司管理员" => array(
		    "主页" => "index",
			"列表" => "tabPage",
			"添加" => "add",
			"编辑" => "getById",
			"修改" => "updateById",
			"删除" => "delete"
		),
	),
	"Roleinfo" => array(
		"角色管理" => array(
		    "主页" => "index",
			"列表" => "tabPage",
			"添加" => "add",
			"编辑" => "getById",
			"查看权限" => "checkedrole",
			"修改" => "updateById",
			"删除" => "delete"
		),
	),
	"Actionadmin" => array(
		"操作管理员" => array(
		    "主页" => "index",
			"列表" => "tabPage",
			"添加" => "add",
			"编辑" => "getById",
			"修改" => "updateById",
			"删除" => "delete"
		),
	),
);

$i++;
$acl_inc[$i]['name'] = '后台设置管理';
$acl_inc[$i]['globar'] = array(
	"Systemset" => array(
		"系统设置" => array(
		    "主页" => "index",
			"列表" => "tabPage",
			"添加" => "add",
			"编辑" => "getById",
			"修改" => "updateById",
			"删除" => "delete",
			"上传图片" => "upload"
		),
	),
	"Homeimg" => array(
		"首页幻灯片" => array(
		    "主页" => "index",
			"编辑" => "addhtml",
			"删除" => "delete",
			"上传图片" => "upload"
		),
	),
	"Link" => array(
		"合作伙伴" => array(
		    "主页" => "index",
			"编辑" => "addhtml",
			"删除" => "delete",
			"上传图片" => "upload"
		),
	),
);

$i++;
$acl_inc[$i]['name'] = '导航管理';
$acl_inc[$i]['globar'] = array(
	"Info" => array(
		"关于华视" => array(
		    "主页" => "index",
			"列表" => "tabPage",
			"添加" => "add",
			"编辑" => "getById",
			"修改" => "updateById",
			"删除" => "delete",
			"上传图片" => "uploadimg",
			"上传编辑器图片" => "upload"
		),
	),
	"Media" => array(
		"多媒体技术" => array(
		    "主页" => "index",
			"列表" => "tabPage",
			"添加" => "add",
			"编辑" => "getById",
			"修改" => "updateById",
			"删除" => "delete",
			"上传图片" => "uploadimg",
			"上传编辑器图片" => "upload"
		),
	),
	"Case" => array(
		"经典案例" => array(
		    "主页" => "index",
			"列表" => "tabPage",
			"添加" => "add",
			"编辑" => "getById",
			"修改" => "updateById",
			"删除" => "delete",
			"上传图片" => "uploadimg",
			"上传编辑器图片" => "upload"
		),
	),
	"News" => array(
		"新闻展示" => array(
		    "主页" => "index",
			"列表" => "tabPage",
			"添加" => "add",
			"编辑" => "getById",
			"修改" => "updateById",
			"删除" => "delete",
			"上传图片" => "upload"
		),
	),
	"Newgroy" => array(
		"新闻分类" => array(
		    "主页" => "index",
			"列表" => "tabPage",
			"添加" => "add",
			"编辑" => "getById",
			"修改" => "updateById",
			"删除" => "delete",
			"上传图片" => "uploadimg",
			"上传编辑器图片" => "upload"
		),
	),
	"Newlist" => array(
		"新闻列表" => array(
		    "主页" => "index",
			"列表" => "tabPage",
			"添加" => "add",
			"编辑" => "getById",
			"修改" => "updateById",
			"删除" => "delete",
			"上传图片" => "uploadimg",
			"上传编辑器图片" => "upload"
		),
	),
	"Contact" => array(
		"联系我们" => array(
		    "主页" => "index",
			"列表" => "tabPage",
			"添加" => "add",
			"编辑" => "getById",
			"修改" => "updateById",
			"删除" => "delete",
			"上传图片" => "upload"
		),
	),
);

$i++;
$acl_inc[$i]['name'] = '经典案例';
$acl_inc[$i]['globar'] = array(
	"Categrouy" => array(
		"分类管理" => array(
		    "主页" => "index",
			"列表" => "tabPage",
			"添加" => "add",
			"编辑" => "getById",
			"修改" => "updateById",
			"删除" => "delete",
			"上传图片" => "uploadimg",
			"上传编辑器图片" => "upload"
		),
	),
	"Caselist" => array(
		"列表管理" => array(
		    "主页" => "index",
			"列表" => "tabPage",
			"添加" => "add",
			"编辑" => "getById",
			"修改" => "updateById",
			"删除" => "delete",
			"上传图片" => "uploadimg",
			"上传编辑器图片" => "upload"
		),
	),
	"Technology" => array(
		"技术构成" => array(
		    "主页" => "index",
			"列表" => "tabPage",
			"添加" => "add",
			"编辑" => "getById",
			"修改" => "updateById",
			"删除" => "delete",
			"上传图片" => "uploadimg",
			"上传编辑器图片" => "upload"
		),
	),
	"Project" => array(
		"项目管理" => array(
		    "主页" => "index",
			"列表" => "tabPage",
			"添加" => "add",
			"编辑" => "getById",
			"修改" => "updateById",
			"删除" => "delete",
			"上传图片" => "uploadimg",
			"上传编辑器图片" => "upload"
		),
	),
	"Auth" => array(
		"认证资质" => array(
		    "主页" => "index",
			"列表" => "tabPage",
			"添加" => "add",
			"编辑" => "getById",
			"修改" => "updateById",
			"删除" => "delete",
			"上传图片" => "uploadimg",
			"上传编辑器图片" => "upload"
		),
	),
);


return $acl_inc;