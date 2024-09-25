import{r as pe,b9 as X,bI as de,ba as ye}from"./entry.8bd29e6a.js";const Re=pe([{open:!1,accordionTitle:"Basic",id:1,filterData:[{title:"Last Close",selected:!0,id:0,type:"basic"},{title:"% Change",selected:!0,id:1,type:"basic"},{title:"Fair Value Distance",selected:!0,id:2,type:"basic"},{title:"Fair Value",selected:!0,id:3,type:"basic"},{title:"P/E (Price per Earnings)",selected:!0,id:4,type:"basic"},{title:"Sector",selected:!0,id:5,type:"basic"}]},{open:!1,accordionTitle:"Proprietary",id:2,filterData:[{title:"Fair value",selected:!0,id:0,type:"proprietary"},{title:"Fv distance %",selected:!0,id:1,type:"proprietary"},{title:"Proprietary modelâ„¢",selected:!0,id:2,type:"proprietary"},{title:"Third party analysts",selected:!0,id:3,type:"proprietary"},{title:"Rating",selected:!0,id:4,type:"proprietary"},{title:"Rating perf %",selected:!0,id:5,type:"proprietary"},{title:"Actual perf",selected:!0,id:6,type:"proprietary"},{title:"Rating acc %",selected:!0,id:7,type:"proprietary"},{title:"Fv hits",selected:!0,id:8,type:"proprietary"}]},{open:!1,accordionTitle:"Performance",id:3,filterData:[{title:"Actual Performance",selected:!0,id:0,type:"performance"},{title:"Rating Performance",selected:!0,id:1,type:"performance"},{title:"Rating Accurancy",selected:!0,id:2,type:"performance"},{title:"FV Consistency",selected:!0,id:3,type:"performance"},{title:"Fair Value Performance",selected:!0,id:4,type:"performance"},{title:"Avg Fair Value Difference",selected:!0,id:5,type:"performance"},{title:"Last Close FV Difference",selected:!0,id:6,type:"performance"}]},{open:!1,accordionTitle:"Valuation",id:4,filterData:[{title:"Rating",selected:!0,id:0,type:"valuation"},{title:"Fair Value",selected:!0,id:1,type:"valuation"},{title:"FV Distance %",selected:!0,id:2,type:"valuation"},{title:"P/E",selected:!0,id:3,type:"valuation"},{title:"P/B",selected:!0,id:4,type:"valuation"},{title:"P/S",selected:!0,id:5,type:"valuation"},{title:"Debt To Equity",selected:!0,id:6,type:"valuation"},{title:"Profit Margin %",selected:!0,id:7,type:"valuation"},{title:"Market Cap $",selected:!0,id:8,type:"valuation"}]},{open:!1,accordionTitle:"Dividend",id:5,filterData:[{title:"Rating",selected:!0,id:0,type:"dividend"},{title:"Evolution",selected:!0,id:1,type:"dividend"},{title:"Div Amount $",selected:!0,id:2,type:"dividend"},{title:"Div Yield %",selected:!0,id:3,type:"dividend"},{title:"Div Consistency",selected:!0,id:4,type:"dividend"},{title:"Last Dividend",selected:!0,id:5,type:"dividend"},{title:"Next Dividend",selected:!0,id:6,type:"dividend"},{title:"Profit Margin %",selected:!0,id:7,type:"dividend"},{title:"Coverage Ration",selected:!0,id:8,type:"dividend"},{title:"Payout Ratio",selected:!0,id:9,type:"dividend"}]},{open:!1,accordionTitle:"Change",id:6,filterData:[{title:"Rating",selected:!0,id:0,type:"change"},{title:"Previous Rating",selected:!0,id:1,type:"change"},{title:"Fair Value",selected:!0,id:2,type:"change"},{title:"Previous Fair Value",selected:!0,id:3,type:"change"},{title:"Proprietary Modelâ„¢",selected:!0,id:4,type:"change"},{title:"Previous Proprietary Modelâ„¢",selected:!0,id:5,type:"change"}]},{open:!1,accordionTitle:"Fair Value Hits",id:7,filterData:[{title:"Rating",selected:!0,id:0,type:"fair-value-hits"},{title:"Fair Value",selected:!0,id:1,type:"fair-value-hits"},{title:"Fair Value",selected:!0,id:2,type:"fair-value-hits"},{title:"Last Hit Date",selected:!0,id:3,type:"fair-value-hits"},{title:"Through To Peak %",selected:!0,id:4,type:"fair-value-hits"}]},{open:!1,accordionTitle:"Financial",id:8,filterData:[{title:"Revenue Change %",selected:!0,id:1,type:"financial"},{title:"Revenue $ Period",selected:!0,id:2,type:"financial"},{title:"Revenue % Period",selected:!0,id:3,type:"financial"},{title:"Net Income Change %",selected:!0,id:4,type:"financial"},{title:"Net Income $ /Period ",selected:!0,id:5,type:"financial"},{title:"Net Income % /Period",selected:!0,id:6,type:"financial"},{title:"Equity Change %",selected:!0,id:7,type:"financial"},{title:"Eqty Change  $ /Period",selected:!0,id:8,type:"financial"},{title:"Eqty Change % /Period",selected:!0,id:9,type:"financial"}]},{open:!1,accordionTitle:"Operating",id:9,filterData:[{title:"ROE%",selected:!0,id:0,type:"operating"},{title:"ROE% /PERIOD",selected:!0,id:1,type:"operating"},{title:"ROA %",selected:!0,id:2,type:"operating"},{title:"ROA % /PERIOD ",selected:!0,id:3,type:"operating"},{title:"Asset Growth %",selected:!0,id:4,type:"operating"},{title:"Liability Growth %",selected:!0,id:5,type:"operating"},{title:"Debt As % Of Assets",selected:!0,id:6,type:"operating"},{title:"Debt As % Of Assets /Period",selected:!0,id:7,type:"operating"},{title:"Accounts Receivable",selected:!0,id:8,type:"operating"}]}]);var ge={},le={},x={},W={},ce;function se(){if(ce)return W;ce=1;var R=X&&X.__assign||function(){return R=Object.assign||function(f){for(var r,t=1,d=arguments.length;t<d;t++){r=arguments[t];for(var v in r)Object.prototype.hasOwnProperty.call(r,v)&&(f[v]=r[v])}return f},R.apply(this,arguments)};W.__esModule=!0,W.getReferenceLineMap=W.getId=W.filterHandles=W.removeEvent=W.addEvent=W.getElSize=W.IDENTITY=void 0;var l=he();W.IDENTITY=Symbol("Vue3DraggableResizable");function a(f){var r=window.getComputedStyle(f);return{width:parseFloat(r.getPropertyValue("width")),height:parseFloat(r.getPropertyValue("height"))}}W.getElSize=a;function c(f){return function(r,t,d){r&&(typeof t=="string"&&(t=[t]),t.forEach(function(v){return r[f](v,d,{passive:!1})}))}}W.addEvent=c("addEventListener"),W.removeEvent=c("removeEventListener");function z(f){if(f&&f.length>0){var r=[];return f.forEach(function(t){l.ALL_HANDLES.includes(t)&&!r.includes(t)&&r.push(t)}),r}else return[]}W.filterHandles=z;function h(){return String(Math.random()).substr(2)+String(Date.now())}W.getId=h;function C(f,r,t){var d,v;if(f.disabled.value)return null;var p={row:[],col:[]},w=r.parentWidth,e=r.parentHeight;(d=p.row).push.apply(d,f.adsorbRows),(v=p.col).push.apply(v,f.adsorbCols),f.adsorbParent.value&&(p.row.push(0,e.value,e.value/2),p.col.push(0,w.value,w.value/2));var i=f.getPositionStore(t);Object.values(i).forEach(function(n){var o=n.x,g=n.y,H=n.w,N=n.h;p.row.push(g,g+N,g+N/2),p.col.push(o,o+H,o+H/2)});var u={row:p.row.reduce(function(n,o){var g;return R(R({},n),(g={},g[o]={min:o-5,max:o+5,value:o},g))},{}),col:p.col.reduce(function(n,o){var g;return R(R({},n),(g={},g[o]={min:o-5,max:o+5,value:o},g))},{})};return u}return W.getReferenceLineMap=C,W}var fe;function me(){if(fe)return x;fe=1;var R=X&&X.__assign||function(){return R=Object.assign||function(e){for(var i,u=1,n=arguments.length;u<n;u++){i=arguments[u];for(var o in i)Object.prototype.hasOwnProperty.call(i,o)&&(e[o]=i[o])}return e},R.apply(this,arguments)};x.__esModule=!0,x.watchProps=x.initResizeHandle=x.initDraggableContainer=x.initLimitSizeAndMethods=x.initParent=x.initState=x.useState=void 0;var l=de,a=se();function c(e){var i=l.ref(e),u=function(n){return i.value=n,n};return[i,u]}x.useState=c;function z(e,i){var u=c(e.initW),n=u[0],o=u[1],g=c(e.initH),H=g[0],N=g[1],I=c(e.x),D=I[0],A=I[1],T=c(e.y),P=T[0],L=T[1],$=c(e.active),q=$[0],k=$[1],E=c(!1),K=E[0],_=E[1],ee=c(!1),ae=ee[0],G=ee[1],V=c(""),O=V[0],te=V[1],J=c(1/0),Q=J[0],ne=J[1],b=c(1/0),M=b[0],j=b[1],Z=c(e.minW),ie=Z[0],re=Z[1],Y=c(e.minH),S=Y[0],B=Y[1],U=l.computed(function(){return H.value/n.value});return l.watch(n,function(s){i("update:w",s)},{immediate:!0}),l.watch(H,function(s){i("update:h",s)},{immediate:!0}),l.watch(P,function(s){i("update:y",s)}),l.watch(D,function(s){i("update:x",s)}),l.watch(q,function(s,m){i("update:active",s),!m&&s?i("activated"):m&&!s&&i("deactivated")}),l.watch(function(){return e.active},function(s){k(s)}),{id:a.getId(),width:n,height:H,top:P,left:D,enable:q,dragging:K,resizing:ae,resizingHandle:O,resizingMaxHeight:M,resizingMaxWidth:Q,resizingMinWidth:ie,resizingMinHeight:S,aspectRatio:U,setEnable:k,setDragging:_,setResizing:G,setResizingHandle:te,setResizingMaxHeight:j,setResizingMaxWidth:ne,setResizingMinWidth:re,setResizingMinHeight:B,setWidth:function(s){return o(Math.floor(s))},setHeight:function(s){return N(Math.floor(s))},setTop:function(s){return L(Math.floor(s))},setLeft:function(s){return A(Math.floor(s))}}}x.initState=z;function h(e){var i=l.ref(0),u=l.ref(0);return l.onMounted(function(){if(e.value&&e.value.parentElement){var n=a.getElSize(e.value.parentElement),o=n.width,g=n.height;i.value=o,u.value=g}}),{parentWidth:i,parentHeight:u}}x.initParent=h;function C(e,i,u){var n=u.width,o=u.height,g=u.left,H=u.top,N=u.resizingMaxWidth,I=u.resizingMaxHeight,D=u.resizingMinWidth,A=u.resizingMinHeight,T=u.setWidth,P=u.setHeight,L=u.setTop,$=u.setLeft,q=i.parentWidth,k=i.parentHeight,E={minWidth:l.computed(function(){return D.value}),minHeight:l.computed(function(){return A.value}),maxWidth:l.computed(function(){var _=1/0;return e.parent&&(_=Math.min(q.value,N.value)),_}),maxHeight:l.computed(function(){var _=1/0;return e.parent&&(_=Math.min(k.value,I.value)),_}),minLeft:l.computed(function(){return e.parent?0:-1/0}),minTop:l.computed(function(){return e.parent?0:-1/0}),maxLeft:l.computed(function(){return e.parent?q.value-n.value:1/0}),maxTop:l.computed(function(){return e.parent?k.value-o.value:1/0})},K={setWidth:function(_){return e.disabledW?n.value:T(Math.min(E.maxWidth.value,Math.max(E.minWidth.value,_)))},setHeight:function(_){return e.disabledH?o.value:P(Math.min(E.maxHeight.value,Math.max(E.minHeight.value,_)))},setTop:function(_){return e.disabledY?H.value:L(Math.min(E.maxTop.value,Math.max(E.minTop.value,_)))},setLeft:function(_){return e.disabledX?g.value:$(Math.min(E.maxLeft.value,Math.max(E.minLeft.value,_)))}};return R(R({},E),K)}x.initLimitSizeAndMethods=C;var f=["mousedown","touchstart"],r=["mouseup","touchend"],t=["mousemove","touchmove"];function d(e){return"touches"in e?[e.touches[0].pageX,e.touches[0].pageY]:[e.pageX,e.pageY]}function v(e,i,u,n,o,g,H){var N=i.left,I=i.top,D=i.width,A=i.height,T=i.dragging,P=i.id,L=i.setDragging,$=i.setEnable,q=i.setResizing,k=i.setResizingHandle,E=u.setTop,K=u.setLeft,_=0,ee=0,ae=0,G=0,V=null,O=document.documentElement,te=function(b){var M,j=b.target;!((M=e.value)===null||M===void 0)&&M.contains(j)||($(!1),L(!1),q(!1),k(""))},J=function(){L(!1),a.removeEvent(O,r,J),a.removeEvent(O,t,Q),V=null,g&&(g.updatePosition(P,{x:N.value,y:I.value,w:D.value,h:A.value}),g.setMatchedLine(null))},Q=function(b){if(b.preventDefault(),!!(T.value&&e.value)){var M=d(b),j=M[0],Z=M[1],ie=j-ae,re=Z-G,Y=_+ie,S=ee+re;if(V!==null){var B={col:[Y,Y+D.value/2,Y+D.value],row:[S,S+A.value/2,S+A.value]},U={row:B.row.map(function(s,m){var y=null;return Object.values(V.row).forEach(function(F){s>=F.min&&s<=F.max&&(y=F.value)}),y!==null&&(m===0?S=y:m===1?S=Math.floor(y-A.value/2):m===2&&(S=Math.floor(y-A.value))),y}).filter(function(s){return s!==null}),col:B.col.map(function(s,m){var y=null;return Object.values(V.col).forEach(function(F){s>=F.min&&s<=F.max&&(y=F.value)}),y!==null&&(m===0?Y=y:m===1?Y=Math.floor(y-D.value/2):m===2&&(Y=Math.floor(y-D.value))),y}).filter(function(s){return s!==null})};g.setMatchedLine(U)}o("dragging",{x:K(Y),y:E(S)})}},ne=function(b){n.value&&(L(!0),_=N.value,ee=I.value,ae=d(b)[0],G=d(b)[1],a.addEvent(O,t,Q),a.addEvent(O,r,J),g&&!g.disabled.value&&(V=a.getReferenceLineMap(g,H,P)))};return l.watch(T,function(b,M){!M&&b?(o("drag-start",{x:N.value,y:I.value}),$(!0),L(!0)):(o("drag-end",{x:N.value,y:I.value}),L(!1))}),l.onMounted(function(){var b=e.value;b&&(b.style.left=N+"px",b.style.top=I+"px",a.addEvent(O,f,te),a.addEvent(b,f,ne))}),l.onUnmounted(function(){e.value&&(a.removeEvent(O,f,te),a.removeEvent(O,r,J),a.removeEvent(O,t,Q))}),{containerRef:e}}x.initDraggableContainer=v;function p(e,i,u,n,o){var g=i.setWidth,H=i.setHeight,N=i.setLeft,I=i.setTop,D=e.width,A=e.height,T=e.left,P=e.top,L=e.aspectRatio,$=e.setResizing,q=e.setResizingHandle,k=e.setResizingMaxWidth,E=e.setResizingMaxHeight,K=e.setResizingMinWidth,_=e.setResizingMinHeight,ee=u.parentWidth,ae=u.parentHeight,G=0,V=0,O=0,te=0,J=0,Q=0,ne=1,b="",M="",j=document.documentElement,Z=function(S){S.preventDefault();var B=d(S),U=B[0],s=B[1],m=U-J,y=s-Q,F=m,oe=y;n.lockAspectRatio&&(m=Math.abs(m),y=m*ne,(F<0||M==="m"&&oe<0)&&(m=-m,y=-y)),b==="t"?(H(V-y),I(te-(A.value-V))):b==="b"&&H(V+y),M==="l"?(g(G-m),N(O-(D.value-G))):M==="r"&&g(G+m),o("resizing",{x:T.value,y:P.value,w:D.value,h:A.value})},ie=function(){o("resize-end",{x:T.value,y:P.value,w:D.value,h:A.value}),q(""),$(!1),k(1/0),E(1/0),K(n.minW),_(n.minH),a.removeEvent(j,t,Z),a.removeEvent(j,r,ie)},re=function(S,B){if(n.resizable){S.stopPropagation(),q(B),$(!0),b=B[0],M=B[1],n.lockAspectRatio&&(["tl","tm","ml","bl"].includes(B)?(b="t",M="l"):(b="b",M="r"));var U=n.minH,s=n.minW;if(n.lockAspectRatio&&(U/s>L.value?s=U/L.value:U=s*L.value),K(s),_(U),n.parent){var m=b==="t"?P.value+A.value:ae.value-P.value,y=M==="l"?T.value+D.value:ee.value-T.value;n.lockAspectRatio&&(m/y<L.value?y=m/L.value:m=y*L.value),E(m),k(y)}G=D.value,V=A.value,O=T.value,te=P.value;var F=d(S);J=F[0],Q=F[1],ne=L.value,o("resize-start",{x:T.value,y:P.value,w:D.value,h:A.value}),a.addEvent(j,t,Z),a.addEvent(j,r,ie)}};l.onUnmounted(function(){a.removeEvent(j,r,ie),a.removeEvent(j,t,Z)});var Y=l.computed(function(){return n.resizable?a.filterHandles(n.handles):[]});return{handlesFiltered:Y,resizeHandleDown:re}}x.initResizeHandle=p;function w(e,i){var u=i.setWidth,n=i.setHeight,o=i.setLeft,g=i.setTop;l.watch(function(){return e.w},function(H){u(H)}),l.watch(function(){return e.h},function(H){n(H)}),l.watch(function(){return e.x},function(H){o(H)}),l.watch(function(){return e.y},function(H){g(H)})}return x.watchProps=w,x}var ve;function he(){return ve||(ve=1,function(R){var l=X&&X.__assign||function(){return l=Object.assign||function(t){for(var d,v=1,p=arguments.length;v<p;v++){d=arguments[v];for(var w in d)Object.prototype.hasOwnProperty.call(d,w)&&(t[w]=d[w])}return t},l.apply(this,arguments)},a=X&&X.__spreadArrays||function(){for(var t=0,d=0,v=arguments.length;d<v;d++)t+=arguments[d].length;for(var p=Array(t),w=0,d=0;d<v;d++)for(var e=arguments[d],i=0,u=e.length;i<u;i++,w++)p[w]=e[i];return p};R.__esModule=!0,R.ALL_HANDLES=void 0;var c=de,z=me(),h=se();R.ALL_HANDLES=["tl","tm","tr","ml","mr","bl","bm","br"];var C={initW:{type:Number,default:null},initH:{type:Number,default:null},w:{type:Number,default:0},h:{type:Number,default:0},x:{type:Number,default:0},y:{type:Number,default:0},draggable:{type:Boolean,default:!0},resizable:{type:Boolean,default:!0},disabledX:{type:Boolean,default:!1},disabledY:{type:Boolean,default:!1},disabledW:{type:Boolean,default:!1},disabledH:{type:Boolean,default:!1},minW:{type:Number,default:20},minH:{type:Number,default:20},active:{type:Boolean,default:!1},parent:{type:Boolean,default:!1},handles:{type:Array,default:R.ALL_HANDLES,validator:function(t){return h.filterHandles(t).length===t.length}},classNameDraggable:{type:String,default:"draggable"},classNameResizable:{type:String,default:"resizable"},classNameDragging:{type:String,default:"dragging"},classNameResizing:{type:String,default:"resizing"},classNameActive:{type:String,default:"active"},classNameHandle:{type:String,default:"handle"},lockAspectRatio:{type:Boolean,default:!1}},f=["activated","deactivated","drag-start","resize-start","dragging","resizing","drag-end","resize-end","update:w","update:h","update:x","update:y","update:active"],r=c.defineComponent({name:"Vue3DraggableResizable",props:C,emits:f,setup:function(t,d){var v=d.emit,p=z.initState(t,v),w=c.inject("identity",Symbol()),e=null;w===h.IDENTITY&&(e={updatePosition:c.inject("updatePosition"),getPositionStore:c.inject("getPositionStore"),disabled:c.inject("disabled"),adsorbParent:c.inject("adsorbParent"),adsorbCols:c.inject("adsorbCols"),adsorbRows:c.inject("adsorbRows"),setMatchedLine:c.inject("setMatchedLine")});var i=c.ref(),u=z.initParent(i),n=z.initLimitSizeAndMethods(t,u,p);z.initDraggableContainer(i,p,n,c.toRef(t,"draggable"),v,e,u);var o=z.initResizeHandle(p,n,u,t,v);return z.watchProps(t,n),l(l(l(l({containerRef:i,containerProvider:e},p),u),n),o)},computed:{style:function(){return{width:this.width+"px",height:this.height+"px",top:this.top+"px",left:this.left+"px"}},klass:function(){var t;return t={},t[this.classNameActive]=this.enable,t[this.classNameDragging]=this.dragging,t[this.classNameResizing]=this.resizing,t[this.classNameDraggable]=this.draggable,t[this.classNameResizable]=this.resizable,t}},mounted:function(){if(this.containerRef){this.containerRef.ondragstart=function(){return!1};var t=h.getElSize(this.containerRef),d=t.width,v=t.height;this.setWidth(this.initW===null?this.w||d:this.initW),this.setHeight(this.initH===null?this.h||v:this.initH),this.containerProvider&&this.containerProvider.updatePosition(this.id,{x:this.left,y:this.top,w:this.width,h:this.height})}},render:function(){var t=this;return c.h("div",{ref:"containerRef",class:["vdr-container",this.klass],style:this.style},a([this.$slots.default&&this.$slots.default()],this.handlesFiltered.map(function(d){return c.h("div",{class:["vdr-handle","vdr-handle-"+d,t.classNameHandle,t.classNameHandle+"-"+d],style:{display:t.enable?"block":"none"},onMousedown:function(v){return t.resizeHandleDown(v,d)},onTouchstart:function(v){return t.resizeHandleDown(v,d)}})})))}});R.default=r}(le)),le}var ue={};(function(R){var l=X&&X.__spreadArrays||function(){for(var z=0,h=0,C=arguments.length;h<C;h++)z+=arguments[h].length;for(var f=Array(z),r=0,h=0;h<C;h++)for(var t=arguments[h],d=0,v=t.length;d<v;d++,r++)f[r]=t[d];return f};R.__esModule=!0;var a=de,c=se();R.default=a.defineComponent({name:"DraggableContainer",props:{disabled:{type:Boolean,default:!1},adsorbParent:{type:Boolean,default:!0},adsorbCols:{type:Array,default:null},adsorbRows:{type:Array,default:null},referenceLineVisible:{type:Boolean,default:!0},referenceLineColor:{type:String,default:"#f00"}},setup:function(z){var h=a.reactive({}),C=function(p,w){h[p]=w},f=function(p){var w=Object.assign({},h);return p&&delete w[p],w},r=a.reactive({matchedLine:null}),t=a.computed(function(){return r.matchedLine&&r.matchedLine.row||[]}),d=a.computed(function(){return r.matchedLine&&r.matchedLine.col||[]}),v=function(p){r.matchedLine=p};return a.provide("identity",c.IDENTITY),a.provide("updatePosition",C),a.provide("getPositionStore",f),a.provide("setMatchedLine",v),a.provide("disabled",a.toRef(z,"disabled")),a.provide("adsorbParent",a.toRef(z,"adsorbParent")),a.provide("adsorbCols",z.adsorbCols||[]),a.provide("adsorbRows",z.adsorbRows||[]),{matchedRows:t,matchedCols:d}},methods:{renderReferenceLine:function(){var z=this;return this.referenceLineVisible?l(this.matchedCols.map(function(h){return a.h("div",{style:{width:"0",height:"100%",top:"0",left:h+"px",borderLeft:"1px dashed "+z.referenceLineColor,position:"absolute"}})}),this.matchedRows.map(function(h){return a.h("div",{style:{width:"100%",height:"0",left:"0",top:h+"px",borderTop:"1px dashed "+z.referenceLineColor,position:"absolute"}})})):[]}},render:function(){return a.h("div",{style:{width:"100%",height:"100%",position:"relative"}},l([this.$slots.default&&this.$slots.default()],this.renderReferenceLine()))}})})(ue);(function(R){var l=X&&X.__createBinding||(Object.create?function(h,C,f,r){r===void 0&&(r=f),Object.defineProperty(h,r,{enumerable:!0,get:function(){return C[f]}})}:function(h,C,f,r){r===void 0&&(r=f),h[r]=C[f]});R.__esModule=!0;var a=he(),c=ue;a.default.install=function(h){return h.component(a.default.name,a.default),h.component(c.default.name,c.default),h};var z=ue;l(R,z,"default","DraggableContainer"),R.default=a.default})(ge);const ze=ye(ge);export{ze as V,Re as a};