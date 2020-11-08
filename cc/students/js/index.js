//jQuery ready：DOM准备就绪时触发
$(function () {
  let baseUrl ="http://localhost:81/api/";
  var myChart = echarts.init(document.getElementById('mychars'));
  /* document.getElementById('mychars').innerText = 'abcd'; */
  //一、页面初始化
  //1.隐藏除“条件框”外的其它元素
  $('.alert-success,.table,.load-more').hide();

  //2.请求“专业”数据并添加到专业datalist
  request({
    url: baseUrl+'student.php',
     data:{api:'getprofession'}, 
    success:function(data) {
      let profDatas=data.data;
      let tags=''; 
      for(let val of profDatas) {
        tags += `<option>${val.profName}</option>`;
      }
      //将tags追加到datalist
      $('#prof_list').append(tags);
    }
  });

  //3.根据专业名称动态加载班级名称
  $('#prof_name').change(function(e){
  //3.1获取用户输入的专业名称
  //this是DOM对象并不是jQuery对象
  //DOM对象转换为jQuery对象
  let profName=$(this).val();
  //3.2发送请求获取该专业中的班级数据
  request({
    url: baseUrl+'student.php',
    data:{
      api:'getclassbyprofname',
      name:profName
    },
    success:function(data){
      let clazz=data.data;
      $('#class_list').empty();
      for(const item of clazz){
        $('#class_list').append(`<option>${item.className}</option>`);
      }
    }
 })
});

// 4. 绑定“查询”按钮click事件
$('.btn-search').click(function(e) {
  // 4.1 获取各表单元素的值
  let pName = $('#prof_name').val();  // 获取指定表单元素的值
  // $('#prof_name').val(value) 设置值
  let cName = $('#class_name').val();
  let sName = $('#student_name').val();

  // 4.2 发送网络请求AJAX，查询统计数据
  request({
    // student.php表示学生模块
    url: baseUrl + 'student.php',
    data: {
      api: 'getstatistics',
      profname: pName,
      classname: cName,
      stuname: sName
    },
    success: function(data) {
      console.log(data);
      // 4.3 填充到“统计框”相关的对象上。
      $('.prof_count').text(data.data.professionCount);
      $('.class_count').text(data.data.classCount);
      let total = data.data.manCount + data.data.womanCount + data.data.unknownCount;
      $('.student_count').text(total);
      $('.gender1_count').text(data.data.manCount);
      $('.gender2_count').text(data.data.womanCount);
      $('.gender3_count').text(data.data.unknownCount);
      //4.4 处理图表数据
      let chartsData = data.data.chars;
      let classArr = [];
      let manArr = [];
      let womanArr = [];
      let unknownArr = [];
      let totalArr = [];
//遍历charsData对象数组，将数据添加到相应的数组中
//js遍历数组的方法：for | for..in | for..of | array.forEach()
for (const val of chartsData){
  classArr.push(val.className);//php array_push()。后面
  manArr.push(val.man);
  womanArr.push(val.woman);
  unknownArr.push(val.unknown);
  totalArr.push(val.total);
}
/* console.logo(classArr,manArr,woman,totalArr); */

//初始化图表
  let option = {
  tooltip: {
      trigger: 'axis',
      axisPointer: {            // 坐标轴指示器，坐标轴触发有效
          type: 'shadow'        // 默认为直线，可选为：'line' | 'shadow'
      }
  },
  legend: {
      data: ['男', '女', '合计']
  },
  grid: {
      left: '3%',
      right: '4%',
      bottom: '3%',
      containLabel: true
  },
  xAxis: {
      type: 'value'
  },
  yAxis: {
      type: 'category',
      data:  classArr
  },
  series: [
      {
          name: '男',
          type: 'bar',
          stack: '总量',
          label: {
              show: true,
              position: 'insideRight'
          },
          data: manArr
      },
      {
          name: '女',
          type: 'bar',
          stack: '总量',
          label: {
              show: true,
              position: 'insideRight'
          },
          data: womanArr
      },
      {
        name: '未知',
        type: 'bar',
        stack: '总量',
        label: {
            show: true,
            position: 'insideRight'
        },
        data: unknownArr
    },
      {
          name: '合计',
          type: 'bar',
          stack: '总量',
          label: {
              show: true,
              position: 'insideRight'
          },
          data: totalArr
      },
  ]
};
//4.5添加图表配置与数据到图表对象上
  myChart.setOption(option);
      // 4.4显示“统计框”
      $('.alert-success').show();
    }
  })

});
//  5.“箭头”按钮单击事件处理程序
$('.hide-switch').click(function(e){
  // console.log($(this));
  // 查找当前被点击的“箭头”，所对应要操作的目标对象
  $tarObj = $(this).parent().children('.for-search').length>0 ? $(this).parent().children('.form-search') :  $(this).parent().children('.text-info,#mychars');
  // 判断当前被点击框的状态，并进行相应处理。（class）
  if($(this).hasClass('down')){
    $tarObj.show();
  } 
  else
 {
    $tarObj.hide();
  }
  // 改变被点击箭头的方向
  $(this).toggleClass('down');
});
 //6. "加载数据"按钮事件处理
 let page;
 //显示列名与JSON关系对象
 let columns = {
   birthday:"出生日期",
   classId:"班级ID",
   className:"班级名称",
   gender:"性别",
   idNo:"身份证号",
   phone:"手机号",
   profId:"专业ID",
   profName:"专业名称",
   status:"学籍状态",
   stuId:"学生ID",
   stuName:"姓名",
   stuNo:"学号"
 };
  //获取自定义data-coiumns的值
  let showColumns = $('.table').data('columns').split(',');
  //生成表头
  let headTags = '';
  for(const item of showColumns){
    headTags +=`<th>${item}</th>`
  }
  headTags +=`<th>管理</th>`;
  $('.table>thead>tr').empty().prepend(headTags);
  let jsonColumns =[];
  for(const cnColumns of showColumns){
   for(const key in columns){
     if(cnColumns ===columns[key]){
      jsonColumns.push(key);
     }
   }
  } 
 $(".btn-load-data").on('click',function(e){
   page = 1 ; 
   showTable();    //调用函数请求第一页并显示
 });

 //7."加载更多"按钮的功能实现
 $(".load-more>.btn").on('click',function(e){
    let pNo = page + 1;
    showTable(pNo);
 });

 //8.删除学生
 $('tbody').on('click','.btn-del',function(e){
   //获取自定义的值
   //let stuId = $(this).attr('data-id',200);  赋值
   let stuId = $(this).data('id');
   //保存当前this指向
   let $this = $(this);
   //显示询问层
 layer.confirm('是否真的要删除？',{
   btn:['确定','取消']
 },function(){
   //发起请求
   request({
     url: baseUrl + 'student.php',
     data: {
       api: 'delstudent',
       id: stuId
     },
     type: 'post',
     success: function(data){
        //1.从表格中移除被删除的行
        $this.parent().parent().remove();
        //2.显示成功的信息，在告诉用户
        layer.msg('删除成功！');
       }
     })
   }); 
 });
 
   
 //加载数据逻辑代码封装
 //pageNo:本次请求的页码
 function showTable(pageNo = 1){
   page = pageNo;     //更新变量
   //获取查询条件表单各元素的值
   let prof = $('#prof_name').val();
   let clazz = $('#class_name').val();
   let name = $('#student_name').val();
   //AJAX
   request({
     url: baseUrl + "student.php",
     data: {
       api: "getstudents",
       profname: prof,
       classname: clazz,
       sdutentname: name,
       page: pageNo,
       type: 1
     },
     success: function(data) {
       let stuDatas = data.data;
       let tags = '';
       for (const stu of stuDatas) {
         tags += `<tr>`;
         for (const item of jsonColumns) {
           tags += `<td>${stu[item]}</td>`;
         }
          tags +=`<td>
             <button type="button" class="btn btn-info btn-sm btn-edit" data-id="${stu.stuId}" title="编辑">
               <span class="glyphicon glyphicon-edit"></span> 编辑
             </button>
             <button type="button" class="btn btn-danger btn-sm btn-del" data-id="${stu.stuId}" title="删除">
               <span class="glyphicon glyphicon glyphicon-trash"></span> 删除
             </button>
           </td>
         </tr>`
       }
       if(pageNo == 1){
         $('.table>tbody').empty();
         $('.table').show();
       
       //隐藏按钮
       $('.btn-load-data').hide();
       if(data.pagenation.pageCount > 1){
         $('.load-more').show();
         $('.load-more>.btn').prop('disabled',false);
       } 
     }else{
       if(data.pagenation.pageCount <= page){
         //不可以
         $('.load-more>.btn').prop('disabled',true);
       }
     }
     $('.table>tbody').append(tags);
   }    
  });

 }
//  9.新增学生
$(".btn-add").click(function(e){
//  设置隐藏域stuId的值
  $(".modal #stuId").val("0");
  initModel(0);
});
//10.编辑学生
$(".table").on("click",".btn-edit",function(e){
  // 获取学生id
  let studentId = $(this).data("id");
  // string number
  // 设置隐藏域stuId的值
  $(".modal #stuId").val(studentId);
  initModel(studentId * 1);
});
// 11.监听模态框专业框值的改变
$(".model #profId").change(function(e){
  let professionName= $(this)
  .find(`[value=${$(this).val()}]`)
  .text();
  modalClass(professionName, 0);
});
// 12.绑定“身份证”输入框change事件，以根据身份证号码绑定出生日期与性别框的值
$(".modal #idno").change(function(e){
  let obj =  getIdCard($(this).val());
  if(obj){
    $(".modal #birthday").val(obj.birthday);
    $(".modal #gender").val(obj.genderCn);
    $(".modal #savegender").val(obj.gender);
  }
});
// 加载数据逻辑代码封装
// pageNo：本次请求的页码
function showTable(pageNo = 1){
  page = pageNo; // 更新变量
  // 获取查询条件表单各元素的值
  let prof = $("#prof_name").val();
  let clazz = $("#class_name").val();
  let name = $("#student_name").val();
  // AJAX
  request({
    url: baseUrl + "student.php",
    data: {
      api: "getstudents",
      profname: prof,
      classname: clazz,
      sdutentname: name,
      page: pageNo,
      type: 1
    },
    success: function(data) {
      let stuDatas = data.data;
      let tags = '';
      for (const stu of stuDatas) {
        tags += `<tr>`;
        for (const item of jsonColumns) {
          tags += `<td>${stu[item]}</td>`;
        }
         tags +=`<td>
            <button type="button" class="btn btn-info btn-sm btn-edit" data-id="${stu.stuId}" title="编辑">
              <span class="glyphicon glyphicon-edit"></span> 编辑
            </button>
            <button type="button" class="btn btn-danger btn-sm btn-del" data-id="${stu.stuId}" title="删除">
              <span class="glyphicon glyphicon glyphicon-trash"></span> 删除
            </button>
          </td>
        </tr>`
      }
      if(pageNo == 1){
        $('.table>tbody').empty();
        $('.table').show();
      
      //隐藏按钮
      $('.btn-load-data').hide();
      if(data.pagenation.pageCount > 1){
        $('.load-more').show();
        $('.load-more>.btn').prop('disabled',false);
      } 
    }else{
      if(data.pagenation.pageCount <= page){
        //不可以
        $('.load-more>.btn').prop('disabled',true);
      }
    }
    $('.table>tbody').append(tags);
  }    
 });
}
/**
 * 初始化增改学生的模态框
 * @param {*} id
 */
function initModel(id = 0) {
  if (id == 0) {
    // 新增
    // 初始化表单元素
    $(".modal form")
    .find("input")
    .val("");
    $(".modal form")
    .find("select")
    .val(0);
    // 请求专业数据并填充到专业下拉列表框
    modalProfession();

    $(".modal-title").text("新增");
  } else {
    // 编辑
    request({
      url: baseUrl + "student.php",
      data: {
        api: "getstudentbyid"
      },
      success: function(res) {
        // res = response(响应); req: reqrequest(请求)
        let stuData = res.data;
        // console.log(stuData);
        let $form = $(".modal form");
        for (const key in stuData) {
          $form.find(`[name=${key}]`).val(stuData[key]);
        }
        // 请求专业数据，添加专业框并选定当前专业
        modalProfession(stuData.profId);
        modalClass(stuData.profName, stuData.classId);
      }
    });
    $(".modal-title").text("编辑");
  }
  $(".student-modal").modal("show");
}
/**
 * 请求专业数据并加载到模态框专业下拉列表框中
 */
function modalProfession(id = 0) {
  let professionId = id || "0";
  request({
    url: baseUrl + "student.php",
    data: { api: "getprofession"},
    success: function(data) {
      let profDatas = data.data;
      let tags = '<option value="0">请选择</option>';
      for (let val of profDatas) {
        tags += `<option value="${val.profId}" ${
          val.profId  == professionId ? "selected" : ""
        }>${val.profName}</option>`;
      }
      $(".modal #profId")
      .empty()
      .append(tags);
    }
  });
}
/**
 * 根据专业名称请求班级数据并选定原班级
 * @param {*} name
 * @param {*} id
 */
function modalClass(name,id = 0) {
  let professionName = name || "";
  request({
    url: baseUrl +"student.php",
    data: {
      api:"getclassbyprofname",
      name: professionName
    },
    success: function(res){
      let classData = res.data;
      let tags = '<option value="0">请选择</option>';
      $("#class_list").empty();
      for (const item of classData) {
        tags += `<option value="${item.classId}" ${
        item.classId == id ? "selected" : ""
      }>${item.className}</option>`;
        }
        $("#classId")
        .empty()
        .append(tags)
      }
  });
}
/**
 * 从身份证中提取并处理生日与性别
 * @param {*} num
 */
function getIdCard(num) {
  // 判断num是否是合法身份证号码
  let reg = /^\d{17}[\dxX]$/;
  let valid = reg.test(num);
  if (!valid) {
    return null;
  }

  let arr = /^\d{6}(\d{4})(\d{2})(\d{2})\d{2}(\d)[\dXx]$/.exec(num);
  return {
    birthday: arr[1] + "-" + arr[2] + "-" + arr[3],
    gender: arr[4] %2,
    genderCn: arr[4] % 2 ? "男":"女"
  };
}
/**
 * 获取指定表单所有表单元素的值
 * @param {*} formSelector
 */
function getElementNameAndValue(formSelector) {
  $ele = $(formSelector)
  .find("input,select,textarea")
  .not(
    "button,[type=submit],[type=reset],[type=button],[type=hidden],[type=fild],[type=image]"
  );
  let obj = {};
  for (let i = 0; i < $ele.length; i++){
    let value = null;
    if ($($ele[i]).is(":radio")) {
      // 获取单选按钮选定项的值
      value = $(`[name=${$($ele[i]).prop("name")}]:checked`).val();
    } else if ($($ele[i]).is(":checked")) {
      // 获取复选按钮选定项的值
      let arr = [];
      let $objArr = $(`[name=${$($ele[i]).prop("name")}]:checked`);
      for (let i = 0; i < $objArr.length; i++) {
        arr.push($($objArr[i]).val());
      }
      value = arr;
    } else {
      value = $($ele[i]).val();
    }
    // obj.porp obj[prop]
    obj[$($ele[i]).prop("name")] = value ? value : null;
  }
  return obj;
}
// 扩展自定义验证规则
$.validator.addMethod(
  "idCardNo",
  function(value,element) {
    return /^[1-9]\d{16}[\dxX]$/.test(value);
  },
  "请输入正确的身份证号码"
);
$.validator.addMethod(
  "phoneNumber",
  function(value) {
    return /^1\d{10}$/.test(value);
  },
  "请输入正确的手机号码"
);

// 增改学生数据验证与异步提交表单
$("#stuform").validate({
  submitHandler: function(form) {
    // 获取隐藏域stuId值，以判断保存的类型（新增或修改）
    let stuId = $(".modal #stuId").val();
    let formData = getElementNameAndValue(form);
    formData.gender = $(".modal #savegender").val();
    formData.stuId = stuId ? stuId * 1 : 0; 
    formData.api = "getstudent";
    request({
      url: baseUrl + "student.php",
      data: formData,
      type: "post",
      success: function(res) {
        let stuData = res.data;
        let tags = ``;
        for (const item of jsonColumns) {
          tags += `<td>${stuData[item]}</td>`;
        }
        tags +=`<td>
        <button type="button" class="btn btn-info btn-sm btn-edit" data-id="${stuData.stuId}" title="编辑">
          <span class="glyphicon glyphicon-edit"></span> 编辑
        </button>
        <button type="button" class="btn btn-danger btn-sm btn-del" data-id="${stuData.stuId}" title="删除">
          <span class="glyphicon glyphicon glyphicon-trash"></span> 删除
        </button>
      </td>`;
      // 通过stuData.stuId值新增还是编辑，若新增则将表行添加到表体头部，否则更行当前学生数据行
      if (!formData.stuId == 0) {
        // 编辑
        $("tbody")
        .find(`[data-id=${formData.stuId}]`)
        .closest("tr")
        .empty()
        .append(tags);
      } else {
        // 新增
        tags = "<tr>" + tags +"</tr>";
        $("tbody").prepend(tags);
      }
      $(".student-modal").modal("hide");
      }
    });
  },
  // 设置各表单元素的校验规则
  rules: {
    profId: {
      min: 1
    },
    classId: {
      min: 1
    },
    stuName: {
      requird: true
    },
    idcard: {
      requird: true,
      idCardNo: true
    },
    phone: {
      required: true,
      phoneNumber: true
    }
  },
  // 设置各表单元素校验规则验证失败是的文本
  messages: {
    profId: {
      min: '必须选择除“请选择”以外的选项'
    },
    classId: {
      min: '必须选择除“请选择”以外的选项'
    }
  },
  errorPlacement: function(error, element) {
    element
    .closest(".col-sm-10")
    .find("#helpBlock")
    .empty()
    .append(error);
  },
  highlight: function(element) {
   $(element)
   .closest(".form-group")
   .remveClass("has-success")
   .addClss("has-error");
  },
  // 验证成功时
  unhighlight: function(element) {
    $(element)
    .parent()
    .parent()
    .remveClass("has-error")
    .addClss("has-success");
  }
});
});
