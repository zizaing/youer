<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:78:"/data/home/bxu2713310775/htdocs/application/admin/view/index/add_new_cate.html";i:1501414052;}*/ ?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Amaze UI Admin index Examples</title>
    <meta name="description" content="这是一个 index 页面">
    <meta name="keywords" content="index">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="icon" type="image/png" href="__STATIC__/assets/i/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="__STATIC__/assets/i/app-icon72x72@2x.png">
    <meta name="apple-mobile-web-app-title" content="Amaze UI" />
    <link rel="stylesheet" href="__STATIC__/assets/css/amazeui.min.css" />
    <link rel="stylesheet" href="__STATIC__/assets/css/admin.css">
    <link rel="stylesheet" href="__STATIC__/assets/css/app.css">
</head>

<body>





<div class="tpl-portlet-components">
    <div class="portlet-title">
        <div class="caption font-green bold">
            用户组添加
        </div>
        <div class="tpl-portlet-input tpl-fz-ml">
            <div class="portlet-input input-small input-inline">
                <div class="input-icon right">
                    <i class="am-icon-search"></i>
                    <input type="text" class="form-control form-control-solid" placeholder="搜索..."> </div>
            </div>
        </div>


    </div>
    <div class="tpl-block ">

        <div class="am-g tpl-amazeui-form">


            <div class="am-u-sm-12 am-u-md-9">
                <form class="am-form am-form-horizontal" method="post" action="<?php echo url('index/do_add_new_cate'); ?>">
                    <div class="am-form-group">
                        <label for="rule_en_name" class="am-u-sm-3 am-form-label">分类标题 / Title</label>
                        <div class="am-u-sm-9">
                            <input type="text" name="cate_title" id="rule_en_name" placeholder="分类标题 / Title">
                            <small class="showenmsgs" id="showenmsg"></small>
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label class="am-u-sm-3 am-form-label">所属分类</label>
                        <div class="am-u-sm-9">
                            <select name="pid">
                                <option value="0">选择标题类型</option>
                                <?php if(is_array($rulelist) || $rulelist instanceof \think\Collection || $rulelist instanceof \think\Paginator): $i = 0; $__LIST__ = $rulelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                <option value="<?php echo $vo['id']; ?>"><?php echo $vo['cate_title']; ?></option>
                                <?php if(is_array($vo['second']) || $vo['second'] instanceof \think\Collection || $vo['second'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['second'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sec): $mod = ($i % 2 );++$i;?>
                                <option value="<?php echo $sec['id']; ?>">-----<?php echo $sec['cate_title']; ?></option>
                                <?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </div>
                    </div>

                    <div class="am-form-group">
                        <div class="am-u-sm-9 am-u-sm-push-3">
                            <button type="submit" class="am-btn am-btn-primary">确认添加</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>






<script src="__STATIC__/assets/js/jquery.min.js"></script>
<script src="__STATIC__/assets/js/amazeui.min.js"></script>
<script src="__STATIC__/assets/js/app.js"></script>
<script type="text/javascript">
    $('#rule_en_name').blur(function(){  //鼠标离开焦点时执行方法
        var Enname=$(this).val();
        if(Enname=='')
        {
            $('#showenmsg').html('英文名称不可为空');
            $('#showenmsg').css('color','red');
            $('.am-btn-primary').attr('disabled',true);
            return false;
        }
        $.ajax({
            url:"<?php echo url('Index/checkenname'); ?>",//请求地址
            type:"post",//请求方式
            data:{names:Enname},//检测输入英文名是否合理
            success:function(data){
                //alert(data.status);
                $('#showenmsg').html(data.msg);
                if(data.status)
                {
                    $('#showenmsg').css('color','red');
                    $('.am-btn-primary').attr('disabled',true);
                }else{
                    $('#showenmsg').css('color','green');
                    $('.am-btn-primary').attr('disabled',false);
                }
            }
        });
    });
    $('#rule_zh_name').blur(function(){
        var zhname=$(this).val();
        if(zhname=='')
        {
            $('#showzhmsg').html('英文名称不可为空');
            $('#showzhmsg').css('color','red');
            $('.am-btn-primary').attr('disabled',true);
            return false;
        }
        $.ajax({
            url:"<?php echo url('Index/checkzhname'); ?>",
            type:"post",
            data:{names:zhname},
            success:function(data){
                //alert(data.status);
                $('#showzhmsg').html(data.msg);
                if(data.status)
                {
                    $('#showzhmsg').css('color','red');
                    $('.am-btn-primary').attr('disabled',true);
                }else{
                    $('#showzhmsg').css('color','green');
                    $('.am-btn-primary').attr('disabled',false);
                }
            },
            error:function(){
                alert('未知错误');
            }
        });
    });
</script>
</body>

</html>