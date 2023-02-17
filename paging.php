<?php
class Paging {
  private static $_Instance;
  private function __clone(){}
  public static function getInstance() {
    if(empty(self::$_Instance)) self::$_Instance = new self();
    return self::$_Instance;
  }
 
  protected $count = 0;
  protected $size = 0;
  protected $page = 0;
  function prepare($sql, $pagesize=10) {
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $pageon = ($page - 1) * $pagesize;
    $sql = preg_replace('/select\s/i', '$0SQL_CALC_FOUND_ROWS ', $sql) . " limit $pageon, $pagesize";
    $rs = mysql_query($sql);
    $p = mysql_query('SELECT FOUND_ROWS()');
    list($this->count) = mysql_fetch_row($p);
    $this->size = $pagesize;
    $this->page = $page;
    return $rs;
  }
  function bar($tpl='') {
                     // if(!$tpl) $tpl = '共{count}页 第{page}页 <a href=?{reset}>首页</a> <a href=?{prve}>上一页</a> <a href=?{next}>下一页</a> <a href=?{end}>尾页</a>';
     if(!$tpl) $tpl = '<div class= col-sm-5  style= width:100% ><div class= dataTables_info  id= dg_info  style= float:left  role= status  aria-live= polite > 当前显示第 {page} 页，共{count} 页</div>
										<ul class= pagination  style= float:right;margin:0 >
										<li >
										  <a href=?{reset} aria-controls= dg  data-dt-idx= 0  tabindex= 0 >首页</a>
										</li>
										  <li >
										    <a href=?{prve} aria-controls= dg  data-dt-idx= 0  tabindex= 0 >上一页</a>
										  </li>
										  <li >
										    <a  href=?{next} aria-controls= dg  data-dt-idx= 2  tabindex= 0 >下一页</a>
										  </li>
										  <li >
										    <a href=?{end} aria-controls= dg  data-dt-idx= 2  tabindex= 0 >末页</a>
										  </li>
										</ul>
										</div>';
	$count = ceil($this->count / $this->size);
    $page = $this->page;
	$pagesize = $p;
    $d = array(
      '{reset}' => 1,
      '{prve}' => $page > 1 ? $page - 1 : 1,
      '{next}' => $page < $count ? $page + 1 : $count,
      '{end}' => $count,
      '{count}' => $count,
      '{page}' => $page,
	  '{rows}' => $pagesize,
    );
    foreach($d as $k=>&$v) {
      if(in_array($k, array('{reset}', '{prve}', '{next}', '{end}'))) {
        $_GET['page'] = $v;
        $v = http_build_query($_GET);
      }
    }
    echo strtr($tpl, $d);
  }
}
function mysql_paging_query($sql, $num=10) {
  return Paging::getInstance()->prepare($sql, $num);
}
function mysql_paging_bar($tpl='') {
  return Paging::getInstance()->bar($tpl);
}
