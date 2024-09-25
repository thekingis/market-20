import{_ as rt}from"./Wrapper.vue.61a9a4c0.js";import{_ as it}from"./LineChart.vue.36290516.js";import{f as lt,u as ot,J as ct}from"./utils.11774da7.js";import{d as Y,o as i,c,b as t,t as L,i as X,k as q,e as A,aG as tt,h as M,aH as dt,F as W,j as st,m as ut,a as nt,aC as K,f as et,w as pt,g as mt,r as S,s as _t,p as ft,z as ht,ax as bt,aQ as gt}from"./entry.8bd29e6a.js";import{_ as yt}from"./SmallSpinnerLoader.vue.0773deb7.js";import{_ as xt}from"./nuxt-link.a6eea277.js";import{_ as vt}from"./SmallLoader.a34eb8b6.js";import{_ as kt}from"./HeaderButtons.vue.2ebf6143.js";import{u as at}from"./fetch.5bb01ad1.js";import"./nuxt-icon.vue.2d6fd5e1.js";/* empty css                      */import"./MarketPriceInfo.vue.f18b882a.js";import"./MarketCapInfo.vue.a9d5ed0d.js";import"./Share.vue.fc01699f.js";import"./InfoTooltip.vue.739990f2.js";/* empty css                        */import"./RatingAverageBar.vue.212facb9.js";import"./NetworkingChart.vue.e1893fe2.js";import"./index.esm.min.ffebd841.js";import"./Icon.56e74129.js";import"./config.1edc8810.js";import"./_plugin-vue_export-helper.c27b6911.js";import"./useMetaStore.36382d3f.js";import"./useClickOutsideUpdated.43723e42.js";import"./index.eed71953.js";import"./image-options.0ae7f2f4.js";const wt={class:"stock-card w-full flex items-center justify-between py-4 px-2"},$t=["src"],Ct={class:"ml-2 w-10/12"},St={class:"text-start font-semibold text-footer-nav mb-1 leading-none text-ellipsis whitespace-nowrap1 overflow-hidden"},It={class:"text-xs text-start text-time-grey font-light text-ellipsis overflow-hidden"},Lt={key:0,class:"flex w-4/12 justify-end"},Tt={class:"mx-2 w-[25px] h-[24px]"},qt={class:"flex"},Mt={class:"font-semibold text-[10px] text-black"},jt={class:"text-sm font-normal text-black"},Ut={class:"flex justify-end"},Pt=Y({__name:"IndexStockCard",props:{cardData:{default:()=>{}},cardContentType:{}},setup(z){const d=z;return(r,j)=>{var U,P,H,N,w,x,B,$,O,F,a,J,V,C,D,I,Q,Z,e,u,v,p,o,n,s,m,_,h;const E=it;return i(),c("div",wt,[t("div",{class:X(["flex items-center w-8/12",{"w-full":d.cardContentType==="industry"}])},[t("img",{class:"max-h-10 rounded-full",src:r.cardData.icon?r.cardData.icon:r.cardData.lightLogo,alt:"logo"},null,8,$t),t("div",Ct,[t("p",St,L((U=r.cardData)==null?void 0:U.title),1),t("p",It,L((P=r.cardData)==null?void 0:P.subtitle),1)])],2),d.cardContentType!=="industry"?(i(),c("div",Lt,[t("span",Tt,[q(E,{bottom:"0%","line-data":[{data:(N=(H=r.cardData)==null?void 0:H.intradayPrices)==null?void 0:N.nodes.map(b=>{var l,g;return(l=b==null?void 0:b.average)!=null&&l.amount?(g=b==null?void 0:b.average)==null?void 0:g.amount:0}),lineColor:(B=A(tt)[(x=(w=r.cardData)==null?void 0:w.quote)==null?void 0:x.trendDirection])==null?void 0:B.lineColor}],"show-y-axis":!1,"split-line":!1,"has-tooltip":!1,class:"pointer-events-none"},null,8,["line-data"])]),t("span",null,[t("span",qt,[t("span",Mt,L((O=($=r.cardData)==null?void 0:$.quote)!=null&&O.price?("formatCurrencyNumber"in r?r.formatCurrencyNumber:A(lt))((a=(F=r.cardData)==null?void 0:F.quote)==null?void 0:a.price.amount,(V=(J=r.cardData)==null?void 0:J.quote)==null?void 0:V.price.currency).slice(0,1):""),1),t("span",jt,L((D=(C=r.cardData)==null?void 0:C.quote)==null?void 0:D.price.amount),1)]),t("span",Ut,[t("span",{class:X(["text-[11px] font-semibold",(Z=A(tt)[(Q=(I=r.cardData)==null?void 0:I.quote)==null?void 0:Q.trendDirection])==null?void 0:Z.textColor])},L((v=A(tt)[(u=(e=r.cardData)==null?void 0:e.quote)==null?void 0:u.trendDirection])==null?void 0:v.arrow),3),(o=(p=r.cardData)==null?void 0:p.quote)!=null&&o.changePercent.mathAmount?(i(),c("span",{key:0,class:X(["text-[11px] font-normal",(m=A(tt)[(s=(n=r.cardData)==null?void 0:n.quote)==null?void 0:s.trendDirection])==null?void 0:m.textColor])},L((((h=(_=r.cardData)==null?void 0:_.quote)==null?void 0:h.changePercent.mathAmount)*100).toFixed(2))+"% ",3)):M("",!0)])])])):M("",!0),t("div",null,[dt(r.$slots,"card-suffix")])])}}}),Dt={class:"flex flex-row items-center justify-between border-[#f2f2f8] border-[1px] rounded-[6px] px-3 py-[6px] mt-2 font-medium"},At={class:"text-[15px] text-black"},Et=t("p",{class:"text-[12px] text-[#7b8493]"},"P/E",-1),Nt=t("div",{class:"w-[2px] h-[35px] bg-[#f2f2f8]"},null,-1),Bt={class:"text-[15px] text-black"},Ft=t("p",{class:"text-[12px] text-[#7b8493]"},"P/B",-1),Rt=t("div",{class:"w-[2px] h-[35px] bg-[#f2f2f8]"},null,-1),Vt={class:"text-[15px] text-black"},zt=t("p",{class:"text-[12px] text-[#7b8493]"},"Components",-1),Ht=Y({__name:"Points",props:{pointComponents:{default:()=>{}},pte:{default:()=>{}},ptb:{default:()=>{}}},setup(z){return(d,r)=>(i(),c("div",Dt,[t("div",At,[Et,t("p",null,L(d.pte.toFixed(2)),1)]),Nt,t("div",Bt,[Ft,t("p",null,L(d.ptb.toFixed(2)),1)]),Rt,t("div",Vt,[zt,t("p",null,L(d.pointComponents),1)])]))}}),Gt={class:"px-2 relative z-10 mb-4"},Ot={class:"flex items-center mt-1"},Qt={key:0,class:"flex gap-[3px] items-center flex-wrap"},Wt=["src"],Jt={key:1,class:"text-sm pl-2"},Kt=Y({__name:"RelatedCompanies",props:{stocks:{default:()=>[]}},setup(z){var E,U,P;const d=z,r=(U=(E=d.stocks)==null?void 0:E.holdings)==null?void 0:U.nodes,j=(P=d.stocks)==null?void 0:P.holdingsCount;return(H,N)=>(i(),c("div",Gt,[t("div",Ot,[A(r)?(i(),c("div",Qt,[(i(!0),c(W,null,st(A(r),(w,x)=>(i(),c(W,{key:x},[x<=5?(i(),c("img",{key:0,class:"w-6 h-6 rounded-full object-cover object-center",src:w.stock.darkLogo,alt:"company"},null,8,Wt)):M("",!0)],64))),128))])):M("",!0),A(j)>5?(i(),c("span",Jt,"+"+L(A(j)-5),1)):M("",!0)])]))}}),Xt={key:0,class:"grid grid-cols-1 xl:grid-cols-4 md:grid-cols-2 lg:grid-cols-3 gap-4"},Yt={class:"h-full flex flex-col border-[1px] border-breaking-border rounded-[12px] pb-7 pt-4 px-4 shadow-[0_1px_3px_rgba(0,0,0,0.1),0_1px_2px_rgba(0,0,0,0.06)]"},Zt={class:"flex items-center"},te={key:0,class:"flex flex-wrap gap-[3px] mt-1 mb-3.5"},ee=["src","alt"],se={key:0,class:"text-sm ml-1.5 text-black"},ae=Y({__name:"CardMarket",props:{cards:{default:()=>[]},marketPoints:{default:()=>{}},contentType:{default:""}},setup(z){const d=z,r=ut(),j=ot(),E=nt(()=>d.cards),U={index:"/markets/indexes/",sector:"/markets/sectors/",industry:"/markets/industries/"},P={index:"View Detailed Breakout >",sector:"View Sector Breakout >",industry:"View Industry Breakout >"},H=N=>{let w;d.cards.forEach(x=>{w=((x==null?void 0:x.stocksSymbols)||[]).map($=>({...N[$]})),x.stocks=w!=null&&w.some($=>$==null?void 0:$.symbol)?w:[]})};return K(()=>[j.getMarketsPageIndustriesStocksLogos,d.cards],()=>{d.contentType==="industry"&&H(j.getMarketsPageIndustriesStocksLogos)}),(N,w)=>{const x=Pt,B=Ht,$=yt,O=Kt,F=xt;return E.value.length?(i(),c("div",Xt,[(i(!0),c(W,null,st(N.cards,(a,J)=>{var V,C,D;return i(),c("div",{key:J,class:X([a.security,""])},[t("div",Yt,[t("div",Zt,[q(x,{"card-data":a,"card-content-type":d.contentType},null,8,["card-data","card-content-type"])]),a.showMarketPoints?(i(),et(B,{key:0,"point-components":a.components,pte:a.security.pte,ptb:a.security.ptb},null,8,["point-components","pte","ptb"])):M("",!0),t("p",{class:X(["text-sm font-medium text-time-grey my-5",{"mt-1":d.contentType==="industry"}])},L(a==null?void 0:a.description.substring(0,125))+L(((V=a==null?void 0:a.description)==null?void 0:V.length)>125?"...":""),3),d.contentType==="industry"?(i(),c(W,{key:1},[((C=a==null?void 0:a.stocks)==null?void 0:C.length)>0?(i(),c("div",te,[(i(!0),c(W,null,st(a==null?void 0:a.stocks,(I,Q)=>(i(),c(W,{key:I.symbol},[I.lightLogo&&I.darkLogo&&Q<5?(i(),c("img",{key:0,width:"24",height:"24",class:"rounded-[50px] object-cover",src:A(r).getTheme==="light"?I.lightLogo:I.darkLogo,alt:(I==null?void 0:I.symbol)||""},null,8,ee)):M("",!0)],64))),128)),((D=a==null?void 0:a.stocks)==null?void 0:D.length)>5?(i(),c("span",se,"+more")):M("",!0)])):(i(),et($,{key:1,class:"h-[42px]",size:5}))],64)):(i(),et(O,{key:2,stocks:a.security,stocksCount:a.security},null,8,["stocks","stocksCount"])),q(F,{to:`${U[d.contentType]+(a==null?void 0:a.slug)}`,class:"mt-auto text-primary inline-block font-medium underline text-[14px] w-auto self-start"},{default:pt(()=>[mt(L(P[d.contentType]),1)]),_:2},1032,["to"])])],2)}),128))])):M("",!0)}}}),oe={class:"max-w-[1492px] mx-auto redising"},ne=t("div",{class:"mt-16"},[t("div",{class:"flex items-center border-b-[1px] border-mischka pb-2"},[t("p",{class:"mr-2 text-xl font-bold text-black"},"Major US Indexes")])],-1),re={class:"card-draggable mt-8 md:pb-10 px-0.5 py-1 overflow-auto markets-indexes"},ie={key:0,class:"flex justify-center"},le=t("div",{class:"mt-16"},[t("div",{class:"flex items-center border-b-[1px] border-mischka pb-2"},[t("p",{class:"mr-2 text-xl font-bold text-black"},"Major US Sectors")])],-1),ce={class:"card-draggable mt-8 md:pb-10 px-0.5 py-1 overflow-auto markets-sectors"},de={key:0,class:"flex justify-center"},ue={class:"mt-16"},pe=t("div",{class:"flex items-center border-b-[1px] border-mischka pb-2"},[t("p",{class:"mr-2 text-xl font-bold text-black"},"Major US Industries")],-1),me={key:0,class:"flex justify-center"},_e={key:1,class:"markets-industries"},fe="https://equityset-cms-kqjyj.ondigitalocean.app/api/indexes?populate=*",he="https://equityset-cms-kqjyj.ondigitalocean.app/api/sectors?populate=*",ze=Y({__name:"index",setup(z){const d=S([]),r=S([]),j=S([]),E=S([]),U=S([]),P=S([]);S();const{data:H}=at(fe,"$qzGMvMIRhX"),{data:N}=at(he,"$ULzHVbpbPW"),w=S([]);_t.get("sectors/?pagination[page]=1&[fields][0]=title&[fields][1]=slug&populate[sector_industries][populate][image][fields][0]=url&populate[sector_industries][fields][1]=title&populate[sector_industries][fields][2]=slug&populate[sector_industries][fields][3]=short_description&populate[sector_industries][fields][4]=top_industry_stocks&populate[sector_industries][fields][5]=related_industry").then(e=>{var u;return w.value=(u=e==null?void 0:e.data)!=null&&u.data?e.data.data:[]});const x=S(!0),B=S(!0),$=S(!0),O=ft();ht();const F=ot(),a=S({image:"company",title:"US Market Overview",code:"",description:"All US-based stocks and major indices related to the US markets. along with sector and industry breakdowns. This includes over 4,000 stocks and 8,000 ETFs and mutuals funds. In terms of major indices specifically highlighted are the Dow Jones, S&P 500, Nasdaq 100 and Russell 200.",hideGlance:!0,hideStatistic:!0,hidePriceInfo:!0}),V=`{id, symbol
            quote {
              price {
                amount
                currency
              }
              change {
                amount
                currency
              }
              changePercent {
                mathAmount
              }
              trendDirection
            }
            intradayPrices(startDate: "${bt().subtract(5,"day").toISOString()}", last: 7, frequency: ONE_HOUR) {
              nodes {
                average {
                  amount
                }
              }
            }
            security{... on ETF {holdings( first: 5 ) {
                nodes {
                    stock{
                        name
                        lightLogo: logoUrl(shape: SQUARE, theme: LIGHT)
                        darkLogo: logoUrl(shape: SQUARE, theme: DARK)
                    }
                }
            }
        pte
    ptb
holdingsCount } }}`,C=S({active:"all",items:[]}),D=S(new Map),I=e=>{C.value.items=C.value.items.map(u=>({...u,active:u.id===e})),C.value.active=e},Q=nt(()=>D.value.get(C.value.active));K(()=>[x.value,B.value,$.value,O.query.section],([e,u,v,p])=>{gt(()=>{if(p&&!e&&!u&&!v){const o=document.querySelector(`.${p}`);o&&ct(o,150)}})},{immediate:!0}),K(H,async e=>{var p,o;const u=e.data.map(n=>({symbol:n.attributes.symbol,show:!0}));j.value=(p=e==null?void 0:e.data)==null?void 0:p.map(n=>{var s;return(s=n==null?void 0:n.attributes)==null?void 0:s.symbol});const{data:v}=await F.fetchMultipleStock(j.value,V);E.value=((o=v.stocks.nodes)==null?void 0:o.reduce((n,s)=>({...n,[s.symbol]:s}),{}))||{},d.value=u.map(n=>{var s,m,_,h,b,l,g,k,f,R,G;return{...E.value[n.symbol],subtitle:"US Index",icon:(b=(h=(_=(m=(s=e.data.find(y=>y.attributes.symbol===n.symbol))==null?void 0:s.attributes)==null?void 0:m.image)==null?void 0:_.data)==null?void 0:h.attributes)==null?void 0:b.url,title:(g=(l=e.data.find(y=>y.attributes.symbol===n.symbol))==null?void 0:l.attributes)==null?void 0:g.title,description:(f=(k=e.data.find(y=>y.attributes.symbol===n.symbol))==null?void 0:k.attributes)==null?void 0:f.description,slug:(G=(R=e.data.find(y=>y.attributes.symbol===n.symbol))==null?void 0:R.attributes)==null?void 0:G.slug,showMarketPoints:!0,components:"500"}}),x.value=!1},{deep:!0}),K(N,async e=>{var p;const u=e.data.map(o=>({symbol:o.attributes.symbol,show:!0}));j.value=e.data.map(o=>o.attributes.symbol),U.value=e.data.map(o=>o.attributes.symbol);const{data:v}=await F.fetchMultipleStock(U.value,V);P.value=((p=v.stocks.nodes)==null?void 0:p.reduce((o,n)=>({...o,[n.symbol]:n}),{}))||{},r.value=u.map((o,n)=>{var s,m,_,h,b,l,g,k,f,R,G;return{...P.value[o.symbol],positive:!0,active:n===0,icon:(b=(h=(_=(m=(s=e.data.find(y=>y.attributes.symbol===o.symbol))==null?void 0:s.attributes)==null?void 0:m.image)==null?void 0:_.data)==null?void 0:h.attributes)==null?void 0:b.url,title:(g=(l=e.data.find(y=>y.attributes.symbol===o.symbol))==null?void 0:l.attributes)==null?void 0:g.title,description:(f=(k=e.data.find(y=>y.attributes.symbol===o.symbol))==null?void 0:k.attributes)==null?void 0:f.description,slug:(G=(R=e.data.find(y=>y.attributes.symbol===o.symbol))==null?void 0:R.attributes)==null?void 0:G.slug,showMarketPoints:!1}}),B.value=!1},{deep:!0});const Z=async(e,u,v,p=50)=>{var o,n,s,m,_,h,b,l,g,k;if(e&&(e==null?void 0:e.length)>0&&u){let f={},R=!0,G=0;const y=50;for(;((o=f==null?void 0:f.pageInfo)!=null&&o.hasNextPage||R)&&G++<y;){const T=await F.fetchMultipleStock(e,u,"multipleStocks",((n=f==null?void 0:f.pageInfo)==null?void 0:n.endCursor)||"",p);R?f={nodes:(l=(b=T==null?void 0:T.data)==null?void 0:b.stocks)==null?void 0:l.nodes,pageInfo:(k=(g=T==null?void 0:T.data)==null?void 0:g.stocks)==null?void 0:k.pageInfo}:f={nodes:[...f.nodes,...(m=(s=T==null?void 0:T.data)==null?void 0:s.stocks)==null?void 0:m.nodes],pageInfo:(h=(_=T==null?void 0:T.data)==null?void 0:_.stocks)==null?void 0:h.pageInfo},R=!1}return(f==null?void 0:f.nodes)||[]}};return K(()=>w.value,e=>{let u=[{id:"all",title:"All",active:!0}],v=[],p={};e.forEach((s,m)=>{var _,h,b;u.push({id:s.attributes.slug,title:s.attributes.title}),D.value.set(s.attributes.slug,s.attributes.sector_industries.data.map(l=>{var g;return{icon:l.attributes.image.data.attributes.url,title:l.attributes.title,description:l.attributes.short_description,slug:l.attributes.slug,stocksSymbols:[...(((g=l==null?void 0:l.attributes)==null?void 0:g.top_industry_stocks)||[]).map(k=>k==null?void 0:k.value)||[]]}})),(b=(h=(_=s==null?void 0:s.attributes)==null?void 0:_.sector_industries)==null?void 0:h.data)==null||b.forEach(l=>{var g,k;p[l.attributes.slug]=(k=(g=l==null?void 0:l.attributes)==null?void 0:g.top_industry_stocks)==null?void 0:k.map(f=>f.value).slice(0,5),v=[...v,...p[l.attributes.slug]]})}),Z(v,`{
      symbol
      lightLogo: logoUrl( shape: SQUARE, theme: LIGHT )
      darkLogo: logoUrl( shape: SQUARE, theme: DARK )
    }`).then(s=>{F.marketsPageIndustriesStocksLogos=(s==null?void 0:s.reduce((m,_)=>({...m,[_.symbol]:_}),{}))||{}}),C.value.items=u;let n=[];D.value.forEach((s,m)=>{if(m!=="all"&&(n=[...n,...s],s.length===0)){const _=C.value.items.findIndex(h=>(h==null?void 0:h.id)===m);_&&C.value.items.splice(_,1)}}),D.value.set("all",n.sort((s,m)=>s.title>m.title?1:s.title<m.title?-1:0)),$.value=!1}),(e,u)=>{const v=rt,p=ae,o=vt,n=kt;return i(),c("div",oe,[q(v,{"head-data":a.value},null,8,["head-data"]),ne,t("div",re,[q(p,{cards:d.value,"content-type":"index"},null,8,["cards"])]),x.value?(i(),c("div",ie,[q(o)])):M("",!0),le,t("div",ce,[q(p,{cards:r.value,"content-type":"sector"},null,8,["cards"]),B.value?(i(),c("div",de,[q(o)])):M("",!0)]),t("div",ue,[pe,$.value?(i(),c("div",me,[q(o)])):(i(),c("div",_e,[q(n,{onChangeActive:I,items:C.value.items,class:"mt-[5px]"},null,8,["items"]),q(p,{cards:Q.value,"content-type":"industry",class:"mt-[40px]"},null,8,["cards"])]))])])}}});export{ze as default};