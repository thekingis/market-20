import{_ as c}from"./nuxt-link.a6eea277.js";import{j as x}from"./utils.11774da7.js";import{d as g,aw as k,o,f as i,w as n,b as r,i as y,t as s,g as b,h as a,c as d,aH as w}from"./entry.8bd29e6a.js";const _={class:"bg-white border-0 outline-0 py-2 px-3 max-w-[364px] min-w-[150px]"},v={class:"font-normal text-footer-nav text-sm mt-2"},B=g({__name:"InfoTooltip",props:{title:{default:""},description:{default:""},link:{default:{}},term:{default:null},category:{default:null}},setup(h){const m=x(),l=e=>{m.setShowSlideout(!0,e)};return(e,t)=>{const p=c,u=k("VDropdown");return o(),i(u,{class:"info-tooltip",distance:12,triggers:["hover"],popperTriggers:["hover"],placement:"right-end"},{popper:n(()=>[r("div",_,[r("p",{class:y([e.description?"border-b-2":"","text-footer-nav text-xs font-semibold border-grey-bg-footer"])},s(e.title),3),r("p",v,s(e.description),1),e.link?(o(),i(p,{key:0,to:e.link.url,class:"underline underline-offset-2 text-secondary-text text-xs font-normal mt-2"},{default:n(()=>[b(s(e.link.title),1)]),_:1},8,["to"])):a("",!0),e.term?(o(),d("button",{key:1,class:"underline underline-offset-2 text-secondary-text text-xs font-normal mt-2 mr-2",onClick:t[0]||(t[0]=f=>l(e.term))}," Learn More ")):a("",!0),e.category?(o(),d("button",{key:2,class:"underline underline-offset-2 text-secondary-text text-xs font-normal mt-2",onClick:t[1]||(t[1]=f=>l(e.category))}," Learn More ")):a("",!0)])]),default:n(()=>[w(e.$slots,"item")]),_:3})}}});export{B as _};