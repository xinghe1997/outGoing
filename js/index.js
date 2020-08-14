$(function(){
	//$('form > button').attr('disabled','disabled ');
	$('#add').click(function(){
		$('form').show(800,function(){
			$('form > .number').show(800);
			$('form > .supplier').show(800);	
		});
		Test('add');
	});	
	$('#delect').click(function(){
		$('form').show(800,function(){
			$('form > .number').hide();
			$('form > .supplier').hide();
		});
		Test('delect');
	});
//定时器  刷新时间
setInterval(newDate,1000);
});
//过滤非法内容
function Test(luck){
	console.log(2);
	if(luck == 'add'){
		$('form').submit(function(){
			var bool = true;
			$('form > input:lt(2)').each(function(){
				var val = $(this).val();
				if(!/^\d+$/.test(val) || val == '' ){
					$(this).css('border','1px solid red');
					//$('form > button').attr('disabled','disabled ');
					bool = false;
					$('.top > span').show(function(){
						$(this).text('单号或数量错误请重新输入');
					});
				}else{
					$(this).css('border','1px solid #ced4da');
				}
			})
			if($("input[name='supplier']").val() ==''){
					$("input[name='supplier']").css('border','1px solid red');
					bool = false;
					$('.top > span').show(function(){
						$(this).text('供应商不能为空');
					});
			}
			return bool;
			});	
	}
//完工
	if(luck == 'delect'){
		console.log(1);
		$('form').submit(function(){
			var bool = true;
				var val = $('.id').val();
				if(!/^\d+$/.test(val) || val == ''){
					$('.id').css('border','1px solid red');
					//$('form > button').attr('disabled','disabled ');
					bool = false;
					$('.top > span').show(function(){
						$(this).text('输入错误请重新输入');
					});
				}else{
					$('.id').css('border','1px solid #ced4da');
				}
			var tr = $('#tr > td:nth-child(1)');
			var date = '';
			bool = false;
			tr.each(function(){
				if(val != $(this).text()){
					$('.top > span').show(function(){
						$(this).text('单号不存在');
					});
				}else{
					bool = true;
					date = $(this).siblings("#date").text();
				}
			});
			$(".number").attr('name','date');
			$(".number").val(date);
			$(this).attr('action','delect.php');
			return bool;
			});	
	}
	
}	
//格式化时间
function newDate(){
	var date = $('#tr > td:nth-child(3)');
	date.each(function(){
		var dateval = $(this).attr("data-day");
		var day = Math.floor(new Date().getTime() / 1000) - (new Date(dateval).getTime() / 1000);
		day2 = Math.floor(day / (24 * 3600));
		day3 = day2 * 24 * 3600;
		day4 = day - day3;
		day5 = Math.floor(day4 / 3600);
		day6 = day4 - day5 * 3600;
		day7 = Math.floor(day6 / 60);
		day8 = day6 - day7 * 60;
		$(this).text(`${day2} 天 ${day5} 小时 ${day7} 分钟 ${day8} 秒`);
	});
	/**
	console.log(date);
	
	**/
}	