import{A as S}from"./AddonConditions.CiZ37f2t.js";import{J as V}from"./JsonValues.D25FTfEu.js";import{u as C}from"./EeatCta.DxcAOyaf.js";import{_ as t,s as r}from"./default-i18n.DXRQgkn2.js";import{v as D,f as P}from"./links.BtZm82fD.js";import{B as R}from"./Caret.Ke5gylGO.js";import{B as L}from"./Checkbox.CmdF-nFt.js";import{a as w,B as I,b as N,S as W}from"./index.Dbgw3oZ8.js";import{B as J}from"./RadioToggle.CaTwJt--.js";import{C as M}from"./Blur.CvHKqkVq.js";import{C as U}from"./Card.CHgb8IZx.js";import{C as $}from"./SettingsRow.BwYvQArk.js";import{C as b}from"./Tooltip.DhkkBQWW.js";import{C as z}from"./Index.UnVIUemY.js";import{S as H}from"./Plus.CG1QxokA.js";import{o as f,k as T,l as i,a as s,B as a,u as n,C as u,t as c,c as v,F as G,J as j,G as q,v as g,q as F,b as k}from"./runtime-dom.esm-bundler.tPRhSV4q.js";import{_ as E}from"./_plugin-vue_export-helper.BN1snXvA.js";import{C as X}from"./Index.Cf5ujj4F.js";import{R as K}from"./RequiredPlans.D_JN9Itl.js";import"./addons.BL-b166P.js";import"./upperFirst.7wc0xztY.js";import"./_stringToArray.DnK4tKcY.js";import"./toString.Cp__a8QI.js";import"./helpers.DWk2T5bC.js";import"./Checkmark.DOG99yeO.js";import"./Slide.fjAuzpC8.js";import"./Row.DRnp1mVs.js";import"./Php.Cp2q3wkP.js";import"./CheckSolid.CDvG9IOI.js";import"./constants.CPpKID74.js";import"./license.DHbLXBun.js";const Q=()=>({getJsonValue:(o,d=null)=>{try{o=JSON.parse(o)}catch{o=d}return o},setJsonValue:o=>JSON.stringify(o),getJsonValues:o=>o.map(d=>JSON.parse(d)),setJsonValues:o=>o.map(d=>JSON.stringify(d))});var Y={VITE_AIOSEO_DEV_PORT:"8085",VITE_AIOSEO_DOMAIN:"aioseo.local",VITE_TEXTDOMAIN:"all-in-one-seo-pack",VITE_TEXTDOMAIN_PRO:"aioseo-pro",VITE_VERSION:"Pro",VITE_SHORT_NAME:"AIOSEO",VITE_NAME:"All in One SEO",VITE_TRUSEO_WEB_WORKER:"true",BASE_URL:"./",MODE:"production",DEV:!1,PROD:!0,SSR:!1};const Z={id:"aioseo-author-seo"},ee={class:"aioseo-description"},te=["innerHTML"],oe={class:"aioseo-description"},se=["innerHTML"],ae={class:"topics-table"},ne={class:"tooltip-wrapper"},re={class:"tooltip-wrapper"},ie={class:"tooltip-wrapper"},le=s("td",null,null,-1),ce={class:"name"},de={class:"url"},ue={class:"same-as-urls"},pe={class:"actions"},he={colspan:"4"},x={__name:"EeatBlur",setup(l){const{getJsonValue:h}=Q(),_=[{name:"WordPress",url:"https://wordpress.org",sameAsUrls:[]},{name:"SEO",url:"https://aioseo.com",sameAsUrls:[]},{name:"Schema Markup",url:"https://schema.org",sameAsUrls:[]}],e="all-in-one-seo-pack",o={settings:t("Settings",e),experienceTopics:t("Author Experience Topics (E-E-A-T)",e),experienceTopicsDescription:r(t("The following settings will be added directly to an author's schema meta data via the %1$sknowsAbout%2$s property. This property helps with the Experience aspect of Google's E-E-A-T guidelines. After setting the global options here, you can add them directly in an authors profile page.",e),"<code>","</code>"),name:t("Name",e),url:t("URL",e),sameAsUrls:t("Same As URLs",e),addItem:t("Add Item",e),delete:t("Delete",e),nameTooltip:t('The name of the item the author knows about (e.g. "Amazon").',e),urlTooltip:t('The URL of the item the author knows about (e.g. "https://amazon.com").',e),sameAsUrlsTooltip:t('Additional URLs to help identify the item (e.g. "https://en.wikipedia.org/wiki/Amazon_(company)").',e),sameAsUrlsPlaceholder:t("Enter a URL and press enter",e),tagPlaceholder:t("Press enter to insert a URL",e),authorBioInjection:t("Append Author Bio to Posts",e),authorBioInjectionDescription:r(t("Choose whether %1$s should automatically append a compact author bio at the end of every post. You can also manually insert the author bio using the Author Bio block.",e),Y.VITE_AIOSEO_SHORT_NAME),postTypes:t("Post Types",e),includeAllPostTypes:t("Include All Post Types",e),selectPostTypes:t("Select the post types for which you want to automatically inject an author bio.",e)},d={block:{desc:r('<p>The following blocks are available in the Block Editor:</p><ul style="list-style:disc; margin-left: 24px;"><li>AIOSEO - Author Bio</li><li>AIOSEO - Author Name</li><li>AIOSEO - Reviewer Name</li></ul>')},shortcode:{multiple:[{copy:"[aioseo_eeat_author_bio]",desc:t("Use the following shortcode to display the author bio.",e),hasAdvanced:!0,attributes:[{name:"compact",description:r(t("Whether the compact author bio should be output or not. Defaults to %1$s.",e),"<code>true</code>")}],attributesDescription:t("The following shortcode attributes can be used to override the default settings:",e)},{copy:"[aioseo_eeat_author_tooltip]",desc:t("Use the following shortcode to display the author name.",e),hasAdvanced:!0,attributes:[{name:"show-label",description:r(t('Whether to display the "Written By" label or not. Defaults to %1$s.',e),"<code>true</code>")},{name:"show-image",description:r(t("Whether to display the author image or not. Defaults to %1$s.",e),"<code>true</code>")},{name:"show-tooltip",description:r(t("Whether to display the popup when someone hovers over the name or not. Defaults to %1$s.",e),"<code>true</code>")}],attributesDescription:t("The following shortcode attributes can be used to override the default settings:",e)},{copy:"[aioseo_eeat_reviewer_tooltip]",desc:t("Use the following shortcode to display the reviewer name.",e),hasAdvanced:!0,attributes:[{name:"show-label",description:r(t('Whether to display the "Reviewed By" label or not. Defaults to %1$s.',e),"<code>true</code>")},{name:"show-image",description:r(t("Whether to display the reviewer image or not. Defaults to %1$s.",e),"<code>true</code>")},{name:"show-tooltip",description:r(t("Whether to display the popup when someone hovers over the name or not. Defaults to %1$s.",e),"<code>true</code>")}],attributesDescription:t("The following shortcode attributes can be used to override the default settings:",e)}]},php:{multiple:[{copy:"<?php if( function_exists( 'aioseo_eeat_author_bio' ) ) aioseo_eeat_author_bio(); ?>",desc:t("Use the following PHP code anywhere in your theme's post templates or author archive template to display a bio for the author.",e),hasAdvanced:!0,attributes:[{name:"$compact",description:r(t("Whether the compact author bio should be output or not. Defaults to %1$s.",e),"<code>true</code>")}],attributesDescription:t("The following function arguments can be used to override the default settings:",e)},{copy:"<?php if( function_exists( 'aioseo_eeat_author_tooltip' ) ) aioseo_eeat_author_tooltip(); ?>",desc:t("Use the following PHP code anywhere in your theme's post templates to display a bio for the post author.",e),hasAdvanced:!0,attributes:[{name:"$showLabel",description:r(t('Whether to display the "Written By" label or not. Defaults to %1$s.',e),"<code>true</code>")},{name:"$showImage",description:r(t("Whether to display the author image or not. Defaults to %1$s.",e),"<code>true</code>")},{name:"$showTooltip",description:r(t("Whether to display the popup when someone hovers over the name or not. Defaults to %1$s.",e),"<code>true</code>")}],attributesDescription:t("The following function arguments can be used to override the default settings:",e)},{copy:"<?php if( function_exists( 'aioseo_eeat_reviewer_tooltip' ) ) aioseo_eeat_reviewer_tooltip(); ?>",desc:t("Use the following PHP code anywhere in your theme's post templates to display a bio for the post reviewer.",e),hasAdvanced:!0,attributes:[{name:"$showLabel",description:r(t('Whether to display the "Reviewed By" label or not. Defaults to %1$s.',e),"<code>true</code>")},{name:"$showImage",description:r(t("Whether to display the reviewer image or not. Defaults to %1$s.",e),"<code>true</code>")},{name:"$showTooltip",description:r(t("Whether to display the popup when someone hovers over the name or not. Defaults to %1$s.",e),"<code>true</code>")}],attributesDescription:t("The following function arguments can be used to override the default settings:",e)}]}};return(p,y)=>(f(),T(n(M),null,{default:i(()=>[s("div",Z,[a(n(U),{id:"aioseo-author-seo-settings",slug:"authorSeoSettings","header-text":o.settings,noSlide:""},{default:i(()=>[a(n(z),{options:d,plural:""}),a(n($),{name:o.authorBioInjection},{content:i(()=>[a(n(J),{value:"true",name:"authorBioInjection",options:[{label:p.$constants.GLOBAL_STRINGS.disabled,value:!1,activeClass:"dark"},{label:p.$constants.GLOBAL_STRINGS.enabled,value:!0}]},null,8,["options"]),s("div",ee,[u(c(o.authorBioInjectionDescription)+" ",1),s("span",{innerHTML:p.$links.getDocLink(p.$constants.GLOBAL_STRINGS.learnMore,"eeatAuthorBioInjection",!0)},null,8,te)])]),_:1},8,["name"]),a(n($),{name:o.postTypes},{content:i(()=>[a(n(L),{size:"medium",value:"true"},{default:i(()=>[u(c(o.includeAllPostTypes),1)]),_:1}),s("div",oe,c(o.selectPostTypes),1)]),_:1},8,["name"])]),_:1},8,["header-text"]),a(n(U),{id:"aioseo-author-seo-topics",slug:"authorSeoTopics","header-text":o.experienceTopics,noSlide:""},{default:i(()=>[s("div",{class:"aioseo-settings-row aioseo-section-description",innerHTML:o.experienceTopicsDescription},null,8,se),s("table",ae,[s("thead",null,[s("tr",null,[s("td",null,[s("div",ne,[u(c(o.name)+" ",1),a(n(b),null,{tooltip:i(()=>[u(c(o.nameTooltip),1)]),default:i(()=>[a(n(w))]),_:1})])]),s("td",null,[s("div",re,[u(c(o.url)+" ",1),a(n(b),null,{tooltip:i(()=>[u(c(o.urlTooltip),1)]),default:i(()=>[a(n(w))]),_:1})])]),s("td",null,[s("div",ie,[u(c(o.sameAsUrls)+" ",1),a(n(b),null,{tooltip:i(()=>[u(c(o.sameAsUrlsTooltip),1)]),default:i(()=>[a(n(w))]),_:1})])]),le])]),s("tbody",null,[(f(),v(G,null,j(_,(m,B)=>s("tr",{class:q({even:B%2===0}),key:B},[s("td",ce,[a(n(I),{size:"medium",modelValue:m.name,"onUpdate:modelValue":A=>m.name=A,"append-icon":"circle-close","append-icon-on-value":"",onAppendIconClick:A=>m.name=""},null,8,["modelValue","onUpdate:modelValue","onAppendIconClick"])]),s("td",de,[a(n(I),{size:"medium",modelValue:m.url,"onUpdate:modelValue":A=>m.url=A,"append-icon":"circle-close","append-icon-on-value":"",onAppendIconClick:A=>m.url=""},null,8,["modelValue","onUpdate:modelValue","onAppendIconClick"])]),s("td",ue,[a(n(N),{size:"medium",multiple:"",taggable:"",options:n(h)(m.sameAsUrls)||[],modelValue:n(h)(m.sameAsUrls)||[],placeholder:o.sameAsUrlsPlaceholder,"tag-placeholder":o.tagPlaceholder},null,8,["options","modelValue","placeholder","tag-placeholder"])]),s("td",pe,[a(n(b),{type:"action"},{tooltip:i(()=>[u(c(o.delete),1)]),default:i(()=>[a(n(W))]),_:1})])],2)),64))]),s("tfoot",null,[s("tr",null,[s("td",he,[a(n(R),{size:"small-table",type:"black"},{default:i(()=>[a(n(H)),u(" "+c(o.addItem),1)]),_:1})])])])])]),_:1},8,["header-text"])])]),_:1}))}},O="all-in-one-seo-pack",me={setup(){const{addonSlug:l,features:h,strings:_}=C();return{addonSlug:l,features:h,links:D,strings:_}},components:{EeatBlur:x},mixins:[S,V],computed:{ctaButtonText(){return this.shouldShowUpdate?t("Update E-E-A-T",O):t("Activate E-E-A-T",O)}},methods:{handleAddonActivated(){window.location.reload(!0)}}};function _e(l,h,_,e,o,d){const p=g("eeat-blur");return f(),v("div",null,[a(p),(f(),T(F(l.ctaComponent),{"addon-slug":e.addonSlug,"cta-header":e.strings.headerTextActivate,"cta-description":e.strings.description,"cta-button-text":d.ctaButtonText,"feature-list":e.features,"prevent-global-addon-update":"",onAddonActivated:d.handleAddonActivated,alignTop:""},null,40,["addon-slug","cta-header","cta-description","cta-button-text","feature-list","onAddonActivated"]))])}const fe=E(me,[["render",_e]]),ge={setup(){const{addonSlug:l,features:h,strings:_}=C();return{addonSlug:l,features:h,licenseStore:P(),links:D,strings:_}},components:{Cta:X,EeatBlur:x,RequiredPlans:K},mixins:[S,V]};function Ae(l,h,_,e,o,d){const p=g("eeat-blur"),y=g("required-plans"),m=g("cta");return f(),v("div",null,[a(p),a(m,{"cta-link":e.links.getPricingUrl("eeat","eeat-upsell"),"button-text":e.strings.ctaButtonText,"learn-more-link":e.links.getUpsellUrl("eeat",null,l.$isPro?"pricing":"liteUpgrade"),"feature-list":e.features,alignTop:""},{"header-text":i(()=>[u(c(e.strings.headerText),1)]),description:i(()=>[a(y,{addon:"aioseo-eeat"}),u(" "+c(e.strings.description),1)]),_:1},8,["cta-link","button-text","learn-more-link","feature-list"])])}const ye=E(ge,[["render",Ae]]),be={components:{EeatCta:fe,EeatCtaLite:ye},mixins:[S],data(){return{addonSlug:"aioseo-eeat"}}},Te={class:"author-seo-cta"};function ve(l,h,_,e,o,d){const p=g("eeat-cta",!0),y=g("eeat-cta-lite");return f(),v("div",Te,[l.shouldShowUpdate||l.shouldShowActivate?(f(),T(p,{key:0})):k("",!0),l.shouldShowLite?(f(),T(y,{key:1})):k("",!0)])}const et=E(be,[["render",ve]]);export{et as default};