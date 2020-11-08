/**
 * 依赖：jQuery和layer
 * 
 * layer二次封装的程序
 */
function loading(icon = 0, text = '数据加载中...') {
  return layer.load(icon, {
    content: text,
    success: function(layero) {
      layero.find('.layui-layer-content').css({
        'padding-top': '39px',
        'width': '160px',
        backgroundPosition: '20px 0'
      });
    }
  });
}

/*
发送HTTP请求
*/
// 对象解构，{url, data={}}
function request({url, type='get', data={}, dataType='json', async=true, success, error=null, complete=null}) {
  let loadId = null;
  $.ajax({
    url,        // url = url: url
    type,
    data,
    dataType,
    async,
    beforeSend: function() {
      loadId = loading(1);
    },
    success: function(data) {
      layer.close(loadId);
      if(data.errCode != 0) {
        layer.msg(data.message);
      } else {
        success(data);
      }
    },
    error: function(err) {
      layer.close(loadId);
      if(error) {
        error();
      } else {
        layer.msg(err.statusText);
      }
    },
    complete: complete ? complete(): null
  });
}