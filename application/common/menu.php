<?php
/*array(菜单名，菜单url参数，是否显示)*/
$i=1;
$j=0;
$menu_left =  array();

$menu_left[$i]['parent']=array(
		'name' => '后台管理设置',
		'icon' => '&#xe697;',
		'url' => '',
		'level' => '1',
		'status'=>'1'
);
$menu_left[$i]['child'] = array(
		array('name' => '系统设置','icon' => '&#xe6a7;','url' => '/admin/systemset','level' => '0','status'=>'1'),
);

$i++;
$menu_left[$i]['parent']=array(
		'name' => '后台权限管理',
		'icon' => '&#xe697;',
		'url' => '',
		'level' => '4',
		'status'=>'1'
);
$menu_left[$i]['child'] = array(
		array('name' => '公司管理员','icon' => '&#xe6a7;','url' => '/admin/userinfo','level' => '0','status'=>'1'),
		array('name' => '角色管理','icon' => '&#xe6a7;','url' => '/admin/roleinfo','level' => '1','status'=>'1'),
);


$i++;
$menu_left[$i]['parent']=array(
		'name' => '公告管理',
		'icon' => '',
		'url' => '',
		'level' => '8',
		'status'=>'1'
);
$menu_left[$i]['child'] = array(
		array('name' => '公告列表管理','icon' => '','url' => '/admin/notice','level' => '1','status'=>'1')
);

return $menu_left;