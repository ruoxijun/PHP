<?php
header("Access-Control-Allow-Origin:*");
// 错误码
$errCode = [
  '0' => '成功',
  '200101' => 'api参数不能为空或不正确',
  '200102' => 'id必须是整数',
  '200103' => 'code必须是数字',
  '200104' => 'type参数必须是0或1',
  '200105' => '数据处理失败',
  '200106' => '接口调用成功，但无数据返回',
  '200107' => 'name不能为空',
  '200108' => 'page与size必须是整数',
  '200109' => '学生id必填且为整数',
  '200110' => '学号不能为空',
  '200111' => '学生姓名必填',
  '200112' => '学生所属班级Id必填且为整数',
  '200113' => '身份证号码必填或格式不正确',
  '200114' => '手机号码格式不正确',
  '200115' => '没有学生被删除'
];

// 获取api参数的值
// $api = $_GET['api'];
// api参数即可能是get请求,又可能是post
$api = isset($_REQUEST['api']) ? $_REQUEST['api'] : '';

// 连接数据库
$mysqli = new mysqli('localhost', 'root', 'root', 'studentdb');
$mysqli->set_charset('utf8');
// 默认时区
date_default_timezone_set('PRC');

switch (strtolower($api)) {
// 返回指定的专业或全部专业数据
case 'getprofession':
  // 获取其它querystring参数的值
  // $id = $_GET['id'];
  // $code = $_GET['code'];
  // $name = $_GET['name'];
  // $type = $_GET['type'];
  $id = isset($_GET['id']) ? $_GET['id'] : 0;
  $code = isset($_GET['code']) ? $_GET['code'] : '';
  $name = isset($_GET['name']) ? $_GET['name'] : '';
  $type = isset($_GET['type']) ? $_GET['type'] : 0;
  // 判断各参数值的正确性
  // querystring的值都是string类型的。
  if (!is_numeric($id)) {
    $return_arr = [
      'errCode' => '200102',
      'message' => $errCode['200102'],
      'data' => [],
    ];
    break;
  }
  // 哪些值，可以隐式转换为false
  if (!empty($code) && !is_numeric($code)) {
    $return_arr = [
      'errCode' => '200103',
      'message' => $errCode['200103'],
      'data' => [],
    ];
    break;
  }
  if (!is_numeric($type) || (int) $type < 0 || (int) $type > 1) {
    $return_arr = [
      'errCode' => '200104',
      'message' => $errCode['200104'],
      'data' => [],
    ];
    break;
  }

  // 处理查询条件
  $condition = '';
  if ($id && $id != 0) {
    $condition .= " AND profId={$id}";
  }
  if (!empty($code)) {
    $condition .= " AND profCode={$code}";
  }
  if (!empty($name)) {
    $condition .= " AND profName LIKE '%{$name}%'";
  }
  // 返回数据的类型
  $field = '';
  if ($type == 0) {
    $field = 'profId, profCode, profName';
  } else {
    $field = 'profId, profCode, profName, leader, master, plan, level';
  }

  $sql = "SELECT {$field} FROM v_professions WHERE 1=1{$condition}";
  // 执行查询
  $res = $mysqli->query($sql);
  if (!$res) {
    $return_arr = [
      'errCode' => '200105',
      'message' => $errCode['200105'],
      'data' => [],
    ];
    break;
  }
  // 检测结果集的行数
  if (!$res->num_rows) {
    $return_arr = [
      'errCode' => '200106',
      'message' => $errCode['200106'],
      'data' => [],
    ];
    $res->free();
    break;
  }

  // 获取结果集中的数据，关联二维数组。
  $res_data = $res->fetch_all(MYSQLI_ASSOC);
  $res->free();
  $return_arr = [
    'errCode' => 0,
    'message' => 'success',
    'data' => $res_data,
  ];
  break;

// 获取班级数据(专业名称)
case 'getclassbyprofname':
  $name = isset($_GET['name']) ? $_GET['name'] : '';
  if (empty($name)) {
    $return_arr = [
      'errCode' => '200107',
      'message' => $errCode['200107'],
      'data' => [],
    ];
    break;
  }

  $sql = "SELECT classId, className, profId, profCode, profName, inYear, teacher FROM v_class_profession WHERE profName LIKE '%{$name}%'";
  $res = $mysqli->query($sql);
  if (!$res) {
    $return_arr = [
      'errCode' => '200105',
      'message' => $errCode['200105'],
      'data' => [],
    ];
    break;
  }
  // 检测结果集的行数
  if (!$res->num_rows) {
    $return_arr = [
      'errCode' => '200106',
      'message' => $errCode['200106'],
      'data' => [],
    ];
    $res->free();
    break;
  }
  // 获取结果集中的数据，关联二维数组。
  $res_data = $res->fetch_all(MYSQLI_ASSOC);
  $res->free();
  $return_arr = [
    'errCode' => 0,
    'message' => 'success',
    'data' => $res_data,
  ];
  break;

// 查询统计数据
case 'getstatistics':
  $p_name = isset($_GET['profname']) ? $_GET['profname'] : '';
  $c_name = isset($_GET['classname']) ? $_GET['classname'] : '';
  $s_name = isset($_GET['stuname']) ? $_GET['stuname'] : '';

  // 查询条件的处理
  $condition = '';
  if (!empty($p_name)) {
    $condition .= " AND profName LIKE '%{$p_name}%'";
  }
  if (!empty($c_name)) {
    $condition .= " AND className LIKE '%{$c_name}%'";
  }
  if (!empty($s_name)) {
    $condition .= " AND stuName LIKE '%{$p_name}%'";
  }

  // 构建SELECT语句
  // 1. 专业数量
  $sql_prof = "SELECT profName FROM v_student_class_profession WHERE 1=1{$condition} GROUP BY profName";
  $res_prof = $mysqli->query($sql_prof);

  // 2. 班级数量
  $sql_class = "SELECT className FROM v_student_class_profession WHERE 1=1{$condition} GROUP BY className";
  $res_class = $mysqli->query($sql_class);

  // 3. 性别统计
  $sql_gender = "SELECT gender, COUNT(gender) AS `count` FROM v_student_class_profession WHERE 1=1{$condition} GROUP BY gender ORDER BY gender DESC";
  $res_gender = $mysqli->query($sql_gender);


  // 4. 图表数据
  $sql_chars = "SELECT *, (man + woman + unknown) AS `total` FROM (
    SELECT className,
      IFNULL((SELECT 人数 FROM v_class_gender WHERE t1.className = className AND gender='男'), 0) AS man,
      IFNULL((SELECT 人数 FROM v_class_gender WHERE t1.className = className AND gender='女'), 0) AS woman,
      IFNULL((SELECT 人数 FROM v_class_gender WHERE t1.className = className AND gender='未知'), 0) AS unknown
    FROM (SELECT DISTINCT className FROM v_student_class_profession	WHERE 1=1{$condition}) AS t1
    ) AS t2";
  $res_chars = $mysqli->query($sql_chars);

  if (!($res_prof && $res_class && $res_gender && $res_chars)) {
    $return_arr = [
      'errCode' => '200105',
      'message' => $errCode['200105'],
      'data' => [],
    ];
    break;
  }

  if (!($res_prof->num_rows && $res_class->num_rows && $res_gender->num_rows && $res_chars->num_rows)) {
    $return_arr = [
      'errCode' => '200106',
      'message' => $errCode['200106'],
      'data' => [],
    ];
    $res_prof->free();
    $res_class->free();
    $res_gender->free();
    $res_chars->free();
    break;
  }

  // 处理数据

  $gender = $res_gender->fetch_all(MYSQLI_ASSOC);
  $man = $woman = $unknown = 0;
  foreach ($gender as $key => $value) {
    if ($value['gender'] === '男') {
      $man = (int) $value['count'];
    } else if ($value['gender'] === '女') {
      $woman = (int) $value['count'];
    } else {
      $unknown = (int) $value['count'];
    }
  }

  $char = $res_chars->fetch_all(MYSQLI_ASSOC);

  $return_arr = [
    "errCode" => 0,
    'message' => 'success',
    'data' => [
      "professionCount" => $res_prof->num_rows,
      "classCount" => $res_class->num_rows,
      "manCount" => $man,
      "womanCount" => $woman,
      "unknownCount" => $unknown,
      "chars" => $char,
    ],
  ];
  $res_prof->free();
  $res_class->free();
  $res_gender->free();
  $res_chars->free();
  break;

