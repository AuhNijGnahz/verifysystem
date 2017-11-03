/// <reference path="jquery-3.1.1.min.js" />
$(function() {
	$(document).ready(function() {
		var xuehao = $('#xuehao').text();
		var isok;
		$.post({
			url: './app/admin-status.php',
			data: {
				'action': 'getstatus'
			},
			success: function(data) {
				var data = eval('(' + data + ')');
				if(data.status == '2') {
					isok = '0';
				} else {
					isok = '1';
				}
			}
		});
		if(isok == '1') {
			$.post({
				url: "verifydo.php",
				data: {
					'xuehao': xuehao,
					'action': '1'
				},
				success: function(data) {
					var data = eval('(' + data + ")");
					switch(data.status) {
						case '1':
							$('#verify>img').attr('src', './img/verid.png');
							$('#verifytime').text(data.verifytime);
							$('#information').remove();
							break;
						case '2':
							$('#verify>img').attr('src', './img/await.png');
							$('#verifytime').text(data.verifytime);
							$('#submitV').removeClass('btn').removeClass('btn-submit').addClass('btn-disabled').text('提交成功，审核中');
							break;
						case '3':
							$('#verify>img').attr('src', './img/unver.png');
							$('#verifytime').text(data.verifytime);
							$('#submitV').text('审核不通过，重新提交').addClass('btn-submit');
							break;
						case 'none':
							$('#verifytime').text('无');
							$('#verify>img').attr('src', './img/unver.png');
							$('#submitV').addClass('btn-submit');
					}
				}
			})
		} 
		else {
			$.post({
				url: "verifydo.php",
				data: {
					'xuehao': xuehao,
					'action': '1'
				},
				success: function(data) {
					var data = eval('(' + data + ")");
					switch(data.status) {
						case '1':
							$('#verify>img').attr('src', './img/verid.png');
							$('#verifytime').text(data.verifytime);
							$('#information').remove();
							break;
						case '2':
							$('#verify>img').attr('src', './img/await.png');
							$('#verifytime').text(data.verifytime);
							$('#submitV').removeClass('btn').removeClass('btn-submit').addClass('btn-disabled').text('提交成功，审核中');
							break;
						case '3':
							$('#verify>img').attr('src', './img/unver.png');
							$('#verifytime').text('无');
							$('#submitV').text('审核不通过且当前不允许重新提交').removeClass('btn').removeClass('btn-submit').addClass('btn-disabled');
							break;
						case 'none':
							$('#verifytime').text('无');
							$('#verify>img').attr('src', './img/unver.png');
							$('#submitV').removeClass('btn').removeClass('btn-submit').addClass('btn-disabled').text('当前不允许提交申请');
					}
				}
			})
		}
	})

	$('#information').on('click', '.btn-submit', function() {
		var name = $('#name').text();
		var xuehao = $('#xuehao').text();
		var major = $('#major').text();
		$.post({
			url: "verifydo.php",
			data: {
				'name': name,
				'xuehao': xuehao,
				'major': major,
				'action': '2'
			},
			success: function(data) {
				var data = eval('(' + data + ')');
				switch(data.status) {
					case 'success':
						$('#verify>img').attr('src', './img/await.png');
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