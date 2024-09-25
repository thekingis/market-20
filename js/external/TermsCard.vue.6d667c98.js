import{_ as pt}from"./TermsSpecialText.vue.286f9a0e.js";import{_ as ft}from"./nuxt-link.a6eea277.js";import{L as gt,m as Dt}from"./utils.11774da7.js";import{d as bt,r as ht,a as Tt,o as et,c as ot,n as s,b as a,h as rt,k as st,w as nt,t as o,e as yt}from"./entry.8bd29e6a.js";const _t=["src"],vt={class:"pl-2"},kt={class:"mt-4 text-2xl text-footer-nav font-bold"},Ot={class:"font-light text-footer-nav mt-3"},wt={class:"flex justify-end w-full"},At={class:"pr-1 text-black"},Ct=a("span",{class:"rotate-90 text-black"},"â†‘",-1),It=bt({__name:"TermsCard",props:{cardData:{default:()=>{}},specialFontSize:{default:""},specialFontWeight:{default:""},buttonText:{default:""},isTerm:{type:Boolean,default:!1}},setup(Nt){const n=ht(null),{elementX:lt,elementY:it,isOutside:dt,elementHeight:l,elementWidth:ct}=gt(n),ut=Tt(()=>{const i=(3-it.value/l.value*6).toFixed(2),r=(lt.value/l.value*6-6/2).toFixed(2);return dt.value?"":`perspective(${ct.value}px) rotateX(${i}deg) rotateY(${r}deg)`});return(t,i)=>{var d,c,u,m,p,f,g,D,b,h,T,y,_,v,k,O,w,A,C,N,S,X,M,F,I,$,z,R,B,V,j,L,W,Y,E,H,P,q,G,J,K,Q;const r=pt,mt=ft;return t.cardData?(et(),ot("div",{key:0,class:"border-[1px] border-mischka transition-all p-5 rounded-lg bg-white flex flex-col justify-between items-start",ref_key:"termCard",ref:n,id:"termCard",style:s({transform:ut.value,transition:"transform 0.25s ease-out"})},[(c=(d=t.cardData)==null?void 0:d.icon)!=null&&c.data||(g=(f=(p=(m=(u=t.cardData)==null?void 0:u.category)==null?void 0:m.data)==null?void 0:p.attributes)==null?void 0:f.icon)!=null&&g.data?(et(),ot("div",{key:0,class:"rounded-full p-3 inline-block leading-5",style:s({backgroundColor:((D=t.cardData)==null?void 0:D.background)||((b=t.cardData)==null?void 0:b.color)||((_=(y=(T=(h=t.cardData)==null?void 0:h.category)==null?void 0:T.data)==null?void 0:y.attributes)==null?void 0:_.color)})},[a("img",{src:((A=(w=(O=(k=(v=t.cardData)==null?void 0:v.icon)==null?void 0:k.data)==null?void 0:O[0])==null?void 0:w.attributes)==null?void 0:A.url)||(($=(I=(F=(M=(X=(S=(N=(C=t.cardData)==null?void 0:C.category)==null?void 0:N.data)==null?void 0:S.attributes)==null?void 0:X.icon)==null?void 0:M.data)==null?void 0:F[0])==null?void 0:I.attributes)==null?void 0:$.url),alt:"icon"},null,8,_t)],4)):rt("",!0),a("div",null,[st(r,{class:"mt-2",color:t.cardData.color||((V=(B=(R=(z=t.cardData)==null?void 0:z.category)==null?void 0:R.data)==null?void 0:B.attributes)==null?void 0:V.color),"font-style":"normal",fontSize:t.specialFontSize,"font-weight":t.specialFontWeight,"line-width":"2"},{default:nt(()=>{var e,U,Z,x,tt,at;return[a("p",vt,o(((e=t.cardData)==null?void 0:e.specialText)||((U=t.cardData)==null?void 0:U.concepts_heading)||((at=(tt=(x=(Z=t.cardData)==null?void 0:Z.category)==null?void 0:x.data)==null?void 0:tt.attributes)==null?void 0:at.title)),1)]}),_:1},8,["color","fontSize","font-weight"]),a("p",kt,o((j=t.cardData)==null?void 0:j.title),1),a("p",Ot,o((L=t.cardData)==null?void 0:L.description),1)]),a("div",wt,[st(mt,{class:"flex items-center mt-3",style:s({color:((W=t.cardData)==null?void 0:W.color)||((P=(H=(E=(Y=t.cardData)==null?void 0:Y.category)==null?void 0:E.data)==null?void 0:H.attributes)==null?void 0:P.color)}),to:`/learning/${t.isTerm?`terms/${(q=t.cardData)==null?void 0:q.slug}`:(G=t.cardData)!=null&&G.slug?yt(Dt)((J=t.cardData)==null?void 0:J.slug):(Q=(K=t.cardData)==null?void 0:K.title)==null?void 0:Q.toLowerCase().split(" ").join("-")}`},{default:nt(()=>{var e;return[a("span",At,o(((e=t.cardData)==null?void 0:e.buttonText)||t.buttonText||"View"),1),Ct]}),_:1},8,["style","to"])])],4)):rt("",!0)}}});export{It as _};