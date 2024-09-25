import{aW as A,aO as I,aR as l,ax as L}from"./entry.8bd29e6a.js";const m=A(),D=I({id:"watchlist-store",state:()=>({watchlistModalState:{show:!1,type:""},watchlistData:[],confirmDeleteWatchlist:{open:!1,id:""},watchlists:[],watchlist:null,createdWatchlist:{},createdWatchedStock:{},deletedWatchlist:{},deletedWatchedStock:{},watchlistCompetitors:{}}),getters:{getIsOpenCreateWatchlist:t=>t.watchlistModalState,getWatchlistData:t=>t.watchlistData,getConfirmDeleteWatchlist:t=>t.confirmDeleteWatchlist,getWatchlists:t=>t.watchlists,getWatchlist:t=>t.watchlist,getCreatedWatchlist:t=>t.createdWatchlist,getCreatedWatchedStock:t=>t.createdWatchedStock,getDeletedWatchlist:t=>t.deletedWatchlist,getDeletedWatchedStock:t=>t.deletedWatchedStock,getWatchlistCompetitors:t=>t.watchlistCompetitors},actions:{setIsOpenCreateWatchlist(t,e,a={}){this.watchlistModalState={show:t,type:e,watchlist:a}},setWatchlistData(t){this.watchlistData=t},openConfirmDeleteWatchlist(t,e){this.confirmDeleteWatchlist={open:t,id:e}},async fetchUser(){const{data:t}=await l.post("/graphql",{query:`query GET_CURRENT_USER {
    me {
        id
        name
    }
}`});if(t.data)return t.data.me},async fetchWatchlists(t="",e=[]){try{const a=t?`after: "${t}"`:"",{data:r}=await l.post("/graphql",{query:`query GET_WATCHLISTS {
        watchlists(first: 5 ${a}) {
            pageInfo {
                endCursor
                hasNextPage
            }
            nodes {
                id
                name
                stocksCount
                color
                stocksAggregate {
                    analystRatings { buysCount holdsCount sellsCount }
                    dimensionalAlignments (frequency: ANNUAL) { 
                        type
                        name
                        scorePercent { mathAmount (multiply: true) } 
                    }
                    movers {
                        name
                        symbol
                        lightLogo: logoUrl( shape: SQUARE, theme: LIGHT )
                        darkLogo: logoUrl( shape: SQUARE, theme: DARK )
                        securityType
                        quote {
                            changePercent {
                                displayAmount( suffix: "%",  trendPrefix: true)
                                trendDirection
                            }
                        }
                    }
                }
                calendarEvents {
                    nodes {
                        date
                        event {
                            __typename
                        }
                    }
                }
            }
        }
    }`});if(r.data){const s=await Promise.all(r.data.watchlists.nodes.map(async c=>{var g,o,u,w,C,y,f,T,W,S;let d=[],n="";if(c.stocksCount>0)for(let E=0;E<Math.ceil(c.stocksCount/50);E++){const p=await l.post("/graphql",{query:`query GET_WATCHLIST {
                            watchlist(id: "${c.id}") {
                                stocks(first: 50 ${n?`after: "${n}"`:""}) {
                                    pageInfo {
                                        endCursor
                                        hasNextPage
                                    }
                                    nodes {
                                        id
                                    }
                                }
                            }
                        }`});d=[...d,...(C=(w=(u=(o=(g=p==null?void 0:p.data)==null?void 0:g.data)==null?void 0:o.watchlist)==null?void 0:u.stocks)==null?void 0:w.nodes)==null?void 0:C.map(R=>R.id)],n=(S=(W=(T=(f=(y=p==null?void 0:p.data)==null?void 0:y.data)==null?void 0:f.watchlist)==null?void 0:T.stocks)==null?void 0:W.pageInfo)==null?void 0:S.endCursor}return c.stocks=d,c}));if(e=[...e,...s],r.data.watchlists.pageInfo.hasNextPage)return this.fetchWatchlists(r.data.watchlists.pageInfo.endCursor,e);const i=[],h=[];return e==null||e.forEach(c=>{var d;((d=c==null?void 0:c.stocks)==null?void 0:d.length)>0?i.push(c):h.push(c)}),e=[...i,...h],this.watchlists=e,e}}catch(a){console.log("WATCHLISTS ERROR",a),m.error("Can not load watchlists")}},async fetchWatchlist(t,e="",a=[]){var r,s,i,h;try{const c=e?`after: "${e}"`:"",d=L().startOf("day").toISOString(),{data:n}=await l.post("/graphql",{query:`query GET_WATCHLIST {
        watchlist(id: "${t}") {
            id
            name
            stocks(first: 50 ${c}) {
                pageInfo {
                    endCursor
                    hasNextPage
                }
                nodes {
                    id
                    name
                    symbol
                    exchange {
                        name
                    }
                    quote {
                        price {
                            amount
                            currency
                        }
                        changePercent {
                            mathAmount
                        }
                        trendDirection
                    }
                    securityType
                    lightLogo: logoUrl( shape: SQUARE, theme: LIGHT )
                    darkLogo: logoUrl( shape: SQUARE, theme: DARK )
                    dividends( startDate: "${d}" ) {
                        nodes {
                            dividend {amount, currency}
                            exDate
                            yieldPercent {
                                displayAmount(suffix: "%")
                            }
                        }
                    }
                }
            }
        }
    }`});if(n!=null&&n.data){if(a=[...a,...((i=(s=(r=n==null?void 0:n.data)==null?void 0:r.watchlist)==null?void 0:s.stocks)==null?void 0:i.nodes)||[]],n.data.watchlist.stocks.pageInfo.hasNextPage)return this.fetchWatchlist(t,n.data.watchlist.stocks.pageInfo.endCursor,a);const g={id:n.data.watchlist.id,name:n.data.watchlist.name,stocks:a||[]};return this.newsData={},(h=a==null?void 0:a.filter(o=>o==null?void 0:o.symbol))==null||h.map(o=>{var u;this.newsData[(u=o==null?void 0:o.symbol)==null?void 0:u.replace(/\./g,"d")]={symbol:o==null?void 0:o.symbol,name:o==null?void 0:o.name,darkLogo:o==null?void 0:o.darkLogo,lightLogo:o==null?void 0:o.lightLogo,exchange:o==null?void 0:o.exchange}}),this.newsList=[],this.watchlistCompetitors={},this.watchlist=g,g}}catch(c){console.log("WATCHLIST ERROR",c),m.error("Can not load watchlist")}},async fetchWatchListsNews(t,e){try{const a=`{
    id
    name
    stocks {
        nodes {
            id
            name
            symbol
            news (first:${e}) {
                nodes {
                    id
                    title
                    timestamp
                    source
                    sourceUrl
                    imageUrl
                    sentiment {trend}
                    stocks (first:8) {nodes {symbol}}
                }
            }
        }
    }
}`;let r="";t.map(i=>r+=`watchlist_${i.name.replace(" ","")}: watchlist( id:"${i.id}") ${a}`);const{data:s}=await l.post("/graphql",{query:`query WATCHLIST_ITEMS_NEWS { ${r} }`});if(s.data)return Object.values(s.data).map(i=>i.stocks.nodes.map(h=>h.news.nodes).flat(1)).flat(1).sort((i,h)=>i.timestamp>h.timestamp?-1:i.timestamp<h.timestamp?1:0).slice(0,e)}catch(a){console.log("WATCHLISTS ERROR",a)}},async fetchCurrentWatchlistNews(t=""){try{const e=t?`after: "${t}"`:"",{data:a}=await l.post("/graphql",{query:`query GET_NEWS_FROM_ONE_WATCHLIST {
        watchlist(id: "${this.watchlist.id}") {
            stocks(first: 25 ${e}) {
                pageInfo {
                    endCursor
                    hasNextPage
                }
                nodes {
                    lightLogo: logoUrl( shape: SQUARE, theme: LIGHT )
                    darkLogo: logoUrl( shape: SQUARE, theme: DARK )
                    
                }
            }
        }
    }`});if(a.data)return a.data}catch(e){console.log("CURRENT WATCHLIST NEWS ERROR",e),m.error("Can not load current watchlist news")}},async createWatchlist(t,e){var a,r;try{const{data:s}=await l.post("/graphql",{query:`mutation CREATE_WATCHLIST {
        createWatchlist(input: {
            name: "${t}",
            color: "${e}"
        }) {
            watchlist {
                id
                name
                color
            }
            error {
                message
            }
        }
    }`});if(s!=null&&s.errors&&m.error((r=(a=s==null?void 0:s.errors)==null?void 0:a[0])==null?void 0:r.message),s.data)return this.createdWatchlist=s.data,s.data}catch(s){console.log("CREATE WATCHLIST ERROR",s),m.error("Can not create watchlist")}},async createWatchedStock(t,e,a){var r,s;try{const{data:i}=await l.post("/graphql",{query:`mutation CREATE_WATCHED_STOCK {
        createWatchedStock(input: {
            watchlistId: "${t}"
            stockId: "${e}"
        }) {
            error {
                message
            }
            stock {
                id
                name
            }
            watchlist {
                id
                name
                color
            }
        }
    }`});if(i.data)return(r=i.data.createWatchedStock)!=null&&r.error&&m.error((s=i.data.createWatchedStock)==null?void 0:s.error.message),this.createdWatchedStock=i.data,i.data}catch(i){console.log("CREATE WATCHED STOCK ERROR",i),m.error("Can not create watched stock")}},async deleteWatchlist(t){try{const{data:e}=await l.post("/graphql",{query:`mutation DELETE_WATCHLIST {
        deleteWatchlist(input: {
            id: "${t}"
        }) {
            error {
                message
            }
            watchlist {
                id
                name
                color
            }
        }
    }`});if(e.data)return this.deletedWatchlist=e.data,e.data}catch(e){console.log("DELETE WATCHLIST ERROR",e),m.error("Can not delete watchlist")}},async deleteWatchedStock(t,e){try{const{data:a}=await l.post("/graphql",{query:`mutation DELETE_WATCHED_STOCK {
        deleteWatchedStock(input: {
            watchlistId: "${t}"
            stockId: "${e}"
        }) {
            error {
                message
            }
            watchlist {
                id
                name
            }
            stock {
                id
                name
            }
        }
    }`});if(a.data)return this.deletedWatchedStock=a,a}catch(a){console.log("DELETE WATCHED STOCK ERROR",a),m.error("Can not delete watched stock")}},async updateWatchlist(t,e,a){try{const{data:r}=await l.post("/graphql",{query:`mutation UPDATE_WATCHLIST {
        updateWatchlist(input: {
            id: "${t}",
            name: "${e}",
            color: "${a}"
        }) {
            error {
                message
            }
            watchlist {
                id
                name
                color
            }
        }
    }`});if(r.data)return r.data}catch(r){console.log("UPDATE WATCHLIST ERROR",r),m.error("Can not update watchlist")}},async syncWatchlists(){var t,e;await this.fetchWatchlists(),(t=this.watchlists[0])!=null&&t.id?await this.fetchWatchlist((e=this.watchlists[0])==null?void 0:e.id):this.watchlist=null},async fetchWatchlistCompetitors(t=""){var e,a,r,s,i,h,c,d;try{const n=t?`after: "${t}"`:"",{data:g}=await l.post("/graphql",{query:`query GET_WATCHLIST_COMPETITORS {
        watchlist(id: "${this.watchlist.id}") {
            stocks(first: 25 ${n}) {
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
    }`});if(g.data)return t?this.watchlistCompetitors={...this.watchlistCompetitors,nodes:[...this.watchlistCompetitors.nodes,...(r=(a=(e=g.data)==null?void 0:e.watchlist)==null?void 0:a.stocks)==null?void 0:r.nodes],pageInfo:(h=(i=(s=g.data)==null?void 0:s.watchlist)==null?void 0:i.stocks)==null?void 0:h.pageInfo}:this.watchlistCompetitors=(d=(c=g.data)==null?void 0:c.watchlist)==null?void 0:d.stocks,this.watchlistCompetitors}catch(n){console.log("WATCHLIST COMPETITORS ERROR",n),m.error("Can not load watchlist competitors")}}}});export{D as u};