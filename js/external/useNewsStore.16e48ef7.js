import{aW as B,aO as F,aR as M}from"./entry.8bd29e6a.js";import{u as Q}from"./useWatchlistStore.a64354a0.js";import{u as C}from"./useIdeasStore.76560d63.js";const D=B(),j=F({id:"news-store",state:()=>({breakingNews:{},stocksNews:{},stores:{watchlistStore:Q(),ideasStore:C()}}),getters:{getBreakingNews:s=>s.breakingNews,getStocksNews:s=>s.stocksNews},actions:{async fetchBreakingNews(s=""){try{const t=s?`after: "${s}"`:"",{data:o}=await M.post("/graphql",{query:`query BREAKING_NEWS {
    marketNews(first: 25 ${t}) {
        nodes {
            id
            timestamp
            title
            source
            sourceUrl
            stocks {
                nodes {
                    name
                    symbol
                    lightLogo: logoUrl( shape: SQUARE, theme: LIGHT )
                    darkLogo: logoUrl( shape: SQUARE, theme: DARK )
                    securityType
                }
            }
            sentiment {
                numeric
            }
        }
        pageInfo {
            endCursor
            hasNextPage
        }
    }
}`});if(o.data)return this.breakingNews=o.data.marketNews,o.data.marketNews}catch(t){console.log("BREAKING NEWS ERROR",t),D.error("Can not load breaking news")}},async fetchStocksNews(s,t,o){var w,d,k,m,l,p,u,h,f,y,$,N,I,S,E,R,b,A,T,x,U,q,L,G,K;const r=o?`, after: "${o}"`:"",a=`
{
source
sourceUrl
timestamp,
title
sentiment { trend }
stocks { 
    nodes {
        name
        symbol
        lightLogo: logoUrl( shape: SQUARE, theme: LIGHT )
        darkLogo: logoUrl( shape: SQUARE, theme: DARK )
        exchange {
            name
        }
    }
}
} `,n=`
pageInfo {
endCursor
hasNextPage
}`,g=[{type:"sector",arg:`
    stock ( identifier: "${s}", identifierType: ID ) {
        security {
            ... on ETF {
                sectorExposures (first: 25) {  nodes { sector {id name} } }
                news ( first: 15 ${r} ) {
                   nodes ${a}
                    ${n}
                }
            }
        }
    }`},{type:"watchlist",arg:`
    watchlist ( id: "${s}" ) {
        news ( first: 15 ${r} ) {
           nodes ${a}
            ${n}
        }
    }`},{type:"brokerageAccount",arg:`
    brokerageAccount ( id: "${s}" ) {
        news ( first: 15 ${r} ) {
           nodes ${a}
            ${n}
        }
    }`},{type:"industry",arg:`
    industry ( id: "${s}" ) {
        news ( first: 15 ${r} ) {
           nodes ${a}
            ${n}
        }
    }`},{type:"cmsTheme",arg:`
    cmsTheme ( slug: "${s}" ) {
        news ( first: 15 ${r} ) {
           nodes ${a}
            ${n}
        }
    }`},{type:"cmsMarketIndex",arg:`
    cmsMarketIndex ( symbol: "${s}" ) {
        stock {
            security {
                ... on ETF {
                    news ( first: 15 ${r} ) {
                       nodes ${a}
                        ${n}
                    }
                }
            }
        }
    }`}].find(W=>W.type===t),{data:e}=g?await M.post("/graphql",{query:`query GET_STOCKS_NEWS  {
    ${g.arg}
}`}):{data:null};let c=[],i={};switch(t){case"sector":c=((m=(k=(d=(w=e==null?void 0:e.data)==null?void 0:w.stock)==null?void 0:d.security)==null?void 0:k.news)==null?void 0:m.nodes)||[],i=(h=(u=(p=(l=e==null?void 0:e.data)==null?void 0:l.stock)==null?void 0:p.security)==null?void 0:u.news)==null?void 0:h.pageInfo;break;case"cmsMarketIndex":c=((I=(N=($=(y=(f=e==null?void 0:e.data)==null?void 0:f.cmsMarketIndex)==null?void 0:y.stock)==null?void 0:$.security)==null?void 0:N.news)==null?void 0:I.nodes)||[],i=(A=(b=(R=(E=(S=e==null?void 0:e.data)==null?void 0:S.cmsMarketIndex)==null?void 0:E.stock)==null?void 0:R.security)==null?void 0:b.news)==null?void 0:A.pageInfo;break;default:c=(U=(x=(T=e==null?void 0:e.data)==null?void 0:T[t])==null?void 0:x.news)==null?void 0:U.nodes,i=(G=(L=(q=e==null?void 0:e.data)==null?void 0:q[t])==null?void 0:L.news)==null?void 0:G.pageInfo;break}(K=this.stocksNews)!=null&&K.nodes?this.stocksNews={nodes:[...this.stocksNews.nodes,...c],pageInfo:i}:this.stocksNews={nodes:c,pageInfo:i}}}});export{j as u};