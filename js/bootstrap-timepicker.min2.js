/*! Bootstrap-Timepicker v0.1.0 
* http://jdewit.github.com/bootstrap-timepicker 
* Copyright (c) 2013 Joris de Wit 
* MIT License 
*/
(function(e,t,n,r){"use strict";var i=function(t,n){this.widget="",this.$element=e(t),this.defaultTime=n.defaultTime,this.disableFocus=n.disableFocus,this.isOpen=n.isOpen,this.minuteStep=n.minuteStep,this.modalBackdrop=n.modalBackdrop,this.secondStep=n.secondStep,this.showInputs=n.showInputs,this.showMeridian=n.showMeridian,this.showSeconds=n.showSeconds,this.template=n.template,this._init()};i.prototype={constructor:i,_init:function(){var t=this;this.$element.parent().hasClass("input-append")?(this.$element.parent(".input-append").find(".add-on").on({"click.timepicker":e.proxy(this.showWidget,this)}),this.$element.on({"focus.timepicker":e.proxy(this.highlightUnit,this),"click.timepicker":e.proxy(this.highlightUnit,this),"keydown.timepicker":e.proxy(this.elementKeydown,this),"blur.timepicker":e.proxy(this.blurElement,this)})):this.template?this.$element.on({"focus.timepicker":e.proxy(this.showWidget,this),"click.timepicker":e.proxy(this.showWidget,this),"blur.timepicker":e.proxy(this.blurElement,this)}):this.$element.on({"focus.timepicker":e.proxy(this.highlightUnit,this),"click.timepicker":e.proxy(this.highlightUnit,this),"keydown.timepicker":e.proxy(this.elementKeydown,this),"blur.timepicker":e.proxy(this.blurElement,this)}),this.template!==!1?this.$widget=e(this.getTemplate()).appendTo(this.$element.parents(".bootstrap-timepicker")).on("click",e.proxy(this.widgetClick,this)):this.$widget=!1,this.showInputs&&this.$widget!==!1&&this.$widget.find("input").each(function(){e(this).on({"click.timepicker":function(){e(this).select()},"keydown.timepicker":e.proxy(t.widgetKeydown,t)})}),this.setDefaultTime(this.defaultTime)},blurElement:function(){this.highlightedUnit=r,this.updateFromElementVal()},
decrementHour:function(){
if(this.showMeridian)if(this.hour===1)this.hour=24;else{if(this.hour===24)return this.hour--,this.toggleMeridian();if(this.hour===0)return this.hour=23,this.toggleMeridian();this.hour--}else this.hour===0?this.hour=23:this.hour--;this.update()},decrementMinute:function(e){var t;e?t=this.minute-e:t=this.minute-this.minuteStep,t<0?(this.decrementHour(),this.minute=t+60):this.minute=t,this.update()},decrementSecond:function(){var e=this.second-this.secondStep;e<0?(this.decrementMinute(!0),this.second=e+60):this.second=e,this.update()},elementKeydown:function(e){switch(e.keyCode){case 9:this.updateFromElementVal();switch(this.highlightedUnit){case"hour":e.preventDefault(),this.highlightNextUnit();break;case"minute":if(this.showMeridian||this.showSeconds)e.preventDefault(),this.highlightNextUnit();break;case"second":this.showMeridian&&(e.preventDefault(),this.highlightNextUnit())}break;case 27:this.updateFromElementVal();break;case 37:e.preventDefault(),this.highlightPrevUnit(),this.updateFromElementVal();break;case 38:e.preventDefault();switch(this.highlightedUnit){case"hour":this.incrementHour(),this.highlightHour();break;case"minute":this.incrementMinute(),this.highlightMinute();break;case"second":this.incrementSecond(),this.highlightSecond();break;case"meridian":this.toggleMeridian(),this.highlightMeridian()}break;case 39:e.preventDefault(),this.updateFromElementVal(),this.highlightNextUnit();break;case 40:e.preventDefault();switch(this.highlightedUnit){case"hour":this.decrementHour(),this.highlightHour();break;case"minute":this.decrementMinute(),this.highlightMinute();break;case"second":this.decrementSecond(),this.highlightSecond();break;case"meridian":this.toggleMeridian(),this.highlightMeridian()}}
},
formatTime:function(e,t,n,r){
	return e=e<10?"0"+e:e,t=t<10?"0"+t:t,n=n<10?"0"+n:n,e+":"+t+(this.showSeconds?":"+n:"")+(this.showMeridian?" "+r:"")
},getCursorPosition:function(){var e=this.$element.get(0);if("selectionStart"in e)return e.selectionStart;if(n.selection){e.focus();var t=n.selection.createRange(),r=n.selection.createRange().text.length;return t.moveStart("character",-e.value.length),t.text.length-r}},
getTemplate:function(){
	var e,t,n,r,i,s;
	/*var e,t,n,r,i,s;*/
	this.showInputs?(
		t='<input type="text" name="hour" class="bootstrap-timepicker-hour" maxlength="2"/>',
		n='<input type="text" name="minute" class="bootstrap-timepicker-minute" maxlength="2"/>',
		r='<input type="text" name="second" class="bootstrap-timepicker-second" maxlength="2"/>'/*,
		i='<input type="text" name="meridian" class="bootstrap-timepicker-meridian" maxlength="2"/>'*/
	):(
		t='<span class="bootstrap-timepicker-hour"></span>',
		n='<span class="bootstrap-timepicker-minute"></span>',
		r='<span class="bootstrap-timepicker-second"></span>'/*,
		i='<span class="bootstrap-timepicker-meridian"></span>'*/
	),
		s='<table><tr><td><a href="#" data-action="incrementHour"><i class="icon-chevron-up"></i></a></td><td class="separator">&nbsp;</td><td><a href="#" data-action="incrementMinute"><i class="icon-chevron-up"></i></a></td>'
		+(this.showSeconds?'<td class="separator">&nbsp;</td><td><a href="#" data-action="incrementSecond"><i class="icon-chevron-up"></i></a></td>':"")
		/*+(this.showMeridian?'<td class="separator">&nbsp;</td><td class="meridian-column"><a href="#" data-action="toggleMeridian"><i class="icon-chevron-up"></i></a></td>':"")*/
		+"</tr>"+"<tr>"+"<td>"+t+"</td> "+'<td class="separator">:</td>'+"<td>"+n+"</td> "
		+(this.showSeconds?'<td class="separator">:</td><td>'+r+"</td>":"")
		/*+(this.showMeridian?'<td class="separator">&nbsp;</td><td>'+i+"</td>":"")*/
		+"</tr>"+"<tr>"+'<td><a href="#" data-action="decrementHour"><i class="icon-chevron-down"></i></a></td>'+'<td class="separator"></td>'+'<td><a href="#" data-action="decrementMinute"><i class="icon-chevron-down"></i></a></td>'
		+(this.showSeconds?'<td class="separator">&nbsp;</td><td><a href="#" data-action="decrementSecond"><i class="icon-chevron-down"></i></a></td>':"")
		/*+(this.showMeridian?'<td class="separator">&nbsp;</td><td><a href="#" data-action="toggleMeridian"><i class="icon-chevron-down"></i></a></td>':"")+"</tr>"+"</table>";*/
		switch(this.template){
			case"modal":e='<div class="bootstrap-timepicker-widget modal hide fade in" data-backdrop="'
			+(this.modalBackdrop?"true":"false")+'">'+'<div class="modal-header">'+'<a href="#" class="close" data-dismiss="modal">×</a>'+"<h3>Pick a Time</h3>"+"</div>"+'<div class="modal-content">'+s+"</div>"+'<div class="modal-footer">'+'<a href="#" class="btn btn-primary" data-dismiss="modal">OK</a>'+"</div>"+"</div>";
			break;
			case"dropdown":e='<div class="bootstrap-timepicker-widget dropdown-menu">'+s+"</div>"
		}
		return e
},
getTime:function(){return this.formatTime(this.hour,this.minute,this.second/*,this.meridian*/)},
hideWidget:function(){
	if(this.isOpen===!1)
	return;
	this.$element.trigger({
		type:"hide.timepicker",time:{
			value:this.getTime(),hours:this.hour,minutes:this.minute,seconds:this.second/*,meridian:this.meridian*/}
	}),this.template==="modal"?this.$widget.modal("hide"):this.$widget.removeClass("open"),e(n).off("mousedown.timepicker"),this.isOpen=!1
},
highlightUnit:function(){
	this.position=this.getCursorPosition(),
	this.position>=0&&this.position<=2?this.highlightHour():
	this.position>=3&&this.position<=5?this.highlightMinute():
	this.position>=6&&this.position<=8?this.showSeconds?this.highlightSecond():
	this.highlightMeridian():this.position>=9&&this.position<=11&&this.highlightMeridian()
},
highlightNextUnit:function(){
	switch(this.highlightedUnit){
		case"hour":this.highlightMinute();
		break;
		case"minute":this.showSeconds?this.highlightSecond():
		this.showMeridian?this.highlightMeridian():
		this.highlightHour();
		break;
		case"second":this.showMeridian?this.highlightMeridian():
		this.highlightHour();
		break;
		case"meridian":this.highlightHour()
	}
},
highlightPrevUnit:function(){
	switch(this.highlightedUnit){
		case"hour":this.highlightMeridian();
		break;
		case"minute":this.highlightHour();
		break;
		case"second":this.highlightMinute();
		break;
		case"meridian":this.showSeconds?this.highlightSecond():
		this.highlightMinute()
	}
},
highlightHour:function(){
	var e=this.$element;
	this.highlightedUnit="hour",setTimeout(function(){e.get(0).setSelectionRange(0,2)},0)
},
highlightMinute:function(){
	var e=this.$element;this.highlightedUnit="minute",setTimeout(function(){e.get(0).setSelectionRange(3,5)},0)
},
highlightSecond:function(){
	var e=this.$element;this.highlightedUnit="second",setTimeout(function(){e.get(0).setSelectionRange(6,8)},0)
},
highlightMeridian:function(){
	var e=this.$element;this.highlightedUnit="meridian",
	this.showSeconds?setTimeout(function(){
		e.get(0).setSelectionRange(9,11)
	},0):setTimeout(function(){
		e.get(0).setSelectionRange(6,8)
	},0)
},
incrementHour:function(){
	if(this.showMeridian){
		if(this.hour===23)return this.hour++,this.toggleMeridian();if(this.hour===24)return this.hour=1
	}
	if(this.hour===23)
	return 
	this.hour=0;this.hour++,this.update()
},
incrementMinute:function(e){
	var t;
	e?t=this.minute+e:t=this.minute+this.minuteStep-this.minute%this.minuteStep,t>59?(this.incrementHour(),this.minute=t-60):this.minute=t,this.update()
},
incrementSecond:function(){
	var e=this.second+this.secondStep-this.second%this.secondStep;e>59?(this.incrementMinute(!0),this.second=e-60):this.second=e,this.update()
},
remove:function(){
	e("document").off(".timepicker"),this.$widget&&this.$widget.remove(),delete this.$element.data().timepicker
},
setDefaultTime:function(e){
	if(!this.$element.val())
		if(e==="current"){
			var t=new Date,n=t.getHours(),r=Math.floor(t.getMinutes()/this.minuteStep)*this.minuteStep,i=Math.floor(t.getSeconds()/this.secondStep)*this.secondStep,s="AM";
			/*this.showMeridian&&(n===0?n=24:n>=24?(n>24&&(n-=24),s="PM"):s="AM"),*/this.hour=n,this.minute=r,this.second=i/*,this.meridian=s*/,this.update()
		}else e===!1?(this.hour=0,this.minute=0,this.second=0,this.meridian="AM"):this.setTime(e);else this.updateFromElementVal()
},
setTime:function(e){
	var t,n;
	this.showMeridian?(t=e.split(" "),n=t[0].split(":"),
	this.meridian=t[1]):n=e.split(":"),
	this.hour=parseInt(n[0],10),
	this.minute=parseInt(n[1],10),
	this.second=parseInt(n[2],10),isNaN(this.hour)&&(this.hour=0),isNaN(this.minute)&&(this.minute=0);
	if(this.showMeridian){
		this.hour>24?this.hour=24:this.hour<1&&(this.hour=24);
		if(this.meridian==="am"||this.meridian==="a")this.meridian="AM";
		else 
		if(this.meridian==="pm"||this.meridian==="p")this.meridian="PM";
		this.meridian!=="AM"&&this.meridian!=="PM"&&(this.meridian="AM")
	}else 
	this.hour>=24?this.hour=23:this.hour<0&&(this.hour=0);
	this.minute<0?this.minute=0:this.minute>=60&&(this.minute=59),
		this.showSeconds&&(isNaN(this.second)?this.second=0:this.second<0?this.second=0:this.second>=60&&(this.second=59)),
		this.update()
},
showWidget:function(){
	if(this.isOpen)
	return;
	var t=this;e(n).on("mousedown.timepicker",function(n){e(n.target).closest(".bootstrap-timepicker-widget").length===0&&t.hideWidget()}),this.$element.trigger({
		type:"show.timepicker",time:{
			value:this.getTime(),
			hours:this.hour,
			minutes:this.minute,
			seconds:this.second/*,
			meridian:this.meridian*/
		}
	}),
	this.disableFocus&&this.$element.blur(),
	this.updateFromElementVal(),
	this.template==="modal"?this.$widget.modal("show").on("hidden",e.proxy(this.hideWidget,this)):this.isOpen===!1&&this.$widget.addClass("open"),
	this.isOpen=!0
},
toggleMeridian:function(){
	this.meridian=this.meridian==="AM"?"PM":"AM",this.update()
},
update:function(){
	this.$element.trigger({
		type:"changeTime.timepicker",time:{
			value:this.getTime(),
			hours:this.hour,
			minutes:this.minute,
			seconds:this.second/*,
			meridian:this.meridian*/
		}
	}),
	this.updateElement(),this.updateWidget()
},
updateElement:function(){
	this.$element.val(this.getTime())
},
updateFromElementVal:function(){
	this.setTime(this.$element.val())
},
updateWidget:function(){
	if(this.$widget===!1)
	return;
	var e=this.hour<10?"0"+this.hour:this.hour,
	t=this.minute<10?"0"+this.minute:this.minute,
	n=this.second<10?"0"+this.second:this.second;
	this.showInputs?(
		this.$widget.find("input.bootstrap-timepicker-hour").val(e),
		this.$widget.find("input.bootstrap-timepicker-minute").val(t),
		this.showSeconds&&this.$widget.find("input.bootstrap-timepicker-second").val(n),
		this.showMeridian&&this.$widget.find("input.bootstrap-timepicker-meridian").val(this.meridian)
	):(
		this.$widget.find("span.bootstrap-timepicker-hour").text(e),
		this.$widget.find("span.bootstrap-timepicker-minute").text(t),
		this.showSeconds&&this.$widget.find("span.bootstrap-timepicker-second").text(n),
		this.showMeridian&&this.$widget.find("span.bootstrap-timepicker-meridian").text(this.meridian)
	)
},
updateFromWidgetInputs:function(){
	if(this.$widget===!1)
	return;
	var t=e("input.bootstrap-timepicker-hour",this.$widget).val()+":"
		+e("input.bootstrap-timepicker-minute",this.$widget).val()+(this.showSeconds?":"
		/*+e("input.bootstrap-timepicker-second",this.$widget).val():"")+(this.showMeridian?" "*/
		+e("input.bootstrap-timepicker-meridian",this.$widget).val():"");this.setTime(t)
},
widgetClick:function(t){
	t.stopPropagation(),
	t.preventDefault();
	var n=e(t.target).closest("a").data("action");
	n&&this[n]()
},
widgetKeydown:function(t){
	var n=e(t.target).closest("input"),r=n.attr("name");
	switch(t.keyCode){
		case 9:this.updateFromWidgetInputs(),
		this.showMeridian?r==="meridian"&&this.hideWidget():this.showSeconds?r==="second"&&this.hideWidget():r==="minute"&&this.hideWidget();
		break;
		case 27:this.hideWidget();
		break;
		case 38:t.preventDefault();switch(r){
			case"hour":this.incrementHour();
			break;
			case"minute":this.incrementMinute();
			break;
			case"second":this.incrementSecond();
			break;
			case"meridian":this.toggleMeridian()
		}
		break;
		case 40:t.preventDefault();
		switch(r){
			case"hour":this.decrementHour();
			break;
			case"minute":this.decrementMinute();
			break;
			case"second":this.decrementSecond();
			break;
			case"meridian":this.toggleMeridian()
		}
	}
	n.select()
}},e.fn.timepicker=function(t){var n=Array.apply(null,arguments);return n.shift(),this.each(function(){var r=e(this),s=r.data("timepicker"),o=typeof t=="object"&&t;s||r.data("timepicker",s=new i(this,e.extend({},e.fn.timepicker.defaults,o,e(this).data()))),typeof t=="string"&&s[t].apply(s,n)})},e.fn.timepicker.defaults={defaultTime:"current",disableFocus:!1,isOpen:!1,minuteStep:15,modalBackdrop:!1,secondStep:15,showSeconds:!1,showInputs:!0,showMeridian:!0,template:"dropdown"},e.fn.timepicker.Constructor=i})(jQuery,window,document);