case "getstudents":
  // 获取请求参数
  $profname = isset($_GET['profname']) ? $_GET['profname'] : "";
  $classname = isset($_GET['classname']) ? $_GET['classname'] : "";
  $stuname = isset($_GET['stuname']) ? $_GET['name'] : "";
  $type = isset($_GET['type']) ? $_GET['type'] : 0;
  $page = isset($_GET['page']) ? $_GET['page'] : 1;
  $size = isset($_GET['size']) ? $_GET['size'] : 20;

  // 判断请求参数的值是否正确
  if (!is_numeric($type) || (int) $type < 0 || (int) $type > 1) {
    $return_arr = [
      'errCode' => '200104',
      'message' => $errCode['200104'],
      'data' => [],
    ];
    break;
  }
  if (!is_numeric($page) || (int) $page < 0) {
    $return_arr = [
      'errCode' => '200108',
      'message' => $errCode['200108'],
      'data' => [],
    ];
    break;
  }
  if (!is_numeric($size) || (int) $size < 0) {
    $return_arr = [
      'errCode' => '200108',
      'message' => $errCode['200108'],
      'data' => [],
    ];
    break;
  }

  // 查询条件的处理
  $condition = '';
  if (!empty($profname)) {
    $condition .= " AND profName LIKE '%{$profname}%'";
  }
  if (!empty($classname)) {
    $condition .= " AND className LIKE '%{$classname}%'";
  }
  if (!empty($stuname)) {
    $condition .= " AND stuName LIKE '%{$stuname}%'";
  }

  $field = "stuId, stuNo, stuName, gender, birthday, phone, classId, className, status";
  if ($type == 1) {
    $field .= ", idcard AS idNo, profId, profName";
  }

  // page(页码), 起始索引, size(返回的记录数)
  // 1              0         20
  // 2              20        20
  // 3              40        20

  $startIndex = ($page - 1) * $size;

  // 满足条件的总记录数
  $sql_page = "SELECT COUNT(*) AS `count` FROM v_student_class_profession WHERE 1=1 {$condition}";
  $res_page = $mysqli->query($sql_page);
  $count = $res_page->fetch_assoc()['count'];
  $res_page->free();
  $count = !$count ? 0 : $count;
  // 3.3 => 4 向上取整
  $page_count = ceil((int) $count / (int) $size);

  // 学生指定页码的数据(查询)
  $sql = "SELECT {$field} FROM v_student_class_profession WHERE 1=1 {$condition} ORDER BY stuNo LIMIT {$startIndex}, {$size}";

  $res = $mysqli->query($sql);
  $arr = $res->fetch_all(MYSQLI_ASSOC);
  $res->free();

  // 生成返回数据的数组
  $return_arr = [
    'errCode' => 0,
    'message' => 'success',
    'data' => $arr,
    'pagenation' => [
      'currentPage' => $page,
      'pageSize' => (int) $size,
      'pageCount' => $page_count,
    ],
  ];
  break;

