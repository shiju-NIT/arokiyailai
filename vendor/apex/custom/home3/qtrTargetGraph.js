var options={chart:{height:325,width:"85%",type:"line",stacked:!1,toolbar:{show:!1}},dataLabels:{enabled:!1},colors:["#ffa77e","#ffffff"],series:[{name:"Target",type:"column",data:[30,50,70,90]},{name:"Achieived",type:"line",data:[25,35,65,55]}],stroke:{width:[0,7]},plotOptions:{bar:{columnWidth:"60%",borderRadius:7}},xaxis:{categories:["Q1","Q2","Q3","Q4"]},yaxis:[{show:!1}],tooltip:{shared:!1,intersect:!0,x:{show:!1}},legend:{horizontalAlign:"center"},grid:{borderColor:"#fea67f",strokeDashArray:0,xaxis:{lines:{show:!1}},yaxis:{lines:{show:!1}},padding:{top:-30,right:0,bottom:0,left:10}}},chart=new ApexCharts(document.querySelector("#qtrTargetGraph"),options);chart.render();