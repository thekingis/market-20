import{d as m,r as f,aC as p,o as t,c as o,aH as n,b as h,F as v,j as y,i as c,n as g,h as w}from"./entry.8bd29e6a.js";const B={class:"flex"},C=m({__name:"StateBoxes",props:{boxLength:{default:0},color:{default:"#1b2230"},activeBoxes:{default:()=>[]},average:{type:Boolean,default:!1},layout:{default:"default"}},setup(u){const e=u,s={green:"#28A946",yellow:"#F59E0B",red:"#FF342A"},r=f([]);return p(e,l=>{r.value=[...Array(e.boxLength).fill(0).map((d,a)=>({active:l.activeBoxes.includes(a),id:a,color:e.color in s?s[e.color]:e.color}))]},{immediate:!0,deep:!0}),(l,d)=>(t(),o("div",null,[n(l.$slots,"default"),h("div",B,[(t(!0),o(v,null,y(r.value,(a,i)=>(t(),o("div",{key:i,class:c(["flex justify-center items-center bg-mischka rounded-sm mr-[3px]",{"h-5 w-5":e.layout==="default","h-4 w-4 md:h-[12px] md:w-[12px]":e.layout==="small"}]),style:g({backgroundColor:a.active&&!l.average?a==null?void 0:a.color:l.average&&a.active?l.color:""})},[a.active?(t(),o("span",{key:0,class:c(["inline-block h-2 w-2 rounded-full bg-white",{"h-2 w-2":e.layout==="default","h-1.5 w-1.5 md:h-[6px] md:w-[6px]":e.layout==="small"}])},null,2)):w("",!0)],6))),128))]),n(l.$slots,"bottom")]))}});export{C as _};