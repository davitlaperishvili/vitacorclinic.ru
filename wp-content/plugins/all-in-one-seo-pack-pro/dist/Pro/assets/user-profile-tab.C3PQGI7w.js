import{o as a,k as g,l as c,a as d,t as u,B as r,u as p,v as n,q as I,C as T,c as b,b as y,F as x,J as O,G as D,E as R,V as F}from"./js/runtime-dom.esm-bundler.tPRhSV4q.js";import{l as N}from"./js/index.D9rFM2Zx.js";import{d as V,B as C,l as q}from"./js/index.Dbgw3oZ8.js";import{l as z}from"./js/index.3BJ3ZnWB.js";import{v as B,f as J,c as G,e as H,l as j}from"./js/links.BtZm82fD.js";import{C as A}from"./js/Card.CHgb8IZx.js";import{C as M}from"./js/SocialProfiles.OpiPB77N.js";import{A as E}from"./js/AddonConditions.CiZ37f2t.js";import{J as U}from"./js/JsonValues.D25FTfEu.js";import{u as $}from"./js/EeatCta.DxcAOyaf.js";import{C as W}from"./js/Blur.CvHKqkVq.js";import{C as k}from"./js/SettingsRow.BwYvQArk.js";import{_ as i}from"./js/default-i18n.DXRQgkn2.js";import{_ as w}from"./js/_plugin-vue_export-helper.BN1snXvA.js";import{C as K}from"./js/ProBadge.CVd2ImKm.js";import{C as Q}from"./js/Index.Cf5ujj4F.js";import{R as X}from"./js/RequiredPlans.D_JN9Itl.js";import{S as Y}from"./js/LogoGear.BbumEdXr.js";import{e as Z}from"./js/elemLoaded.COgXIo-H.js";import"./js/constants.CPpKID74.js";import"./js/Caret.Ke5gylGO.js";import"./js/helpers.DWk2T5bC.js";import"./js/Tooltip.DhkkBQWW.js";import"./js/Slide.fjAuzpC8.js";import"./js/Checkbox.CmdF-nFt.js";import"./js/Checkmark.DOG99yeO.js";import"./js/Textarea.BItFOv10.js";import"./js/Row.DRnp1mVs.js";import"./js/Facebook.BANkQ8lL.js";import"./js/Twitter.B1Gw9Cwq.js";import"./js/addons.BL-b166P.js";import"./js/upperFirst.7wc0xztY.js";import"./js/_stringToArray.DnK4tKcY.js";import"./js/toString.Cp__a8QI.js";import"./js/license.DHbLXBun.js";const ee={class:"aioseo-settings-row aioseo-section-description"},te={class:"aioseo-description"},oe=d("br",null,null,-1),se={class:"aioseo-description"},re={class:"aioseo-description"},L={__name:"EeatBlur",setup(e){const s="all-in-one-seo-pack",t={description:i("The fields below provide structured information for search engines about the current author. By filling out these fields, you will enhance your online presence and improve search engine visibility. This increases the chances of your author details appearing prominently in search results, making it easier for readers, publishers, and media representatives to discover and connect with you.",s),enable:i("Enable Author Info",s),alumniOf:i("Alumni Of",s),alumniOfDescription:i("The school, college, or university where the author studied.",s),alumniOfUrl:i("School, college, or university URL",s),alumniOfUrlDescription:i("The URL of the school, college, or university where the author studied.",s),worksFor:i("Employer",s),worksForDescription:i("The organization the author works for.",s)};return(o,m)=>(a(),g(p(W),{id:"aioseo-author-seo-meta-data"},{default:c(()=>[d("div",ee,u(t.description),1),r(p(k),{name:t.enable},{content:c(()=>[r(p(V))]),_:1},8,["name"]),r(p(k),{name:t.alumniOf},{content:c(()=>[r(p(C),{size:"medium",placeholder:t.alumniOf},null,8,["placeholder"]),d("div",te,u(t.alumniOfDescription),1),oe,r(p(C),{size:"medium",placeholder:t.alumniOfUrl},null,8,["placeholder"]),d("div",se,u(t.alumniOfUrlDescription),1)]),_:1},8,["name"]),r(p(k),{name:t.worksFor},{content:c(()=>[r(p(C),{size:"medium",placeholder:t.worksFor},null,8,["placeholder"]),d("div",re,u(t.worksForDescription),1)]),_:1},8,["name"])]),_:1}))}},P="all-in-one-seo-pack",ae={setup(){const{addonSlug:e,features:s,strings:t}=$();return{addonSlug:e,features:s,links:B,strings:t}},components:{CoreCard:A,EeatBlur:L},mixins:[E,U],computed:{ctaButtonText(){return this.shouldShowUpdate?i("Update E-E-A-T",P):i("Activate E-E-A-T",P)}},methods:{handleAddonActivated(){const e=new URL(location.href);e.searchParams.set("authorInfo",1),location.assign(e.search)}}};function ne(e,s,t,o,m,l){const h=n("eeat-blur"),f=n("core-card");return a(),g(f,{"header-text":o.strings.authorInfo,noSlide:""},{default:c(()=>[r(h),(a(),g(I(e.ctaComponent),{"addon-slug":o.addonSlug,"cta-header":o.strings.headerTextActivate,"cta-description":o.strings.description,"cta-button-text":l.ctaButtonText,"feature-list":o.features,"prevent-global-addon-update":"",onAddonActivated:l.handleAddonActivated},null,40,["addon-slug","cta-header","cta-description","cta-button-text","feature-list","onAddonActivated"]))]),_:1},8,["header-text"])}const ie=w(ae,[["render",ne]]),ce={setup(){const{addonSlug:e,features:s,strings:t}=$();return{addonSlug:e,features:s,licenseStore:J(),links:B,strings:t}},components:{CoreCard:A,CoreProBadge:K,Cta:Q,EeatBlur:L,RequiredPlans:X},mixins:[E,U]};function le(e,s,t,o,m,l){const h=n("core-pro-badge"),f=n("eeat-blur"),S=n("required-plans"),_=n("cta"),v=n("core-card");return a(),g(v,{noSlide:""},{header:c(()=>[d("span",null,u(o.strings.authorInfo),1),r(h)]),default:c(()=>[r(f),r(_,{"cta-link":o.links.getPricingUrl("eeat","eeat-upsell"),"button-text":o.strings.ctaButtonText,"learn-more-link":o.links.getUpsellUrl("eeat",null,e.$isPro?"pricing":"liteUpgrade"),"feature-list":o.features},{"header-text":c(()=>[T(u(o.strings.headerText),1)]),description:c(()=>[r(S,{addon:"aioseo-eeat"}),T(" "+u(o.strings.description),1)]),_:1},8,["cta-link","button-text","learn-more-link","feature-list"])]),_:1})}const de=w(ce,[["render",le]]),ue={components:{EeatCta:ie,EeatCtaLite:de},mixins:[E],data(){return{addonSlug:"aioseo-eeat"}}};function pe(e,s,t,o,m,l){const h=n("eeat-cta",!0),f=n("eeat-cta-lite");return a(),b("div",null,[e.shouldShowUpdate||e.shouldShowActivate?(a(),g(h,{key:0})):y("",!0),e.shouldShowLite?(a(),g(f,{key:1})):y("",!0)])}const me=w(ue,[["render",pe]]),he={setup(){return{rootStore:G(),settingsStore:H()}},components:{CoreCard:A,CoreSocialProfiles:M,EeatCta:me,SvgLogoGear:Y},data(){return{activeTabIndex:0,strings:{socialProfiles:this.$t.__("Social Profiles",this.$td),description:this.$t.__("To let search engines know which profiles are associated with this user, enter them below:",this.$td)}}},methods:{setActiveTab(e){var t;const s=this.activeTabIndex;switch(this.activeTabIndex=e,this.activeTabObject.slug){case"personal-options":document.getElementById("your-profile").childNodes.forEach(o=>{o.style&&(o.style.display="block")});break;case"author-seo":document.getElementById("your-profile").childNodes.forEach(o=>{o.id==="aioseo-user-profile-tab-wrapper"||o.className==="submit"||!o.style||(o.style.display="none")});break;case"customer-data":this.activeTabIndex=s,window.location.href=this.rootStore.aioseo.urls.home+"/wp-admin/admin.php?page=followup-emails-reports&tab=reportuser_view&email="+encodeURIComponent(this.settingsStore.userProfile.userData.user_email)+"&user_id="+this.settingsStore.userProfile.userData.ID;break}location.hash=(t=this.activeTabObject)==null?void 0:t.slug},updateHiddenInputField(e){document.getElementById("aioseo-user-social-profiles").value=JSON.stringify(e)}},computed:{tabs(){const e=[{label:this.$t.__("Personal Options",this.$td),slug:"personal-options"},{label:this.$t.__("Author SEO",this.$td),slug:"author-seo",svg:"svg-logo-gear"}];return this.settingsStore.userProfile.isWooCommerceFollowupEmailsActive&&e.push({label:this.$t.__("Customer Data",this.$td),slug:"customer-data"}),e},activeTabObject(){return this.tabs[this.activeTabIndex]}},async created(){this.updateHiddenInputField(this.settingsStore.userProfile.profiles)},beforeMount(){new URLSearchParams(window.location.search).has("authorInfo")&&this.setActiveTab(1)},mounted(){const e=new URLSearchParams(window.location.search)||null;(e!=null&&e.get("author-seo")||location!=null&&location.hash.includes("author-seo"))&&this.setActiveTab(1)}},fe={id:"aioseo-user-profile-tab"},_e={class:"navigation-bar"},ge=["onClick"],ve={class:"aioseo-user-profile-fields"},be={class:"aioseo-settings-row aioseo-section-description"};function ye(e,s,t,o,m,l){const h=n("eeat-cta"),f=n("core-social-profiles"),S=n("core-card");return a(),b("div",fe,[d("div",_e,[(a(!0),b(x,null,O(l.tabs,(_,v)=>(a(),b("a",{key:v,class:D({active:v===m.activeTabIndex}),href:"#",onClick:R(ke=>l.setActiveTab(v),["prevent"])},[_.svg?(a(),g(I(_.svg),{key:0})):y("",!0),T(" "+u(_.label),1)],10,ge))),128))]),l.activeTabObject.slug==="author-seo"?(a(),b(x,{key:0},[r(h),d("div",ve,[r(S,{slug:"userProfiles","header-text":m.strings.socialProfiles},{default:c(()=>[d("div",be,u(m.strings.description),1),r(f,{userProfiles:o.settingsStore.userProfile.profiles,onUpdated:s[0]||(s[0]=_=>l.updateHiddenInputField(_))},null,8,["userProfiles"])]),_:1},8,["header-text"])])],64)):y("",!0)])}const we=w(he,[["render",ye]]),Se=()=>{const e=document.getElementById("your-profile");if(!e)return;const s=document.createElement("div");s.id="aioseo-user-profile-tab-wrapper";const t=document.createElement("input");t.id="aioseo-user-social-profiles",t.name="aioseo-user-social-profiles",t.type="hidden",e.prepend(t),e.prepend(s)},Ce=()=>{let e=F({...we,name:"Standalone/UserProfileTab"});e=N(e),e=q(e),e=z(e),j(e),e.mount("#aioseo-user-profile-tab-wrapper")};Z("#your-profile","profilePageLoaded");document.addEventListener("animationstart",function(e){e.animationName==="profilePageLoaded"&&(Se(),Ce())});
