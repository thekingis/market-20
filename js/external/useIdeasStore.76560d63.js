import{aW as D,aO as N,s as L,aR as y,ax as A}from"./entry.8bd29e6a.js";import{m as R}from"./utils.11774da7.js";const p=D(),q=N({id:"ideas-store",state:()=>({ideasNotion:{},ideasNotionCategories:{},ideasTheme:{},ideasThemeMeta:{},ideasThemeCategories:{},ideaStocks:[],ideasThemeApi:{},ideasThemeMetaApi:{},isError:!1,isCreateIdeaListState:!1,ideaLists:[{id:1,title:"List with 3 ideas",desc:"Some description",themes:[{id:1,type:"themes",title:"5G Networking",isStock:!1,chartData:{areaColor:"#8D57FF",dataValue:[7e3,1e4,7e3,7e3,1e4,5e3,7e3,1e4],lineColor:"#8D57FF"}},{id:2,title:"AI Leaders",isStock:!0,image:"leaders",companies:["amazon","tesla","twitter","microsoft"]},{id:3,title:"Market Cap champions",isStock:!1,chartData:{areaColor:"#21AD40",dataValue:[7e3,1e4,7e3,7e3,1e4,5e3,7e3,1e4],lineColor:"#21AD40"}},{id:4,title:"5G Networking",isStock:!1,chartData:{areaColor:"#8D57FF",dataValue:[7e3,1e4,7e3,7e3,1e4,5e3,7e3,1e4],lineColor:"#8D57FF"}},{id:5,title:"AI Leaders",isStock:!0,image:"leaders",companies:["amazon","tesla","twitter","microsoft"]},{id:6,title:"Market Cap champions",isStock:!1,chartData:{areaColor:"#21AD40",dataValue:[7e3,1e4,7e3,7e3,1e4,5e3,7e3,1e4],lineColor:"#21AD40"}}],insights:[],notions:[],stocks:[]},{id:2,title:"List with 1 idea",desc:"",themes:[{id:1,title:"5G Networking",isStock:!1,chartData:{areaColor:"#8D57FF",dataValue:[7e3,1e4,7e3,7e3,1e4,5e3,7e3,1e4],lineColor:"#8D57FF"}},{id:55,title:"52G Networking",isStock:!1,chartData:{areaColor:"#8D57FF",dataValue:[7e3,1e4,7e3,7e3,1e4,5e3,7e3,1e4],lineColor:"#8D57FF"}}],insights:[],notions:[],stocks:[]},{id:3,title:"List without ideas",desc:"",themes:[],insights:[],notions:[],stocks:[]}],currentIdeasList:{},ideaCompetitors:{},ideaPositionAnalysisStocksData:[]}),getters:{getIdeasNotion:e=>e.ideasNotion,getIdeasNotionCategories:e=>e.ideasNotionCategories,getIdeasTheme:e=>e.ideasTheme,getIdeasThemeMeta:e=>e.ideasThemeMeta,getIdeasThemeCategories:e=>e.ideasThemeCategories,getIdeaStocks:e=>e.ideaStocks,getIdeasThemeApi:e=>e.ideasThemeApi,getIdeasThemeMetaApi:e=>e.ideasThemeMetaApi,getCreateIdeaListState:e=>e.isCreateIdeaListState,getIdeaLists:e=>e.ideaLists,getCurrentIdeasList:e=>e.currentIdeasList,getIdeaCompetitors:e=>e.ideaCompetitors,getIdeaNewsData:e=>e.ideaNewsData,getIdeaNewsList:e=>e.ideaNewsList,getIdeaPositionAnalysisStocksData:e=>e.ideaPositionAnalysisStocksData},actions:{async fetchIdeasNotions(e=1,s=24){try{const{data:a}=await L.get(`/notions/?sort=rank:asc&populate=image,tags,categories&pagination[page]=${e}&pagination[pageSize]=${s}`);return this.ideasNotion=a,a}catch(a){throw console.log("IDEAS NOTION",a),this.isError=!0,p.error("Something went wrong"),a}},async fetchNotionCategories(){try{const{data:e}=await L.get("/notion-categories/?populate=notions.image");return this.ideasNotionCategories=e.data,e.data}catch(e){throw console.log("IDEAS NOTION CATEGORIES",e),this.isError=!0,p.error("Something went wrong"),e}},async fetchNotionCategory(e){try{const{data:s}=await L.get(`/notion-categories?filters[name][$eq]=${e}&populate=notions.image`);return s.data}catch(s){throw console.log("IDEAS NOTION CATEGORY",s),this.isError=!0,p.error("Something went wrong"),s}},async fetchIdeasThemes(e,s,a,t="desc"){try{const o=`/themes?${e?"&pagination[pageSize]="+e:""}${s?`&filters[stocks][$containsi]="${s}"`:""}${a?`&filters[categories][name][$eq]=${a}`:""}${t?`&sort=publishedAt:${t}`:""}&populate=*`,{data:r}=await L.get(o);let f=[];r.data.map(d=>{var g,l;(l=(g=d.attributes)==null?void 0:g.stocks)==null||l.map(h=>{f.push(h.label)})});let T=[...new Set(f)];const C=` {
                    symbol,
                    lightLogo: logoUrl( shape: SQUARE, theme: LIGHT )
                    darkLogo: logoUrl( shape: SQUARE, theme: DARK )
                }`;let S="";T.map(d=>S+=`${d.replace(/\./g,"")}: stock( identifier: "${d}", identifierType: SYMBOL ) ${C}`);const{data:c}=await y.post("/graphql",{query:`query IDEAS_THEMES_STOCKS { ${S} }`});for(var i in c.data)c.data[i]===null&&(c.data[i]={symbol:i,lightLogo:"nologo",darkLogo:"nologo"});return r.data.map(d=>{var g,l;(l=(g=d.attributes)==null?void 0:g.stocks)==null||l.map(h=>{var m,u;h.lightLogo=(m=c.data[h.label.replace(/\./g,"")])==null?void 0:m.lightLogo,h.darkLogo=(u=c.data[h.label.replace(/\./g,"")])==null?void 0:u.darkLogo})}),this.ideasTheme=r.data,this.ideasThemeMeta=r.meta.pagination,r.data}catch(o){throw console.log("IDEAS THEME",o),this.isError=!0,p.error("Something went wrong"),o}},async fetchIdeasThemeStocks(e){},async fetchThemeCategories(){try{const{data:e}=await L.get("/theme-categories/?populate=themes.image");return this.ideasNotionCategories=e.data,e.data}catch(e){throw console.log("IDEAS THEME CATEGORIES",e),this.isError=!0,p.error("Something went wrong"),e}},setCreateIdeaListState(e){this.isCreateIdeaListState=e},setIdeaLists({title:e,desc:s,themes:a=[],insights:t=[],notions:i=[],stocks:o=[]}){this.ideaLists.push({title:e,desc:s,themes:a,insights:t,notions:i,stocks:o})},setCurrentIdeasList(e){let s=this.ideaLists.filter(a=>R([a.title])===e);this.currentIdeasList=s[0]},addItemToIdeasList(e,s){const a=this.ideaLists.find(t=>t.id===e);a.lists.includes(s)||a.lists.push(s)},getCurrentThemes(e){return this.ideaLists.find(s=>s.id===e).themes},toggleThemeToList(e,s){const a=this.ideaLists.find(t=>t.id===e);a.themes.includes(s)?this.ideaLists=this.ideaLists.map(t=>t.id===e?{...t,themes:t.themes.filter(i=>s.id!==i.id)}:t):a.themes.push(s)},getCurrentInsights(e){return this.ideaLists.find(s=>s.id===e).insights},getCurrentNotions(e){return this.ideaLists.find(s=>s.id===e).notions},toggleIdeaToList(e,s,a){switch(a){case"theme":this.ideaLists.find(t=>t.id===e).themes.includes(s)?this.ideaLists=this.ideaLists.map(t=>t.id===e?{...t,themes:t.themes.filter(i=>s.id!==i.id)}:t):this.ideaLists.find(t=>t.id===e).themes.push(s);break;case"insight":this.ideaLists.find(t=>t.id===e).insights.includes(s)?this.ideaLists=this.ideaLists.map(t=>t.id===e?{...t,insights:t.insights.filter(i=>s.id!==i.id)}:t):this.ideaLists.find(t=>t.id===e).insights.push(s);break;case"notion":this.ideaLists.find(t=>t.id===e).notions.includes(s)?this.ideaLists=this.ideaLists.map(t=>t.id===e?{...t,notions:t.notions.filter(i=>s.id!==i.id)}:t):this.ideaLists.find(t=>t.id===e).notions.push(s);break}},checkItemInList(e,s,a){switch(a){case"theme":return!!this.ideaLists.find(t=>t.id===e).themes.includes(s);case"insight":return!!this.ideaLists.find(t=>t.id===e).insights.includes(s);case"notion":return!!this.ideaLists.find(t=>t.id===e).notions.includes(s)}},async fetchThemeCompetitors(e,s=""){var a,t,i;try{const o=s?`, after: "${s}"`:"",{data:r}=await y.post("/graphql",{query:`query GET_THEME_COMPETITOR { 
                        cmsTheme( slug: "${e}" ) {
                             stocks(first: 25 ${o}) {
                                pageInfo {
                                    endCursor
                                    hasNextPage
                                }
                                nodes {
                                    securityType
                                    name
                                    symbol
                                    exchange {
                                        name
                                    }
                                    quote { price {currency} }
                                    lightLogo: logoUrl( shape: SQUARE, theme: LIGHT )
                                    darkLogo: logoUrl( shape: SQUARE, theme: DARK )
                                    competitors(first: 5) {
                                        nodes {
                                            securityType
                                            name
                                            symbol
                                            lightLogo: logoUrl( shape: SQUARE, theme: LIGHT )
                                            darkLogo: logoUrl( shape: SQUARE, theme: DARK )
                                            quote {
                                                price {amount, currency}
                                                changePercent {
                                                    trendDirection
                                                    mathAmount
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }  
                    }`});return this.ideaCompetitors=s&&((a=this.ideaCompetitors)!=null&&a.nodes.length)?{...r.data.cmsTheme.stocks,nodes:[...(t=this.ideaCompetitors)==null?void 0:t.nodes,...(i=r.data.cmsTheme.stocks)==null?void 0:i.nodes]}:r.data.cmsTheme.stocks,this.ideaCompetitors}catch(o){console.log("THEME COMPETITOR ERROR",o),p.error("Can not load theme competitor")}},async fetchPositionAnalysis(e){var s,a,t,i,o,r,f,T,C,S,c,d,g,l,h;try{let m=!0,u=[];const k=A().subtract(1,"year").toISOString(),I=A().subtract(6,"month").toISOString(),w=A().subtract(2,"year").toISOString();let E="";for(;m;){const{data:n}=await y.post("/graphql",{query:`query GET_THEME_POSITION_ANALYSIS { 
                        cmsTheme( slug: "${e}" ) {
                             stocks(first: 25 ${E}) {
                                agg { totalItems }
                                pageInfo {
                                    endCursor
                                    hasNextPage
                                }
                                nodes {
                                    id,
                                    name,
                                    symbol,
                                    securityType,
                                    analystRatingSummary {
                                        fairValue {
                                            amount
                                        }
                                    }
                                    analystRatingSummaries(startDate: "${I}", first: 2){
                                        nodes {
                                            rating
                                        }
                                    }
                                    equitysetRating {
                                        fairValue {
                                            amount
                                        }
                                        gainsPercent {
                                          mathAmount
                                      }
                                    }
                                    quote {
                                        close {
                                          amount
                                        }
                                        price {
                                          amount
                                        }
                                    }
                                    security  {
                                        ... on Company {
                                            keyRatios(startDate: "${k}", frequency: ANNUAL) {
                                                nodes {
                                                    bvps
                                                    pte
                                                    ptb
                                                }
                                            }
                                            annualIncome: incomeStatements(startDate: "${w}", frequency: ANNUAL) {
                                                nodes {
                                                    eps
                                                    totalRevenue
                                                }
                                            }
                                            quarterIncome: incomeStatements(startDate: "${k}", frequency: QUARTERLY) {
                                                nodes {
                                                    eps
                                                    totalRevenue
                                                }
                                            }
                                        }
                                    }
                                    lightLogo: logoUrl( shape: SQUARE, theme: LIGHT )
                                    darkLogo: logoUrl( shape: SQUARE, theme: DARK )
                                  }
                            }
                        }  
                    }`});m=(i=(t=(a=(s=n==null?void 0:n.data)==null?void 0:s.cmsTheme)==null?void 0:a.stocks)==null?void 0:t.pageInfo)==null?void 0:i.hasNextPage,E=((T=(f=(r=(o=n==null?void 0:n.data)==null?void 0:o.cmsTheme)==null?void 0:r.stocks)==null?void 0:f.pageInfo)==null?void 0:T.endCursor)?`, after: "${(d=(c=(S=(C=n==null?void 0:n.data)==null?void 0:C.cmsTheme)==null?void 0:S.stocks)==null?void 0:c.pageInfo)==null?void 0:d.endCursor}"`:"",u=[...u,...((h=(l=(g=n==null?void 0:n.data)==null?void 0:g.cmsTheme)==null?void 0:l.stocks)==null?void 0:h.nodes)||[]]}return this.ideaPositionAnalysisStocksData=u,u}catch(m){console.log("THEME POSITION ANALYSIS ERROR",m),p.error("Can not load theme position analysis")}}}});export{q as u};