/// <reference path="jquery-3.1.1.min.js" />
    $('body').on('click','#searchV',function(){
        var status = $('#stype').val();
        $.post({
            url:'admin-search.php',
            data:{'action':'search','status':status},
            success:function(data){
                $('#result').html(data);
            }
        })
    })
    $('body').on('click','#grant',function(){
        var acid = $(this).attr('data-acid');
        $.post({
            url:'admin-search.php',
            data:{'action':'grant','acid':acid},
            success:function(data){
                var data = eval('('+data+')');
                switch(data.status){
                    case 'success':
                        alert('操作成功，已将UID为：'+acid+" 的用户通过审核");
                        break;
                    case 'error':
                        alert('操作失败');
                        break;
                }
                $('#searchV').trigger('click');
            }
        })
    })
    $('body').on('click','#denied',function(){
        var acid = $(this).attr('data-acid');
        $.post({
            url:'admin-search.php',
            data:{'action':'denied','acid':acid},
            success:function(data){
                var data = eval('('+data+')');
                switch(data.status){
                    case 'success':
                        alert('操作成功，已将UID为：'+acid+" 的用户的审核驳回");
                        break;
                    case 'error':
                        alert('操作失败');
                        break;
                }
                $('#searchV').trigger('click');
            }
        })
    })
    	$.post({
            url:'admin-status.php',
            data:{'action':'getstatus'},
            success:function(data){
                var data = eval('('+data+')');
                switch(data.status){
                	case '2':
                	$('#byx').attr('checked','checked');
                	break;
                	case '1':
                	$('#yx').attr('checked','checked');
                	break;
                }
            }
       })
    $('body').on('click','#changeV',function(){
    	var status = $('input:radio[name="tj"]:checked').val();
    	$.post({
    		url:'admin-status.php',
    		data:{'action':'changest','status':status},
    		success:function(data){
    			var data = eval('('+data+')');
                switch(data.status){
                    case 'success':
                        alert('操作成功！');
                        break;
                    case 'error':
                        alert('操作失败！');
                        break;
                }
    		}
    		
    	})
    })



