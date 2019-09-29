<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 2017/3/13
 * Time: 下午2:55
 */

class M_Categrouy extends Model {

    function __construct() {
        $this->table = TB_PREFIX.'categrouy';
		$this->primary = 'id';
        parent::__construct();
    }
    
    /**获取所有用户
     * @return records
     */
    public function getListByPage($pageSize=10,$current=1,$sort,$like){
        //$field = array('id','name','is_all');
        return $this->tabPage($pageSize,$current,$sort,$like);
    }

    
    public function getfiledById($id){
        //$field = array('id','info');
        $where=array($this->primary=>$id);
        return $this->Where($where)->SelectOne();
    }
    
    public function getfiledall(){
        return $this->Select();
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
        $where="id in ({$id})";
        return $this->where($where)->Delete();
    }
    
}
