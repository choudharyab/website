;(function($){$.fn.extend({ps_autocomplete:function(urlOrData,options,wc_psearch_popup){var isUrl=typeof urlOrData=="string";var ps_id=this.data('ps-id');var ps_row=this.data('ps-row');var ps_text_lenght=this.data('ps-text_lenght');var ps_popup_search_in=this.data('ps-popup_search_in');var ps_show_price=this.data('ps-show_price');var ps_lang=this.data('ps-lang');var ps_form=this.parents('.wc_ps_form');var cat_align=ps_form.data('ps-cat_align');var popup_wide=ps_form.data('ps-popup_wide');var widget_template=ps_form.data('ps-widget_template');setTimeout(function(){var cat_max_wide=ps_form.data('ps-cat_max_wide');var cat_max_wide_value=ps_form.innerWidth()*cat_max_wide/100;ps_form.find('.wc_ps_nav_facade_label').css('max-width',cat_max_wide_value);},2000);var ps_extra_parameters={'row':ps_row,'text_lenght':ps_text_lenght,'show_price':ps_show_price};if(typeof ps_lang!='undefined'&&ps_lang!=''){ps_extra_parameters.ps_lang=ps_lang;}if(typeof ps_popup_search_in!='undefined'&&ps_popup_search_in!=''){ps_extra_parameters.search_in=JSON.stringify(ps_popup_search_in);}options=$.extend({},$.PS_Autocompleter.defaults,{url:isUrl?urlOrData:null,data:isUrl?null:urlOrData,delay:isUrl?$.PS_Autocompleter.defaults.delay:10,max:ps_row+1,inputClass:'ac_input_'+ps_id,resultsClass:'ac_results_'+ps_id,cat_align:cat_align,popup_wide:popup_wide,widget_template:widget_template,extraParams:ps_extra_parameters},options);options.highlight=options.highlight||function(value){return value;};options.formatMatch=options.formatMatch||options.formatItem;return this.each(function(){new $.PS_Autocompleter(this,options,wc_psearch_popup);});},result:function(handler){return this.bind("result",handler);},search:function(handler){return this.trigger("search",[handler]);},setOptions:function(options){return this.trigger("setOptions",[options]);},ps_unautocomplete:function(){return this.trigger("ps_unautocomplete");}});$.PS_Autocompleter=function(input,options,wc_psearch_popup){var localStorage=new Backbone.LocalStorage("wc-ps-popup-backbone");var KEY={UP:38,DOWN:40,DEL:46,TAB:9,RETURN:13,ESC:27,COMMA:188,PAGEUP:33,PAGEDOWN:34,BACKSPACE:8};var $input=$(input).attr("autocomplete","off").addClass(options.inputClass);var $catdropdown=$(input).parents('.wc_ps_container').find('.wc_ps_category_selector');var timeout;var previousValue="";var hasFocus=0;var lastKeyPressCode;var config={mouseDownOnSelect:false};var select=$.PS_Autocompleter.Select(options,input,selectCurrent,config,wc_psearch_popup);var blockSubmit;window.opera&&$(input.form).bind("submit.autocomplete",function(){if(blockSubmit){blockSubmit=false;return false;}});$(window).resize(function(){if(select.visible()){select.show(true);}});$input.bind((window.opera?"keypress":"keydown")+".autocomplete",function(event){hasFocus=1;lastKeyPressCode=event.keyCode;switch(event.keyCode){case KEY.UP:event.preventDefault();if(select.visible()){select.prev();}else{onChange(0,true);}break;case KEY.DOWN:event.preventDefault();if(select.visible()){select.next();}else{onChange(0,true);}break;case KEY.PAGEUP:event.preventDefault();if(select.visible()){select.pageUp();}else{onChange(0,true);}break;case KEY.PAGEDOWN:event.preventDefault();if(select.visible()){select.pageDown();}else{onChange(0,true);}break;case options.multiple&&$.trim(options.multipleSeparator)==","&&KEY.COMMA:case KEY.TAB:if(selectCurrent()){event.preventDefault();blockSubmit=true;return false;}break;case KEY.ESC:select.hide();break;default:clearTimeout(timeout);timeout=setTimeout(onChange,options.delay);break;}}).focus(function(){hasFocus++;}).blur(function(){hasFocus=0;if(!config.mouseDownOnSelect){hideResults();}}).click(function(){if(''!=$(this).val()&&!select.visible()&&!select.haveChangeCat()){$(this).select();select.show(false);}}).bind("search",function(){var fn=(arguments.length>1)?arguments[1]:null;function findValueCallback(q,data){var result;if(data&&data.length){for(var i=0;i<data.length;i++){if(data[i].keyword.toLowerCase()==q.toLowerCase()){result=data[i];break;}}}if(typeof fn=="function")fn(result);else $input.trigger("result",result&&[result.keyword,result.url]);}$.each(trimWords($input.val()),function(i,value){request($.trim(value),findValueCallback,findValueCallback);});}).bind("setOptions",function(){$.extend(options,arguments[1]);}).bind("ps_unautocomplete",function(){select.unbind();$input.unbind();$(input.form).unbind(".autocomplete");});$catdropdown.change(function(){previousValue='';$input.val($input.data('ps-default_text'));select.changeCategory(true);});function selectCurrent(){var selected=select.selected();if(!selected)return false;var v=selected.keyword;previousValue=v;if(options.multiple){var words=trimWords($input.val());if(words.length>1){var seperator=options.multipleSeparator.length;var cursorAt=$(input).selection().start;var wordAt,progress=0;$.each(words,function(i,word){progress+=word.length;if(cursorAt<=progress){wordAt=i;return false;}progress+=seperator;});words[wordAt]=v;v=words.join(options.multipleSeparator);}v+=options.multipleSeparator;}$input.val(v);hideResultsNow();$input.trigger("result",[selected.keyword,selected.url]);return true;}function onChange(crap,skipPrevCheck){if(lastKeyPressCode==KEY.DEL){select.hide();return;}var currentValue=$.trim($input.val());var leftcurrentValue=ltrim($input.val());if(!skipPrevCheck&&leftcurrentValue==previousValue)return;previousValue=currentValue;currentValue=lastWord(currentValue);if((currentValue.length>0&&leftcurrentValue.indexOf(' ')>=0)||currentValue.length>=options.minChars){$input.addClass(options.loadingClass);$input.siblings('.wc_ps_searching_icon').show();if(!options.matchCase)currentValue=currentValue.toLowerCase();request(currentValue,receiveData,hideResultsNow);}else{stopLoading();select.hide();}};function ltrim(str){return str.replace(/^\s+/,"");}function trimWords(value){if(!value)return[""];if(!options.multiple)return[$.trim(value)];return $.map(value.split(options.multipleSeparator),function(word){return $.trim(value).length?$.trim(word):null;});}function lastWord(value){if(!options.multiple)return value;var words=trimWords(value);if(words.length==1)return words[0];var cursorAt=$(input).selection().start;if(cursorAt==value.length){words=trimWords(value)}else{words=trimWords(value.replace(value.substring(cursorAt),""));}return words[words.length-1];}function autoFill(q,sValue){if(options.autoFill&&(lastWord($input.val()).toLowerCase()==q.toLowerCase())&&lastKeyPressCode!=KEY.BACKSPACE){$input.val($input.val()+sValue.substring(lastWord(previousValue).length));$(input).selection(previousValue.length,previousValue.length+sValue.length);}};function hideResults(){clearTimeout(timeout);timeout=setTimeout(hideResultsNow,200);};function hideResultsNow(){var wasVisible=select.visible();select.hide();clearTimeout(timeout);stopLoading();if(options.mustMatch){$input.search(function(result){if(!result){if(options.multiple){var words=trimWords($input.val()).slice(0,-1);$input.val(words.join(options.multipleSeparator)+(words.length?options.multipleSeparator:""));}else{$input.val("");$input.trigger("result",null);}}});}};function receiveData(q,data){if(data&&data.length&&hasFocus){$("."+options.resultsClass).css('border','');stopLoading();select.display(data,q);autoFill(q,data[0].keyword);select.show(false);select.changeCategory(false);}else{hideResultsNow();select.emptyList();$("."+options.resultsClass).css('border','none');}};function request(term,success,failure){if(!options.matchCase)term=term.toLowerCase();var ps_cat_in=$('.'+options.inputClass).parents('.wc_ps_container').find('.wc_ps_category_selector option:selected').val();if(typeof ps_cat_in=='undefined'||ps_cat_in==''){ps_cat_in=0;}if(!window.btoa){store_id=unescape(encodeURIComponent(term+ps_cat_in+JSON.stringify(options.extraParams)));}else{store_id=btoa(unescape(encodeURIComponent(term+ps_cat_in+JSON.stringify(options.extraParams))));}now=new Date();var data=localStorage.find({id:store_id});if(data&&data.value.length){if(options.isDebug||now.getTime().toString()>data.timestamp){localStorage.destroy({id:store_id});data=false;}}if(data&&data.value.length){success(term,data.value);}else if((typeof options.url=="string")&&(options.url.length>0)){var extraParams={timestamp:+new Date()};extraParams['cat_in']=ps_cat_in;extraParams['widget_template']=options.widget_template;$.each(options.extraParams,function(key,param){extraParams[key]=typeof param=="function"?param():param;});$.ajax({type:'POST',mode:"abort",port:"autocomplete"+input.name,dataType:options.dataType,url:options.url,data:$.extend({q:lastWord(term),limit:options.max},extraParams),success:function(data){if(options.isDebug===false){tomorrow=new Date(now.getTime()+(options.cacheTimeout*60*60*1000));tomorrow_str=tomorrow.getTime().toString();localStorage.create({id:store_id,value:data,timestamp:tomorrow_str});}success(term,data);}});}else{select.emptyList();failure(term);}};function stopLoading(){$input.removeClass(options.loadingClass);$input.siblings('.wc_ps_searching_icon').hide();};};$.PS_Autocompleter.defaults={inputClass:"predictive_input",resultsClass:"predictive_results",loadingClass:"predictive_loading",minChars:1,delay:400,cacheTimeout:24,isDebug:true,matchCase:false,matchSubset:false,matchContains:false,cacheLength:10,max:100,mustMatch:false,extraParams:{},selectFirst:true,formatItem:function(row){return row[0];},formatMatch:null,autoFill:false,width:0,multiple:false,multipleSeparator:", ",highlight:function(value,term){return value.replace(new RegExp("(?![^&;]+;)(?!<[^<>]*)("+term.replace(/([\^\$\(\)\[\]\{\}\*\.\+\?\|\\])/gi,"\\$1")+")(?![^<>]*>)(?![^&;]+;)","gi"),"<strong>$1</strong>");},scroll:true,scrollHeight:180};$.PS_Autocompleter.Cache=function(options){var data={};var length=0;function matchSubset(s,sub){if(!options.matchCase)s=s.toLowerCase();var i=s.indexOf(sub);if(options.matchContains=="word"){i=s.toLowerCase().search("\\b"+sub.toLowerCase());}if(i==-1)return false;return i==0||options.matchContains;};function add(q,value){if(length>options.cacheLength){flush();}if(!data[q]){length++;}data[q]=value;}function populate(){if(!options.data)return false;var stMatchSets={},nullData=0;if(!options.url)options.cacheLength=1;stMatchSets[""]=[];for(var i=0,ol=options.data.length;i<ol;i++){var rawValue=options.data[i];var firstChar=rawValue.keyword.charAt(0).toLowerCase();if(!stMatchSets[firstChar])stMatchSets[firstChar]=[];var row=rawValue;stMatchSets[firstChar].push(row);if(nullData++<options.max){stMatchSets[""].push(row);}};$.each(stMatchSets,function(i,value){options.cacheLength++;add(i,value);});}setTimeout(populate,25);function flush(){data={};length=0;}return{flush:flush,add:add,populate:populate,load:function(q){if(!options.cacheLength||!length)return null;if(!options.url&&options.matchContains){var csub=[];for(var k in data){if(k.length>0){var c=data[k];$.each(c,function(i,x){if(matchSubset(x.title,q)){csub.push(x);}});}}return csub;}else
if(data[q]){return data[q];}else
if(options.matchSubset){for(var i=q.length-1;i>=options.minChars;i--){var c=data[q.substr(0,i)];if(c){var csub=[];$.each(c,function(i,x){if(matchSubset(x.title,q)){csub[csub.length]=x;}});return csub;}}}return null;}};};$.PS_Autocompleter.Select=function(options,input,select,config,wc_psearch_popup){var CLASSES={ACTIVE:"ac_over"};var listItems,active=-1,data,term="",needsInit=true,element,list;var isChangeCat=false;var collection,popupView;function init(){if(!needsInit)return;element=$("<div/>").hide().addClass("predictive_results").addClass("predictive_results_"+options.widget_template).addClass(options.resultsClass).css("position","absolute").appendTo(document.body);list=$("<ul/>").addClass("predictive_search_results").appendTo(element).mouseover(function(event){if(target(event).nodeName&&target(event).nodeName.toUpperCase()=='LI'){active=$("li",list).removeClass(CLASSES.ACTIVE).index(target(event));$(target(event)).addClass(CLASSES.ACTIVE);}}).click(function(event){if($(target(event)).children('div').attr('rel')!='more_result'){$(target(event)).addClass(CLASSES.ACTIVE);select();input.focus();return false;}}).mousedown(function(){config.mouseDownOnSelect=true;}).mouseup(function(){config.mouseDownOnSelect=false;});if(options.width>0)element.css("width",options.width);needsInit=false;collection=new wc_psearch_popup.collections.Items;popupView=new wc_psearch_popup.views.PopupResult({collection:collection,el:$('.'+options.resultsClass)});popupView.predictive_search_input=input;}function target(event){var element=event.target;while(element&&element.tagName!="LI")element=element.parentNode;if(!element)return[];return element;}function moveSelect(step){listItems.slice(active,active+1).removeClass(CLASSES.ACTIVE);movePosition(step);var activeItem=listItems.slice(active,active+1).addClass(CLASSES.ACTIVE);if(options.scroll){var offset=0;listItems.slice(0,active).each(function(){offset+=this.offsetHeight;});if((offset+activeItem[0].offsetHeight-list.scrollTop())>list[0].clientHeight){list.scrollTop(offset+activeItem[0].offsetHeight-list.innerHeight());}else if(offset<list.scrollTop()){list.scrollTop(offset);}}};function movePosition(step){active+=step;if(active<0){active=listItems.size()-1;}else if(active>=listItems.size()){active=0;}}function limitNumberOfItems(available){return options.max&&options.max<available?options.max:available;}function fillList(){popupView.clearAll();popupView.createItems(data);listItems=list.find("li");if(options.selectFirst){listItems.slice(0,1).addClass(CLASSES.ACTIVE);active=0;}if($.fn.bgiframe)list.bgiframe();}return{display:function(d,q){init();data=d;term=q;fillList();},next:function(){moveSelect(1);},prev:function(){moveSelect(-1);},pageUp:function(){if(active!=0&&active-8<0){moveSelect(-active);}else{moveSelect(-8);}},pageDown:function(){if(active!=listItems.size()-1&&active+8>listItems.size()){moveSelect(listItems.size()-1-active);}else{moveSelect(8);}},hide:function(){element&&element.hide();active=-1;},visible:function(){return element&&element.is(":visible");},current:function(){return this.visible()&&(listItems.filter("."+CLASSES.ACTIVE)[0]||options.selectFirst&&listItems[0]);},show:function(justCalculatePosition){var input_container=$(input).parent('div');popup_top=input_container.offset().top+input.offsetHeight;if('full_wide'===options.popup_wide){form_container=$(input).parents('.wc_ps_container');form_w=form_container.outerWidth();popup_w=typeof options.width=="string"||options.width>0?options.width:form_w;popup_left=form_container.offset().left;}else{input_w=input_container.innerWidth();popup_w=typeof options.width=="string"||options.width>0?options.width:input_w;popup_left=input_container.offset().left;}if(justCalculatePosition){element.css({width:popup_w,top:popup_top,left:popup_left});}else{element.css({width:popup_w,top:popup_top,left:popup_left}).show();}if(options.scroll){list.scrollTop(0);list.css({maxHeight:options.scrollHeight,overflow:'auto'});if(!$.support.opacity&&typeof document.body.style.maxHeight==="undefined"){var listHeight=0;listItems.each(function(){listHeight+=this.offsetHeight;});var scrollbarsVisible=listHeight>options.scrollHeight;list.css('height',scrollbarsVisible?options.scrollHeight:listHeight);if(!scrollbarsVisible){listItems.width(list.width()-parseInt(listItems.css("padding-left"))-parseInt(listItems.css("padding-right")));}}}},selected:function(){var selected=listItems&&listItems.filter("."+CLASSES.ACTIVE).removeClass(CLASSES.ACTIVE);return selected&&selected.length&&$.data(selected[0],"ac_data");},emptyList:function(){popupView.clearAll();},unbind:function(){element&&element.remove();},changeCategory:function(changeCat){isChangeCat=changeCat;},haveChangeCat:function(){return isChangeCat;}};};$.fn.selection=function(start,end){if(start!==undefined){return this.each(function(){if(this.createTextRange){var selRange=this.createTextRange();if(end===undefined||start==end){selRange.move("character",start);selRange.select();}else{selRange.collapse(true);selRange.moveStart("character",start);selRange.moveEnd("character",end);selRange.select();}}else if(this.setSelectionRange){this.setSelectionRange(start,end);}else if(this.selectionStart){this.selectionStart=start;this.selectionEnd=end;}});}var field=this[0];if(field.createTextRange){var range=document.selection.createRange(),orig=field.value,teststring="<->",textLength=range.text.length;range.text=teststring;var caretAt=field.value.indexOf(teststring);field.value=orig;this.selection(caretAt,caretAt+textLength);return{start:caretAt,end:caretAt+textLength}}else if(field.selectionStart!==undefined){return{start:field.selectionStart,end:field.selectionEnd}}};})(jQuery);