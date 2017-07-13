/// <reference path="jquery-3.1.1.min.js" />
$(function() {
    $(document).ready(function(){
        var xuehao = $('#xuehao').text();
		$.post({
			url:"verifydo.php",
			data:{
				'xuehao':xuehao,
				'action':'1'
			},
			success: function(data){
				var data = eval('('+data+")");
				switch(data.status){
					case '1':
						$('#verify>img').attr('src','./img/verid.png');
						$('#verifytime').text(data.verifytime);
						$('#information').remove();
                        break;
					case '2':
						$('#verify>img').attr('src','./img/await.png');
						$('#verifytime').text(data.verifytime);
						$('#submitV').removeClass('btn').removeClass('btn-submit').addClass('btn-disabled').text('提交成功，审核中');
                        break;
					case '3':
						$('#verify>img').attr('src','./img/unver.png');
						$('#verifytime').text(data.verifytime);
						$('#submitV').text('审核不通过，重新提交').addClass('btn-submit');
                        break;
					case 'none':
						$('#verifytime').text('无');
						$('#verify>img').attr('src','./img/unver.png');
						$('#submitV').addClass('btn-submit');
				}
			}
		})
	})

	$('#information').on('click','.btn-submit',function() {
        var name = $('#name').text();
        var xuehao = $('#xuehao').text();
        var major = $('#major').text();
        $.post({
            url: "verifydo.php",
            data: {
                'name': name,
                'xuehao': xuehao,
                'major': major,
				'action':'2'
            },
            success: function(data) {
				var data = eval('('+data+')');
                switch (data.status) {
                    case 'success':
						$('#verify>img').attr('src','./img/await.png');
						$('#submitV').removeClass('btn').removeClass('btn-submit').addClass('btn-disabled').text('提交成功，审核中');
                        break;
                    case 'error':
						alert('提交失败！');
                        break;
                    default:
                        alert("未知错误！");
                        break;
                }
            }
        })
    })
})
