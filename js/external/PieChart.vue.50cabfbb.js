import{B as d,eW as p}from"./index.esm.min.ffebd841.js";import{d as m,m as u,a as t,bu as _,o as a,c as s,k as h,e as o,b as f,t as k,h as T,aT as g}from"./entry.8bd29e6a.js";const x={class:"relative"},C={key:0,class:"absolute left-1/2 top-1/2 translate-x-[-50%] translate-y-[-50%]"},b={class:"font-medium text-black text-sm leading-none"},y=m({__name:"PieChart",props:{centerText:{default:null},data:{default:()=>{}}},setup(n){const r=n,i=u(),c=t(()=>i.getTheme===g.DARK?"dark":"light");_(p,c);const l=t(()=>({series:r.data,backgroundColor:"transparent"}));return(e,v)=>(a(),s("div",x,[h(o(d),{autoresize:"",ref:"lineChart",option:o(l),initOptions:{renderer:"svg"}},null,8,["option"]),e.centerText?(a(),s("div",C,[f("span",b,k(e.centerText),1)])):T("",!0)]))}});export{y as _};