// 返回指定学生的数据
case "getstudentbyid":
  $id = isset($_GET['id']) ? $_GET['id'] : 0;
  if (!is_numeric($id) || (int) $id <= 0) {
    $return_arr = [
      'errCode' => '200109',
      'message' => $errCode['200109'],
      'data' => [],
    ];
    break;
  }

  $sql = "SELECT stuId, stuNo, stuName, gender, birthday, phone, classId, className, `statusId`, `status`, idcard, profId, profName FROM v_student_class_profession WHERE stuId={$id}";
  $res = $mysqli->query($sql);
  $row = $res->fetch_assoc();
  // 检测结果集的行数
  if (!$res->num_rows) {
    $return_arr = [
      'errCode' => '200106',
      'message' => $errCode['200106'],
      'data' => [],
    ];
    $res->free();
    break;
  }
  $res->free();
  $return_arr = [
    'errCode' => 0,
    'message' => 'success',
    'data' => $row,
  ];
  break;

case "setstudent":
  $id = isset($_POST['id']) ? $_POST['id'] : 0;
  $classid = isset($_POST['classid']) ? $_POST['classid'] : 1;
  $stuno = isset($_POST['stuno']) ? $_POST['stuno'] : '';
  $stuname = isset($_POST['stuname']) ? $_POST['stuname'] : '';
  $idcard = isset($_POST['idcard']) ? $_POST['idcard'] : '';
  $birthday = isset($_POST['birthday']) ? $_POST['birthday'] : '';
  $gender = isset($_POST['gender']) ? $_POST['gender'] : 0;
  $phone = isset($_POST['phone']) ? $_POST['phone'] : '';

  if (!is_numeric($id) || (int) $id < 0) {
    $return_arr = [
      'errCode' => '200109',
      'message' => $errCode['200109'],
      'data' => [],
    ];
    break;
  }
  if (!is_numeric($classid) || (int) $classid < 0) {
    $return_arr = [
      'errCode' => '200112',
      'message' => $errCode['200112'],
      'data' => [],
    ];
    break;
  }
  if (empty($stuno) || !preg_match('/^20[12]\d{7}$/', $stuno)) {
    $return_arr = [
      'errCode' => '200110',
      'message' => $errCode['200110'],
      'data' => [],
    ];
    break;
  }
  if (empty($stuname) || !preg_match('/^[\u4E00-\u9FA5\.·]{2,30}$/', $stuname)) {
    $return_arr = [
      'errCode' => '200111',
      'message' => $errCode['200111'],
      'data' => [],
    ];
    break;
  }
  if (empty($idcard) || !preg_match('/^[1-9]\d{16}[xX\d]$/', $idcard)) {
    $return_arr = [
      'errCode' => '200113',
      'message' => $errCode['200113'],
      'data' => [],
    ];
    break;
  }
  if (empty($phone) || !preg_match('/^1[3-9]\d{9}$/', $phone)) {
    $return_arr = [
      'errCode' => '200114',
      'message' => $errCode['200114'],
      'data' => [],
    ];
    break;
  }

  // 获取及校验完成
  // 根据$id的值构建SQL语句
  $sql = '';
  if ($id == 0) {
    // $sql = "INSERT t_students (class_id, stu_no, stu_name, idcard, birthday, gender, phone) VALUE ({$classid}, '{$stuno}', '{$stuname}', '{$idcard}', '{$birthday}', {$gender}, '{$phone}')";
    $sql = "INSERT t_students (class_id, stu_no, stu_name, idcard, birthday, gender, phone) VALUE (?, ?, ?, ?, ?, ?, ?)";
  } else {
    // $sql = "UPDATE t_students SET class_id={$classid}, stu_no='{$stuno}', stu_name='{$stuname}', idcard='{$idcard}', birthday='{$birthday}', gender={$gender}, phone='{$phone}' WHERE stu_id={$id}";
    $sql = "UPDATE t_students SET class_id=?, stu_no=?, stu_name=?, idcard=?, birthday=?, gender=?, phone=? WHERE stu_id=?";
  }
  // $res = $mysqli->query($sql);
  // 校验$res是false还是true

  // 预处理——准备一个SQL语句
  $stmt = $mysqli->prepare($sql);
  // 预处理——绑定参数
  if ($id == 0) {
    $stmt->bind_param('issssis', $classid, $stuno, $stuname, $idcard, $birthday, $gender, $phone);
  } else {
    $stmt->bind_param('issssisi', $classid, $stuno, $stuname, $idcard, $birthday, $gender, $phone, $id);
  }
  // 预处理——执行准备好的SQL语句
  $res = $stmt->execute();
  
  // 预处理——关闭statement对象
  $stmt->close();

  // 校验SQL语句执行是否出错
  if(!$res) {
    $return_arr = [
      'errCode' => '200105',
      'message' => $errCode['200105'],
      'data' => [],
    ];
    break;
  }

  // 查询数据准备返回
  $id = $id == 0 ? $mysqli->insert_id : $id;

  $sql = "SELECT stuId, stuName, gender, birthday, phone, classId, className, statusId, status, idCard AS idNo, profId, profName FROM v_student_class_profession WHERE stuId={$id}";
  $res_stu = $mysqli->query($sql);
  $stu_arr = $res_stu->fetch_assoc();
  $res_stu->free();
  $return_arr = [
    "errCode" => 0,
    "message" => 'success',
    "data" => $stu_arr,
  ];
  break;

  case "delstudent":
    $id = isset($_POST['id']) ? $_POST['id'] : 0;
    // 检验$id
    if(!preg_match('/^[1-9]\d*$/', $id)) {
      $return_arr = [
        "errCode" => '200109',
        "message" => $errCode['200109']
      ];
      break;
    }
  // $timestmap = time();
  // 设置MySQL时区
  $mysqli->query("SET time_zone='+8:00'");
  $sql = "UPDATE t_students SET delete_time=UNIX_TIMESTAMP() WHERE stu_id={$id};";
  $res = $mysqli->query($sql);
  if(!$res) {
    $return_arr = [
      'errCode' => '200105',
      'message' => $errCode['200105']
    ];
    break;
  }
  if(!$mysqli->affected_rows) {
    $return_arr = [
      'errCode' => '200106',
      'message' => $errCode['200106'],
    ];
    break;
  }
  $return_arr = [
    'errCode' => 0,
    'message' => 'success'
  ];
  break;    
default:
  $return_arr = [
    'errCode' => '200101',
    'message' => $errCode['200101'],
    'data' => [],
  ];
  break;
}
$mysqli->close();
// 返回结果
echo json_encode($return_arr);