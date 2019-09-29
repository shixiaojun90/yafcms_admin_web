<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 2017/3/13
 * Time: 下午2:55
 */

class M_Admindomain extends Model {

    function __construct() {
        $this->table = 'im_domain';
		$this->primary = 'domainid';
        parent::__construct();
    }

    

    /**获取所有用户
     * @return records
     */
    public function getListByPage($pageSize=10,$current=1,$sort,$like){
        $field = array('domainid','domain','domain_name','product_name');
        return $this->Field($field)->tabPage($pageSize,$current,$sort,$like);
    }

    /**根据用户id获取用户信息
     * @param $uid
     * @return records
     */
    public function getfiledById($id){
        $field = array('domainid','domain','domain_name','product_name','url_logo','contact','com_site','com_describe');
        $where=array('domain'=>$id);
        return $this->Field($field)->where($where)->SelectOne();
    }

    
	/**获取所有数据
     * @return records
     */
    public function getListUser(){
        return $this->select();
    }

    /** 根据用户id修改用户信息
     * @param $arr
     * @param $uid
     * @return FALSE
     */
    public function updateAdmin($arr,$uid){
        $where=array('domain'=>$uid);
        return $this->where($where)->UpdateOne($arr);
    }

    
}
