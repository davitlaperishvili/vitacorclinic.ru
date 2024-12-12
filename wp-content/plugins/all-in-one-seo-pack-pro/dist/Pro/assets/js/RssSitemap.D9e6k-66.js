import{u as $,c as A}from"./links.BtZm82fD.js";import{u as P}from"./CommonSitemap.MfCKFeRY.js";import"./default-i18n.DXRQgkn2.js";import{B as v}from"./Checkbox.CmdF-nFt.js";import{C as I}from"./Card.CHgb8IZx.js";import{C as R}from"./PostTypeOptions.CV-Y0BBh.js";import{C}from"./SettingsRow.BwYvQArk.js";import{S as w,a as B}from"./SearchConsoleInline.BFutEqWR.js";import{S as V}from"./External.BnlDuPIp.js";import{_ as M}from"./_plugin-vue_export-helper.BN1snXvA.js";import{v as o,c as D,k as _,b as d,B as n,l as r,o as l,a as i,C as m,t as a}from"./runtime-dom.esm-bundler.tPRhSV4q.js";import"./helpers.DWk2T5bC.js";import"./Checkmark.DOG99yeO.js";import"./Tooltip.DhkkBQWW.js";import"./Caret.Ke5gylGO.js";import"./index.Dbgw3oZ8.js";import"./Slide.fjAuzpC8.js";import"./HighlightToggle.Dw6HlDD4.js";import"./Radio.DSWQpCaC.js";import"./Row.DRnp1mVs.js";import"./PostTypes.Cef6XkQ_.js";import"./SearchConsole.D8qr6vZT.js";import"./params.B3T1WKlC.js";import"./Actionable.o5o4XF98.js";import"./CheckSolid.CDvG9IOI.js";import"./ExclamationSolid.BrF8E3jp.js";import"./WpTable.CFMkRqW5.js";import"./Index.ChPpw0uH.js";import"./Table.JF4U36kH.js";import"./numbers.BT5e8rgb.js";const G={setup(){const{validateLinksPerIndex:s}=P();return{optionsStore:$(),rootStore:A(),validateLinksPerIndex:s}},components:{BaseCheckbox:v,CoreCard:I,CorePostTypeOptions:R,CoreSettingsRow:C,SearchConsole:w,SearchConsoleInline:B,SvgExternal:V},data(){return{pagePostOptions:[],strings:{rss:this.$t.__("RSS Sitemap",this.$td),description:this.$t.__("This option will generate a separate RSS Sitemap which can be submitted to Google, Bing and any other search engines that support this type of sitemap. The RSS Sitemap contains an RSS feed of the latest updates to your site content. It is not a full sitemap of all your content.",this.$td),enableSitemap:this.$t.__("Enable Sitemap",this.$td),sitemapSettings:this.$t.__("Sitemap Settings",this.$td),enableSitemapIndexes:this.$t.__("Enable Sitemap Indexes",this.$td),sitemapIndexes:this.$t.__("Organize sitemap entries into distinct files in your sitemap. We recommend you enable this setting if your sitemap contains more than 1,000 URLs.",this.$td),linksPerSitemap:this.$t.__("Number of Posts",this.$td),noIndexDisplayed:this.$t.__("Noindexed content will not be displayed in your sitemap.",this.$td),doYou404:this.$t.__("Do you get a blank sitemap or 404 error?",this.$td),openSitemap:this.$t.__("Open RSS Sitemap",this.$td),maxLinks:this.$t.__("Allows you to specify the maximum number of posts for the RSS Sitemap. We recommend an amount of 50 posts.",this.$td),automaticallyPingSearchEngines:this.$t.__("Automatically Ping Search Engines",this.$td),postTypes:this.$t.__("Post Types",this.$td),taxonomies:this.$t.__("Taxonomies",this.$td),dateArchiveSitemap:this.$t.__("Date Archive Sitemap",this.$td),includeDateArchives:this.$t.__("Include Date Archives in your sitemap.",this.$td),authorSitemap:this.$t.__("Author Sitemap",this.$td),includeAuthorArchives:this.$t.__("Include Author Archives in your sitemap.",this.$td),includeAllPostTypes:this.$t.__("Include All Post Types",this.$td),selectPostTypes:this.$t.__("Select which Post Types appear in your sitemap.",this.$td),includeAllTaxonomies:this.$t.__("Include All Taxonomies",this.$td),selectTaxonomies:this.$t.__("Select which Taxonomies appear in your sitemap.",this.$td)}}},computed:{getExcludedPostTypes(){return["attachment"]}}},N={class:"aioseo-rss-sitemap"},O={class:"aioseo-settings-row aioseo-section-description"},E=["innerHTML"],H={class:"aioseo-sitemap-preview"},U={class:"aioseo-description"},z=["innerHTML"],K={class:"aioseo-description"},W=["innerHTML"],Y={class:"aioseo-description"},j=["innerHTML"];function q(s,p,F,t,e,S){const y=o("search-console"),g=o("base-toggle"),f=o("search-console-inline"),u=o("core-settings-row"),T=o("svg-external"),b=o("base-button"),h=o("core-card"),x=o("base-input"),k=o("base-checkbox"),L=o("core-post-type-options");return l(),D("div",N,[t.optionsStore.options.sitemap.rss.enable?(l(),_(y,{key:0})):d("",!0),n(h,{slug:"rssSitemap","header-text":e.strings.rss},{default:r(()=>[i("div",O,[m(a(e.strings.description)+" ",1),i("span",{innerHTML:s.$links.getDocLink(s.$constants.GLOBAL_STRINGS.learnMore,"rssSitemaps",!0)},null,8,E)]),n(u,{name:e.strings.enableSitemap},{content:r(()=>[n(g,{modelValue:t.optionsStore.options.sitemap.rss.enable,"onUpdate:modelValue":p[0]||(p[0]=c=>t.optionsStore.options.sitemap.rss.enable=c)},null,8,["modelValue"]),t.optionsStore.options.sitemap.rss.enable?(l(),_(f,{key:0})):d("",!0)]),_:1},8,["name"]),t.optionsStore.options.sitemap.rss.enable?(l(),_(u,{key:0,name:s.$constants.GLOBAL_STRINGS.preview},{content:r(()=>[i("div",H,[n(b,{size:"medium",type:"blue",tag:"a",href:t.rootStore.aioseo.urls.rssSitemapUrl,target:"_blank"},{default:r(()=>[n(T),m(" "+a(e.strings.openSitemap),1)]),_:1},8,["href"])]),i("div",U,[m(a(e.strings.noIndexDisplayed)+" "+a(e.strings.doYou404)+" ",1),i("span",{innerHTML:s.$links.getDocLink(s.$constants.GLOBAL_STRINGS.learnMore,"blankSitemap",!0)},null,8,z)])]),_:1},8,["name"])):d("",!0)]),_:1},8,["header-text"]),t.optionsStore.options.sitemap.rss.enable?(l(),_(h,{key:1,slug:"rssSitemapSettings","header-text":e.strings.sitemapSettings},{default:r(()=>[n(u,{name:e.strings.linksPerSitemap},{content:r(()=>[n(x,{modelValue:t.optionsStore.options.sitemap.rss.linksPerIndex,"onUpdate:modelValue":p[1]||(p[1]=c=>t.optionsStore.options.sitemap.rss.linksPerIndex=c),class:"aioseo-links-per-site",type:"number",size:"medium",min:1,max:5e4,onKeyup:t.validateLinksPerIndex},null,8,["modelValue","onKeyup"]),i("div",K,[m(a(e.strings.maxLinks)+" ",1),i("span",{innerHTML:s.$links.getDocLink(s.$constants.GLOBAL_STRINGS.learnMore,"maxLinksRss",!0)},null,8,W)])]),_:1},8,["name"]),n(u,{name:e.strings.postTypes},{content:r(()=>[n(k,{size:"medium",modelValue:t.optionsStore.options.sitemap.rss.postTypes.all,"onUpdate:modelValue":p[2]||(p[2]=c=>t.optionsStore.options.sitemap.rss.postTypes.all=c)},{default:r(()=>[m(a(e.strings.includeAllPostTypes),1)]),_:1},8,["modelValue"]),t.optionsStore.options.sitemap.rss.postTypes.all?d("",!0):(l(),_(L,{key:0,options:t.optionsStore.options.sitemap.rss,type:"postTypes",excluded:S.getExcludedPostTypes},null,8,["options","excluded"])),i("div",Y,[m(a(e.strings.selectPostTypes)+" ",1),i("span",{innerHTML:s.$links.getDocLink(s.$constants.GLOBAL_STRINGS.learnMore,"selectPostTypesRss",!0)},null,8,j)])]),_:1},8,["name"])]),_:1},8,["header-text"])):d("",!0)])}const At=M(G,[["render",q]]);export{At as default};
