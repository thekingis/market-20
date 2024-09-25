import{aW as p,aO as u,a_ as m,aR as d}from"./entry.8bd29e6a.js";import{K as U,F as i,l as a}from"./utils.11774da7.js";const l=JSON.parse(JSON.stringify(U));for(const e in i)l.hasOwnProperty(i[e].categoryKey)&&l[i[e].categoryKey].metrics.push({...i[e]});const n=p(),C=u({id:"profile-store",state:()=>({cancellingModal:!1,switchToPeriod:!1,editPaymentMethod:!1,subscriptionModal:!1,customizationTrialModal:!1,customizationCompany:{},allMetricsCategoriesDataTemplate:JSON.parse(JSON.stringify(l)),userBoards:[],userCurrentBoardId:"",userBoardsType:m.TEMPLATES,userBoardsFetchArgs:"",userAllBoardsFetchArgs:"",successAddedUserBoardModal:!1,openedDeleteUserBoardModal:!1,openEditUserBoardDetailsModal:!1,openEditUserBoardMetricsModal:!1,userBoardToEditOrDelete:{},openedActionUserBoardCompletedModal:!1,actionUserBoardCompletedModalTitle:"",newlyCreatedBoardOrUpdatedBoardId:"",checkExistingBoardsAmount:!0,areUserBoardsLoading:!0}),getters:{getCancellingModal:e=>e.cancellingModal,getSwitchToPeriod:e=>e.switchToPeriod,getEditPaymentMethod:e=>e.editPaymentMethod,getSubscriptionModal:e=>e.subscriptionModal,getCustomizationTrialModal:e=>e.customizationTrialModal,getCustomizationCompany:e=>e.customizationCompany,getAllMetricsCategoriesDataTemplate:e=>e.allMetricsCategoriesDataTemplate,getUserBoards:e=>e.userBoards,getUserCurrentBoardId:e=>e.userCurrentBoardId,getUserBoardsType:e=>e.userBoardsType,getUserBoardsFetchArgs:e=>e.userBoardsFetchArgs,getUserAllBoardsFetchArgs:e=>e.userAllBoardsFetchArgs,getSuccessAddedUserBoardModal:e=>e.successAddedUserBoardModal,getOpenedDeleteUserBoardModal:e=>e.openedDeleteUserBoardModal,getOpenEditUserBoardDetailsModal:e=>e.openEditUserBoardDetailsModal,getOpenEditUserBoardMetricsModal:e=>e.openEditUserBoardMetricsModal,getUserBoardToEditOrDelete:e=>e.userBoardToEditOrDelete,getOpenedActionUserBoardCompletedModal:e=>e.openedActionUserBoardCompletedModal,getActionUserBoardCompletedModalTitle:e=>e.actionUserBoardCompletedModalTitle,getNewlyCreatedBoardOrUpdatedBoardId:e=>e.newlyCreatedBoardOrUpdatedBoardId,getCheckExistingBoardsAmount:e=>e.checkExistingBoardsAmount,getAreUserBoardsLoading:e=>e.areUserBoardsLoading},actions:{setCancellingModal(e){this.cancellingModal=e},setSwitchToPeriod(e){this.switchToPeriod=e},setEditPaymentMethod(e){this.editPaymentMethod=e},setSubscriptionModal(e){this.subscriptionModal=e},setCustomizationTrialModal(e){this.customizationTrialModal=e},setCustomizationCompany(e){this.customizationCompany=e},setCustomizationCompanyDefault(e){if(e){let t=this.customizationCompany[e];t.sort((s,o)=>s.id-o.id),a.each(t,s=>{s.show=!0,s.showCompetitor!==null&&(s.showCompetitor=!0),s.children.sort((o,r)=>o.id-r.id),a.each(s.children,o=>o.show=!0)}),this.customizationCompany={...this.customizationCompany,[e]:t}}else this.customizationCompany=a.each(this.customizationCompany,t=>{t.sort((s,o)=>s.id-o.id),a.each(t,s=>{s.show=!0,s.showCompetitor!==null&&(s.showCompetitor=!0),s.children.sort((o,r)=>o.id-r.id),a.each(s.children,o=>o.show=!0)})})},setCustomizationCompanyChildren(e,t){this.customizationCompany.section=t},async setUserCurrentBoardId(e){this.userCurrentBoardId=e},setUserBoardsType(e){this.userBoardsType=e},setUserBoardsFetchArgs(e){this.userBoardsFetchArgs=e},setUserAllBoardsFetchArgs(e){this.userAllBoardsFetchArgs=e},setSuccessAddedUserBoardModal(e,t){this.successAddedUserBoardModal=e,t&&this.setUserCurrentBoardId(t||"")},setCheckExistingBoardsAmount(e){this.checkExistingBoardsAmount=e},async setNewlyCreatedBoardOrUpdatedBoardId(e){this.newlyCreatedBoardOrUpdatedBoardId=e},async setOpenedDeleteUserBoardModal(e,t){await this.setUserBoardToEditOrDelete(e?t:""),this.openedDeleteUserBoardModal=e},async setOpenEditUserBoardDetailsModal(e,t){await this.setUserBoardToEditOrDelete(e?t:{}),this.openEditUserBoardDetailsModal=e},async setOpenEditUserBoardMetricsModal(e,t){await this.setUserBoardToEditOrDelete(e?t:{}),this.openEditUserBoardMetricsModal=e,this.setCheckExistingBoardsAmount(!e)},async setUserBoardToEditOrDelete(e){this.userBoardToEditOrDelete=e},async setOpenedActionUserBoardCompletedModal(e,t){this.openedActionUserBoardCompletedModal=e,await this.setUserBoardToEditOrDelete({}),e===!1&&this.setActionUserBoardCompletedModalTitle(""),t&&await this.setUserCurrentBoardId(t||"")},setActionUserBoardCompletedModalTitle(e){this.actionUserBoardCompletedModalTitle=e},async fetchInvestorBoards(){var s,o,r,c,B,h;this.areUserBoardsLoading=!0;const e=`
                me {
                    boards {
                        nodes {
                            id
                            name
                            description
                            metrics
                        }
                    }
                }
                `,{data:t}=await d.post("/graphql",{query:`query GET_USER_BOARDS { ${e} }`});return(r=(o=(s=t==null?void 0:t.data)==null?void 0:s.me)==null?void 0:o.boards)!=null&&r.nodes&&(this.userBoards=(h=(B=(c=t==null?void 0:t.data)==null?void 0:c.me)==null?void 0:B.boards)==null?void 0:h.nodes),this.areUserBoardsLoading=!1,t},async createUserBoard(e,t,s){try{const{data:o}=await d.post("/graphql",{query:`mutation CREATE_USER_BOARD {
                        createBoard(input: {
                            name: "${t}",
                            metrics: [${e}],
                            description: "${s}"
                        }) {
                            board {
                                id
                                name
                                metrics
                                description
                            }
                            error {
                                message
                            }
                        }
                    }`});if(o!=null&&o.data){const r={name:o.data.createBoard.board.name,metrics:o.data.createBoard.board.metrics,description:o.data.createBoard.board.description};this.userBoards.length>0?this.userBoards=[...this.userBoards,{...r}]:this.userBoards=[{...r}]}return o}catch(o){console.log("CREATE USER BOARD ERROR",o),n.error("Can not create board")}},async deleteUserBoard(e){try{const{data:t}=await d.post("/graphql",{query:`mutation DELETE_USER_BOARD {
                        deleteBoard( input: {
                            id: "${e}"
                        }) {
                            board {
                                id
                                name
                                metrics
                                description
                            }
                            error {
                                message
                            }
                        }
                    }`});return t}catch(t){console.log("DELETE USER BOARD ERROR",t),n.error("Can not delete board")}},async updateUserBoard(e,t,s,o){try{const{data:r}=await d.post("/graphql",{query:`mutation UPDATE_USER_BOARD {
                        updateBoard( input: {
                            id: "${e}",
                            name: "${s}",
                            metrics: [${t}],
                            description: "${o}"
                        }) {
                            board {
                                id
                                name
                                metrics
                                description
                            }
                            error {
                                message
                            }
                        }
                    }`});return r}catch(r){console.log("UPDATE USER BOARD ERROR",r),n.error("Can not update board")}}}});export{C as u};