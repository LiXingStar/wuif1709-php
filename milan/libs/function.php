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
    function cateTree($db, $pid, $flag, $tablename)
    {
        $flag++;
        $sql = "select * from $tablename where pid=$pid";
        $data = $db->query($sql);
        while ($row = $data->fetch_assoc()) {
            $str = str_repeat('-', $flag);
            $this->str .= "<option value=\"{$row['cid']}\">{$str} {$row['cname']}</option>";
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
          <td>{$data[$i]['cdesc']}</td>
          <td>
              <img src=\"{$data[$i]['cimage']}\" alt=\"\" class=\"img-thumbnail\" width='50'>
          </td>
          <td>{$data[$i]['pid']}</td>
          <td><a href=\"\" class=\"btn btn-info\">修改</a><a href=\"\" class=\"btn btn-info\" style=\"margin-left: 10px\">删除</a></td>
      </tr>
              ";
        }

        return $this->str;
    }

}
