<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 2017/3/13
 * Time: 下午2:55
 */

class M_Info extends Model {

    function __construct() {
        $this->table = TB_PREFIX.'info';
		$this->primary = 'id';
        parent::__construct();
    }

    
    public function getfiledById(){
        $field = array('id','info');
        return $this->SelectOne();
    }

    /** 根据用户id修改用户信息
     * @param $arr
     * @param $uid
     * @return FALSE
     */
    public function updateAdmin($arr){
        return $this->UpdateOne($arr);
    }
    
    /** 根据用户id删除用户信息
     * @param $arr
     * @param $uid
     * @return FALSE
     */
    public function deleteAdmin($id){
        $where="adminid in ({$id})";
        return $this->where($where)->Delete();
    }
    
}
