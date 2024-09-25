import{_ as m}from"./nuxt-icon.vue.2d6fd5e1.js";/* empty css                      */import{S as u,j as p}from"./utils.11774da7.js";import{d as x,aW as _,o as b,c as g,b as e,k as w}from"./entry.8bd29e6a.js";const h={class:"fixed top-0 left-0 bg-[#6B728070] w-screen h-screen flex justify-center items-center z-[105]"},v={ref:"modalBox",class:"bg-white animation-box overflow-hidden rounded-lg max-w-[400px] w-full px-5 pb-4 pt-7 relative"},P=e("h1",{class:"text-notification-other-title text-base leading-5 font-semibold text-center"},"Delete Portfolio",-1),y=e("div",{class:"mt-6"},[e("p",{class:"text-grey font-normal mb-2 text-sm"},"Are you sure you want to delete this Portfolio?")],-1),k={class:"flex items-center mt-6"},$=x({__name:"DeletePortfolio",props:{id:{default:""}},setup(i){const n=i,a=_(),t=u(),c=p(),l=()=>{t.openConfirmDeletePortfolio(!1,"")},f=async()=>{if(n.id){const{deleteBrokerageAccount:s}=await t.deletePortfolio(n.id);s.error?a.error(s.error.message):(c.setPortfolioFlowSuccess(!0,s.brokerageAccount),await t.syncPortfolios(),t.openConfirmDeletePortfolio(!1,""))}};return(s,o)=>{const d=m;return b(),g("div",h,[e("div",v,[e("button",{class:"absolute top-[20px] right-[25px]",onClick:o[0]||(o[0]=r=>l())},[w(d,{class:"w-[13px] h-[13px] text-grey",name:"img/auth/close"})]),P,y,e("div",k,[e("button",{class:"py-2.5 w-full text-footer-nav font-medium mr-3 outline outline-[1px] outline-[#CFD2DB] rounded-lg",onClick:o[1]||(o[1]=r=>l())},"Cancel"),e("button",{class:"py-2.5 bg-red w-full font-normal rounded-lg text-white",onClick:o[2]||(o[2]=r=>f())},"Delete")])],512)])}}});export{$ as _};