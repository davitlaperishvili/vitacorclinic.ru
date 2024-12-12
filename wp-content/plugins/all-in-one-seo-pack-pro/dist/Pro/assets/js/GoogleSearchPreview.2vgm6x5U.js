import{c as v,m as R,n as T,t as k}from"./links.BtZm82fD.js";import{C as x}from"./constants.CPpKID74.js";import{a as $}from"./Caret.Ke5gylGO.js";import{D as N,v as q,o as r,c as o,a as s,t as a,C as b,F as h,J as g,b as _,B as V,G as H,K as M,L as j}from"./runtime-dom.esm-bundler.tPRhSV4q.js";import{_ as A}from"./_plugin-vue_export-helper.BN1snXvA.js";const d={components:{SvgCaret:$},computed:{faq(){var t;const e=((t=this.richResults)==null?void 0:t.faq)||[];return Array.isArray(e)&&e.length?e:[]},reviewSnippet(){var n;const t={...{bestRating:null,ratingValue:null,reviewCount:null,ratingCount:null,priceCurrency:null,price:null,priceFrom:null,priceTo:null,prosConsNotes:[]},...((n=this.richResults)==null?void 0:n.reviewSnippet)||{}};if(Object.values(t).every(c=>c===null)||!t.reviewCount&&!t.ratingCount)return{};for(const[c,l]of Object.entries(t))if(["bestRating","ratingValue"].includes(c)&&(5<l||l===null))return{};return t.price=isNaN(parseFloat(t.price))?null:parseFloat(t.price).toFixed(2),t.priceFrom=isNaN(parseFloat(t.priceFrom))?null:parseFloat(t.priceFrom).toFixed(2),t.priceTo=isNaN(parseFloat(t.priceTo))?null:parseFloat(t.priceTo).toFixed(2),t},yellowStarsWidth(){return`${this.reviewSnippet.ratingValue*100/5}%`},urlBreadcrumbs(){try{const e=new URL(this.url);let t=e.hostname+e.pathname.replace(/\/$/,"");return t=t.substring(0,50).trim()+(50<t.length?"...":""),`${e.protocol}//`+t.replaceAll("/"," &rsaquo; ")}catch{return""}},parseFavicon(){var n;const e=v();let t=`https://www.google.com/s2/favicons?sz=64&domain=${e.aioseo.urls.domain}`;try{t=new URL(this.favicon||"").href}catch{(n=e.aioseo.data)!=null&&n.isDev&&(t=`${e.aioseo.urls.home}/favicon.ico`)}return t},parseDescription(){const e=R(this.description.substring(0,160).trim()+(160<this.description.length?" ...":""),!1);if(!this.focusKeyphrase)return e;const t=this.focusKeyphrase.split(" "),n=new RegExp("\\b"+t.join("\\b|\\b")+"\\b","gi");return e.replace(n,"<strong>$&</strong>")}},methods:{stripTags:T,getReviewSnippetPriceLabel(){if(parseFloat(this.reviewSnippet.price)===0&&!this.reviewSnippet.priceTo)return this.strings.free;if(this.reviewSnippet.priceCurrency){const e=x.find(t=>t.value===this.reviewSnippet.priceCurrency)||{};return this.reviewSnippet.priceFrom&&this.reviewSnippet.priceTo?`${e==null?void 0:e.symbol}${this.reviewSnippet.priceFrom} - ${e==null?void 0:e.symbol}${this.reviewSnippet.priceTo}`:`${e==null?void 0:e.symbol}${this.reviewSnippet.price}`}return`$${this.reviewSnippet.price}`},getReviewSnippetCountLabel(){if(this.device==="desktop"){const e=this.reviewSnippet.ratingCount||this.reviewSnippet.reviewCount,t=this.reviewSnippet.ratingCount?this.$t._n("vote","votes",e,this.$td):this.$t._n("review","reviews",e,this.$td);return this.$t.sprintf(this.$t.__("%1$s %2$s",this.$td),e,t)}return`(${this.reviewSnippet.ratingCount||this.reviewSnippet.reviewCount})`},truncate:k},props:{focusKeyphrase:String,device:{type:String,default:"desktop"},favicon:String,hostname:{type:String,default(){const e=v();return e.aioseo.data.siteName||e.aioseo.urls.domain}},url:{type:String,default(){return v().aioseo.urls.mainSiteUrl}},title:String,description:String,richResults:Object},data(){return{strings:{free:this.$t.__("Free",this.$td),rating:this.$t.__("Rating",this.$td),prosCons:this.$t.__("Pros and cons include",this.$td),viewFullList:this.$t.__("View full list",this.$td)}}}},C=()=>{N(e=>({"4c22216c":e.yellowStarsWidth}))},F=d.setup;d.setup=F?(e,t)=>(C(),F(e,t)):C;const w=e=>(M("data-v-f9b07bd5"),e=e(),j(),e),B={class:"aioseo-google-search-preview__main"},U={class:"aioseo-google-search-preview__favicon"},D={class:"favicon-wrapper"},I=["src"],O={class:"aioseo-google-search-preview__location"},P={class:"hostname text-truncate"},K=["innerHTML"],z={class:"aioseo-google-search-preview__title"},E=["innerHTML"],G={key:0,class:"aioseo-google-search-preview__pros-cons"},W={class:"aioseo-google-search-preview__pros-cons__description"},J=w(()=>s("span",null," ",-1)),Y=w(()=>s("span",{class:"bullet"},null,-1)),Q={class:"aioseo-google-search-preview__pros-cons__view-full-list"},X={key:1,class:"aioseo-google-search-preview__review-snippet"},Z=w(()=>s("div",{class:"aioseo-google-search-preview__review-snippet__stars"},[s("div")],-1)),ee={class:"aioseo-google-search-preview__review-snippet__rating"},te={class:"aioseo-google-search-preview__review-snippet__count bullet"},se={key:0,class:"aioseo-google-search-preview__review-snippet__price bullet"},ie={key:2,class:"aioseo-google-search-preview__anchor"},re={class:"aioseo-google-search-preview__anchor__link"},oe={key:0,class:"aioseo-google-search-preview__anchor__bullet"},ne={key:3,class:"aioseo-google-search-preview__faq"},ae={class:"aioseo-google-search-preview__faq__question",role:"button"},ce=["innerHTML"],le=["innerHTML"];function pe(e,t,n,c,l,i){var f,m,S,y;const L=q("svg-caret");return r(),o("div",{class:H(["aioseo-google-search-preview",`aioseo-google-search-preview--${n.device}`])},[s("div",B,[s("div",U,[s("div",D,[s("img",{src:i.parseFavicon,alt:"Favicon",loading:"lazy",decoding:"async",height:"18",width:"18"},null,8,I)])]),s("div",O,[s("div",P,a(n.hostname.replace(/^(m|www)\./,"")),1),s("div",{class:"url text-truncate",innerHTML:i.urlBreadcrumbs},null,8,K)]),s("div",z,a(n.title.substring(0,70).trim()+(n.title.length>70?" ...":"")),1),s("div",{class:"aioseo-google-search-preview__description",innerHTML:i.parseDescription},null,8,E)]),(f=i.reviewSnippet.prosConsNotes||[])!=null&&f.length?(r(),o("div",G,[b(a(l.strings.prosCons)+": ",1),(r(!0),o(h,null,g(i.reviewSnippet.prosConsNotes.slice(0,10),(p,u)=>(r(),o(h,{key:`pros-cons-${u}`},[s("span",W,a(p),1),J,Y],64))),128)),s("span",Q,a(l.strings.viewFullList),1)])):_("",!0),Object.values(i.reviewSnippet).length?(r(),o("div",X,[Z,s("div",ee,[s("span",null,a(l.strings.rating)+":",1),b(" "+a(parseFloat(i.reviewSnippet.ratingValue).toFixed(2)),1)]),s("div",te,a(i.getReviewSnippetCountLabel()),1),((m=i.reviewSnippet)==null?void 0:m.price)!==null?(r(),o("div",se,a(i.getReviewSnippetPriceLabel()),1)):_("",!0)])):_("",!0),(y=(S=this.richResults)==null?void 0:S.anchorLinks)!=null&&y.length?(r(),o("div",ie,[(r(!0),o(h,null,g(this.richResults.anchorLinks,(p,u)=>(r(),o(h,{key:`anchor-${u}`},[s("span",re,a(i.truncate(p,30)),1),u!==this.richResults.anchorLinks.length-1?(r(),o("span",oe," • ")):_("",!0)],64))),128))])):_("",!0),Object.values(i.faq).length?(r(),o("div",ne,[(r(!0),o(h,null,g(i.faq.slice(0,3),(p,u)=>(r(),o("details",{key:`faq-${u}`,class:"aioseo-google-search-preview__faq__container"},[s("summary",ae,[s("span",{class:"text-truncate",innerHTML:i.truncate(i.stripTags(p.question),60)},null,8,ce),V(L,{width:"20"})]),s("span",{class:"aioseo-google-search-preview__faq__answer",innerHTML:i.stripTags(p.answer)},null,8,le)]))),128))])):_("",!0)],2)}const de=A(d,[["render",pe],["__scopeId","data-v-f9b07bd5"]]);export{de as C};