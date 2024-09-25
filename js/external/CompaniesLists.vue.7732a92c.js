import{_ as pe}from"./nuxt-link.a6eea277.js";import{_ as me}from"./InsightCard.bc178851.js";import{d as O,a as V,o as n,c as s,b as i,t as h,h as A,f as $,w as M,g as _e,i as f,F as q,j as N,k as U,aH as re,e as P,m as ge,r as oe,ax as he,aC as ye,aT as fe,aQ as xe,bW as ve}from"./entry.8bd29e6a.js";import{_ as be}from"./SmallLoader.a34eb8b6.js";import{_ as Ce}from"./LineChart.vue.36290516.js";import we from"./TableItemPolarChart.11d96650.js";import{h as ie,u as Te,f as Ee}from"./utils.11774da7.js";import{_ as Ae}from"./_plugin-vue_export-helper.c27b6911.js";const ue={class:"mt-[9rem]"},Ie={class:"homepage-section-content-wrapper"},$e={class:"flex items-center justify-between gap-y-8 gap-5 lg:gap-4 flex-wrap"},Ve={key:0,class:"text-4xl m-0 section-title"},aa=O({__name:"Insights",props:{data:{default:()=>({})}},setup(u){const p=u,l=V(()=>{var _,w,y,I,v;return{title:(_=p.data)==null?void 0:_.title,ctaCaption:(w=p.data)==null?void 0:w.cta_caption,insightsList:((v=(I=(y=p.data)==null?void 0:y.insights_lists)==null?void 0:I.data)==null?void 0:v.map(b=>b==null?void 0:b.attributes))||[]}}),x=V(()=>{var _;return((_=p.data)==null?void 0:_.isMegaMenuItem)===!0});return(_,w)=>{const y=pe,I=me;return n(),s("div",ue,[i("div",Ie,[i("div",null,[i("div",$e,[l.value.title?(n(),s("h2",Ve,h(l.value.title),1)):A("",!0),x.value?A("",!0):(n(),$(y,{key:1,class:"primary-btn--hollow",to:"/insights-analysis"},{default:M(()=>[_e(h(l.value.ctaCaption),1)]),_:1}))])]),i("div",{class:f(["grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-[1.5rem] gap-y-[4.5rem] md:gap-y-[3.5rem] lg:gap-5 mt-[40px]",{"!grid-cols-1 mt-[1.15rem]":x.value}])},[(n(!0),s(q,null,N(l.value.insightsList,(v,b)=>(n(),s("div",{class:"col-span-1",key:b},[U(I,{"whole-card-as-link":x.value,layout:x.value?"simplified-horizontal":"simplified","insight-card-data":v},null,8,["whole-card-as-link","layout","insight-card-data"])]))),128))],2)])])}}}),qe=["src","alt"],Ne={class:"flex flex-col gap-[0.25rem]"},Ue={class:"font-bold text-[15px] line-height-custom text-black block"},Pe={class:"font-bold text-xs text-time-grey uppercase line-height-custom block"},Oe=O({__name:"SmallStockCard",props:{title:{default:""},subtitle:{default:""},imgUrl:{default:""},smallerText:{type:Boolean,default:!1},link:{default:""}},setup(u){const p=u;return(l,x)=>{const _=pe;return n(),$(_,{to:("hasStringValue"in l?l.hasStringValue:P(ie))(p.link)?p.link:"#",class:f(["shadow-md flex items-center gap-4 px-5 py-2 rounded-[7px] small-shadow with-hover min-h-[75px]",{"!pointer-events-none":!("hasStringValue"in l?l.hasStringValue:P(ie))(p.link)}])},{default:M(()=>[l.imgUrl?(n(),s("img",{key:0,class:"w-[40px] rounded-[6px]",src:l.imgUrl,alt:l.title},null,8,qe)):A("",!0),i("div",Ne,[i("span",Ue,h(l.title),1),i("span",Pe,h(l.subtitle),1)]),re(l.$slots,"right-part",{},void 0,!0)]),_:3},8,["to","class"])}}});const Me=Ae(Oe,[["__scopeId","data-v-70f69c56"]]),Be={class:"mb-[3.5rem] last:mb-0 mt-[7rem] first:mt-0"},De={class:"homepage-section-content-wrapper"},He={key:0,class:"flex items-center justify-center py-[4rem]"},Ge={key:0,class:"flex flex-col gap-5"},Re={key:0,class:"flex flex-col ml-auto"},je={class:"font-semibold text-sm text-right text-black"},ze={key:1,class:"ml-auto flex items-start gap-2"},Fe={class:"block w-[25px] h-[24px]"},Qe={class:"flex flex-col"},Ke={class:"font-semibold text-sm text-right text-black"},We={key:2,class:"absolute right-[0.9rem] top-[50%] translate-y-[-50%]"},ta=O({__name:"CompaniesLists",props:{data:{default:()=>({})}},setup(u){const p=u,l=Te(),x=ge(),_=V(()=>x.getTheme===fe.LIGHT),w=oe([]),y=oe(!1),v=`{
                    id,
                    name,
                    symbol,
                    quote {
                        price {
                            amount
                            currency
                            displayAmount
                        }
                        change {
                            amount
                            currency
                        }
                        changePercent {
                            displayAmount (suffix: "%")
                        }
                        trendDirection
                    }
                    securityType
                     security {
                      ... on Company {

                        dimensionSummary (frequency: ANNUAL) {
													scorePercent { mathAmount (multiply: true) }
												}

                        dimensions (frequency: ANNUAL) {
                          scorePercent {
                            mathAmount
                          }
                          type
                        }

                      }
                    }
                    intradayPrices( startDate: "${he().subtract(5,"day").toISOString()}", frequency: ONE_HOUR, last: 7 ) {
                        nodes {
                            average {
                                amount
                            }
                        }
                    }
                    lightLogo: logoUrl( shape: SQUARE, theme: LIGHT )
                    darkLogo: logoUrl( shape: SQUARE, theme: DARK )
                }`,b={POSITIVE:{textColor:"text-green",arrow:"â†‘",lineColor:"#088a20"},NEUTRAL:{buttonClass:"text-grey bg-[#EBECEE]",textColor:"",arrow:"",lineColor:"#788091"},NEGATIVE:{textColor:"text-red",arrow:"â†“",lineColor:"#d10015"}},de=d=>{var g,T;const r={};return(T=(g=d==null?void 0:d.security)==null?void 0:g.dimensions)==null||T.forEach(a=>{var m;r[a==null?void 0:a.type]=(m=a==null?void 0:a.scorePercent)==null?void 0:m.mathAmount}),r};return ye(()=>{var d;return(d=p.data)==null?void 0:d.stocks_lists},async d=>{y.value=!0;const r=[];d==null||d.forEach(async a=>{var m;return(m=a==null?void 0:a.symbols)==null?void 0:m.forEach(o=>r.push(o.value))});let g=[];(r==null?void 0:r.length)>0&&await l.fetchMultipleStock(r,v).then(a=>{var m,o;return g=((o=(m=a==null?void 0:a.data)==null?void 0:m.stocks)==null?void 0:o.nodes)||[]});const T=await Promise.all(d==null?void 0:d.map(async a=>{var t;let m=[],o=[];switch(a==null?void 0:a.symbols_autofill){case"top_movers":{o=await l.fetchStockShakers(v),o=o==null?void 0:o.slice(0,4);break}default:{m=(t=a==null?void 0:a.symbols)==null?void 0:t.map(C=>C.value),o=[...(g==null?void 0:g.filter(C=>m.includes(C==null?void 0:C.symbol)))||[]];break}}return{title:a==null?void 0:a.title,stocks:o,symbols_autofill:a==null?void 0:a.symbols_autofill,suppl_data_type:(a==null?void 0:a.suppl_data_type)||"price"}}));w.value=[...T||[]],y.value=!1,xe(()=>{var a;(a=p.data)!=null&&a.isHomepageSection&&ve.refresh()})},{immediate:!0}),(d,r)=>{var o;const g=be,T=Ce,a=we,m=Me;return n(),s("div",Be,[i("div",De,[y.value?(n(),s("div",He,[U(g)])):(n(),s("div",{key:1,class:f(["grid grid-cols-1 md:grid-cols-2 gap-7 xl:gap-[60px]",{"!gap-x-0 !gap-y-[2.65rem]":(o=p.data)==null?void 0:o.isOneColumnLayout}])},[(n(!0),s(q,null,N(w.value,(t,C)=>{var B,D,H;return n(),s("div",{class:f(["col-span-1",{"col-span-2":(B=p.data)==null?void 0:B.isOneColumnLayout}]),key:C},[i("h2",{class:f(["text-2xl section-title",{"!mb-[1.15rem]":((D=p.data)==null?void 0:D.isMegaMenuItem)===!0}])},h(t==null?void 0:t.title),3),((H=t==null?void 0:t.stocks)==null?void 0:H.length)>0?(n(),s("div",Ge,[(n(!0),s(q,null,N(t==null?void 0:t.stocks,(e,Je)=>{var G;return n(),s("div",{key:e==null?void 0:e.symbol},[(n(),$(m,{title:e==null?void 0:e.name,subtitle:e==null?void 0:e.symbol,"img-url":e[_.value?"lightLogo":"darkLogo"],key:e==null?void 0:e.symbol,class:f(["relative",{"pr-[95px]":(t==null?void 0:t.suppl_data_type)==="alignment-chart"}]),link:`/company${(e==null?void 0:e.securityType)==="ETF"?"-etf":""}/${(G=e==null?void 0:e.symbol)==null?void 0:G.toLowerCase()}`},{"right-part":M(()=>{var R,j,z,F,Q,K,W,J,X,Y,Z,L,c,S,k,ee,ae,te,ne;return[((t==null?void 0:t.suppl_data_type)||"price")==="price"?(n(),s("div",Re,[i("span",je,h(P(Ee)((R=e==null?void 0:e.quote)==null?void 0:R.price.amount,(j=e==null?void 0:e.quote)==null?void 0:j.price.currency)),1),i("span",{class:f(["text-xs uppercase text-right",((z=e==null?void 0:e.quote)==null?void 0:z.trendDirection)==="POSITIVE"?"text-green":"text-red"])},h((((F=e==null?void 0:e.quote)==null?void 0:F.trendDirection)==="POSITIVE"?"â†‘":"â†“")+((K=(Q=e==null?void 0:e.quote)==null?void 0:Q.changePercent)==null?void 0:K.displayAmount)),3)])):((t==null?void 0:t.suppl_data_type)||"price")==="price-and-chart"?(n(),s("div",ze,[i("span",Fe,[(W=e==null?void 0:e.intradayPrices)!=null&&W.nodes?(n(),$(T,{key:0,bottom:"0%","line-data":[{data:(X=(J=e==null?void 0:e.intradayPrices)==null?void 0:J.nodes)==null?void 0:X.map(E=>{var le,se;return(le=E==null?void 0:E.average)!=null&&le.amount?(se=E==null?void 0:E.average)==null?void 0:se.amount:0}),lineColor:(Z=b[(Y=e==null?void 0:e.quote)==null?void 0:Y.trendDirection])==null?void 0:Z.lineColor}],"show-y-axis":!1,"split-line":!1,"has-tooltip":!1,class:"pointer-events-none"},null,8,["line-data"])):A("",!0)]),i("div",Qe,[i("span",Ke,h((L=e==null?void 0:e.quote)==null?void 0:L.price.displayAmount),1),i("span",{class:f(["text-xs uppercase text-right",((c=e==null?void 0:e.quote)==null?void 0:c.trendDirection)==="POSITIVE"?"text-green":"text-red"])},h((((S=e==null?void 0:e.quote)==null?void 0:S.trendDirection)==="POSITIVE"?"â†‘":"â†“")+((ee=(k=e==null?void 0:e.quote)==null?void 0:k.changePercent)==null?void 0:ee.displayAmount)),3)])])):((t==null?void 0:t.suppl_data_type)||"price")==="alignment-chart"?(n(),s("div",We,[U(a,{class:"w-[75px] h-[75px]","take-size-from-parent":!0,item:{data:{alignment:de(e),percent:(ne=(te=(ae=e==null?void 0:e.security)==null?void 0:ae.dimensionSummary)==null?void 0:te.scorePercent)==null?void 0:ne.mathAmount}}},null,8,["item"])])):A("",!0)]}),_:2},1032,["title","subtitle","img-url","link","class"]))])}),128))])):A("",!0)],2)}),128))],2))])])}}});export{aa as _,ta as a,Me as b};