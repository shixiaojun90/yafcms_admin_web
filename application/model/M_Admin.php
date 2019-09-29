<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 2017/3/13
 * Time: 下午2:55
 */

class M_Admin extends Model {

    function __construct() {
        $this->table = TB_PREFIX.'admin';
		$this->primary = 'adminid';
        parent::__construct();
    }

    
    /**
     * Check admin login
     *
     * @param string $login
     * @return string $password
     * @return 1 on success or 0 or failure
     */
    public function checkLogin($login, $password){
        $field = array('adminid','role_id','adminname');
        $rsa=new Rsa();
        $password=$rsa->privDecrypt($password);
        $where = array('adminname' => $login, 'adminpass' => md5($password));
        return $this->Field($field)->Where($where)->SelectOne();
    }


    /**获取所有用户
     * @return records
     */
    public function getListByPage($pageSize=10,$current=1,$sort,$like){
        $field = array('adminid','adminname','domainid','role_id');
        return $this->Field($field)->tabPage($pageSize,$current,$sort,$like);
    }

    /**根据用户id获取用户信息
     * @param $uid
     * @return records
     */
    public function getfiledById($uid){
        $field = array('adminid','adminname','domainid','role_id');
        $where=array('adminid'=>$uid);
        return $this->Field($field)->where($where)->SelectOne();
    }

    /**根据用户name获取用户信息
     * @param $uid
     * @return records
     */
    public function getByName($login){
        $field = array('adminid','adminname','domainid','role_id');
        $where=array('adminname'=>$login);
        return $this->Field($field)->where($where)->SelectOne();
    }
    
    /**根据用户name获取用户信息
     * @param $uid
     * @return records
     */
    public function getListrole(){
        $field = array('adminid','adminname','domainid','role_id');
        return $this->Field($field)->Select();
    }
	

    /** 根据用户id修改用户信息
     * @param $arr
     * @param $uid
     * @return FALSE
     */
    public function updateAdmin($arr,$id){
        $where="adminid = {$id}";
        return $this->where($where)->UpdateOne($arr);
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
