import{d as y,o as a,c as d,b as t,t as i,h as q,r as T,aC as E,e as o,i as v,g as V,p as N,ax as x,F as j,j as L}from"./entry.8bd29e6a.js";import{u as O,a0 as M}from"./utils.11774da7.js";const B={key:0,class:"flex items-center"},U={class:"shrink-0 flex items-center mr-5"},F={class:"shrink-0 mr-4"},G=["src","alt"],R={class:"font-bold text-xl lg:text-4xl leading-4 lg:leading-10 text-footer-nav"},Y={class:"font-bold text-base lg:text-lg text-nav-grey leading-6"},_e=y({__name:"Title",props:{headData:{}},setup(f){return(r,c)=>{var s,e,n,l;return(s=r.headData)!=null&&s.title?(a(),d("div",B,[t("div",U,[t("div",F,[t("img",{width:"75",height:"75",src:((e=r.headData)==null?void 0:e.imageUrl)||`/img/pages/overview/${((n=r.headData)==null?void 0:n.image)||"company"}.svg`,alt:(l=r.headData)==null?void 0:l.title},null,8,G)]),t("div",null,[t("p",R,i(r.headData.title),1),t("p",Y,i(r.headData.code),1)])])])):q("",!0)}}}),z={class:"w-full lg:w-fit"},H={class:"flex items-end lg:justify-end"},J={class:"flex text-footer-nav mr-3"},K={class:"flex text-footer-nav mr-3"},Q={class:"p-1 text-sm leading-5"},W={class:"font-bold text-4xl leading-10"},X={class:"mr-0.5"},Z=["src","alt"],ee={class:"text-sm font-medium leading-5"},te={class:"flex items-center p-1 mt-2"},se={class:"mr-5 flex items-center"},oe=t("span",{class:"text-xs leading-4 text-secondary-text mr-[3px]"},"Last Close:",-1),re={class:"leading-none text-footer-nav"},ne={class:"flex items-center"},ie=t("div",{class:"h-1.5 w-1.5 rounded-full bg-yellow mr-[5px]"},null,-1),le=t("span",{class:"text-xs leading-none font-light text-nav-grey mr-1"},"Pre Market",-1),ce=["src"],ae=t("span",{class:"leading-none text-footer-nav"},"2.5%",-1),he=y({__name:"Statistics",setup(f){const r=O(),c={POSITIVE:{textColor:"text-green",arrow:{src:"/img/pages/company/arrow-up.svg",alt:"Arrow up",class:""},chartColor:"#28B43E"},NEUTRAL:{textColor:"",chartColor:"#788091"},NEGATIVE:{textColor:"text-red",arrow:{src:"/img/pages/company/arrow-up-red.svg",alt:"Arrow down",class:"rotate-180"},chartColor:"#d10015"}},s=T({symbol:"",price:"",lastChar:"",changePrice:"",closePrice:"",changePercent:"",trendDirection:""});return E(()=>r.individualSectorIndex,e=>{var n,l,u,p,m,_,h,g,w,D,S,b,k,I,P,A,C,$;(l=(n=e==null?void 0:e.quote)==null?void 0:n.price)!=null&&l.displayAmount&&(s.value={...s.value,...M((p=(u=e==null?void 0:e.quote)==null?void 0:u.price)==null?void 0:p.displayAmount)}),(_=(m=e==null?void 0:e.quote)==null?void 0:m.change)!=null&&_.displayAmount&&(s.value.changePrice=(g=(h=e==null?void 0:e.quote)==null?void 0:h.change)==null?void 0:g.displayAmount),(D=(w=e==null?void 0:e.quote)==null?void 0:w.changePercent)!=null&&D.displayAmount&&(s.value.changePercent=(b=(S=e==null?void 0:e.quote)==null?void 0:S.changePercent)==null?void 0:b.displayAmount),(k=e==null?void 0:e.quote)!=null&&k.trendDirection&&(s.value.trendDirection=(I=e==null?void 0:e.quote)==null?void 0:I.trendDirection),(A=(P=e==null?void 0:e.quote)==null?void 0:P.close)!=null&&A.displayAmount&&(s.value.closePrice=($=(C=e==null?void 0:e.quote)==null?void 0:C.close)==null?void 0:$.displayAmount)},{immediate:!0}),(e,n)=>{var l,u,p,m,_,h,g;return a(),d("div",z,[t("div",H,[t("div",J,[t("div",K,[t("span",Q,i(o(s).symbol),1),t("span",W,i(o(s).price),1),t("span",{class:v(["font-bold text-4xl leading-10",{"text-green":o(s).trendDirection==="POSITIVE","text-red":o(s).trendDirection==="NEGATIVE"}])},i(o(s).lastChar),3)])]),t("div",{class:v(["pl-1 py-0.5 flex items-center",o(s).trendDirection?(l=c[o(s).trendDirection])==null?void 0:l.textColor:""])},[t("div",X,[o(s).trendDirection!=="HOLD"?(a(),d("img",{key:0,src:(p=(u=c[o(s).trendDirection])==null?void 0:u.arrow)==null?void 0:p.src,alt:(_=(m=c[o(s).trendDirection])==null?void 0:m.arrow)==null?void 0:_.alt,class:v((g=(h=c[o(s).trendDirection])==null?void 0:h.arrow)==null?void 0:g.class)},null,10,Z)):q("",!0)]),t("div",ee,[t("span",null,i(o(s).changePrice),1),V(" /"),t("span",null,i(o(s).changePercent),1)])],2)]),t("div",te,[t("div",se,[oe,t("span",re,i(o(s).closePrice),1)]),t("div",ne,[ie,le,t("div",null,[t("img",{src:"/img/pages/company/arrow-down.svg",alt:"Arrow down"},null,8,ce)]),ae])])])}}}),de={class:"w-fit w-full md:w-auto border-[1px] border-mischka rounded-md py-2 px-2.5 block md:flex items-center md:justify-between"},ue={class:"text-end text-xs leading-4 text-secondary-text font-normal"},ge=y({__name:"MarketPriceInfo",setup(f){const r=O();N();const c=T([{title:"7D",period:"sevendays",startDay:x().subtract(7,"day").toISOString(),value:"",positive:!0},{title:"1M",period:"onemonth",startDay:x().subtract(1,"month").toISOString(),value:"",positive:!0},{title:"6M",period:"sixmonths",startDay:x().subtract(6,"month").toISOString(),value:"",positive:!0},{title:"1Y",period:"oneyear",startDay:x().subtract(1,"year").toISOString(),value:"",positive:!0},{title:"YTD",period:"ytd",startDay:x().startOf("year").add(1,"day").toISOString(),value:"",positive:!0}]);return E(()=>r.getIndividualSectorIndex,async s=>{s!=null&&s.symbol&&(c.value=await r.fetchMarketPriceInfo(c.value,s.symbol))},{immediate:!0}),(s,e)=>(a(),d("div",de,[(a(!0),d(j,null,L(o(c),(n,l)=>(a(),d("div",{key:l,class:"mx-1.5 flex items-center md:block justify-between py-1 md:py-0"},[t("p",ue,i(n.title),1),t("div",null,[t("p",{class:v(["text-sm leading-[14px] font-medium md:pt-1 whitespace-nowrap",n.positive?"text-green":"text-red"])},i(n.positive?"â†‘":"â†“")+" "+i(n.value),3)])]))),128))]))}});export{_e as _,ge as a,he as b};