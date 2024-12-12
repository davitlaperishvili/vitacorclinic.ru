import{k as A,c as G,e as V,s as B,f as z}from"./links.BtZm82fD.js";import{D as J}from"./Date.BoN5NRW1.js";import{J as j}from"./JsonValues.D25FTfEu.js";import{W}from"./WpTable.CFMkRqW5.js";import{C as E,R as Q}from"./Index.CmVjCix9.js";import{C as K,c as X,e as Z,S as ee}from"./Caret.Ke5gylGO.js";import{C as te}from"./Index.ChPpw0uH.js";import{C as se}from"./Tooltip.DhkkBQWW.js";import{C as I}from"./Table.JF4U36kH.js";import{S as re}from"./Information.Bv8uKEyF.js";import{a as oe}from"./index.Dbgw3oZ8.js";import{v as _,o as n,c as a,k as y,l,a as r,E as S,t as i,C as h,b as g,B as d,F as U,J as L,q as ie,G as M}from"./runtime-dom.esm-bundler.tPRhSV4q.js";import{_ as P}from"./_plugin-vue_export-helper.BN1snXvA.js";import{A as le}from"./AddonConditions.CiZ37f2t.js";import{R as ne,a as de,G as ce,b as ae}from"./constants.CPpKID74.js";import{C as ue}from"./Blur.CvHKqkVq.js";import{C as he}from"./Card.CHgb8IZx.js";import{C as _e}from"./Index.Cf5ujj4F.js";import{R as ge}from"./RequiredPlans.D_JN9Itl.js";const pe={setup(){const t=A();return{redirectsStore:t,rootStore:G(),settingsStore:V(),fetchData:t.fetchRedirects}},components:{CoreAddRedirection:E,CoreAlert:K,CoreModal:te,CoreTooltip:se,CoreWpTable:I,SvgCircleCheck:X,SvgCircleClose:Z,SvgCircleInformation:re,SvgCircleQuestionMark:oe,SvgClose:ee},mixins:[j,W,J,Q],props:{showBulkActions:{type:Boolean,default(){return!0}},showTableFooter:{type:Boolean,default(){return!0}},showHeader:{type:Boolean,default(){return!0}},disableSource:{type:Boolean,default(){return!1}},excludeColumns:Array},data(){return{tableId:"aioseo-redirects-wp-table",queryUrls:[],deletingRow:!1,showDeleteModal:!1,shouldDeleteRow:null,changeItemsPerPageSlug:"redirects",strings:{searchUrls:this.$t.__("Search URLs",this.$tdPro),edit:this.$t.__("Edit",this.$tdPro),checkRedirect:this.$t.__("Check Redirect",this.$tdPro),delete:this.$t.__("Delete",this.$tdPro),areYouSureDeleteRedirect:this.$t.__("Are you sure you want to delete this redirect?",this.$tdPro),areYouSureDeleteRedirects:this.$t.__("Are you sure you want to delete these redirects?",this.$tdPro),actionCannotBeUndone:this.$t.__("This action cannot be undone.",this.$tdPro),yesDeleteRedirect:this.$t.__("Yes, I want to delete this redirect",this.$tdPro),yesDeleteRedirects:this.$t.__("Yes, I want to delete these redirects",this.$tdPro),noChangedMind:this.$t.__("No, I changed my mind",this.$tdPro),rules:this.$t.__("Rules",this.$tdPro),customRules:this.$t.__("Custom Rules",this.$tdPro),regex:this.$t.__("Regex",this.$tdPro),redirectTest:this.$t.__("Check redirect for",this.$tdPro),summary:this.$t.__("Summary",this.$tdPro),errors:this.$t.__("Errors",this.$tdPro),responseCode:this.$t.__("Response Code",this.$tdPro),sourceUrl:this.$t.__("Source URL",this.$tdPro),targetUrl:this.$t.__("Target URL",this.$tdPro),xRedirectBy:this.$t.__("Redirected By",this.$tdPro),customUrl:this.$t.__("Custom URL",this.$tdPro),testUrl:this.$t.__("Test Redirect",this.$tdPro),redirectResultOk:this.$t.__("Woohoo! Your redirect worked perfectly!",this.$tdPro)+" 🎉",redirectResultError:this.$t.__("Whoops! Your URL failed to redirect properly.",this.$tdPro)+" 🤔",expected:this.$t.__("Expected",this.$tdPro),result:this.$t.__("Result",this.$tdPro),regexNeedsUrl:this.$t.sprintf(this.$t.__("You are using %1$sRegex%2$s for this redirect so you will need to manually add a URL to test.",this.$tdPro),"<strong>","</strong>"),startDate:this.$t.__("Start Date",this.$tdPro),endDate:this.$t.__("End Date",this.$tdPro)},bulkOptions:[{label:this.$t.__("Enable",this.$tdPro),value:"enable"},{label:this.$t.__("Disable",this.$tdPro),value:"disable"},{label:this.$t.__("Reset Hits",this.$tdPro),value:"reset-hits"},{label:this.$t.__("Delete",this.$tdPro),value:"delete"}],customRuleInfo:null,redirectTestInfo:null,redirectTestResult:null,redirectTestLoading:!1,redirectTestUrl:""}},computed:{areYouSureDeleteRedirect(){return Array.isArray(this.shouldDeleteRow)?this.strings.areYouSureDeleteRedirects:this.strings.areYouSureDeleteRedirect},yesDeleteRedirect(){return Array.isArray(this.shouldDeleteRow)?this.strings.yesDeleteRedirects:this.strings.yesDeleteRedirect},columns(){const t=[{slug:"source_url",label:this.$t.__("Source URL",this.$tdPro),sortable:!0,sortDir:this.orderBy==="source_url"?this.orderDir:"asc",sorted:this.orderBy==="source_url"},{slug:"target_url",label:this.$t.__("Target URL",this.$tdPro),sortable:!0,sortDir:this.orderBy==="target_url"?this.orderDir:"asc",sorted:this.orderBy==="target_url"},{slug:"hits",label:this.$t.__("Hits",this.$tdPro),width:"97px",sortable:!0,sortDir:this.orderBy==="hits"?this.orderDir:"asc",sorted:this.orderBy==="hits"},{slug:"type",label:this.$t.__("Type",this.$tdPro),width:"100px",sortable:!0,sortDir:this.orderBy==="type"?this.orderDir:"asc",sorted:this.orderBy==="type"},{slug:"group",label:this.$t.__("Group",this.$tdPro),width:"150px",sortable:!0,sortDir:this.orderBy==="group"?this.orderDir:"asc",sorted:this.orderBy==="group"},{slug:"enabled",label:this.$constants.GLOBAL_STRINGS.enabled,width:"85px",sortable:!0,sortDir:this.orderBy==="enabled"?this.orderDir:"asc",sorted:this.orderBy==="enabled"},{slug:"actions",label:"",width:"40px"}];if(this.redirectsStore.options.main.method==="server"){const o=t.findIndex(c=>c.slug==="hits");o!==-1&&t.splice(o,1)}return this.excludeColumns&&this.excludeColumns.length?t.filter(o=>!this.excludeColumns.find(c=>c===o.slug)):t},additionalFilters(){return[{label:this.$t.__("Filter by Group",this.$tdPro),name:"group",options:[{label:this.$t.__("All Groups",this.$tdPro),value:"all"}].concat(this.$constants.REDIRECT_GROUPS)}]},getRows(){return this.redirectsStore.rows.map(t=>(t.target_url=t.target_url||"-",t))}},methods:{writeLabel(t,o){if(o==="role"){const c=this.rootStore.aioseo.user.roles;if(c[t])return c[t]}return this.$constants.REDIRECTS_CUSTOM_RULES_LABELS[t]||t},toggleInput(t,o){this.wpTableLoading=!0,this.redirectsStore.bulk({action:o?"disable":"enable",rowIds:[t.id]}).then(()=>this.processFetchTableData()).then(()=>this.wpTableLoading=!1).then(()=>window.aioseoBus.$emit("redirect-updated"))},processBulkAction({action:t,selectedRows:o}){if(o.length){if(t==="delete"){this.shouldDeleteRow=o,this.showDeleteModal=!0;return}this.wpTableLoading=!0,this.redirectsStore.bulk({action:t,rowIds:o}).then(()=>this.processFetchTableData()).then(()=>this.wpTableLoading=!1).then(()=>window.aioseoBus.$emit("redirect-updated"))}},getColumnLabel(t){return t===0?this.$t.__("Pass through",this.$tdPro):t},maybeDeleteRow(t){const o=this.redirectsStore.rows.find((c,m)=>m===t);o&&(this.showDeleteModal=!0,this.shouldDeleteRow=[o.id])},processDeleteRow(){return this.deletingRow=!0,this.redirectsStore.bulk({action:"delete",rowIds:this.shouldDeleteRow}).then(()=>{var t,o;this.deletingRow=!1,this.showDeleteModal=!1,this.shouldDeleteRow=null,this.refreshTable(),(o=(t=this.$refs)==null?void 0:t.table)==null||o.editRow(null)}).then(()=>window.aioseoBus.$emit("redirect-updated"))},isObject(t){return typeof t=="object"},showRedirectTest(t){this.redirectTestResult=null,this.redirectTestUrl=t.regex?"":t.source_url,t.regex||this.redirectTest(t.id),this.redirectTestInfo=t},redirectTest(t){this.redirectTestLoading=!0,this.redirectTestResult=null,this.redirectsStore.test({id:t,payload:{sourceUrl:this.redirectTestUrl}}).then(o=>{this.redirectTestLoading=!1,this.redirectTestResult=o.body}).catch(()=>{this.redirectTestLoading=!1})},customUrlDescription(t){const o=B(t.source_url.replace(this.rootStore.aioseo.urls.mainSiteUrl,""));return this.$t.sprintf(this.$t.__("You can test redirects with a URL that includes your domain name ( %1$s ) or just the path ( %2$s )",this.$tdPro),this.rootStore.aioseo.urls.mainSiteUrl+o,o)},addedRedirectRefresh(){this.orderBy=null,this.orderDir="asc",this.refreshTable()},sanitizeString:B},mounted(){window.aioseoBus.$on("added-redirect",this.addedRedirectRefresh),this.redirectsStore.lateRefresh.redirects&&(this.refreshTable(),this.redirectsStore.setLateRefresh({value:!1,type:"redirects"}))},beforeUnmount(){window.aioseoBus.$off("added-redirect",this.addedRedirectRefresh)}},me={class:"aioseo-redirects-table"},Re=["onClick"],be={class:"row-actions"},ye={class:"edit"},fe=["onClick"],Ce={key:0,class:"test"},Se=["onClick"],Te={class:"trash"},ke=["onClick"],ve={style:{"text-align":"right"}},Pe={key:0},we={class:"aioseo-modal-body"},De=["innerHTML"],$e={class:"aioseo-modal-body"},Ue={class:"custom-rules-table"},Le={class:"left-column"},Be={key:0,class:"regex"},Ae={key:0,class:"right-column"},Ee={key:0,class:"column-schedule"},Ie={key:0},Me={key:1},xe={key:1},Fe={key:1,class:"right-column"},Oe={key:2,class:"right-column"},Ye={class:"only-one-child"},He={class:"title"},Ne={class:"source"},qe={class:"aioseo-modal-body"},Ge={class:"custom-url"},Ve=["innerHTML"],ze={class:"label"},Je={class:"custom-url-input"},je={key:0,class:"redirect-results"},We={class:"result"},Qe={class:"summary"},Ke={class:"label"},Xe={"aria-label":"Redirect Check Results",class:"redirects-options-table small"},Ze=r("td",null,null,-1),et={class:"even"},tt={key:0},st={key:1,class:"even"},rt=r("td",null,"AIOSEO",-1),ot={key:0,class:"errors"},it={class:"label"},lt=["innerHTML"];function nt(t,o,c,m,e,u){const R=_("base-toggle"),b=_("core-add-redirection"),f=_("svg-circle-information"),T=_("core-tooltip"),F=_("core-wp-table"),O=_("svg-close"),w=_("base-button"),D=_("core-modal"),k=_("core-alert"),Y=_("svg-circle-question-mark"),H=_("base-input"),N=_("svg-circle-check"),q=_("svg-circle-close");return n(),a("div",me,[(n(),y(F,{ref:"table",id:e.tableId,"additional-filters":u.additionalFilters,"bulk-options":e.bulkOptions,columns:u.columns,filters:m.redirectsStore.filters,"initial-items-per-page":m.settingsStore.settings.tablePagination.redirects,"initial-page-number":t.pageNumber,"initial-search-term":t.searchTerm,key:t.wpTableKey,loading:t.wpTableLoading,rows:u.getRows,"search-label":e.strings.searchUrls,"selected-filters":m.redirectsStore.selectedFilters,"show-bulk-actions":c.showBulkActions,"show-header":c.showHeader,"show-table-footer":c.showTableFooter,totals:m.redirectsStore.totals.main,"show-items-per-page":"",onFilterTable:t.processFilterTable,onPaginate:t.processPagination,onProcessAdditionalFilters:t.processAdditionalFilters,onProcessBulkAction:u.processBulkAction,onProcessChangeItemsPerPage:t.processChangeItemsPerPage,onSearch:t.processSearch,onSortColumn:t.processSort},{source_url:l(({row:s,index:p,column:C,editRow:v})=>[r("strong",null,[r("a",{class:"edit-link",href:"#",onClick:S($=>v(p),["prevent"])},i(C),9,Re)]),r("div",be,[r("span",ye,[r("a",{href:"#",onClick:S($=>v(p),["prevent"])},i(e.strings.edit),9,fe),h(" | ")]),s.enabled&&!t.redirectHasUnPublishedPost(s)?(n(),a("span",Ce,[r("a",{href:"#",onClick:S($=>u.showRedirectTest(s),["prevent"])},i(e.strings.checkRedirect),9,Se),h(" | ")])):g("",!0),r("span",Te,[r("a",{class:"submitdelete",href:"#",onClick:S($=>u.maybeDeleteRow(p),["prevent"])},i(e.strings.delete),9,ke)])])]),target_url:l(({row:s})=>[h(i(400<=s.type?"-":s.target_url),1)]),type:l(({column:s})=>[h(i(u.getColumnLabel(s)),1)]),group:l(({row:s})=>[h(i(s.groupName),1)]),enabled:l(({column:s,row:p})=>[r("div",ve,[d(R,{modelValue:s,"onUpdate:modelValue":C=>u.toggleInput(p,s)},null,8,["modelValue","onUpdate:modelValue"])])]),"edit-row":l(({row:s,editRow:p})=>[d(b,{edit:"",onCancel:C=>p(null),onAddedRedirect:C=>p(null),url:{id:s.id,url:s.source_url,regex:s.regex,ignoreSlash:s.ignore_slash,ignoreCase:s.ignore_case,showOptions:!0,errors:[],warnings:[]},target:s.target_url,type:s.type,query:s.query_param,rules:s.custom_rules,disableSource:c.disableSource,"post-id":s.post_id,"post-status":s.postStatus},null,8,["onCancel","onAddedRedirect","url","target","type","query","rules","disableSource","post-id","post-status"])]),actions:l(({row:s})=>[s.custom_rules&&0<s.custom_rules.length?(n(),a("span",Pe,[d(T,{type:"action"},{tooltip:l(()=>[h(i(e.strings.rules),1)]),default:l(()=>[d(f,{class:"log-info",onClick:p=>this.customRuleInfo=s.custom_rules},null,8,["onClick"])]),_:2},1024)])):g("",!0)]),_:1},8,["id","additional-filters","bulk-options","columns","filters","initial-items-per-page","initial-page-number","initial-search-term","loading","rows","search-label","selected-filters","show-bulk-actions","show-header","show-table-footer","totals","onFilterTable","onPaginate","onProcessAdditionalFilters","onProcessBulkAction","onProcessChangeItemsPerPage","onSearch","onSortColumn"])),d(D,{show:e.showDeleteModal,classes:["aioseo-redirects-test-modal","aioseo-redirects","delete-redirect"],"no-header":"",onClose:o[3]||(o[3]=s=>e.showDeleteModal=!1)},{body:l(()=>[r("div",we,[r("button",{class:"close",onClick:o[1]||(o[1]=S(s=>e.showDeleteModal=!1,["stop"]))},[d(O,{onClick:o[0]||(o[0]=s=>e.showDeleteModal=!1)})]),r("h3",null,i(u.areYouSureDeleteRedirect),1),r("div",{class:"reset-description",innerHTML:e.strings.actionCannotBeUndone},null,8,De),d(w,{type:"blue",size:"medium",onClick:u.processDeleteRow,loading:e.deletingRow},{default:l(()=>[h(i(u.yesDeleteRedirect),1)]),_:1},8,["onClick","loading"]),d(w,{type:"gray",size:"medium",onClick:o[2]||(o[2]=s=>e.showDeleteModal=!1)},{default:l(()=>[h(i(e.strings.noChangedMind),1)]),_:1})])]),_:1},8,["show"]),d(D,{show:e.customRuleInfo,classes:["aioseo-redirects","custom-rule-info"],onClose:o[4]||(o[4]=s=>e.customRuleInfo=null)},{headerTitle:l(()=>[h(i(e.strings.customRules),1)]),body:l(()=>[r("div",$e,[r("table",Ue,[(n(!0),a(U,null,L(e.customRuleInfo,(s,p)=>(n(),a("tr",{key:p},[r("td",Le,[h(i(t.$constants.REDIRECTS_CUSTOM_RULES_LABELS[s.type])+" ",1),s.regex?(n(),a("div",Be,[d(R,{modelValue:s.regex,disabled:!0},{default:l(()=>[h(i(e.strings.regex),1)]),_:2},1032,["modelValue"])])):g("",!0)]),typeof s.value!="object"&&!s.key?(n(),a("td",Ae,[s.type==="schedule"?(n(),a("span",Ee,[s.scheduleStart?(n(),a("p",Ie,[r("strong",null,i(e.strings.startDate)+":",1),h(" "+i(t.dateJsToLocal(t.dateStringToLocalJs(s.scheduleStart),"MMMM d, yyyy h:mm a")),1)])):g("",!0),s.scheduleEnd?(n(),a("p",Me,[r("strong",null,i(e.strings.endDate)+":",1),h(" "+i(t.dateJsToLocal(t.dateStringToLocalJs(s.scheduleEnd),"MMMM d, yyyy h:mm a")),1)])):g("",!0)])):g("",!0),s.value?(n(),a("span",xe,i(t.$constants.REDIRECTS_CUSTOM_RULES_LABELS[s.value]||s.value),1)):g("",!0)])):g("",!0),u.isObject(s.value)?(n(),a("td",Fe,[r("ul",null,[(n(!0),a(U,null,L(s.value,(C,v)=>(n(),a("li",{key:v},i(u.writeLabel(C,s.type)),1))),128))])])):g("",!0),s.key?(n(),a("td",Oe,[r("ul",Ye,[r("li",null,[r("strong",null,i(s.key)+":",1),h(" "+i(s.value),1)])])])):g("",!0)]))),128))])])]),_:1},8,["show"]),d(D,{show:!!e.redirectTestInfo,classes:["aioseo-redirects-test-modal","aioseo-redirects","redirect-test"],onClose:o[7]||(o[7]=s=>e.redirectTestInfo=null),"allow-overflow":""},{headerTitle:l(()=>[r("div",He,i(e.strings.redirectTest)+":",1),d(T,null,{tooltip:l(()=>[r("div",null,i(u.sanitizeString(e.redirectTestInfo.source_url)),1)]),default:l(()=>[r("div",Ne,i(u.sanitizeString(e.redirectTestInfo.source_url)),1)]),_:1})]),body:l(()=>[r("div",qe,[r("div",Ge,[e.redirectTestInfo.regex?(n(),y(k,{key:0,type:"blue",size:"medium",class:"alert-regex"},{default:l(()=>[d(f),r("span",{innerHTML:e.strings.regexNeedsUrl},null,8,Ve)]),_:1})):g("",!0),r("div",ze,[h(i(e.strings.customUrl)+" ",1),d(T,{placement:"right"},{tooltip:l(()=>[h(i(u.customUrlDescription(e.redirectTestInfo)),1)]),default:l(()=>[d(Y)]),_:1})]),r("div",Je,[d(H,{size:"medium",modelValue:e.redirectTestUrl,"onUpdate:modelValue":o[5]||(o[5]=s=>e.redirectTestUrl=s),disabled:e.redirectTestLoading},null,8,["modelValue","disabled"]),d(w,{type:"green",size:"medium",loading:e.redirectTestLoading,onClick:o[6]||(o[6]=S(s=>u.redirectTest(e.redirectTestInfo.id),["prevent"]))},{default:l(()=>[h(i(e.strings.testUrl),1)]),_:1},8,["loading"])])]),e.redirectTestResult?(n(),a("div",je,[r("div",We,[e.redirectTestResult.errors.length===0?(n(),y(k,{key:0,type:"green",size:"medium"},{default:l(()=>[d(N),h(" "+i(e.strings.redirectResultOk),1)]),_:1})):g("",!0),0<e.redirectTestResult.errors.length?(n(),y(k,{key:1,type:"red",size:"medium"},{default:l(()=>[d(q),h(" "+i(e.strings.redirectResultError),1)]),_:1})):g("",!0)]),r("div",Qe,[r("div",Ke,i(e.strings.summary),1),r("table",Xe,[r("thead",null,[r("tr",null,[Ze,r("td",null,i(e.strings.expected),1),r("td",null,i(e.strings.result),1)])]),r("tbody",null,[r("tr",et,[r("td",null,i(e.strings.responseCode)+":",1),r("td",null,i(e.redirectTestInfo.type===0?200:e.redirectTestInfo.type),1),r("td",null,i(e.redirectTestResult.redirect.responseCode),1)]),e.redirectTestResult.redirect.location?(n(),a("tr",tt,[r("td",null,i(e.strings.targetUrl)+":",1),r("td",null,i(e.redirectTestResult.redirect.targetUrl),1),r("td",null,i(e.redirectTestResult.redirect.location),1)])):g("",!0),e.redirectTestResult.redirect.xRedirectBy?(n(),a("tr",st,[r("td",null,i(e.strings.xRedirectBy)+":",1),rt,r("td",null,i(e.redirectTestResult.redirect.xRedirectBy),1)])):g("",!0)])])]),0<e.redirectTestResult.errors.length?(n(),a("div",ot,[r("div",it,i(e.strings.errors),1),d(k,{type:"red",size:"medium"},{default:l(()=>[r("ul",null,[(n(!0),a(U,null,L(e.redirectTestResult.errors,(s,p)=>(n(),a("li",{key:p},[r("span",{innerHTML:s},null,8,lt)]))),128))])]),_:1})])):g("",!0)])):g("",!0)])]),_:1},8,["show"])])}const Et=P(pe,[["render",nt]]),dt={components:{CoreAddRedirection:E,CoreBlur:ue,CoreCard:he,CoreWpTable:I},props:{noCoreCard:Boolean},data(){return{REDIRECT_TYPES:ne,REDIRECT_QUERY_PARAMS:de,strings:{addNewRedirection:this.$t.__("Add New Redirection",this.$td),searchUrls:this.$t.__("Search URLs",this.$td)},bulkOptions:[{label:"",value:""}]}},computed:{columns(){return[{slug:"source_url",label:this.$t.__("Source URL",this.$td)},{slug:"target_url",label:this.$t.__("Target URL",this.$td)},{slug:"hits",label:this.$t.__("Hits",this.$td),width:"97px"},{slug:"type",label:this.$t.__("Type",this.$td),width:"100px"},{slug:"group",label:this.$t.__("Group",this.$td),width:"150px"},{slug:"enabled",label:ce.enabled,width:"80px"}]},additionalFilters(){return[{label:this.$t.__("Filter by Group",this.$td),name:"group",options:[{label:this.$t.__("All Groups",this.$td),value:"all"}].concat(ae)}]}}},ct={class:"aioseo-redirects-blur"};function at(t,o,c,m,e,u){const R=_("core-add-redirection"),b=_("core-blur"),f=_("core-card"),T=_("core-wp-table");return n(),a("div",ct,[c.noCoreCard?g("",!0):(n(),y(f,{key:0,slug:"addNewRedirection","header-text":e.strings.addNewRedirection,noSlide:!0},{default:l(()=>[d(b,null,{default:l(()=>[d(R,{type:e.REDIRECT_TYPES[0].value,query:e.REDIRECT_QUERY_PARAMS[0].value,slash:!0,case:!0},null,8,["type","query"])]),_:1})]),_:1},8,["header-text"])),c.noCoreCard?(n(),y(b,{key:1},{default:l(()=>[d(R,{type:e.REDIRECT_TYPES[0].value,query:e.REDIRECT_QUERY_PARAMS[0].value,slash:!0,case:!0},null,8,["type","query"])]),_:1})):g("",!0),d(b,null,{default:l(()=>[d(T,{filters:[],totals:{total:0,pages:0,page:1},columns:u.columns,rows:[],"search-label":e.strings.searchUrls,"bulk-options":e.bulkOptions,"additional-filters":u.additionalFilters},null,8,["columns","search-label","bulk-options","additional-filters"])]),_:1})])}const x=P(dt,[["render",at]]),ut={setup(){return{redirectsStore:A()}},mixins:[le],components:{Blur:x},props:{noCoreCard:Boolean},data(){return{addonSlug:"aioseo-redirects",strings:{ctaHeader:this.$t.__("Enable Redirects on Your Site",this.$tdPro),serverRedirects:this.$t.__("Fast Server Redirects",this.$tdPro),automaticRedirects:this.$t.__("Automatic Redirects",this.$tdPro),redirectMonitoring:this.$t.__("Redirect Monitoring",this.$tdPro),monitoring404:this.$t.__("404 Monitoring",this.$tdPro),fullSiteRedirects:this.$t.__("Full Site Redirects",this.$tdPro),siteAliases:this.$t.__("Site Aliases",this.$tdPro),ctaDescription:this.$t.__("Our Redirection Manager lets you easily create and manage redirects for broken links to avoid confusing search engines and users and prevents losing backlinks.",this.$tdPro)}}},computed:{ctaButtonText(){return this.shouldShowUpdate?this.$t.__("Update Redirects",this.$tdPro):this.$t.__("Activate Redirects",this.$tdPro)}}};function ht(t,o,c,m,e,u){const R=_("blur");return n(),a("div",{class:M({"aioseo-redirects":!0,"core-card":!c.noCoreCard})},[d(R,{noCoreCard:c.noCoreCard},null,8,["noCoreCard"]),(n(),y(ie(t.ctaComponent),{"addon-slug":e.addonSlug,"cta-header":e.strings.ctaHeader,"cta-description":e.strings.ctaDescription,"cta-button-text":u.ctaButtonText,"learn-more-link":t.$links.getDocUrl("redirects"),"feature-list":[e.strings.serverRedirects,e.strings.automaticRedirects,e.strings.redirectMonitoring,e.strings.monitoring404,e.strings.fullSiteRedirects,e.strings.siteAliases],"post-activation-promises":[m.redirectsStore.getRedirectOptions],onAddonActivated:o[0]||(o[0]=b=>m.redirectsStore.setLateRefresh({value:!0}))},null,40,["addon-slug","cta-header","cta-description","cta-button-text","learn-more-link","feature-list","post-activation-promises"]))],2)}const It=P(ut,[["render",ht]]),_t={setup(){return{licenseStore:z()}},components:{Blur:x,Cta:_e,RequiredPlans:ge},props:{noCoreCard:Boolean,parentComponentContext:String},data(){return{strings:{ctaButtonText:this.$t.__("Unlock Redirects",this.$td),ctaHeader:this.$t.sprintf(this.$t.__("Redirects is a %1$s Feature",this.$td),"PRO"),serverRedirects:this.$t.__("Fast Server Redirects",this.$td),automaticRedirects:this.$t.__("Automatic Redirects",this.$td),redirectMonitoring:this.$t.__("Redirect Monitoring",this.$td),monitoring404:this.$t.__("404 Monitoring",this.$td),fullSiteRedirects:this.$t.__("Full Site Redirects",this.$td),siteAliases:this.$t.__("Site Aliases",this.$td),redirectsDescription:this.$t.__("Our Redirection Manager lets you easily create and manage redirects for broken links to avoid confusing search engines and users and prevents losing backlinks.",this.$td)}}}};function gt(t,o,c,m,e,u){const R=_("blur"),b=_("required-plans"),f=_("cta");return n(),a("div",{class:M({"aioseo-redirects":!0,"core-card":!c.noCoreCard})},[d(R,{noCoreCard:c.noCoreCard},null,8,["noCoreCard"]),d(f,{"cta-link":t.$links.getPricingUrl("redirects","redirects-upsell",c.parentComponentContext?c.parentComponentContext:null),"button-text":e.strings.ctaButtonText,"learn-more-link":t.$links.getUpsellUrl("redirects",c.parentComponentContext?c.parentComponentContext:null,t.$isPro?"pricing":"liteUpgrade"),"feature-list":[e.strings.serverRedirects,e.strings.automaticRedirects,e.strings.redirectMonitoring,e.strings.monitoring404,e.strings.fullSiteRedirects,e.strings.siteAliases],"hide-bonus":!m.licenseStore.isUnlicensed},{"header-text":l(()=>[h(i(e.strings.ctaHeader),1)]),description:l(()=>[d(b,{addon:"aioseo-redirects"}),h(" "+i(e.strings.redirectsDescription),1)]),_:1},8,["cta-link","button-text","learn-more-link","feature-list","hide-bonus"])],2)}const Mt=P(_t,[["render",gt]]);export{It as C,Mt as L,Et as R};
