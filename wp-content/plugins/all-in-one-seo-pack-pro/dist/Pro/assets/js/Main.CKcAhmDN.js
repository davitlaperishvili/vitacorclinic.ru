import{c as v,u as B,D as O,x as N,b as V}from"./links.BtZm82fD.js";import I from"./BadBotBlocker.CzxAhO4X.js";import{C as U}from"./Index.DV-CGyz-.js";import E from"./DatabaseTools.BfTSZZ9l.js";import{C as R,S as Y}from"./Caret.Ke5gylGO.js";import{C as H}from"./Card.CHgb8IZx.js";import{C as K}from"./Tabs.BdJDuw_m.js";import{C as z}from"./Index.ChPpw0uH.js";import{C as P}from"./NetworkSiteSelector.CE_PeR-n.js";import{C as F}from"./SettingsRow.BwYvQArk.js";import{B as G}from"./Checkbox.CmdF-nFt.js";import{G as W,a as q}from"./Row.DRnp1mVs.js";import{_ as w}from"./_plugin-vue_export-helper.BN1snXvA.js";import{v as l,o as n,c as h,B as p,l as u,F as T,J as M,k as g,C as A,t as m,a as c,b as k,q as C,E as J}from"./runtime-dom.esm-bundler.tPRhSV4q.js";import j from"./HtaccessEditor.Bn_Eu9wl.js";import Q from"./ImportExport.DtNATSL4.js";import X from"./RobotsEditor.BhCmR3Wt.js";import Z from"./SystemStatus.Bwk8Is9u.js";import ee from"./WpCode.Dy0zgrXq.js";import"./default-i18n.DXRQgkn2.js";import"./helpers.DWk2T5bC.js";import"./Textarea.BItFOv10.js";import"./Tooltip.DhkkBQWW.js";import"./index.Dbgw3oZ8.js";import"./Slide.fjAuzpC8.js";import"./license.DHbLXBun.js";import"./upperFirst.7wc0xztY.js";import"./_stringToArray.DnK4tKcY.js";import"./toString.Cp__a8QI.js";import"./allowed.BpIEUKoe.js";import"./deburr.B1yvcqMY.js";/* empty css             */import"./params.B3T1WKlC.js";import"./Ellipse.BPggUP-m.js";import"./Header.DU0X2Pi2.js";import"./addons.BL-b166P.js";import"./ScrollAndHighlight.BOx4qI47.js";import"./LicenseKeyBar.Ddr3Ewd2.js";import"./LogoGear.BbumEdXr.js";import"./AnimatedNumber.DeYVxHDv.js";import"./numbers.BT5e8rgb.js";import"./Logo.bX-u9KVJ.js";import"./Support.DcbjlfoT.js";import"./Url.CLExatqF.js";import"./Date.BoN5NRW1.js";import"./constants.CPpKID74.js";import"./Exclamation.DGJubTNT.js";import"./Gear.DwDaVskn.js";import"./Network.BxgZODxy.js";import"./ToolsSettings.eCPnt5tm.js";import"./Checkmark.DOG99yeO.js";import"./Blur.CvHKqkVq.js";import"./Index.Cf5ujj4F.js";import"./RequiredPlans.D_JN9Itl.js";import"./TruSeoScore.DmC22Awy.js";import"./Information.Bv8uKEyF.js";import"./Editor.XMzmLnz3.js";import"./isEqual.BUN2xwmw.js";import"./_baseIsEqual.DygU02n1.js";import"./_getTag.BDw1xlYp.js";import"./_baseClone.CV-8PC-R.js";import"./_arrayEach.Fgt6pfHj.js";import"./_getAllKeysIn.fN8NwDhg.js";import"./Plus.CG1QxokA.js";import"./History.i7exwSoE.js";import"./Refresh.DRpUll-o.js";import"./Upload.BXrL25GW.js";import"./Download.CmT4-Qbo.js";import"./Drag.BGg_sY81.js";import"./External.BnlDuPIp.js";import"./Row.ClzcKm5C.js";const te={setup(){return{rootStore:v()}},emits:["update"],components:{BaseCheckbox:G,GridColumn:W,GridRow:q},props:{loading:Boolean,disabled:Boolean},data(){return{options:{},strings:{updateOptions:this.$t.__("Update Options",this.$td)}}},mounted(){this.rootStore.aioseo.deprecatedOptions.forEach(e=>{e.enabled&&(this.options[e.value]=!0)})}},oe={class:"aioseo-deprecated-options"},se=c("br",null,null,-1),ie=c("br",null,null,-1),ne=c("br",null,null,-1);function re(e,o,s,r,t,a){const d=l("base-checkbox"),f=l("grid-column"),S=l("grid-row"),b=l("base-button");return n(),h("div",oe,[p(S,{class:"settings"},{default:u(()=>[(n(!0),h(T,null,M(r.rootStore.aioseo.deprecatedOptions,(_,y)=>(n(),g(f,{key:y,xl:"6",sm:"12"},{default:u(()=>[p(d,{size:"medium",modelValue:t.options[_.value],"onUpdate:modelValue":D=>t.options[_.value]=D,disabled:s.disabled},{default:u(()=>[A(m(_.label),1)]),_:2},1032,["modelValue","onUpdate:modelValue","disabled"])]),_:2},1024))),128))]),_:1}),se,p(b,{type:"blue",size:"medium",onClick:o[0]||(o[0]=_=>e.$emit("update",t.options)),loading:s.loading,disabled:s.disabled},{default:u(()=>[A(m(t.strings.updateOptions),1)]),_:1},8,["loading","disabled"]),ie,ne])}const ae=w(te,[["render",re]]),le={setup(){return{optionsStore:B()}},computed:{infoItems(){return[{label:"Migrated Version",value:this.optionsStore.internalOptions.internal.migratedVersion},{label:"First Activated",value:this.optionsStore.internalOptions.internal.firstActivated!==0?O.fromMillis(this.optionsStore.internalOptions.internal.firstActivated*1e3).toFormat("MMMM d, yyyy"):!1}]}}},ce={class:"v3-migration-info aioseo-description"},de={class:"info-items"},ue={key:0},pe={key:1};function me(e,o,s,r,t,a){return n(),h("div",ce,[c("ul",de,[(n(!0),h(T,null,M(a.infoItems,(d,f)=>(n(),h("li",{key:f},[d.value?(n(),h("span",ue,m(d.label),1)):k("",!0),d.value?(n(),h("span",pe,m(d.value),1)):k("",!0)]))),128))])])}const he=w(le,[["render",me]]),ge={setup(){return{rootStore:v(),toolsStore:N()}},components:{CoreAlert:R,CoreCard:H,CoreMainTabs:K,CoreModal:z,CoreNetworkSiteSelector:P,CoreSettingsRow:F,DeprecatedOptions:ae,MigrationInfo:he,SvgClose:Y},props:{extraActions:{type:Array,required:!1}},data(){return{site:{},tabsKey:0,doingActionKey:0,activeTab:"general",currentAction:"",showAreYouSureModal:!1,doingAction:[],strings:{selectSite:"Select Site",cardLabel:"Debug",selectLabel:"Select a Debug Action:",buttonLabel:"Run Action",alertWarning:"Before you run any action, please make sure that you have fully read the description and understand the consequences as these cannot be reverted.",cannotBeUndone:"This action cannot be undone.",yesDoAction:"Yes, run this action",noChangedMind:"No, I changed my mind"},alertLink:this.$links.getPlainLink("Click here to open to the Scheduled Actions panel",this.rootStore.aioseo.urls.admin.scheduledActions,!0)}},computed:{areYouSureTitle(){return`Are you sure you want to run the "${this.currentAction.label}" action?`},tabs(){const e=this.$t.sprintf('<a href="%1$s" target="_blank">Scheduled Actions</a>',this.rootStore.aioseo.urls.admin.scheduledActions),o=this.rootStore.aioseo.data.isNetworkAdmin?"<br><strong>NOTE: If no site is selected, this will clear the network cache.</strong>":"",s=this.rootStore.aioseo.data.isNetworkAdmin?"<br><strong>NOTE: If no site is selected, this will clear the network plugin updates transient.</strong>":"";return[{slug:"general",name:"General",actions:[{label:"Clear Cache",slug:"clear-cache",shortDescription:`This action deletes all records of the <code>aioseo_cache</code> table in the database.${o}`,longDescription:"",showModal:!1,network:!0},{label:"Clear Plugin Updates Transient",slug:"clear-plugin-updates-transient",shortDescription:`This action clears the plugin updates transient, which forces WordPress Core to check for plugin updates.${s}`,longDescription:"",showModal:!1,network:!0},{label:"Readd Capabilities",slug:"readd-capabilities",shortDescription:"This action will readd our capabilities (access permissions) for all users.",longDescription:"",showModal:!1},{label:"Reset Data",slug:"reset-data",shortDescription:"This action will <strong>delete</strong> all our custom tables and options.",longDescription:"",showModal:!0}]},{slug:"sitemap",name:"Sitemap",actions:[{label:"Clear Image Data",slug:"clear-image-data",shortDescription:"This action removes all image data from the database, forcing a site-wide rescan via Action Scheduler.",longDescription:this.$t.sprintf("To speed up the image scan, go to %1$s and run the <code>aioseo_image_sitemap_scan</code> action.",e),showModal:!1}]},{slug:"migrations",name:"Migrations",actions:[{label:"Rerun V4+ Migrations",slug:"rerun-migrations",shortDescription:"This action will rerun all update migrations since 4.0.0, excluding the V3 migration.",longDescription:"",showModal:!0}]},{slug:"old-issues",name:"Old Issues",actions:[{label:"Remove Duplicates",slug:"remove-duplicates",shortDescription:"This action will delete any duplicate records that are found in the <code>aioseo_posts</code> and <code>aioseo_terms</code> tables.",longDescription:"",showModal:!1},{label:"Unescape Data",slug:"unescape-data",shortDescription:"This action will clean <code>aioseo_posts</code> and <code>aioseo_term</code> records whose data is corrupted.",longDescription:this.$t.sprintf("The action will trigger a routine which runs in batches via Action Scheduler. It may take some time for this routine to complete, To speed up this process, go to %1$s and run the <code>aioseo_unslash_escaped_data_posts</code> or <code>aioseo_unslash_escaped_data_terms</code> action.",e),showModal:!1}]},{slug:"deprecated-options",name:"Deprecated Options",actions:[{label:"Deprecated Options",slug:"deprecated-options",shortDescription:"Enable or disable any options that have been deprecated in AIOSEO.",longDescription:"<strong>These options are not guaranteed to work and all support has been dropped.</strong>",showModal:!1,component:"deprecated-options"}]}]},activeTabObject(){return this.tabs.find(e=>e.slug===this.activeTab)}},methods:{isActionDisabled(e){return this.rootStore.aioseo.data.isNetworkAdmin?this.site.blog_id?this.site.blog_id==="network"&&e.network?!1:this.site.blog_id==="network"&&!e.network:!0:!1},isLoading(e){return!!this.doingAction[e.slug]},getSelectedActionObject(e){let o=null;return this.actions.forEach(s=>{const r=s.options.find(t=>t.value===e);r&&(o=r)}),o},maybeDoAction(e,o){if(this.currentAction=e,e.showModal){this.showAreYouSureModal=!0;return}this.doAction(o)},doAction(e){this.doingAction[this.currentAction.slug]=!0,this.showAreYouSureModal=!1,this.doingActionKey++,this.toolsStore.doTask({action:this.currentAction.slug,siteId:this.site.blog_id||this.rootStore.aioseo.data.currentBlogId,data:e}).then(()=>{console.log(`Action "${this.currentAction.label}" has been completed.`)}).catch(o=>{console.error(`Action "${this.currentAction.label}" could not be completed: `,o)}).finally(()=>{this.doingAction[this.currentAction.slug]=!1,this.doingActionKey++})}},beforeMount(){var o;let e=-1;if(this.rootStore.aioseo.data.v3Options&&(e=this.tabs.findIndex(s=>s.slug.toLowerCase()==="migrations"),e!==-1)){const s=this.$t.sprintf('<a href="%1$s" target="_blank">Scheduled Actions</a>',this.rootStore.aioseo.urls.admin.scheduledActions);this.tabs[e].actions.push({label:"Rerun V3 Migration",slug:"restart-v3-migration",shortDescription:"This action restarts the migration from V3 to V4.",longDescription:this.$t.sprintf("All settings will be migrated immediately. However, the post/term meta needs to be migrated via a routine which runs in batches via Action Scheduler. To speed up the post/term meta migration, go to %1$s and run the <code>aioseo_migrate_post_meta</code> or <code>aioseo_migrate_term_meta</code> action.",s),infoComponent:"MigrationInfo",showModal:!0})}(o=this.extraActions)!=null&&o.length&&this.extraActions.forEach(s=>{if(e=this.tabs.findIndex(r=>r.slug.toLowerCase()===s.slug.toLowerCase()),e!==-1){this.tabs[e].actions=this.tabs[e].actions.concat(s.actions);return}this.tabs.push(s)})}},_e={class:"aioseo-tools-debug"},fe={key:0,class:"aioseo-settings-row"},be={class:"select-site"},Ae=["innerHTML"],we=["innerHTML"],ke=["innerHTML"],ve={class:"aioseo-modal-body"},Se=["innerHTML"];function ye(e,o,s,r,t,a){const d=l("core-network-site-selector"),f=l("core-alert"),S=l("core-main-tabs"),b=l("base-button"),_=l("core-settings-row"),y=l("svg-close"),D=l("core-modal"),x=l("core-card");return n(),h("div",_e,[p(x,{slug:"debug","header-text":t.strings.cardLabel},{default:u(()=>[r.rootStore.aioseo.data.isNetworkAdmin?(n(),h("div",fe,[c("div",be,m(t.strings.selectSite),1),p(d,{onSelectedSite:o[0]||(o[0]=i=>t.site=i),"show-network":""})])):k("",!0),p(f,{type:"yellow"},{default:u(()=>[c("div",null,m(t.strings.alertWarning),1),c("div",{innerHTML:t.alertLink},null,8,Ae)]),_:1}),(n(),g(S,{internal:"",key:t.tabsKey,tabs:a.tabs,active:t.activeTab,showSaveButton:!1,onChanged:o[1]||(o[1]=i=>t.activeTab=i)},null,8,["tabs","active"])),(n(!0),h(T,null,M(a.activeTabObject.actions,(i,L)=>(n(),g(_,{key:t.activeTab+L,name:i.label,align:""},{content:u(()=>[i.component?(n(),g(C(i.component),{key:0,onUpdate:$=>a.maybeDoAction(i,$),loading:t.doingAction[i.slug],disabled:a.isActionDisabled(i)},null,40,["onUpdate","loading","disabled"])):(n(),g(b,{type:"blue",size:"medium",onClick:$=>a.maybeDoAction(i),loading:t.doingAction[i.slug],key:t.doingActionKey,disabled:a.isActionDisabled(i)},{default:u(()=>[A(m(t.strings.buttonLabel),1)]),_:2},1032,["onClick","loading","disabled"])),c("div",{class:"aioseo-description",innerHTML:i.shortDescription},null,8,we),c("div",{class:"aioseo-description",innerHTML:i.longDescription},null,8,ke),i.infoComponent?(n(),g(C(i.infoComponent),{key:2})):k("",!0)]),_:2},1032,["name"]))),128)),p(D,{show:t.showAreYouSureModal,"no-header":"",onClose:o[5]||(o[5]=i=>t.showAreYouSureModal=!1),classes:["aioseo-debug-modal"]},{body:u(()=>[c("div",ve,[c("button",{class:"close",onClick:o[3]||(o[3]=J(i=>t.showAreYouSureModal=!1,["stop"]))},[p(y,{onClick:o[2]||(o[2]=i=>t.showAreYouSureModal=!1)})]),c("h3",null,m(a.areYouSureTitle),1),c("div",{class:"description",innerHTML:t.strings.cannotBeUndone},null,8,Se),p(b,{type:"blue",size:"medium",onClick:a.doAction},{default:u(()=>[A(m(t.strings.yesDoAction),1)]),_:1},8,["onClick"]),p(b,{type:"gray",size:"medium",onClick:o[4]||(o[4]=i=>t.showAreYouSureModal=!1)},{default:u(()=>[A(m(t.strings.noChangedMind),1)]),_:1})])]),_:1},8,["show"])]),_:1},8,["header-text"])])}const De=w(ge,[["render",ye]]),Ce={setup(){return{addonsStore:V(),rootStore:v()}},components:{Debug:De},computed:{extraActions(){const e=this.$t.sprintf('<a href="%1$s" target="_blank">Scheduled Actions</a>',this.rootStore.aioseo.urls.admin.scheduledActions),o=this.addonsStore.addons.find(t=>t.sku==="aioseo-video-sitemap"),s=this.addonsStore.addons.find(t=>t.sku==="aioseo-link-assistant"),r=[];return o.isActive&&r.push({slug:"sitemap",actions:[{label:"Clear Video Data",slug:"clear-video-data",shortDescription:"This action removes all video data from the database, forcing a site-wide rescan via Action Scheduler.",longDescription:this.$t.sprintf("To speed up the video scan, go to %1$s and run the <code>aioseo_video_sitemap_scan</code> action.",e),showModal:!1}]}),s.isActive&&r.push({slug:"link-assistant",name:"Link Assistant",actions:[{label:"Clear Data",slug:"link-assistant-clear-data",shortDescription:"This action removes all Link Assistant data from the database, forcing a site-wide rescan via Action Scheduler.",longDescription:this.$t.sprintf("The various Link Assistant scans can be sped up through the %1$s",e),showModal:!0},{label:"Clear Links",slug:"link-assistant-clear-links",shortDescription:"This action removes all link data from the database, forcing a site-wide rescan via Action Scheduler.",longDescription:this.$t.sprintf("To speed up the links scan, go to %1$s and run the <code>aioseo_link_assistant_links_scan</code> action.",e),showModal:!0},{label:"Clear Suggestions",slug:"link-assistant-clear-suggestions",shortDescription:"This action removes all link suggestion data from the database, forcing a site-wide rescan via Action Scheduler.",longDescription:this.$t.sprintf("To speed up the links scan, go to %1$s and run the <code>aioseo_link_assistant_link_suggestions_scan</code> action.",e),showModal:!0},{label:"Undismiss Suggestions",slug:"link-assistant-undismiss-suggestions",shortDescription:"This action removes the dismissed state from all suggestions, which makes them appear in the UI again.",longDescription:this.$t.sprintf("To speed up the video scan, go to %1$s and run the <code>aioseo_video_sitemap_scan</code> action.",e),showModal:!1}]}),r}}};function Te(e,o,s,r,t,a){const d=l("debug",!0);return n(),g(d,{extraActions:a.extraActions},null,8,["extraActions"])}const Me=w(Ce,[["render",Te]]),$e={setup(){return{rootStore:v()}},components:{BadBotBlocker:I,CoreMain:U,DatabaseTools:E,Debug:Me,HtaccessEditor:j,ImportExport:Q,RobotsEditor:X,SystemStatus:Z,WpCode:ee},data(){return{strings:{pageName:this.rootStore.aioseo.data.isNetworkAdmin?this.$t.__("Network Tools",this.$td):this.$t.__("Tools",this.$td)}}},computed:{showSaveButton(){return this.$route.name!=="system-status"&&this.$route.name!=="import-export"&&this.$route.name!=="database-tools"&&this.$route.name!=="debug"&&this.$route.name!=="wp-code"}}};function xe(e,o,s,r,t,a){const d=l("core-main");return n(),g(d,{"page-name":t.strings.pageName,"show-save-button":a.showSaveButton},{default:u(()=>[(n(),g(C(e.$route.name)))]),_:1},8,["page-name","show-save-button"])}const qt=w($e,[["render",xe]]);export{qt as default};
