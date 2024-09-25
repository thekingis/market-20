import{aW as m,aO as E,aR as d,ax as R,bJ as y,bK as f}from"./entry.8bd29e6a.js";const n=m(),h=E({id:"triggers-store",state:()=>({triggers:[],trigger:null,createdDataTrigger:{},createdNumericTrigger:{},createdRatingTrigger:{},numericTriggers:{},ratingTriggers:{},dateTriggers:{},deletedTrigger:{},successAddedTriggerModal:!1,companyTrigger:null,stockData:null,triggersCount:0,triggersNotifications:[],updateNotificationModal:null,successUpdateNotificationModal:"",testLorem:0,triggersStatistics:{}}),getters:{getTriggers:e=>e.triggers,getGroupedTriggers:e=>{},getTrigger:e=>e.trigger,getCreateDataTrigger:e=>e.createdDataTrigger,getCreateNumericTrigger:e=>e.createdNumericTrigger,getCreateRatingTrigger:e=>e.createdRatingTrigger,getDeleteTrigger:e=>e.deletedTrigger,getNumericTriggers:e=>e.numericTriggers,getRatingTriggers:e=>e.ratingTriggers,getDateTriggers:e=>e.dateTriggers,getSuccessAddedTriggerModal:e=>e.successAddedTriggerModal,getCompanyTrigger:e=>e.companyTrigger,getStockData:e=>e.stockData,getTriggersCount:e=>e.triggersCount,getTriggersNotifications:e=>e.triggersNotifications,getUpdateNotificationModal:e=>e.updateNotificationModal,getSuccessUpdateNotificationModal:e=>e.successUpdateNotificationModal,getPlatformNotifications:e=>{const r={textEnabled:!1,emailEnabled:!1};return e.triggersNotifications.length&&(r.textEnabled=e.triggersNotifications.every(a=>a.isTriggered||a.textEnabled),r.emailEnabled=e.triggersNotifications.every(a=>a.isTriggered||a.emailEnabled)),r},getLorem:e=>e.testLorem,getTriggersStatistics:e=>e.triggersStatistics},actions:{setSuccessAddedTriggerModal(e){this.successAddedTriggerModal=e},setLoremTest(e){this.testLorem=e},setCompanyTrigger(e){this.companyTrigger=e,this.fetchStockData(e.symbol)},async createDateTrigger(e,r,a,i,g,o){var s,c;try{const{data:t}=await d.post("/graphql",{query:`mutation CREATE_TRIGGER_DATA{
    createDateTrigger(input : 
        {
            dateDirection: ${e},
            emailEnabled: ${a},
            stockId : "${i}",
            summaryEmailEnabled: ${g},
            textEnabled: ${o},
            type: ${r}
        }
    )
    {
        clientMutationId
        trigger{
            createdAt
            id
        }
        error{message}
    }
}`});if(t!=null&&t.errors&&n.error((c=(s=t==null?void 0:t.errors)==null?void 0:s[0])==null?void 0:c.message),t.data)return this.createdDataTrigger=t.data,t.data}catch(t){console.log("CREATE DATA TRIGGER ERROR",t),n.error("Can not create data trigger")}},async createNumericTrigger(e,r,a,i,g,o){var s,c;try{const{data:t}=await d.post("/graphql",{query:`mutation CREATE_TRIGGER_NUMERIC{
    createNumericTrigger(input :
        {
            emailEnabled : ${i},
            numericDirection : ${r},
            stockId : "${a}",
            summaryEmailEnabled : ${g},
            textEnabled: ${o},
            type: ${e},
        }
    )
    {
        clientMutationId
        trigger{
            createdAt
            id
        }
        error{message}
    }
}`});if(t!=null&&t.errors&&n.error((c=(s=t==null?void 0:t.errors)==null?void 0:s[0])==null?void 0:c.message),t.data)return this.createdNumericTrigger=t.data,t.data}catch(t){console.log("CREATE NUMERIC TRIGGER ERROR",t),n.error("Can not create numeric trigger")}},async createRatingTrigger(e,r,a,i,g,o){var s,c;try{const{data:t}=await d.post("/graphql",{query:`mutation CREATE_TRIGGER_RATING{
    createRatingTrigger(input :
        {
            direction: ${e},
            emailEnabled : ${r},
            rating: ${a},
            stockId : "${i}",
            summaryEmailEnabled : ${g},
            textEnabled: ${o},
            type: ANALYST_RATING,
        }
    )
    {
        clientMutationId
        trigger{
            createdAt
            id
        }
        error{message}
    }
}`});if(t!=null&&t.errors&&n.error((c=(s=t==null?void 0:t.errors)==null?void 0:s[0])==null?void 0:c.message),t.data)return this.createdRatingTrigger=t.data,t.data}catch(t){console.log("CREATE RATING TRIGGER ERROR",t),n.error("Can not create rating trigger")}},async deleteTrigger(e){try{const{data:r}=await d.post("/graphql",{query:`mutation DELETE_TRIGGER {
    deleteTrigger(input : {
            triggerId : "${e}"
        }
    )
    {
        trigger{
            id
        }
        error{
            message
        }
    }
}`});if(r.data)return this.deletedTrigger=r.data,r.data}catch(r){console.log("DELETE TRIGGER ERROR",r),n.error("Can not delete trigger")}},async updateTriggerNotifications(e,r,a=!0){try{let i="";for(let o in r){const s=r[o]?"true":"false";i+=`${o}: ${s}`}const{data:g}=await d.post("/graphql",{query:`mutation UPDATE_TRIGGER_NOTIFICATIONS {
    updateTriggerNotifications( input: {
        triggerId: "${e}"
        ${i}
    } ) {
        error { message }
        trigger {
            id,
            emailEnabled,
            summaryEmailEnabled,
            textEnabled
        }
    }
}`});if(g.data.updateTriggerNotifications.error&&a&&n.error(g.data.updateTriggerNotifications.error.message),g.data.updateTriggerNotifications.trigger)return this.triggersNotifications=[],g.data.updateTriggerNotifications.trigger}catch(i){console.log("UPDATE TRIGGER ERROR",i),n.error("Can not update trigger")}},async fetchTriggersList(e=""){try{const r=e?`( after: "${e}" )`:"",{data:a}=await d.post("/graphql",{query:`query GET_TRIGGERS{
    triggers ${r} {
        nodes{
            id,
            createdAt,
            isTriggered,
            textEnabled,
            triggeredAt,
            stock{name,symbol,securityType}
            ruleset {
                ... on DateTrigger {
                    dateType: type
                    dateDesired
                    dateDirection
                    dateOriginal
                    dateOutcome
                },

                ... on NumericTrigger {
                    numericType: type
                    numericDesired
                    numericDirection{
                        displayAmount
                        mathAmount
                        trendDirection
                    }
                    numericOriginal
                    numericOutcome
                },

                ... on RatingTrigger {
                    ratingType: type
                    ratingDesired
                    ratingDirection
                    ratingOriginal
                    ratingOutcome
                }
            }
        }
        pageInfo {
            endCursor
            hasNextPage
        }
    }
}`});if(a.data)return this.triggers=a.data,a.data}catch(r){console.log("Fetch all triggers list ERROR",r),n.error("Can not fetch all triggers")}},async fetchTriggersCount(){var e,r,a;try{const{data:i}=await d.post("/graphql",{query:`query GET_ALL_TRIGGERS {
    triggers ( first: 1 ) {
        agg { totalItems }
    }
}`});if(i.data)return this.triggersCount=((a=(r=(e=i.data)==null?void 0:e.triggers)==null?void 0:r.agg)==null?void 0:a.totalItems)||0,this.triggersCount}catch(i){console.log("Fetch triggers count ERROR",i),n.error("Can not fetch triggers count")}},async fetchTriggersNotifications(e="",r=[]){var a,i,g,o,s,c,t,T;try{const u=e?`after: "${e}"`:"",{data:l}=await d.post("/graphql",{query:`query GET_TRIGGERS_NOTIFICATIONS {
    triggers ( first: 50, ${u} ) {
        nodes{
            id
            isTriggered,
            textEnabled,
            emailEnabled
        }
        pageInfo {
            endCursor
            hasNextPage
        }
    }
}`});return(i=(a=l.data)==null?void 0:a.triggers)!=null&&i.nodes&&(r=[...r,...(o=(g=l.data)==null?void 0:g.triggers)==null?void 0:o.nodes]),(c=(s=l.data)==null?void 0:s.pageInfo)!=null&&c.hasNextPage?await this.fetchTriggersNotifications((T=(t=l.data)==null?void 0:t.pageInfo)==null?void 0:T.endCursor,r):(this.triggersNotifications=r,r)}catch(u){console.log("Fetch triggers notifications ERROR",u),n.error("Can not fetch triggers notifications")}},async fetchNumericTriggers(){try{const{data:e}=await d.post("/graphql",{query:`query NUMERIC_TRIGGERS{
    triggers{
        nodes{
            id,
            createdAt,
            isTriggered,
            textEnabled,
            emailEnabled,
            summaryEmailEnabled,
            triggeredAt,
            stock{name,symbol}
            ruleset{
                ...on NumericTrigger{
                    numericDesired
                    numericDirection{
                        displayAmount
                        mathAmount
                        trendDirection
                    }
                    numericOriginal
                    numericOutcome
                    type
                }
            }
        }
    }
}`});if(e.data)return this.numericTriggers=e.data,e.data}catch(e){console.log("FETCH NUMERICS TRIGGER ERROR",e),n.error("Can not fetch numeric trigger")}},async fetchRatingTriggers(){try{const{data:e}=await d.post("/graphql",{query:`query RATING_TRIGGERS{
    triggers{
        nodes{
            id,
            createdAt,
            isTriggered,
            textEnabled,
            emailEnabled,
            summaryEmailEnabled,
            triggeredAt,
            stock{name,symbol}
            ruleset{
                ...on RatingTrigger{
                    ratingDesired
                    ratingDirection
                    ratingOriginal
                    ratingOutcome
                    type
                }
            }
        }
    }
}`});if(e.data)return this.ratingTriggers=e.data,e.data}catch(e){console.log("FETCH RATING TRIGGER ERROR",e),n.error("Can not fetch rating trigger")}},async fetchDateTriggers(){try{const{data:e}=await d.post("/graphql",{query:`query DATE_TRIGGERS{
    triggers{
        nodes{
            id,
            createdAt,
            isTriggered,
            textEnabled,
            emailEnabled,
            summaryEmailEnabled,
            triggeredAt,
            stock{name,symbol}
            ruleset{
                ...on DateTrigger{
                    dateDesired
                    dateDirection
                    dateOriginal
                    dateOutcome
                    type
                }
            }
        }
    }
}`});if(e.data)return this.dateTriggers=e.data,e.data}catch(e){console.log("FETCH DATE TRIGGER ERROR",e),n.error("Can not fetch date trigger")}},async fetchStockData(e){try{const r=R().subtract(1,"year").toISOString(),a=R().subtract(1,"quarter").toISOString(),{data:i}=await d.post("/graphql",{query:`query GET_STOCK_TRIGGERS_DATA{
    stock( identifier: "${e}", identifierType: SYMBOL ) {
        symbol
        name
        quote {
            price {amount}
        }
        equitysetRating {
            fairValue { amount }
        }
        analystRatingSummary {
            ratingPercent {mathAmount}
            rating
        }
        security {
            ...on Company {
                incomeStatements( startDate: "${r}", frequency: QUARTERLY ) {
                    nodes {
                        eps
                    }
                }
                keyRatios( startDate: "${a}", frequency: QUARTERLY, first: 1 ) {
                    nodes {
                        bvps
                    }
                }
            }
        }
    }
}`});if(i.data)return this.stockData=i.data,i.data}catch(r){console.log("FETCH DATE TRIGGER ERROR",r),n.error("Can not fetch date trigger")}},async getUserTriggersStatistics(e=!1){var r,a,i;try{const{data:g}=await d.post("/graphql",{query:`query TRIGGERS_STATISTICS {
    triggers{
        nodes{
            id,
            ruleset{
                ...on DateTrigger {
                    type
                }
                ...on RatingTrigger {
                    type
                }
                ...on NumericTrigger {
                    type
                }
            }
        }
    }
}`});if(g!=null&&g.data){const o=structuredClone(y);for(const s in o)o[s].count=0;return(i=(a=(r=g==null?void 0:g.data)==null?void 0:r.triggers)==null?void 0:a.nodes)==null||i.forEach(s=>{var t;const c=f[(t=s==null?void 0:s.ruleset)==null?void 0:t.type]||"not-found-category-key";o.hasOwnProperty(c)&&(o[c].count+=1)}),e||(this.triggersStatistics=o),o}}catch(g){console.log("FETCH TRIGGER STATISTICS ERROR",g),n.error("Can not fetch date trigger")}},openUpdateNotificationModal(e){this.updateNotificationModal=e},openSuccessUpdateNotificationModal(e){this.successUpdateNotificationModal=e}}});export{h as u};