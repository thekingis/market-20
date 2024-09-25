import{_ as re}from"./SmallSpinnerLoader.vue.0773deb7.js";import{_ as ne}from"./ThreeCircleDropBtn.vue.c33fc0c3.js";import le from"./Icon.56e74129.js";import{_ as ie}from"./nuxt-icon.vue.2d6fd5e1.js";/* empty css                      */import{_ as ce}from"./nuxt-link.a6eea277.js";import{_ as de}from"./RatingAverageBar.vue.212facb9.js";import{_ as ue}from"./CompanyDescriptionModal.94b76f30.js";import{_ as me}from"./SearchHeaderInput.vue.2d9be000.js";import{d as pe,m as ge,y as fe,p as ye,z as ve,ax as X,r as y,a as w,a_ as v,aC as b,aB as xe,bY as V,aQ as J,q as Se,o as p,c as f,k as D,h as x,b as o,f as Z,t as h,F as tt,e as R,aT as he,i as j,g as et,w as Qt,j as _e}from"./entry.8bd29e6a.js";import{u as ke,j as be,t as at,F as ot,o as De,W as Te,X as Vt,Y as Ce,f as we,h as Ue,U as jt}from"./utils.11774da7.js";import{u as Ae}from"./useProfileStore.6577a669.js";const Ie={key:0,class:"flex justify-center items-center absolute top-0 left-0 h-full w-full z-50"},Le={class:"absolute right-[18px] top-[25px] z-10"},Be={key:1,class:"flex gap-1.5 text-sm text-secondary-text max-w-[80%]"},Oe=o("span",null,"Competitors:",-1),Pe=["src","alt"],Re={key:1,class:"absolute md:relative min-w-[40px] h-[40px] md:min-w-[50px] md:h-[50px] xl:min-w-[60px] xl:h-[60px]"},Me={class:"flex flex-col flex-grow items-start justify-start max-w-[100%]"},Ee={class:"text-2xl my-0 xl:text-3xl font-bold pl-[53px] md:pl-0"},Fe={class:"text-[16px] xl:text-lg text-secondary-text font-bold pl-[53px] md:pl-0"},qe={class:"text-xs leading-4 flex flex-col xl:flex-row flex-wrap gap-1.5 mt-5 xl:mt-0.5 mb-4"},We={class:"mr-5"},$e=o("span",{class:"text-secondary-text mr-[3px]"},"Sector:",-1),Ne=o("span",{class:"text-secondary-text mr-[3px]"},"Industry:",-1),Qe={class:"py-2 border border-grey-bg-footer rounded-[4px] mb-4 lg:mb-0 w-full lg:w-fit mt-auto"},Ve={class:"flex justify-between lg:justify-start"},je={class:"metrics-value-cell border-r border-solid border-grey-bg-footer"},ze=o("div",{class:"text-[10px] lg:text-xs leading-4 text-secondary-text"},"P/E",-1),Ge={class:"metrics-value"},Ye={class:"metrics-value-cell border-r border-solid border-grey-bg-footer"},He=o("div",{class:"text-[10px] lg:text-xs leading-4 text-secondary-text"},"Market Cap",-1),Ke={class:"metrics-value"},Xe={class:"metrics-value-cell"},Je=o("div",{class:"text-[10px] lg:text-xs leading-4 text-secondary-text"},"Sales Growth (1y)",-1),Ze={class:"metrics-value"},ta={key:2,class:"rating-bars-wrapper max-w-[100%] w-full"},ea={class:"overflow-auto max-w-[100%] w-full"},aa={key:0,class:"flex justify-center items-center absolute pt-[20px] top-0 left-0 h-full w-full"},oa=o("div",{class:"w-[25%] text-secondary-text text-[10px] mb-2"},"Investment Styles",-1),sa=o("div",{class:"w-[37%] text-secondary-text text-[10px] mb-2 hidden md:block"},"QoQ",-1),ra=o("div",{class:"w-[37%] text-secondary-text text-[10px] mb-2 pl-2 hidden md:block"},"YoY",-1),na={class:"flex flex-wrap w-full mb-[40px] md:mb-0"},la={class:"w-full md:w-[25%] text-xs lg:pr-1 rating-bar-caption md:mb-2 pt-[1px]"},ia={class:"w-full grid grid-cols-1 md:grid-cols-2 md:w-[75%] md:gap-3"},ca={class:"col-span-1"},da=o("span",{class:"md:hidden text-secondary-text text-[11px]"},"QoQ",-1),ua={class:"col-span-1"},ma=o("span",{class:"md:hidden text-secondary-text text-[11px]"},"YoY",-1),Ta=pe({__name:"CompanyCompareCard",props:{toWriteStockDataTo:{default:""},cardIndex:{default:0},layout:{default:"default"},takeStockFromProps:{type:Boolean,default:!1},stockSymbolFromProps:{default:""},noPadding:{type:Boolean,default:!1},updateUrlParams:{type:Boolean,default:!0},showForNonLoggedUsers:{type:Boolean,default:!1}},setup(zt){const s=zt,z=ge(),l=ke(),I=be(),st=fe(),c=Ae(),d=ye(),Gt=ve(),rt=X().subtract(5,"day").toISOString(),M=X().subtract(1,"year").toISOString(),Yt=X().startOf("year").subtract(2,"year").toISOString(),Ht=`{
    id,
    name,
    symbol,
    securityType,
    sector {name}
    industry {name}
        exchange { name }
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
    analystRatingSummary {
        rating
        ratingPercent {
            displayAmount
            mathAmount
        }
        fairValue {
            amount
            currency
        }
    }
    analystRatingSummaries (startDate: "${M}", first: 1) {
        nodes {
            ratingPercent {
                displayAmount
            }
            rating
        }
    }
    security {
        ... on Company {
            city
            employeeCount
            incomeStatements (startDate: "${M}", frequency:ANNUAL){
                nodes {
                    eps
                    totalRevenue
                }
            }
            keyRatios(startDate: "${M}", frequency: ANNUAL) {
                nodes {
                    profitMargin
                }
            }
            annualIncome: incomeStatements(startDate: "${Yt}", frequency: ANNUAL) {
                nodes {
                    totalRevenue
                }
            }
            quarterIncome: incomeStatements(startDate: "${M}", frequency: QUARTERLY) {
                nodes {
                    eps
                    sharesOutstanding
                }
            }
        }
    }
    closingPrices(first: 1, startDate: "${rt}") {
        nodes {
            date
            close {
                amount
                currency
            }
        }
    }
    intradayPrices(startDate: "${rt}", last: 7, frequency: ONE_HOUR) {
        nodes {
        average {
            amount
            }
        }
    }
    lightLogo: logoUrl( shape: SQUARE, theme: LIGHT )
    darkLogo: logoUrl( shape: SQUARE, theme: DARK )

    news(first:3) {
        nodes {
            id
            source
            sourceUrl
            title
            summary
            timestamp
            sentiment {
                condition
                numeric
                trend
            }
        }
    }
}`,E=y(!1),nt=y(""),lt=y(null),r=y(null),G=y(""),Kt=y([{id:"1",title:"Remove from Company Cards",icon:"img/components/three-circle-drop-btn/trash",needPremium:!1,code:"remove"}]),_=w(()=>s.layout==="default"),it=w(()=>s.layout==="compact"),ct=w(()=>st.getUserPlan),Y=y(!1);let Xt={BEARISH:{value:0,color:"#F253451E",borderColor:"#FF342A"},AVERAGE:{value:0,color:"#ebebf1",borderColor:"#52528666"},BULLISH:{value:0,color:"#dcffd9",borderColor:"#28A946"}};const dt=y([]),Jt=w(()=>{var a;const t={};return(a=c.getUserBoards)==null||a.forEach(e=>{t[at(e==null?void 0:e.name)]={fullTitle:e==null?void 0:e.name,shortTitle:e==null?void 0:e.name}}),t}),H=w(()=>{var a;const t={};return(a=c.getUserBoards)==null||a.forEach(e=>{var n;t[at(e==null?void 0:e.name)]=(n=e==null?void 0:e.metrics)==null?void 0:n.map(i=>{var u;return(u=ot[i])==null?void 0:u.apiKey})}),t}),F=y({}),ut=y({}),q=y(!1),L=y(!1),mt=w(()=>c.getUserBoardsType===v.CUSTOM&&c.getAreUserBoardsLoading),pt=t=>{if(s.updateUrlParams){const a=s.toWriteStockDataTo==="leftStock"?V.COMPARED_LEFT:V.COMPARED_RIGHT,e={...d.query};e[a]=t?typeof t=="string"?t:t==null?void 0:t.symbol:"",Gt.push({path:d.path,query:e})}},Zt=()=>{_.value&&(JSON.parse(localStorage.getItem("is-user-auth")||"false")?ct.value===1||ct.value===2?E.value=!0:(I.setGatedModalState(!0),I.setTargetData(!0)):(I.setSignInLoginFormTitleTextLines(["Sign in to Access","Investor Boards"]),I.setGatedModalState(!0)))},W=t=>{pt(t),te(t),E.value=!1},te=async t=>{var n,i,u;const a=typeof t=="string"?t:t==null?void 0:t.symbol,e=(i=(n=l.getComparedStocksData[s.toWriteStockDataTo])==null?void 0:n.stockData)==null?void 0:i.symbol;!L.value&&Ue(a)&&a!==e&&(L.value=!0,l.fetchStockInvestorBoardData(typeof t=="string"?t==null?void 0:t.toUpperCase():(u=t==null?void 0:t.symbol)==null?void 0:u.toUpperCase(),l.getStockInvestorBoardsCurrentPeriod,s.toWriteStockDataTo,c.getUserBoardsType===v.CUSTOM?c.getUserBoardsFetchArgs||"":c.getUserBoardsType===v.MATRIX?"matrixArgs":"").then(()=>{L.value=!1,K()}))},K=()=>{var a;const t=(a=l.getComparedStocksData[s.toWriteStockDataTo].stockData)==null?void 0:a.symbol;t&&(q.value=!0,l.fetchStockInvestorBoardData(t,"3y",s.toWriteStockDataTo,c.getUserBoardsType===v.CUSTOM&&c.getUserAllBoardsFetchArgs||"","SYMBOL",!0).then(e=>{var n;gt((n=e==null?void 0:e.data)==null?void 0:n.stockRelatedData,!1)}),l.fetchStockInvestorBoardData(t,"5y",s.toWriteStockDataTo,c.getUserBoardsType===v.CUSTOM&&c.getUserAllBoardsFetchArgs||"","SYMBOL",!0).then(e=>{var n;gt((n=e==null?void 0:e.data)==null?void 0:n.stockRelatedData,!0),q.value=!1}))},gt=(t,a)=>{var n;const e={};for(const i in F.value)e[i]||(e[i]=structuredClone(Xt)),(n=F.value[i])==null||n.forEach(u=>{var k;const g=(k=jt[u])==null?void 0:k.metricsData(t,c.getUserBoardsType===v.CUSTOM);e[i].hasOwnProperty(g==null?void 0:g.rating)&&(e[i][g==null?void 0:g.rating].value+=1)});l.comparedStocksData[s.toWriteStockDataTo].ratingsBarsData[a?"annual":"quarterly"]=e},ee=()=>{s.toWriteStockDataTo!==""&&l.comparedStocksData.hasOwnProperty(s.toWriteStockDataTo)&&(l.comparedStocksData[s.toWriteStockDataTo].stockData={},l.comparedStocksData[s.toWriteStockDataTo].metricsData={},pt(),ae())},ae=()=>{l.getComparedStocksData[s.toWriteStockDataTo].ratingsBarsData.annual={},l.getComparedStocksData[s.toWriteStockDataTo].ratingsBarsData.quarterly={}},ft=()=>{var t,a;s.toWriteStockDataTo!==""&&l.comparedStocksData.hasOwnProperty(s.toWriteStockDataTo)&&(r.value=l.comparedStocksData[s.toWriteStockDataTo].stockData,G.value=(a=(t=r.value)==null?void 0:t.competitors)!=null&&a.nodes?r.value.competitors.nodes.map(e=>e==null?void 0:e.symbol).join(", "):"")},oe=t=>String(t).normalize("NFKD").replace(/[\u0300-\u036f]/g,"").trim().toLowerCase().replace(/[^a-z0-9& -]/g,"").replace("&","and").replace(/\s+/g,"-").replace(/-+/g,"-");De(lt,t=>E.value=!1);const se=w(()=>z.getOpenSearch);b(()=>s.stockSymbolFromProps,t=>{s.takeStockFromProps&&W(t)},{immediate:!0}),b(()=>l.comparedStocksData[s.toWriteStockDataTo].stockData,t=>{ft()}),xe(()=>{var a,e;const t=(e=(a=s.toWriteStockDataTo==="leftStock"?d==null?void 0:d.query[V.COMPARED_LEFT]:d==null?void 0:d.query[V.COMPARED_RIGHT])==null?void 0:a.toString())==null?void 0:e.toUpperCase();W(t||""),ft(),J(()=>$())}),Se(()=>{I.setSignInLoginFormTitleTextLines(Te)});const $=()=>{var a,e,n,i;F.value=c.getUserBoardsType===v.CUSTOM?H.value:structuredClone(Vt),ut.value=c.getUserBoardsType===v.CUSTOM?Jt.value:structuredClone(Ce);const t=[];for(const u in F.value)t.push({tab:u,annual:Object.values(((e=(a=l.getComparedStocksData[s.toWriteStockDataTo].ratingsBarsData)==null?void 0:a.annual)==null?void 0:e[u])||{}),quarterly:Object.values(((i=(n=l.getComparedStocksData[s.toWriteStockDataTo].ratingsBarsData)==null?void 0:n.quarterly)==null?void 0:i[u])||{})});dt.value=t},yt=(t,a)=>{var k,N,Q,B;const e={},n={};let i={},u="";c.getUserBoardsType===v.TEMPLATES?i=structuredClone(Vt):(k=d.query)!=null&&k.tab&&H.value.hasOwnProperty(d.query.tab)?u=d.query.tab.toString():u=at((Q=(N=c.getUserBoards)==null?void 0:N.at(0))==null?void 0:Q.name),i[u]=H.value[u];for(const T in i)(B=i[T])==null||B.forEach(U=>{var O,P;const C=ot.hasOwnProperty(U)?(O=ot[U])==null?void 0:O.apiKey:U,S=(P=jt[C])==null?void 0:P.metricsData(t,c.getUserBoardsType===v.CUSTOM);e.hasOwnProperty(T)||(e[T]={}),e[T][C]=S==null?void 0:S.rating,n[C]={...S},l.updateMetricsEdgeValues(S==null?void 0:S.barDataItems,C)});const g=a?"leftStock":"rightStock";l.comparedStocksData[g].metricsRatings={...l.comparedStocksData[g].metricsRatings||{},...e},l.comparedStocksData[g].metricsData=n};return b(()=>l.getComparedStocksData.leftStock.stockData,t=>{yt(t,!0)}),b(()=>l.getComparedStocksData.rightStock.stockData,t=>{yt(t,!1)}),b(()=>{var t,a;return[(t=d==null?void 0:d.query)==null?void 0:t.comparedLeft,(a=d==null?void 0:d.query)==null?void 0:a.comparedRight]},([t,a])=>{var n,i;const e=(i=(n=s.toWriteStockDataTo==="leftStock"?t:a)==null?void 0:n.toString())==null?void 0:i.toUpperCase();W(e||"")}),b(()=>{var t;return(t=l.getComparedStocksData[s.toWriteStockDataTo])==null?void 0:t.ratingsBarsData},t=>{$()},{deep:!0}),b(()=>c.getUserBoardsType,t=>{d.query.tag,$(),t===v.TEMPLATES&&J(()=>K())}),b(()=>c.getUserBoards,()=>{$(),J(()=>K())},{immediate:!1}),(t,a)=>{var B,T,U,C,S,O,P,vt,xt,St,ht,_t,kt,bt,Dt,Tt,Ct,wt,Ut,At,It,Lt,Bt,Ot,Pt,Rt,Mt,Et,Ft,qt,Wt,$t;const e=re,n=ne,i=le,u=ie,g=ce,k=de,N=ue,Q=me;return p(),f("div",{class:j(["min-h-[115px] relative border border-mischka shadow rounded-lg p-3.5 md:p-4 xl:p-8 flex flex-col w-full",{"opacity-40":L.value,"!border-0 shadow-none":it.value,"!p-0":s.noPadding}])},[L.value?(p(),f("div",Ie,[D(e)])):x("",!0),o("div",Le,[(B=r.value)!=null&&B.name&&_.value?(p(),Z(n,{key:0,items:Kt.value,"three-dots-icon-url":"/img/components/card/card-drop-btn-larger.svg",onSelectOption:ee},null,8,["items","three-dots-icon-url"])):x("",!0)]),G.value&&_.value?(p(),f("div",Be,[Oe,o("span",null,h(G.value),1)])):x("",!0),o("div",{class:j(["flex gap-3.5 xl:gap-4 h-full",{"mt-5":((T=r.value)==null?void 0:T.name)&&_.value}])},[_.value?(p(),f(tt,{key:0},[(U=r.value)!=null&&U.lightLogo||(C=r.value)!=null&&C.darkLogo?(p(),f("img",{key:0,class:"absolute md:relative w-[40px] h-[40px] md:w-[50px] md:h-[50px] xl:w-[60px] xl:h-[60px] rounded-md",src:R(z).getTheme===R(he).LIGHT?(S=r.value)==null?void 0:S.lightLogo:(O=r.value)==null?void 0:O.darkLogo,alt:(P=r.value)==null?void 0:P.symbol},null,8,Pe)):(p(),f("div",Re))],64)):x("",!0),o("div",Me,[_.value&&!((vt=r.value)!=null&&vt.name)?(p(),f("button",{key:0,onClick:Zt,class:"min-w-[130px] inline-flex items-center gap-1 text-time-grey border-2 border-dashed border-[#DBDDE4] p-2 rounded-lg cursor-pointer"},[_.value?(p(),Z(i,{key:0,class:"text-2xl",name:"ic:outline-plus"})):x("",!0),o("span",null,h(_.value?"Add ":"")+"Stock to Compare",1)])):x("",!0),_.value?(p(),f(tt,{key:1},[o("h2",Ee,h((xt=r.value)==null?void 0:xt.name),1),o("p",Fe,h((St=r.value)==null?void 0:St.symbol),1)],64)):x("",!0),o("button",{class:j(["mt-auto pt-7 mb-1 text-xs leading-4 text-footer-nav font-medium flex items-center",{"pt-0":it.value}]),onClick:a[0]||(a[0]=()=>{var m;(m=r.value)!=null&&m.name&&(Y.value=!0)})},[et(" Company Description "),D(u,{class:"text-black pl-2 w-[18px]",name:"img/icons/arrow-up-right-colored"})],2),o("div",qe,[o("div",We,[$e,D(g,{class:"text-footer-nav underline font-medium",to:`/markets/sectors/${(kt=(_t=(ht=r.value)==null?void 0:ht.sector)==null?void 0:_t.name)==null?void 0:kt.toLowerCase().replace(/\s/g,"-")}`},{default:Qt(()=>{var m,A;return[et(h(((A=(m=r.value)==null?void 0:m.sector)==null?void 0:A.name)||"N/A"),1)]}),_:1},8,["to"])]),o("div",null,[Ne,D(g,{class:"text-footer-nav underline font-medium",to:`/markets/industries/${oe((Dt=(bt=r.value)==null?void 0:bt.industry)==null?void 0:Dt.name)}`},{default:Qt(()=>{var m,A;return[et(h(((A=(m=r.value)==null?void 0:m.industry)==null?void 0:A.name)||"N/A"),1)]}),_:1},8,["to"])])]),o("div",Qe,[o("div",Ve,[o("div",je,[ze,o("div",Ge,h(((wt=(Ct=(Tt=r.value)==null?void 0:Tt.security)==null?void 0:Ct.statistics)==null?void 0:wt.pte)||"-"),1)]),o("div",Ye,[He,o("div",Ke,h((It=(At=(Ut=r.value)==null?void 0:Ut.security)==null?void 0:At.statistics)!=null&&It.marketCap?R(we)((Ot=(Bt=(Lt=r.value)==null?void 0:Lt.security)==null?void 0:Bt.statistics)==null?void 0:Ot.marketCap,(Mt=(Rt=(Pt=r.value)==null?void 0:Pt.quote)==null?void 0:Rt.price)==null?void 0:Mt.currency):"-"),1)]),o("div",Xe,[Je,o("div",Ze,h(((Wt=(qt=(Ft=(Et=r.value)==null?void 0:Et.security)==null?void 0:Ft.statistics)==null?void 0:qt.salesGrowth)==null?void 0:Wt.displayAmount)||"-"),1)])])]),R(st).getIsLoggedIn||s.showForNonLoggedUsers?(p(),f("div",ta,[o("div",ea,[o("div",{class:j(["flex flex-wrap pt-5 lg:pt-7 w-full relative duration-100 min-h-[100px]",{"opacity-40":q.value||mt.value}])},[q.value||mt.value?(p(),f("div",aa,[D(e)])):x("",!0),oa,sa,ra,(p(!0),f(tt,null,_e(dt.value,(m,A)=>{var Nt;return p(),f("div",na,[o("div",la,h((Nt=ut.value[m==null?void 0:m.tab])==null?void 0:Nt.shortTitle),1),o("div",ia,[o("div",ca,[da,D(k,{class:"!px-0",options:{items:m.quarterly},"hide-items-with-zero-value":!0,"hide-numbers":!0,"is-compact-layout":!0,"show-hollow-bar-if-no-items":!0},null,8,["options"])]),o("div",ua,[ma,D(k,{class:"!px-0",options:{items:m.annual},"hide-items-with-zero-value":!0,"hide-numbers":!0,"is-compact-layout":!0,"show-hollow-bar-if-no-items":!0},null,8,["options"])])])])}),256))],2)])])):x("",!0)])],2),($t=r.value)!=null&&$t.name?(p(),Z(N,{key:2,"take-data-from-props":!0,"stock-data":r.value,"is-open-description":Y.value,onCloseDescription:a[1]||(a[1]=m=>Y.value=!1)},null,8,["stock-data","is-open-description"])):x("",!0),E.value?(p(),f("div",{key:3,ref_key:"searchModal",ref:lt,class:"bg-white absolute h-[400px] w-full top-[90px] z-[200] rounded-xl"},[D(Q,{searchQuery:Ht,"is-open":se.value,modelValue:nt.value,"onUpdate:modelValue":a[2]||(a[2]=m=>nt.value=m),onOnFocusout:a[3]||(a[3]=m=>R(z).setOpenSearch(!1)),class:"!relative !w-full top-0",onSelectValue:W,"result-list-z-index":200},null,8,["is-open","modelValue"])],512)):x("",!0)],2)}}});export{Ta as _};