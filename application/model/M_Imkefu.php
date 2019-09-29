<?php

class M_Imkefu extends Model {

	function __construct() {
		$this->table = TB_PREFIX.'kefu';
		$this->primary = 'id';
		parent::__construct();
	}

	public function getfiledById($id){
	    $where=array("adminid"=>$id);
        return $this->where($where)->SelectOne();
    }
    
    public function getfiled($id){
	    $where=array("id"=>$id);
        return $this->where($where)->SelectOne();
    }
    
    /**获取所有用户
     * @return records
     */
    public function getListByPage($pageSize=10,$current=1,$sort,$like){
        return $this->tabPage($pageSize,$current,$sort,$like);
    }
    
    /**获取所有数据
     * @return records
     */
    public function getListAll(){
        return $this->select();
    }
    
    public function updateAdmin($arr,$id){
        $where=array('reqUserId'=>$id);
        return $this->where($where)->UpdateByID($arr,$id);
    }


}