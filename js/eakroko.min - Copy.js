/*
	* eakroko.js - Copyright 2013 by Ernst-Andreas Krokowski
	* Framework for themeforest themes

	* Date: 2013-01-01
	*/
	function resize_chosen(){$(".chzn-container").each(function(){
	var e=$(this);
	e.css("width",e.parent().width()+"px");
	e.find(".chzn-drop").css("width",e.parent().width()-2+"px");
	e.find(".chzn-search input").css("width",e.parent().width()-37+"px")})}
	$(document).ready(function(){
		var e=!1,t=!0,n="button-active";/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent)&&(e=!0);$(".chart").length>0&&$(".chart").each(function(){var e="#881302",t=$(this);t.attr("data-color")?e=t.attr("data-color"):parseInt(t.attr("data-percent"))<=25?e="#046114":parseInt(t.attr("data-percent"))>25&&parseInt(t.attr("data-percent"))<75&&(e="#dfc864");t.easyPieChart({animate:1e3,barColor:e,lineWidth:3})});

		if($(".calendar").length>0){
			$(".calendar").fullCalendar({
				header:{left:"today,prev,next",center:"title",right:"month,agendaWeek,agendaDay"},
				buttonText:{today:"Today"},
				editable:!0});
			$(".fc-button-effect").remove();
			$(".fc-button-next .fc-button-content").html("<i class='icon-chevron-right'></i>");
			$(".fc-button-prev .fc-button-content").html("<i class='icon-chevron-left'></i>");
			$(".fc-button-today").addClass("fc-corner-right");
			$(".fc-button-prev").addClass("fc-corner-left")
		}
		t?e||$("[rel=tooltip]").tooltip({delay:300}):$("a[rel=tooltip]").tooltip({delay:300});
		$(".notify").click(function(){
			var e=$(this),
			t=e.attr("data-notify-title"),
			r=e.attr("data-notify-message"),
			i=e.attr("data-notify-image"),
			s=e.attr("data-notify-time"),
			o=e.attr("data-notify-sticky");
			
			if($(".notify-toggle").hasClass(n)){
				r=r.replace("{{state}}",e.hasClass("button-active")?"off":"on");
				$.gritter.add({
					title:typeof t!="undefined"?t:"Message - Head",text:typeof r!="undefined"?r:"Body",image:typeof i!="undefined"?i:null,sticky:typeof o!="undefined"?o:!1,time:typeof s!="undefined"?s:5e3})
			}
		});
		$(".mask_date").length>0&&$(".mask_date").mask("9999/99/99");
		$(".mask_wkt").length>0&&$(".mask_wkt").mask("99:99");
		$(".mask_phone").length>0&&$(".mask_phone").mask("(999) 999-999-999");
		$(".mask_serialNumber").length>0&&$(".mask_serialNumber").mask("9999-9999-99");
		$(".mask_productNumber").length>0&&$(".mask_productNumber").mask("aaa-9999-a");
		$(".tagsinput").length>0&&$(".tagsinput").tagsInput({width:"auto",height:"auto"});
		$(".datepick").length>0&&$(".datepick").datepicker();
		$(".timepick").length>0&&$(".timepick").timepicker({defaultTime:"current",minuteStep:1,disableFocus:!0,template:"dropdown"});
		$(".colorpick").length>0&&$(".colorpick").colorpicker();
		$(".uniform-me").length>0&&$(".uniform-me").uniform({radioClass:"uni-radio",buttonClass:"uni-button"});
		$(".chosen-select").length>0&&$(".chosen-select").chosen();
		$(".multiselect").length>0&&$(".multiselect").each(function(){
			var e=$(this),
			t=e.attr("data-selectableheader"),
			n=e.attr("data-selectionheader");
			t!=undefined&&(t="<div class='multi-custom-header'>"+t+"</div>");
			n!=undefined&&(n="<div class='multi-custom-header'>"+n+"</div>");
			e.multiSelect({selectionHeader:n,selectableHeader:t})
		});
		$(".spinner").length>0&&$(".spinner").spinner();
		$(".cleditor").length>0&&$(".cleditor").cleditor({width:"auto"});
		
		if($(".plupload").length>0){
			$(".plupload").pluploadQueue({
				runtimes:"html5,gears,flash,silverlight,browserplus",
				url:"js/plupload/upload.php",
				max_file_size:"10mb",
				chunk_size:"1mb",
				unique_names:!0,
				resize:{
					width:320,
					height:240,
					quality:90
				},
				filters:[{
					title:"Image files",
					extensions:"jpg,gif,png"
				},{
					title:"Zip files",
					extensions:"zip"
				}],
				flash_swf_url:"js/plupload/plupload.flash.swf",
				silverlight_xap_url:"js/plupload/plupload.silverlight.xap"
			});
			
			$(".plupload_header").remove();
			$(".plupload_progress_container").addClass("progress").addClass("progress-striped");
			$(".plupload_progress_bar").addClass("bar");
			$(".plupload_button").each(function(){
				$(this).hasClass("plupload_add")?$(this).attr("class","button button-basic pl_add"):$(this).attr("class","button button-basic pl_start")
			})
		}
		$(".form-wizard").length>0&&$(".form-wizard").formwizard({
			formPluginEnabled:!0,
			validationEnabled:!0,
			focusFirstInput:!1,
			validationOptions:{
				errorElement:"span",
				errorClass:"help-block error",
				errorPlacement:function(e,t){
					t.parents(".controls").append(e)
				},
				highlight:function(e){
					$(e).closest(".control-group").removeClass("error success").addClass("error")
				},
				success:function(e){
					e.addClass("valid").closest(".control-group").removeClass("error success").addClass("success")
				}
			},
			formOptions:{
				success:function(){},
				beforeSubmit:function(){},
				dataType:"json",resetForm:!0
			}
		});
		$(".form-validate").length>0&&$(".form-validate").each(function(){
			var e=$(this).attr("id");
			$("#"+e).validate({
				errorElement:"span",
				errorClass:"help-block error",
				errorPlacement:function(e,t){
					t.parents(".controls").append(e)
				},
				highlight:function(e){
					$(e).closest(".control-group").removeClass("error success").addClass("error")
				},
				success:function(e){
					e.addClass("valid").closest(".control-group").removeClass("error success").addClass("success")
				}
			})
		});
		
		$(".dataTable").length>0&&$(".dataTable").each(function(){
			var e={sPaginationType:"full_numbers",
			oLanguage:{
				sSearch:"<span>Search:</span> ",
				sInfo:"Showing <span>_START_</span> to <span>_END_</span> of <span>_TOTAL_</span> entries",
				sLengthMenu:"<span>Show entries:</span> _MENU_"
			}};
			if($(this).hasClass("dataTable-noheader")){
				e.bFilter=!1;
				e.bLengthChange=!1
			}
			if($(this).hasClass("dataTable-nofooter")){
				e.bInfo=!1;e.bPaginate=!1
			}
			if($(this).hasClass("dataTable-nosort")){
				var t=$(this).data("nosort");
				t=t.split(",");
				for(var n=0;n<t.length;n++)t[n]=parseInt(t[n]);
				e.aoColumnDefs=[{bSortable:!1,aTargets:t}]}
				if($(this).hasClass("dataTable-tools")){
					e.sDom='T<"clear">lfrtip';
					e.oTableTools={sSwfPath:"js/swf/copy_csv_xls_pdf.swf"}
				}
				$(this).dataTable(e);
				$(".dataTables_filter input").attr("placeholder","Search here...")
		});

		resize_chosen();
		$(".file-manager").length>0&&$(".file-manager").elfinder({
			url:"js/elfinder/php/connector.php"
		});
		$(".slider").length>0&&$(".slider").each(function(){
			var e=$(this),
			t=parseInt(e.attr("data-min")),
			n=parseInt(e.attr("data-max")),
			r=parseInt(e.attr("data-step")),
			i=e.attr("data-range"),
			s=parseInt(e.attr("data-rangestart")),
			o=parseInt(e.attr("data-rangestop")),
			u={min:t,max:n,step:r,slide:function(t,n){e.find(".amount").html(n.value)}};
			
			if(i!==undefined){
				u.range=!0;
				u.values=[s,o];
				u.slide=function(t,n){
					e.find(".amount").html(n.values[0]+" - "+n.values[1])
				}
			}
			e.slider(u);
			
			if(i!==undefined){
				var a=e.slider("values");
					e.find(".amount").html(a[0]+" - "+a[1])
			}
			else e.find(".amount").html(e.slider("value"))
		})
	});
	$(window).resize(function(){resize_chosen()});