import{_ as F}from"./nuxt-link.a6eea277.js";import{_ as R}from"./SmallSpinnerLoader.vue.0773deb7.js";import{_ as G}from"./nuxt-icon.vue.2d6fd5e1.js";/* empty css                      */import{u as O}from"./useMarkdownIt.b940d58c.js";import{d as P,m as U,z as q,a as g,o as i,c as d,k as x,w as z,b as u,i as n,h as _,t as J,f as H,F as v,j as K,e as y,aT as Q,g as W}from"./entry.8bd29e6a.js";import{_ as X}from"./_plugin-vue_export-helper.c27b6911.js";const Y=["src"],Z={key:0,class:"border-t border-secondary-text w-[23px]"},S={key:0,class:"flex items-center gap-[10px] mt-[10px]"},ee={class:"flex flex-col"},te=["src","alt"],ae={key:0,class:"font-black self-center"},se=P({__name:"InsightCard",props:{insightCardData:{default:()=>({})},insightStocksData:{default:()=>[]},isStockDataLoading:{type:Boolean,default:!1},layout:{default:"default"},wholeCardAsLink:{type:Boolean,default:!1}},setup(N){const r=N,A=U(),{renderMarkdown:V}=O(),j=q(),c=g(()=>{var f,m,p;const e=(m=(f=r.insightCardData)==null?void 0:f.insight_stocks)==null?void 0:m.map(l=>l==null?void 0:l.value);return(p=r.insightStocksData)==null?void 0:p.filter(l=>e.includes(l==null?void 0:l.symbol))}),o=g(()=>r.layout==="default"),s=g(()=>r.layout==="simplified"),a=g(()=>r.layout==="simplified-horizontal"),E=()=>{var e;r.wholeCardAsLink&&j.push(`/insights-analysis/${(e=r.insightCardData)==null?void 0:e.slug}`)};return(e,f)=>{var w,b,C,L,D,k,T,I,B;const m=F,p=R,l=G;return i(),d("div",{class:n(["flex insight-card",{"flex-col":o.value,"flex-col items-start rounded-xl overflow-hidden simplified":s.value,"rounded-xl overflow-hidden flex-row min-h-[113px] small-shadow with-hover":a.value,"cursor-pointer":e.wholeCardAsLink}]),onClick:E},[x(m,{to:`/insights-analysis/${(w=e.insightCardData)==null?void 0:w.slug}`,tabindex:"-1",class:n(["inline-block",a.value?"self-stretch w-[100px] min-w-[100px]":"w-full"])},{default:z(()=>{var t,h,M,$;return[u("img",{class:n(["object-cover",{"w-full md:w-[350px] h-[90vw] md:h-[312px] lg:h-[22vw] xl:h-[312px]":o.value,"w-full h-[250px] md:h-[312px] lg:h-[21vw] xl:h-[260px]":s.value,"inline-block h-full w-full":a.value}]),src:($=(M=(h=(t=e.insightCardData)==null?void 0:t.featured_image)==null?void 0:h.data)==null?void 0:M.attributes)==null?void 0:$.url,alt:""},null,10,Y)]}),_:1},8,["to","class"]),u("div",{class:n({"p-5 pb-7":s.value,"px-[1rem] py-[0.5rem] flex flex-col justify-center gap-2":a.value})},[u("div",{class:n(["flex items-center mt-[25px] gap-4",{"!mt-0":s.value||a.value,"!gap-0":a.value}])},[o.value?(i(),d("div",Z)):_("",!0),u("span",{class:n(["text-sm",{"text-secondary-text":o.value,"py-2 px-3.5":s.value,"text-primary-white inline-block rounded-md bg-magnolia font-bold":s.value||a.value,"!text-[11px] py-0.5 px-2":a.value}])},J((b=e.insightCardData)==null?void 0:b.insight_sub_title),3)],2),e.isStockDataLoading?(i(),H(p,{key:0,size:5,class:"h-[45px]"})):(i(),d(v,{key:1},[((C=c.value)==null?void 0:C.length)>0?(i(),d("div",S,[(i(!0),d(v,null,K(c.value,(t,h)=>(i(),d(v,{key:h},[u("div",ee,[u("img",{class:"w-[35px]",src:y(A).getTheme===y(Q).LIGHT?t==null?void 0:t.lightLogo:t==null?void 0:t.darkLogo,alt:t==null?void 0:t.symbol},null,8,te)]),h<c.value.length-1?(i(),d("span",ae,"vs")):_("",!0)],64))),128))])):_("",!0)],64)),u("h3",{class:n(["insight-card__title",{"text-lg mt-2 !font-medium inherit-font-weight text-darker-blue max-w-[300px]":o.value,"text-xl text-black !font-bold max-w-[95%] mt-5 simplified":s.value,"text-black":a.value}])},[x(m,{to:`/insights-analysis/${(L=e.insightCardData)==null?void 0:L.slug}`,tabindex:"-1",class:"inline-block inherit-text-color",innerHTML:y(V)((o.value?(D=e.insightCardData)==null?void 0:D.insight_title_full:a.value?((k=e.insightCardData)==null?void 0:k.insight_title_full)||((T=e.insightCardData)==null?void 0:T.title):(I=e.insightCardData)==null?void 0:I.title)||"")},null,8,["to","innerHTML"])],2),a.value?_("",!0):(i(),H(m,{key:2,to:`/insights-analysis/${(B=e.insightCardData)==null?void 0:B.slug}`,class:n(["inline-flex items-center gap-4 insight-card__cta",{"text-secondary-text":o.value,"text-primary-white font-semibold":s.value}])},{default:z(()=>[W(" Read more "),x(l,{name:"img/icons/arrow-right-long",class:n(["w-[20px] inline-block insight-card__cta__icon",{"text-secondary-text":o.value,"text-primary-white":s.value}])},null,8,["class"])]),_:1},8,["to","class"]))],2)],2)}}});const me=X(se,[["__scopeId","data-v-803eb849"]]);export{me as _};