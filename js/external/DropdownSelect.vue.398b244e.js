import{d as h,r as y,a as g,o as l,c as a,b as n,aH as w,i as d,t as c,e as p,F as v,j as k,h as I}from"./entry.8bd29e6a.js";const S=["src"],x=["onClick"],B={key:0},j={key:1,class:"whitespace-nowrap"},D=h({__name:"DropdownSelect",props:{items:{default:()=>[]},selected:{default:!1},placeholder:{default:"No restriction"},disabled:{type:Boolean,default:!1},hasSlot:{type:Boolean,default:!1},removeItemsDivider:{type:Boolean,default:!1},withoutStylization:{type:Boolean,default:!1}},emits:["changeActiveTimeSelect"],setup(m,{emit:u}){const s=m,i=y(!1),f=g(()=>{var t;const o=s.items.every(r=>typeof r=="object")?s.items.find(r=>r.selected):s.selected;return o!=null&&o.title?o==null?void 0:o.title:(t=s.selected)!=null&&t.title?s.selected.title:s.selected}),b=e=>{u("changeActiveTimeSelect",e),i.value=!1};return(e,o)=>(l(),a("div",{class:d(["hidden sm:inline-block border-solid border-border rounded-[6px] relative w-auto py-2.5",[e.disabled&&"pointer-events-none bg-icon-bg border-grey-light-grey ",!e.withoutStylization&&"bg-white border shadow-sm px-4"]])},[n("div",{class:"flex items-center justify-center cursor-pointer",onClick:o[0]||(o[0]=t=>i.value=!p(i))},[w(e.$slots,"prefix"),n("p",{class:d(["text-sm font-medium whitespace-nowrap",[e.hasSlot&&"text-black",e.withoutStylization?"text-primary leading-3":"mr-3 text-grey-light-grey"]])},c(p(f)||e.placeholder),3),n("img",{src:"/img/search/arrow-down.svg",alt:"arrow down icon"},null,8,S)]),n("div",{class:d(["max-h-[200px] min-w-full z-[10001] shadow-md overflow-auto absolute border border-solid border-border py-2.5 px-4 left-0 top-full rounded-[6px] bg-white",{hidden:!p(i)}])},[e.items?(l(!0),a(v,{key:0},k(e.items,(t,r)=>(l(),a("button",{key:t,class:d(["text-sm font-medium py-2 cursor-pointer w-full text-left",{"text-primary":t===e.selected,"text-grey-light-grey":t!==e.selected,"border-b border-solid border-border":r!==e.items.length-1&&!s.removeItemsDivider}]),onClick:C=>b(t)},[typeof t!="object"?(l(),a("span",B,c(t),1)):(l(),a("span",j,c(t.title),1))],10,x))),128)):I("",!0)],2)],2))}});export{D as _};