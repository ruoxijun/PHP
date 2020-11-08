$(function() { // jQuery ready事件：DOM准备就绪时触发
    $('.student-modal').modal('show');    // 模拟(方便调试)
});
// EChars图表初始化
// document.getElementById : 在文档中，通过ID获取元素。
var myChart = echarts.init(document.getElementById('mychars'));
var option = {
  tooltip: {
    trigger: 'axis',
    axisPointer: { // 坐标轴指示器，坐标轴触发有效
      type: 'shadow' // 默认为直线，可选为：'line' | 'shadow'
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
    data: ['计应用ZK1801', '计应用ZK1802', '计应用ZK1803']
  },
  series: [{
      name: '男',
      type: 'bar',
      stack: '总量',
      label: {
        show: true,
        position: 'insideRight'
      },
      data: [30, 35, 27]
    },
    {
      name: '女',
      type: 'bar',
      stack: '总量',
      label: {
        show: true,
        position: 'insideRight'
      },
      data: [12, 18, 20]
    },
    {
      name: '合计',
      type: 'bar',
      stack: '总量',
      label: {
        show: true,
        position: 'insideRight'
      },
      data: [42, 53, 47]
    }
  ]
};
// 使用刚指定的配置项和数据显示图表。
myChart.setOption(option);