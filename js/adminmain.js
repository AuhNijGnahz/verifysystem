/// <reference path="jquery-3.1.1.min.js" />
$(function(){
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
})