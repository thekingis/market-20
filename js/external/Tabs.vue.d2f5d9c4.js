import{d as k,y as v,a as B,p as S,z as w,o as r,c as o,F as p,j as C,b1 as q,b as m,t as b,aH as P,i as n,e as z,h as u}from"./entry.8bd29e6a.js";const H=["onClick"],j=k({__name:"Tabs",props:{premium:{type:Boolean,default:!1},options:{type:Object,default:()=>{}},urlQuery:{type:Boolean,default:!0},isSticky:{type:Boolean,default:!0},queryKey:{type:String,default:"tag"}},emits:["change-tab"],setup(t,{emit:y}){const s=t,x=v(),f=B(()=>x.getUserPlan),i=S(),g=w(),h=a=>{s.options.active!==a&&(g.push({path:i.path,...s.urlQuery&&{query:{...i.query,[s.queryKey]:a}}}),y("change-tab",a))};return(a,R)=>{var l,c,d;return r(),o("div",{class:n(["top-0 bg-white z-[100] flex flex-wrap flex-row items-center border-b-[2px] border-mischka",{sticky:t.isSticky}])},[(c=(l=t.options)==null?void 0:l.items)!=null&&c.length?(r(!0),o(p,{key:0},C((d=t.options)==null?void 0:d.items,e=>(r(),o("button",q(a.$attrs,{key:e.id,class:["pt-6 mr-3 md:mr-5 cursor-pointer leading-4 flex items-center",{"text-tabs":!e.active&&!t.premium,"text-sm font-medium":!t.premium,"font-roboto text-lg":t.premium,"text-disabled-input-text":!e.active&&t.premium,"font-bold border-b border-[#000]":e.active&&t.premium,hidden:e.isHidden}],onClick:U=>h(e.id)}),[e.isHidden!==!0?(r(),o(p,{key:0},[m("div",{class:n(["flex pb-5 px-1 border-b-[2px] mb-[-2px]",{"text-primary border-primary":e.active&&!t.premium,"border-transparent text-grey-white":!e.active}])},[m("span",null,b(e.title),1),P(a.$slots,"title-suffix",{item:e})],2),e.premium&&!z(f)?(r(),o("span",{key:0,class:n(["px-1 py-0.5 ml-[-15px] relative bottom-7 rounded-[2px] w-fit text-alabaster font-ubuntu font-normal text-[10px] leading-none",e.active?"bg-primary":"bg-time-grey"])},"PREMIUM",2)):e.customBadge&&e.customBadge!==""?(r(),o("span",{key:1,class:n(["px-1 py-0.5 ml-[-15px] relative bottom-7 rounded-[2px] w-fit text-alabaster font-ubuntu font-normal text-[10px] leading-none",e.active?"bg-primary":"bg-time-grey"])},b(e.customBadge),3)):u("",!0)],64)):u("",!0)],16,H))),128)):u("",!0)],2)}}});export{j as _};