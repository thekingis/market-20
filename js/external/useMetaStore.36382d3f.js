import{p as a,aO as r}from"./entry.8bd29e6a.js";const e=a(),l=r({id:"meta-store",state:()=>({namePart:"",slugPart:"",title:"",seoMetaData:{id:0,metaTitle:null,metaDescription:null,metaViewport:null,metaRobots:null,canonicalURL:null,keywords:null,structuredData:null},url:window.location.href}),getters:{getNamePart:t=>t.namePart,getSlugPart:t=>t.slugPart,getTitle:t=>t.title,getUrl:t=>t.url,getSeoData:t=>t.seoMetaData},actions:{setNamePart(t){return this.namePart=t,t},setSlugPart(t){return this.slugPart=t,t},setTitle(){const t=((e.params.slug||e.query.tag)&&this.slugPart?this.slugPart+" - ":"")+(this.namePart?this.namePart+" - ":"");return this.title=t,t},setSeoData(t){this.seoMetaData=t},setUrl(){this.url=window.location.href}}});export{l as u};