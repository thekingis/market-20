import{eW as w,B,L as k}from"./index.esm.min.ffebd841.js";import"./index.eed71953.js";import{d as v,m as D,a as u,aT as d,bu as T,r as E,aC as g,o as F,f as _,e as A}from"./entry.8bd29e6a.js";import{s as X}from"./utils.11774da7.js";const $=v({__name:"LineChart",props:{data:{},lineColor:{default:"#3B82F6"},lineData:{default:()=>[]},showYAxis:{type:Boolean,default:!0},showXAxis:{type:Boolean,default:!0},xAxisLabel:{default:()=>[]},customYAxisLabelFormatter:{default:""},XlineColor:{default:"#5B6270"},XtickColor:{default:"#5B6270"},top:{default:"2%"},bottom:{default:"2%"},left:{default:"0%"},right:{default:"0%"},fewCharts:{type:Boolean,default:!1},hasBackground:{type:Boolean,default:!1},backgroundColor:{default:"rgba(250,250,252,0.5)"},splitLine:{type:Boolean,default:!0},splitYLine:{type:Boolean,default:!0},hasMarkArea:{type:Boolean,default:!1},hasAreaStyle:{type:Boolean,default:!0},markLines:{default:()=>[]},markAreaEnd:{default:"100%"},symbolLine:{default:"none"},isSmooth:{type:Boolean,default:!1},hasTooltip:{type:Boolean,default:!0},min:{},max:{},isSymbol:{type:Boolean,default:!1}},setup(C){var f,y,h;const e=C,r=D(),S=u(()=>r.getTheme),L=u(()=>r.getTheme===d.DARK?"dark":"default");T(w,L);const s=[u(()=>r.getTheme===d.DARK?"#80faa9":"#EDFCF2"),u(()=>r.getTheme===d.DARK?"#f88181":"#FEF2F2")],c=a=>a.map(t=>({name:t.name,label:t.label,data:t.data,type:"line",symbol:e.isSymbol?"circle":"none",smooth:e.isSmooth,lineStyle:{color:(t==null?void 0:t.lineColor)||e.lineColor},areaStyle:{opacity:e.hasAreaStyle&&!t.removeAreaStyle?.8:0,color:new k(0,0,0,1,[{offset:0,color:t!=null&&t.lineColor?(t==null?void 0:t.lineColor)+"40":e.lineColor+"40"},{offset:1,color:t!=null&&t.lineColor?(t==null?void 0:t.lineColor)+"01":e.lineColor+"01"}])},markLine:{data:e==null?void 0:e.markLines,symbol:["none",e==null?void 0:e.symbolLine],symbolRotate:90,symbolSize:[9,14]},markArea:e!=null&&e.hasMarkArea?{itemStyle:{opacity:.5},data:[[{x:e==null?void 0:e.left,yAxis:0,itemStyle:{color:s[0]}},{x:e==null?void 0:e.markAreaEnd,yAxis:.2,itemStyle:{color:s[0]}}],[{x:e==null?void 0:e.left,yAxis:.8,itemStyle:{color:s[1]}},{x:e==null?void 0:e.markAreaEnd,yAxis:1,itemStyle:{color:s[1]}}]],silent:!0}:""})),l=E({backgroundColor:"transparent",grid:{show:!0,borderWidth:0,left:e.left,right:e.right,bottom:e.bottom,top:e.top,containLabel:e.showYAxis,backgroundColor:e.hasBackground?e==null?void 0:e.backgroundColor:"transparent"},tooltip:{show:e==null?void 0:e.hasTooltip,padding:[0,0],position:(a,t,i,o,n)=>[a[0]-n.contentSize[0]/2,-n.contentSize[1]],trigger:"axis",axisPointer:{type:"line",lineStyle:{color:e.lineColor,width:2}},borderWidth:0,formatter:a=>{const t=[];a.forEach((o,n,m)=>{var x,b;t.push(`<p class="flex justify-between items-center p-2 ${n!==m.length-1&&"border-b border-border"}">
              <span class="mr-2 text-primary text-[10px] leading-none font-medium" style="color: ${(b=(x=e.lineData)==null?void 0:x.at(n))==null?void 0:b.lineColor}">${o.seriesName}</span>
              <span class="text-grey text-[10px] leading-none font-medium">${X(o.data)}</span>
            </p>`)});let i="<div>";return t.forEach(o=>i+=o),i+="</div>",e!=null&&e.fewCharts?i:`<div class="bg-white rounded-lg p-2 relative">
                <p class="text-cornflower-blue font-medium"># of Employees <span class="pl-6 text-grey">${a[0].value}</span></p>
                <div class="absolute w-3 h-3 bg-white rotate-45 z-[-1] left-1/2 translate-x-[-50%]"/>
            </div>`}},xAxis:{show:!0,boundaryGap:!1,data:(f=e==null?void 0:e.xAxisLabel)!=null&&f.length?e.xAxisLabel:(h=(y=e==null?void 0:e.lineData[0])==null?void 0:y.data)==null?void 0:h.map((a,t)=>t),type:"category",axisLine:{show:e==null?void 0:e.showXAxis,lineStyle:{color:e==null?void 0:e.XlineColor}},splitLine:{show:e==null?void 0:e.splitLine,lineStyle:{color:""}},axisTick:{show:e==null?void 0:e.showXAxis,lineStyle:{color:e==null?void 0:e.XtickColor}},axisLabel:{fontSize:10,color:"#5B6270"}},yAxis:{scale:!0,show:e==null?void 0:e.showYAxis,type:"value",boundaryGap:["10%","10%"],position:"right",splitLine:{show:e==null?void 0:e.splitYLine,lineStyle:{color:""}},axisLabel:{fontSize:10,formatter:e==null?void 0:e.customYAxisLabelFormatter},min:e==null?void 0:e.min,max:e==null?void 0:e.max},series:c(e.lineData)});return g(()=>S.value,a=>{a===d.LIGHT?(l.value.yAxis.splitLine.lineStyle.color="#B9BEC9",l.value.xAxis.splitLine.lineStyle.color="#B9BEC9"):(l.value.yAxis.splitLine.lineStyle.color="#272F3D",l.value.xAxis.splitLine.lineStyle.color="#272F3D")},{immediate:!0}),g(()=>[e.lineData,e.xAxisLabel],([a,t])=>{var i,o;l.value.series=c(a),l.value.xAxis.data=(t==null?void 0:t.length)&&t||((o=(i=e==null?void 0:e.lineData[0])==null?void 0:i.data)==null?void 0:o.map((n,m)=>m))},{deep:!0}),(a,t)=>(F(),_(A(B),{autoresize:"","update-options":{notMerge:!0},option:A(l),initOptions:{renderer:"svg"}},null,8,["option"]))}});export{$ as _};