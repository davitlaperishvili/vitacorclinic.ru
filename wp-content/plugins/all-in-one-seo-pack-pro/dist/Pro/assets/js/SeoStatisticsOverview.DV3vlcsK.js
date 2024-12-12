import{c as P,N as C,g as L}from"./links.BtZm82fD.js";import{q as E,S as F,a as N}from"./LicenseConditions.CtuufZRZ.js";import{a as W,b as A}from"./Caret.Ke5gylGO.js";import{a as z,C as $}from"./Tooltip.DhkkBQWW.js";import{n as k}from"./numbers.BT5e8rgb.js";import{h as w}from"./helpers.DWk2T5bC.js";import{C as U}from"./Index.ChPpw0uH.js";import{S as Y,a as H}from"./DeleteWarning.DOuK55DF.js";import{_ as R}from"./_plugin-vue_export-helper.BN1snXvA.js";import{v as u,o as n,c as d,a as l,t as p,F as M,J as D,B as g,b as m,k as _,l as f,C as x,G as S,j as G}from"./runtime-dom.esm-bundler.tPRhSV4q.js";import{a as j}from"./index.Dbgw3oZ8.js";const I=""+window.__aioseoDynamicImportPreload__("svg/aioseo.DaYJf6Zr.svg"),O=""+window.__aioseoDynamicImportPreload__("svg/google.CCbnExf9.svg"),B=""+window.__aioseoDynamicImportPreload__("svg/wordpress.CBZvqUlM.svg"),V={setup(){return{rootStore:P()}},emits:["update"],components:{CoreModal:U,SeoRevisionsDeleteWarning:Y,SeoRevisionListItem:H,SvgCaret:W},data(){return{item:{},itemToBeDeleted:{},modalOpen:!1,modalOpenDeleteRevisionWarning:!1,strings:{theFollowingChanges:this.$t.__("The following changes were made that could affect your site rankings:",this.$tdPro),readMore:this.$t.__("Read More",this.$tdPro),viewRevisions:this.$t.__("View Revisions",this.$tdPro)}}},watch:{items(e){this.item={},e.length===1&&(this.item=e[0])}},props:{date:{type:String,default:""},timelineMarkers:{type:Object,default:()=>{}}},methods:{back(e){this.item=this.items.find(t=>t.type===e)||{}},maybeDeleteSeoRevision(e){this.modalOpenDeleteRevisionWarning=!0,this.itemToBeDeleted=e}},computed:{types(){let e=[{name:"wpRevision",title:this.$t.sprintf(this.$t.__("%1$s Revisions",this.$tdPro),"WordPress"),icon:w(B)},{name:"aioseoRevision",title:this.$t.sprintf(this.$t.__("%1$s Revisions",this.$tdPro),"AIOSEO"),icon:w(I)},{name:"googleUpdate",title:this.$t.sprintf(this.$t.__("%1$s Updates",this.$tdPro),"Google"),icon:w(O)}];return e=e.map(t=>({...t,count:this.items.filter(i=>i.type===t.name).length})),e=e.filter(t=>0<t.count),e},type(){return this.types.find(e=>e.name===this.item.type)||{}},title(){return this.date?C(new Date(this.date+" 00:00:00"),this.rootStore.aioseo.data.dateFormat):""},items(){return this.timelineMarkers[this.date]||[]},showTypeSelector(){return 1<this.items.length&&Object.keys(this.item).length===0},showBackButton(){return 1<this.items.length}},mounted(){this.items.length===1&&(this.item=this.items[0])},updated(){this.$emit("update",{item:this.item,modal:this.modalOpen})}},q={class:"aioseo-graph-timeline-markers"},X={class:"aioseo-graph-timeline-markers-title"},Z={key:0,class:"aioseo-graph-timeline-markers-types"},J=["onClick"],K={class:"aioseo-graph-timeline-markers-types__item-icon"},Q=["alt","src"],ee={class:"aioseo-graph-timeline-markers-types__item-title"},te={class:"aioseo-graph-timeline-markers-types__item-arrow"},se={key:1,class:"aioseo-graph-timeline-markers-item"},ie={class:"aioseo-graph-timeline-markers-types__item"},re={class:"aioseo-graph-timeline-markers-types__item-icon"},oe=["alt","src"],ae={class:"aioseo-graph-timeline-markers-types__item-title"},ne={key:0},le={class:"aioseo-graph-timeline-markers-item__title"},ce={class:"aioseo-graph-timeline-markers-item__content"},he={class:"aioseo-graph-timeline-markers-item__footer"},me={key:1},de={class:"aioseo-graph-timeline-markers-item__title"},pe={class:"aioseo-graph-timeline-markers-item__content"},ue={class:"aioseo-graph-timeline-markers-item__footer"},_e={class:"aioseo-graph-timeline-markers-modal__body"},fe={key:0,class:"aioseo-graph-timeline-markers__revisions aioseo-graph-timeline-markers__revisions--wordpress"},ge={class:"aioseo-revision__title"},ye=["innerHTML"],ve={key:1,class:"aioseo-graph-timeline-markers__revisions aioseo-graph-timeline-markers__revisions--aioseo"},ke={class:"aioseo-seo-revisions-list"};function we(e,t,i,a,s,r){const o=u("svg-caret"),h=u("base-button"),y=u("seo-revision-list-item"),b=u("core-modal"),T=u("seo-revisions-delete-warning");return n(),d("div",q,[l("div",X,p(r.title),1),r.showTypeSelector?(n(),d("div",Z,[(n(!0),d(M,null,D(r.types,(c,v)=>(n(),d("div",{key:v,onClick:()=>r.back(c.name),class:"aioseo-graph-timeline-markers-types__item aioseo-graph-timeline-markers-types__item--clickable"},[l("div",K,[l("img",{alt:c.name,src:c.icon},null,8,Q)]),l("div",ee,p(c.title)+" ("+p(c.count)+")",1),l("div",te,[g(o)])],8,J))),128))])):m("",!0),r.showTypeSelector?m("",!0):(n(),d("div",se,[l("div",ie,[l("div",re,[l("img",{alt:r.type.name,src:r.type.icon},null,8,oe)]),l("div",ae,p(r.type.title),1)]),s.item.type==="aioseoRevision"||s.item.type==="wpRevision"?(n(),d("div",ne,[l("div",le,p(s.strings.theFollowingChanges),1),l("div",ce,p(s.item.fields.join(", ")),1),l("div",he,[r.showBackButton?(n(),_(h,{key:0,type:"gray",onClick:t[0]||(t[0]=()=>r.back()),size:"small"},{default:f(()=>[g(o)]),_:1})):m("",!0),s.item.type==="aioseoRevision"?(n(),_(h,{key:1,type:"blue",size:"small",onClick:t[1]||(t[1]=()=>s.modalOpen=!0)},{default:f(()=>[x(p(s.strings.viewRevisions),1)]),_:1})):m("",!0),s.item.type==="wpRevision"?(n(),_(h,{key:2,href:s.item.link,type:"blue",tag:"a",target:"_blank",size:"small"},{default:f(()=>[x(p(s.strings.viewRevisions),1)]),_:1},8,["href"])):m("",!0)])])):m("",!0),s.item.type==="googleUpdate"?(n(),d("div",me,[l("div",de,p(s.item.title),1),l("div",pe,p(s.item.description),1),l("div",ue,[r.showBackButton?(n(),_(h,{key:0,type:"gray",onClick:t[2]||(t[2]=()=>r.back()),size:"small"},{default:f(()=>[g(o)]),_:1})):m("",!0),s.item.link?(n(),_(h,{key:1,type:"blue",tag:"a",href:s.item.link,target:"_blank",size:"small"},{default:f(()=>[x(p(s.strings.readMore),1)]),_:1},8,["href"])):m("",!0),l("div",{class:S(["aioseo-graph-timeline-markers-item__footer-status",`aioseo-graph-timeline-markers-item__footer-status--${s.item.status}`])},p(s.item.status),3)])])):m("",!0)])),g(b,{show:s.modalOpen,classes:["aioseo-graph-timeline-markers-modal"],onClose:t[3]||(t[3]=()=>this.modalOpen=!1)},{headerTitle:f(()=>[x(p(r.type.title),1)]),body:f(()=>[l("div",_e,[s.item.type==="wpRevision"?(n(),d("div",fe,[(n(!0),d(M,null,D(s.item.diff,(c,v)=>(n(),d("div",{key:v,class:"aioseo-graph-timeline-markers__revisions-item"},[l("div",ge,p(c.name),1),l("div",{class:"aioseo-revision__content",innerHTML:c.diff},null,8,ye)]))),128))])):m("",!0),s.item.type==="aioseoRevision"?(n(),d("div",ve,[l("div",ke,[(n(!0),d(M,null,D(s.item.revisions,(c,v)=>(n(),_(y,{key:"seo-revision-list-item-"+v,class:"aioseo-graph-timeline-markers__revisions-item",revision:c,compareTo:s.item.compareTo,isCurrentVersion:c.id===s.item.compareTo.id,context:"metabox",onMaybeDeleteSeoRevision:r.maybeDeleteSeoRevision},null,8,["revision","compareTo","isCurrentVersion","onMaybeDeleteSeoRevision"]))),128))])])):m("",!0)])]),_:1},8,["show"]),s.itemToBeDeleted?(n(),_(T,{key:2,modalOpenDeleteRevisionWarning:s.modalOpenDeleteRevisionWarning,revision:s.itemToBeDeleted},null,8,["modalOpenDeleteRevisionWarning","revision"])):m("",!0)])}const be=R(V,[["render",we]]),xe={setup(){return{rootStore:P()}},components:{apexchart:E,CoreLoader:A,CorePopper:z,GraphTimelineMarkers:be},props:{series:{type:Array,required:!0},chartOverrides:{type:Object,default:()=>({})},height:{type:Number,default(){return 350}},legendStyle:{type:String,default(){return"custom"}},loading:{type:Boolean,default:!1},timelineMarkers:{type:Object,default:()=>({})},multiAxis:Boolean,preset:String,invertYAxis:Boolean},data(){return{isMounted:!1,reversedYAxis:!1,colors:["#005AE0","#00AA63","#F18200","#DF2A4A","#8B5CF6","#D946EF"],presets:{overview:{chart:{type:"area",sparkline:{enabled:!0}},grid:{show:!1,padding:{top:2,right:2,bottom:0,left:2}},xaxis:{show:!1},yaxis:{show:!1,labels:{show:!1,formatter:e=>e?k.compactNumber(e):0}}},keywordsDistribution:{chart:{type:"bar",zoom:{enabled:!1},toolbar:{show:!1}},fill:{type:"solid"},stroke:{width:0},xaxis:{type:"category"},yaxis:{forceNiceScale:!1,tickAmount:2,max:100,labels:{formatter:e=>e.toFixed(0)+"%"}},tooltip:{}}},timelineMarkersDate:null}},methods:{handleTimelineMarkersTooltip(e){var t,i;(t=e.referenceElm)==null||t.classList.remove("active-point"),e.showPopper&&((i=e.referenceElm)==null||i.classList.add("active-point"))},handleTimelineMarkersTooltipUpdate(e){const t=this.$refs.timelineMarkersPopper;t.updatePopper(),e.modal?t.doClose():t.doShow(),this.handleTimelineMarkersTooltip(t)},showTimelineMarkersTooltip(e){var i;const t=this.$refs.timelineMarkersPopper;(i=t.referenceElm)==null||i.classList.remove("active-point"),e==null||e.classList.add("active-point"),t.destroyPopper(),t.doDestroy(),t.referenceElm=e,t.createPopper(),t.doShow()}},computed:{getSeries(){const e=this.series;if(!this.invertYAxis||!e.length)return e;const t=e[0].data.map(o=>o.y),i=[];let s=t.map((o,h)=>({value:o,index:h})).sort((o,h)=>o.value-h.value);const r=o=>(i[o[0].index]=o[o.length-1].value,i[o[o.length-1].index]=o[0].value,o=o.slice(1,o.length-1),o);for(;s.length;)s=r(s);return e[0].data.forEach((o,h)=>{o.label=o.y,o.y=i[h]}),e},chartDefaults(){const e=this.series;return{colors:this.colors,chart:{type:"area",zoom:{enabled:!1},toolbar:{show:!1},animations:{enabled:!0,easing:"easeout",speed:600,animateGradually:{enabled:!0,delay:50}},parentHeightOffset:0},fill:{type:"gradient",gradient:{shadeIntensity:1,opacityFrom:.4,opacityTo:.9,stops:[0,100]}},dataLabels:{enabled:!1},stroke:{curve:"smooth",width:2},title:{show:!1},grid:{show:!0,strokeDashArray:0,borderColor:"#D0D1D7",yaxis:{lines:{show:!0}},xaxis:{lines:{show:!1}},padding:{top:20,right:20,bottom:20,left:20}},xaxis:{type:"datetime",labels:{show:!0,minHeight:35,trim:!1,rotateAlways:!1,offsetY:6,datetimeFormatter:{year:"yyyy",month:"MMM 'yy",day:"d MMM",hour:""}},tooltip:{enabled:!1,x:{formatter:(t,i)=>{var s,r;const a=new Date(`${(r=(s=e[i.seriesIndex])==null?void 0:s.data[i.dataPointIndex])==null?void 0:r.x} 00:00:00`);return C(a,this.rootStore.aioseo.data.dateFormat)}}},axisBorder:{show:!0,color:"#D0D1D7",height:1,width:"100%",offsetX:0,offsetY:0},axisTicks:{show:!0,borderType:"solid",color:"#E8E8EB",height:12,offsetX:0,offsetY:0}},yaxis:[{labels:{show:!0,formatter:(t,i,a)=>{var r;if(!this.invertYAxis||!(a!=null&&a.config))return t?k.compactNumber(t):0;const s=[...(r=a==null?void 0:a.globals)==null?void 0:r.yAxisScale[0].result].reverse();return s[i]&&(t=s[i]),t?k.compactNumber(t):0}}}],tooltip:{enabled:!0,x:{formatter:(t,i)=>{var s,r;const a=new Date(`${(r=(s=e[i.seriesIndex])==null?void 0:s.data[i.dataPointIndex])==null?void 0:r.x} 00:00:00`);return C(a,this.rootStore.aioseo.data.dateFormat)}},y:{formatter:(t,i)=>{var a,s,r;return this.invertYAxis&&((a=e[i.seriesIndex])!=null&&a.data[i.dataPointIndex].label)?(s=e[i.seriesIndex])==null?void 0:s.data[i.dataPointIndex].label:k.compactNumber((r=e[i.seriesIndex])==null?void 0:r.data[i.dataPointIndex].y)}}},legend:{show:!0,showForSingleSeries:!1,showForNullSeries:!0,showForZeroSeries:!0,position:"bottom",horizontalAlign:"center",floating:!1,fontSize:"14px",fontWeight:400,formatter:(t,i)=>{var r,o,h,y;const a=((o=(r=e[i.seriesIndex])==null?void 0:r.legend)==null?void 0:o.name)||t;if(this.legendStyle==="simple")return[a];let s=((y=(h=e[i.seriesIndex])==null?void 0:h.legend)==null?void 0:y.total)||"";return isNaN(s)||(s=k.compactNumber(s)),[`<strong>${s}</strong>`,a]},inverseOrder:!1,width:void 0,height:void 0,tooltipHoverFormatter:void 0,customLegendItems:[],offsetX:0,offsetY:0,markers:{width:16,height:16,strokeWidth:0,strokeColor:"#fff",fillColors:void 0,radius:16,customHTML:()=>this.legendStyle==="simple"?"":'<span class="marker-checkbox"><svg viewBox="0 0 14 11" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M10.8542 1.37147C11.44 0.785682 12.3897 0.785682 12.9755 1.37147C13.5613 1.95726 13.5613 2.907 12.9755 3.49279L6.04448 10.4238C5.74864 10.7196 5.35996 10.8661 4.97222 10.8631C4.58548 10.8653 4.19805 10.7189 3.90298 10.4238L1.0243 7.5451C0.438514 6.95931 0.438514 6.00956 1.0243 5.42378C1.61009 4.83799 2.55983 4.83799 3.14562 5.42378L4.97374 7.2519L10.8542 1.37147Z" fill="currentColor" /></svg></span>',onClick:void 0,offsetX:0,offsetY:0},itemMargin:{horizontal:0,vertical:0},onItemClick:{toggleDataSeries:!0},onItemHover:{highlightDataSeries:!0}},annotations:{points:this.annotationsPoints}}},multiAxisDefaults(){const e=this.series,t={yaxis:[]};return e.forEach((i,a)=>{t.yaxis.push({title:{text:i.name.replace("Search ","")},seriesName:i.name,opposite:a===1,labels:{show:!0,formatter:s=>s?k.compactNumber(s):0}})}),t},annotationsPoints(){const e=[];return this.timelineMarkers&&Object.keys(this.timelineMarkers).forEach(t=>{const i={x:new Date(t).getTime(),y:0,yAxisIndex:0,seriesIndex:0,mouseEnter:(s,r)=>{let o=r.target;r.relatedTarget.tagName.toLowerCase()==="circle"&&(o=r.relatedTarget),this.timelineMarkersDate=t,this.showTimelineMarkersTooltip(o)},mouseLeave:(s,r)=>{r.toElement.className==="string"&&r.toElement.className.includes("popper")||this.$refs.timelineMarkersPopper.doClose()},label:{text:this.timelineMarkers[t].length,borderWidth:0,offsetY:23,style:{background:"transparent",color:"#141B38",fontSize:"12px",fontWeight:700}},marker:{size:12,strokeWidth:1,strokeColor:"#D0D1D7",cssClass:"marker-circle"},image:{width:17,height:17}},a=this.timelineMarkers[t].map(s=>s.type);if(a.length===1)switch(i.label={},a[0]){case"aioseoRevision":i.image.path=w(I);break;case"googleUpdate":i.image.path=w(O);break;case"wpRevision":i.image.path=w(B);break}e.push(i)}),e},chartPreset(){return this.preset&&this.presets[this.preset]?this.presets[this.preset]:{}},chartOptions(){let e={...this.chartDefaults,...this.chartPreset,...this.chartOverrides};return this.multiAxis&&(e={...e,...this.multiAxisDefaults}),e},chartClasses(){const e=this.series.length;let t=4;return 4<e&&(t=3),[this.loading?"blurred":"",this.preset?this.preset:"",`legend-${this.legendStyle}`,`legend-columns-${t}`].filter(i=>i).map(i=>"aioseo-graph-"+i)}},mounted(){this.isMounted=!0},beforeUnmount(){this.isMounted=!1}},Se={key:0,class:"aioseo-graph"},Me={class:"popper"};function De(e,t,i,a,s,r){const o=u("apexchart"),h=u("core-loader"),y=u("graph-timeline-markers"),b=u("core-popper");return s.isMounted?(n(),d("div",Se,[g(o,{width:"100%",height:i.height,ref:"apexchart",options:r.chartOptions,series:r.getSeries,class:S(r.chartClasses)},null,8,["height","options","series","class"]),i.loading?(n(),_(h,{key:0,dark:""})):m("",!0),g(b,{ref:"timelineMarkersPopper",options:{placement:"top"},onShow:r.handleTimelineMarkersTooltip,onHide:r.handleTimelineMarkersTooltip},{default:f(()=>[l("span",Me,[s.timelineMarkersDate?(n(),_(y,{key:0,date:s.timelineMarkersDate,timelineMarkers:i.timelineMarkers,onUpdate:r.handleTimelineMarkersTooltipUpdate},null,8,["date","timelineMarkers","onUpdate"])):m("",!0)])]),_:1},8,["onShow","onHide"])])):m("",!0)}const Ce=R(xe,[["render",De]]),Te={setup(){return{rootStore:P(),searchStatisticsStore:L()}},components:{CoreLoader:A,CoreTooltip:$,Graph:Ce,Statistic:F,SvgCircleQuestionMark:j},mixins:[N],data(){return{statisticsStrings:[{name:"impressions",label:this.$t.__("Search Impressions",this.$td),tooltip:this.$t.__("This graph shows the <strong>total number of times your website appeared in the search results</strong> within the selected timeframe.",this.$td)},{name:"clicks",label:this.$t.__("Total Clicks",this.$td),tooltip:this.$t.__("This graph shows the <strong>total number of clicks that your website received from the search results</strong> within the selected timeframe.",this.$td)},{name:"ctr",label:this.$t.__("Avg. CTR",this.$td),tooltip:this.$t.__("This graph shows the <strong>average click-through rate of your content in the search results</strong> within the selected timeframe.",this.$td)},{name:"position",label:this.$t.__("Avg. Position",this.$td),tooltip:this.$t.__("This graph shows the <strong>average position of your content in the search results</strong> within the selected timeframe.",this.$td)},{name:"keywords",label:this.$t.__("Total Keywords",this.$td),tooltip:this.$t.__("This graph shows the <strong>total number of keywords that your website ranks for in search results</strong> within the selected timeframe.",this.$td)}]}},props:{statistics:{type:Array,default(){return[]}},statisticsData:{type:Object,default(){return null}},view:{type:String,default:"grid"},showGraph:{type:Boolean,default:!0}},computed:{seoStatistics(){const e=[];return this.statistics.forEach(t=>{const i=this.statisticsStrings.find(a=>a.name===t);i&&e.push({...i,data:this.getData(t)})}),e},style(){const e=[];switch(this.view){case"side-by-side":e.push({"grid-template-columns":`repeat(${this.statistics.length}, 1fr)`});break;case"grid":e.push({"grid-template-columns":`repeat(${Math.ceil(this.statistics.length/2)}, 1fr)`,"grid-template-rows":`repeat(${Math.ceil(this.statistics.length/2)}, 1fr)`});break}return e}},methods:{getData(e){var i,a,s,r,o;const t=this.statisticsData?this.statisticsData:(a=(i=this.searchStatisticsStore.data)==null?void 0:i.seoStatistics)==null?void 0:a.statistics;return t?{total:t[e]||0,difference:t.difference&&Math.abs(t.difference[e])||0,direction:t.difference&&0>t.difference[e]?"down":"up",chart:(o=(r=(s=this.searchStatisticsStore.data)==null?void 0:s.seoStatistics)==null?void 0:r.intervals)==null?void 0:o.map(h=>({x:C(new Date(h.date+" 00:00:00"),this.rootStore.aioseo.data.dateFormat),y:h[e]?h[e]:0}))}:{total:0,difference:0,direction:"up",chart:[]}}}},Pe={class:"statistics-title"},Re=["innerHTML"],Ae={class:"statistics-current"},Ie={class:"statistics-current-total"},Oe={key:0,class:"statistics-chart"};function Be(e,t,i,a,s,r){const o=u("svg-circle-question-mark"),h=u("core-tooltip"),y=u("statistic"),b=u("graph"),T=u("core-loader");return n(),d("div",{class:S(["aioseo-seo-statistics-overview",{[i.view]:!0,"hide-graph":!i.showGraph}]),style:G(r.style)},[(n(!0),d(M,null,D(r.seoStatistics,(c,v)=>(n(),d("div",{key:v,class:"statistics"},[l("div",{class:S([{blurred:a.searchStatisticsStore.loading.seoStatistics}])},[l("div",Pe,[x(p(c.label)+" ",1),c.tooltip?(n(),_(h,{key:0},{tooltip:f(()=>[l("span",{innerHTML:c.tooltip},null,8,Re)]),default:f(()=>[g(o)]),_:2},1024)):m("",!0)]),l("div",Ae,[l("div",Ie,p(e.formatStatistic(c.name,c.data.total)),1),g(y,{class:S(["statistics-current-difference","statistics-current-difference--"+c.data.direction]),difference:c.data.difference,type:c.name,showCurrent:!1,"tooltip-offset":"-90px,0"},null,8,["class","difference","type"])]),i.showGraph?(n(),d("div",Oe,[g(b,{series:[{name:c.label,data:c.data.chart}],height:60,preset:"overview","invert-y-axis":c.name==="position"},null,8,["series","invert-y-axis"])])):m("",!0)],2),a.searchStatisticsStore.loading.seoStatistics?(n(),_(T,{key:0,dark:""})):m("",!0)]))),128))],6)}const je=R(Te,[["render",Be]]);export{Ce as G,je as S};