import{d as S,p as f,z as g,aA as d,aF as k}from"./entry.8bd29e6a.js";import{u as h}from"./utils.11774da7.js";import"./image-options.0ae7f2f4.js";const q=S({__name:"[slug]",async setup(y){var u,c,n,p;let t,r;const s=f(),_=g(),m=h(),e=([t,r]=d(()=>{var o,a,l;return m.fetchMultipleStock([(l=(a=(o=s==null?void 0:s.params)==null?void 0:o.slug)==null?void 0:a.toString())==null?void 0:l.toUpperCase()],"{ slug }","","",1,"SYMBOL")}),t=await t,r(),t),i=((p=(n=(c=(u=e==null?void 0:e.data)==null?void 0:u.stocks)==null?void 0:c.nodes)==null?void 0:n.at(0))==null?void 0:p.slug)||k.slug;return _.push({path:`/stocks/${i.toLowerCase()}`,query:{...s.query}}),(o,a)=>null}});export{q as default};