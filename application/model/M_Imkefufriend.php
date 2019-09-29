<?php

class M_Imkefufriend extends Model {

	function __construct() {
		$this->table = TB_PREFIX.'kefu_friend';
		$this->primary = 'id';
		parent::__construct();
	}

	public function getfiledById($id){
	    $where=array("friend_id"=>$id);
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
    public function getListAll($id){
        $where=array('kefu_id'=>$id);
        return $this->where($where)->select();
    }
    
    public function updateAdmin($arr,$id){
        $where=array('reqUserId'=>$id);
        return $this->where($where)->UpdateByID($arr,$id);
    }


}