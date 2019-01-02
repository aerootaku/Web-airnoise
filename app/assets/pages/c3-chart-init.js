!function(e){"use strict";var a=function(){};a.prototype.init=function(){c3.generate({bindto:"#chart",data:{columns:[["Desktop",150,80,70,152,250,95],["Mobile",200,130,90,240,130,220],["Tablet",300,200,160,400,250,250]],type:"bar",colors:{Desktop:"#f0f1f4",Mobile:"#fab249",Tablet:"#ec536c"}}}),c3.generate({bindto:"#combine-chart",data:{columns:[["SonyVaio",30,20,50,40,60,50],["iMacs",200,130,90,240,130,220],["Tablets",300,200,160,400,250,250],["iPhones",200,130,90,240,130,220],["Macbooks",130,120,150,140,160,150]],types:{SonyVaio:"bar",iMacs:"bar",Tablets:"spline",iPhones:"line",Macbooks:"bar"},colors:{SonyVaio:"#f0f1f4",iMacs:"#ec536c",Tablets:"#7a6fbe",iPhones:"#28bbe3",Macbooks:"#fab249"},groups:[["SonyVaio","iMacs"]]},axis:{x:{type:"categorized"}}}),c3.generate({bindto:"#roated-chart",data:{columns:[["Revenue",30,200,100,400,150,250],["Pageview",50,20,10,40,15,25]],types:{Revenue:"bar"},colors:{Revenue:"#f0f1f4",Pageview:"#fab249"}},axis:{rotated:!0,x:{type:"categorized"}}}),c3.generate({bindto:"#chart-stacked",data:{columns:[["Revenue",130,120,150,140,160,150,130,120,150,140,160,150],["Pageview",200,130,90,240,130,220,200,130,90,240,130,220]],types:{Revenue:"area-spline",Pageview:"area-spline"},colors:{Revenue:"#f0f1f4",Pageview:"#ec536c"}}}),c3.generate({bindto:"#donut-chart",data:{columns:[["Desktops",78],["Smart Phones",55],["Mobiles",40],["Tablets",25]],type:"donut"},donut:{title:"Candidates",width:30,label:{show:!1}},color:{pattern:["#f0f1f4","#ec536c","#fab249","#28bbe3"]}}),c3.generate({bindto:"#pie-chart",data:{columns:[["Desktops",78],["Smart Phones",55],["Mobiles",40],["Tablets",25]],type:"pie"},color:{pattern:["#f0f1f4","#ec536c","#fab249","#28bbe3"]},pie:{label:{show:!1}}})},e.ChartC3=new a,e.ChartC3.Constructor=a}(window.jQuery),function(e){"use strict";window.jQuery.ChartC3.init()}();