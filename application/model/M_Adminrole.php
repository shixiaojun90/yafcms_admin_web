<?php

class M_Adminrole extends Model {

	function __construct() {
		$this->table = TB_PREFIX.'admin_role';
		$this->primary = 'id';
		parent::__construct();
	}

	public function getfiledById($id){
        $field = array('id','name','is_all','roleinfo');
        $where=array('id'=>$id);
        return $this->Field($field)->where($where)->SelectOne();
    }
    
    /**获取所有用户
     * @return records
     */
    public function getListByPage($pageSize=10,$current=1,$sort,$like){
        $field = array('id','name','is_all');
        return $this->Field($field)->tabPage($pageSize,$current,$sort,$like);
    }
    
    /**获取所有数据
     * @return records
     */
    public function getListUser(){
        return $this->select();
    }


}