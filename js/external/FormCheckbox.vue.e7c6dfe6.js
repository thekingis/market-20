import{d as s,r as l,o as i,c as d,b as n,i as a}from"./entry.8bd29e6a.js";const c=["disabled"],u=["src"],f=s({__name:"FormCheckbox",props:{active:{type:Boolean,default:!1},enable:{type:Boolean,default:!0}},setup(p){const r=l(!1);return(e,o)=>(i(),d("div",{class:a(["h-4 w-4 rounded-[4px] border border-solid cursor-pointer transition-all duration-100 flex items-center justify-center relative",{"opacity-50 cursor-[not-allowed]":!e.enable,"border-primary bg-primary":e.active,"border-secondary-text":!e.active,"border-deep-blue border-2":r.value&&!e.active}])},[n("input",{type:"checkbox",class:a(["absolute w-full h-full top-0 left-0 cursor-pointer opacity-0 z-[1]",{"cursor-[not-allowed]":!e.enable}]),onChange:o[0]||(o[0]=t=>e.$emit("changeCheck")),onFocusin:o[1]||(o[1]=t=>r.value=!0),onFocusout:o[2]||(o[2]=t=>r.value=!1),disabled:!e.enable},null,42,c),n("img",{class:a(["transition-all duration-500",{"opacity-0":!e.active}]),src:"/img/components/form-checkbox/checked.svg",alt:"checked icon"},null,10,u)],2))}});export{f as _};