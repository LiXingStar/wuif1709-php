<?php

class unit
{
    public $str;

    function __construct()
    {
        $this->str = '';
    }

    /*
     *  $db   句柄
     *  $pid  0
     *  $flag int
     *  $tablename 表名
     *
     *  cateTree($db,0,0,'category')
     * */
    function cateTree($db, $pid, $flag, $tablename,$currentid=null)
    {
        $flag++;
        $parentid = null;
        if($currentid){
            $sql = "select pid from $tablename where cid=$currentid";
            $parentid = $db->query($sql)->fetch_assoc()['pid'];
        }
        $sql = "select * from $tablename where pid=$pid";
        $data = $db->query($sql);
        while ($row = $data->fetch_assoc()) {
            $str = str_repeat('-', $flag);

            if($row['cid'] == $parentid){
                    $this->str .= "<option value=\"{$row['cid']}\" selected>{$str} {$row['cname']}</option>";
                }else{
                $this->str .= "<option value=\"{$row['cid']}\">{$str} {$row['cname']}</option>";
            }
            $this->cateTree($db, $row['cid'], $flag, $tablename);
        }
        return $this->str;
    }
    function cateTable($db, $tablename)
    {
        $sql = "select * from $tablename";
        $data = $db->query($sql)->fetch_all(MYSQLI_ASSOC);
        for ($i = 0; $i < count($data); $i++) {
//              $data[$i]
            $this->str .= "
               <tr>
          <td>{$data[$i]['cid']}</td>
          <td>{$data[$i]['cname']}</td>
          <td>{$data[$i]['engname']}</td>
          <td style='width: 300px'>{$data[$i]['cdesc']}</td>
          <td>
              <img src=\"{$data[$i]['cimage']}\" alt=\"\" class=\"img-thumbnail\" width='50'>
          </td>
          <td>{$data[$i]['pid']}</td>
          <td><a href=\"cateupdate.php?cid={$data[$i]['cid']}\" class=\"btn btn-info\">修改</a><a href=\"catedelete.php?cid={$data[$i]['cid']}\" class=\"btn btn-info\" style=\"margin-left: 10px\">删除</a></td>
      </tr>
              ";
        }

        return $this->str;
    }

    function articleTable($db, $tablename1, $tablename2)
    {
        $sql = "select $tablename1.*,cname from $tablename1,$tablename2 where $tablename1.cid = $tablename2.cid";
        $data = $db->query($sql)->fetch_all(MYSQLI_ASSOC);
        for ($i = 0; $i < count($data); $i++) {
            $this->str .= "
               <tr>
          <td>{$data[$i]['aid']}</td>
          <td>{$data[$i]['atitle']}</td>
          <td>{$data[$i]['adesc']}</td>
          <td>
              <img src=\"{$data[$i]['athumb']}\" alt=\"\" class=\"img-thumbnail\" width='50'>
          </td>
          <td>
             <img src=\"{$data[$i]['aimgs']}\" alt=\"\" class=\"img-thumbnail\" width='50'>
          </td>
          <td>{$data[$i]['cname']}</td>
          <td><a href=\"articleupdate.php?aid={$data[$i]['aid']}\" class=\"btn btn-info\">修改</a><a href=\"articledelete.php?aid={$data[$i]['aid']}\" class=\"btn btn-info\" style=\"margin-left: 10px\">删除</a></td>
      </tr>      
              ";
        }

        return $this->str;
    }

   /* function getCatepath($db,$cid){
        static $result=array();
        $sql = "select * from category where cid=$cid";
        $rs = $db->query($sql);
        $row = $rs->fetch_assoc();
        if($row) {
            array_push($result,$row);
            $this->getCatePath($db,$row['pid'], $result);
        }
        krsort($result);
        foreach($result as $k=>$val) {
            echo "<a href='index.php?cid={$val['cid']}'>{$val['cname']} ></a>";
        }
        return $result;
    }*/

   /*
    *           cid
    * */
    function getCate($cid,$db){
       static $arr = array();
       $sql ="select * from category where cid=$cid";
       $data = $db->query($sql)->fetch_assoc();
       if($data){
           array_push($arr,$data);
           $this->getCate($data['pid'],$db);
       }
       krsort($arr);
       return $arr;
    }
    function breadNav($cid,$db){
        $this->str = "<a href=\"/milan/index.php\"> 主页 </a>
			<span> &gt; </span>";
        $arr = $this->getCate($cid,$db);
        foreach ($arr as $value){
            $this->str .="<a href=\"category.php?cid={$value['cid']}\"> {$value['cname']} </a>
			<span> &gt;</span>";
        }
        return $this->str;
    }

}
