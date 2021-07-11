// Javascript Documnet
// board_com.js

$(document).ready(function(){

	$(".cm_edit_btn").click(function(){
		/* cm_edit_btn 클래스 클릭시 동작(댓글 수정) */
			var obj = $(this).closest(".dap_lo").find(".cm_edit");
			obj.dialog({
				modal:true,
				width:650,
				height:200,
				title:"댓글 수정"});
		});

	$(".cm_del_btn").click(function(){
		/* cm_del_btn 클래스 클릭시 동작(댓글 삭제) */
		var obj = $(this).closest(".dap_lo").find(".cm_del");
		obj.dialog({
			modal:true,
			width:400,
			title:"댓글 삭제확인"});
		});

	});