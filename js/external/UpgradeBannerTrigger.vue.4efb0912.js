import{_ as b}from"./nuxt-link.a6eea277.js";import{_ as c}from"./UpgradeToPremiumButton.vue.39f994fb.js";import{d as m,y as _,r as v,l as w,o as a,c as d,b as e,g as i,t as u,k as r,a as P,w as B,e as k,f as y,h as C,i as g}from"./entry.8bd29e6a.js";import{j as $}from"./utils.11774da7.js";const U={class:"mt-4 md:flex bg-[#9263F7] rounded-xl overflow-hidden"},T={class:"md:w-8/12 w-full flex md:flex-row flex-col items-center py-5 px-5"},F=["src"],S={class:"ml-4"},N=e("p",{class:"text-white-text text-lg mb-2 font-bold"},"Go Premium. Get More Reports.",-1),M={class:"text-sm text-white-text font-normal"},V=e("br",null,null,-1),j={class:"md:w-4/12 h-auto flex flex-col items-center justify-center bg-[url('/img/profile/free-plan-purple.png')] bg-cover bg-no-repeat bg-[#00000020]"},E=["src"],G=m({__name:"FreePlanPoster",setup(p){const t=_(),o=v(50);return w(async()=>{const n=await t.fetchBillingPlans();if(n){const l=n.find(s=>s.name.includes("Premium"));o.value=l==null?void 0:l.stockReportsLimit}}),(n,l)=>{const s=c;return a(),d("div",U,[e("div",T,[e("img",{class:"w-[70px] h-[70px]",src:"/img/profile/free-plan.svg",alt:"plan"},null,8,F),e("div",S,[N,e("p",M,[i("Going premium gives you access to up to "+u(o.value)+" reports ",1),V,i("a month, as well as additional tools such as a adding competitors, exporting data, customizing reports and more!")])])]),e("div",j,[e("img",{class:"w-28 h-11 mb-4",src:"/img/icons/logo-premium.svg",alt:"logo"},null,8,E),r(s,{class:"font-bold","is-white":!0})])])}}}),R={class:"pt-1"},z={class:"flex flex-col md:flex-row md:items-center justify-between"},A=e("p",{class:"text-footer-nav text-[20px] font-light"},"Free plan",-1),D={class:"flex items-center"},Q=m({__name:"FreePlan",setup(p){const t=$(),o=_(),n=P(()=>o.getUserPlan);return(l,s)=>{const f=b,h=c,x=G;return a(),d("div",R,[e("div",z,[A,e("div",D,[r(f,{to:"/profile/?tag=plan-usage",onClick:s[0]||(s[0]=H=>k(t).setFreePlanDetails(!1)),class:"underline underlie-offset-2 text-black text-sm font-medium mr-5"},{default:B(()=>[i("Review Usage")]),_:1}),r(h)])]),n.value?C("",!0):(a(),y(x,{key:0}))])}}}),L={class:"rounded-xl flex overflow-hidden",style:{"background-image":"linear-gradient(45deg, #C438EB 55%, #3809B2 100%)"}},W={class:"text-[36px] text-text-white mt-0 mb-10 leading-10"},q=["src"],X=m({__name:"UpgradeBannerTrigger",props:{title:{default:"Upgrade to Premium for Access to Triggers"},bannerClasses:{default:"py-14 px-8"},mediaWidth:{default:"lg:w-[370px] md:w-4/12"},imageUrl:{default:"/img/profile/triggers-phone-lg.png"}},setup(p){return(t,o)=>(a(),d("div",L,[e("div",{class:g(["grow",[t.bannerClasses]])},[e("h2",W,u(t.title),1),r(c,{label:"Upgrade Now","is-white":!0,"button-class":"font-bold py-2 px-8","text-color":"text-[#C539EC]"})],2),e("div",{class:g(["md:block hidden shrink-0 relative bg-left bg-no-repeat bg-cover text-center ml-4",[t.mediaWidth]]),style:{"background-image":"url('/img/profile/triggers-bg-spin.svg')"}},[e("img",{class:"absolute top-0 left-0 w-full",src:t.imageUrl,alt:"Triggers Mobile"},null,8,q)],2)]))}});export{Q as _,G as a,X as b};