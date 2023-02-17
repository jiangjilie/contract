<?php 

/**
* 文件名：users.d.class.php
* 功能：    数据层
* 描述：    用户表操作
* 日期：    22-08-09
* 版权：    Copyright © 2016 github.com/JoeXiong All Rights Reserved
* @author JoeXiong
*/
class usersDal extends datamodel

{
private $_tablename;
private $_db;
public function __construct()
{
global $db_config;
$this->_db=parent::getInstance($db_config);
$this->_tablename = 'joe_users';
}
/**
* 添加一行数据
*/
public function usersAdd(usersDmodel $users)
{
try{
if(! $users instanceof usersDmodel)return false;
$data = array();
return $this->_db->insert($this->_tablename, $data);
}catch (Exception $e) {throw $e;
}
}
/**
* 根据条件查询列表
*/
public function usersList($fields="*",$wheresql="1=:a",$where=array(":a" =>1))
{
try{
$sql = "SELECT " . $fields . " FROM $this->_tablename WHERE $wheresql";
return $this->_db->queryAll($sql, $where);
}catch (Exception $e) {throw $e;
}
}
/**
* 根据条件查询记录数
*/
public function usersCount($wheresql = "1=:a", $where = array(":a"=>1))
{
try{
return $this->_db->count($this->_tablename, $wheresql, $where);
}catch (Exception $e) {throw $e;
}
}
/**
* 根据主键id查询记录数
*/
public function usersArrayRow($id, $fields = "*")
{
try{
$sql = "select " . $fields . " from " . $this->_tablename . " where =:";
$where=array(''=>$id);
return $this->_db->queryAll($sql, $where);
}catch (Exception $e) {throw $e;
}
}
/**
* 更新一行数据
*/
public function usersUpdate(usersDmodel $users)
{
try{
if(! $users instanceof usersDmodel)return false;
if($users->get==null&&$users->get==0)return false;
$data = array();
$where[] = $users->get();
return $this->_db->updata($this->_tablename, $data, $where);
}catch (Exception $e) {throw $e;
}
}
/**
* 根据where条件更新数据
*/
public function usersWhereUpdate(usersDmodel $users,$where=array("1"=>2))
{
try{
if(! $users instanceof usersDmodel)return false;
$data = array();
return $this->_db->updata($this->_tablename, $data, $where);
}catch (Exception $e) {throw $e;
}
}
/**
* 删除一行数据
*/
public function usersDelete($id)
{
try{
 return $this->_db->delete($this->_tablename, array('' => $id));
}catch (Exception $e) {throw $e;
}
}
/**
* 根据where删除数据
*/
public function usersWhereDelete($where)
{
try{
 return $this->_db->delete($this->_tablename, $where);
}catch (Exception $e) {throw $e;
}
}
/**
* 根据一行数据返回Dmodel对象
*/
public function usersDmodel(array $row)
{
$users=new usersDmodel();
if(!empty($row))
{
}
return $users;
}
} 
 ?>