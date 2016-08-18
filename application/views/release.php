<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>发布新品</title>
    <base href="<?php echo site_url();?>"/>
    <link rel="stylesheet" href="assets/css/header.css">
    <link rel="stylesheet" href="assets/css/backs.css">
    <link rel="stylesheet" href="assets/css/release.css">
    <link rel="stylesheet" href="assets/css/seller_header.css">

    <link rel="stylesheet" href="assets/kindeditor/themes/default/default.css" />
    <script charset="utf-8" src="assets/kindeditor/kindeditor-min.js"></script>
    <script charset="utf-8" src="assets/kindeditor/lang/zh_CN.js"></script>
    <script>
        KindEditor.ready(function(K) {
            K.create('textarea[name="content"]', {
                autoHeightMode : true,
                afterCreate : function() {
                    this.loadPlugin('autoheight');
                }
            });
        });
    </script>
</head>
<body>
<?php include "header.php" ;?>
<?php include "backs.php" ;?>
<div class="container">
    <?php include "seller_header.php";?>
<!--    <div class="tab">-->
<!--            <span class="tab1"><a href="">店铺管理</a></span>-->
<!--            <span class="tab2"><a href="">物流管理</a></span>-->
<!--            <span class="tab3"><a href="">宝贝管理</a></span>-->
<!--            <span class="tab4"><a href="">交易管理</a></span>-->
<!--            <span class="tab5"><a href="">客户服务</a></span>-->
<!--        </div>-->
    <div class="left-nav">
        <div class="ln-1"><span>宝贝管理</span></div>
        <div class="ln-2">
            <a href="#"><span class="ln-2-1">发布宝贝&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&gt;</span></a>
            <a href=""><span class="ln-2-2 second">出售的宝贝</span></a>
            <a href="seller/prodcate_add"><span class="ln-2-2">商品类别</span></a>
        </div>
    </div>

   
    <div class="add">
        <div class="add_nav">
            <span>☷&nbsp;添&nbsp;加</span>
        </div>
        <div class="addition">
            <div class="content">
                <form action="personal/upload_product" method="post" enctype="multipart/form-data" id="detail" >
                    <table>
                        <tr class="common">
                            <td><label for="product_name"  ">宝贝标题:</label></td>
                            <td><input type="text" p
                                       laceholder="输入商品名称..." name="product_name" ></td>
                        </tr>
                        <tr class="kind common">
                            <td><label for="category_id" style="position:relative; top:-30px;">产品类型：</label></td>
                            <td>
                                <ul>
                                    <?php
                                    foreach ($cs as $c){
                                        ?>
                                        <li><input type="checkbox" name="category_id"  value="<?php echo $c->category_id; ?>" /><?php echo $c->category_name;                                           ?></li>
                                    <?php } ?>
                                </ul>
                            </td>
                        </tr>

                        <tr class="kind common">
                            <td><label for="sales_volume" style="position:relative; top:-14px;">规格尺寸：</label></td>
                            <td>
                                <ul>
                                    <li>
                                        <input type="checkbox" name="size" id="ct" value="6" onclick="show();">6英寸
                                        <input type="text" id="size" name="price" placeholder="价格（元）：" style="display:none;position: relative;top: -10px;width: 112px;height: 28px;color:#717171;">
                                    </li>
<!--                                    <li>-->
<!--                                        8英寸<input type="checkbox" name="8" id="eight" onclick="show('eight');">-->
<!--                                        <input type="text" id="eight" value="价格（元）:" style="display:none;position: relative;top: -10px;width: 112px;height: 28px;color:#717171;">-->
<!--                                    </li>-->
<!--                                    <li>-->
<!--                                        10英寸<input type="checkbox" name="10" id="ten" onclick="show('ten');">-->
<!--                                        <input type="text" id="ten" value="价格（元）:" style="display:none;position: relative;top: -10px;width: 112px;height: 28px;color:#717171;">-->
<!--                                    </li>-->
                                    <li>添加<input type="checkbox"/></li>
                                </ul>
                            </td>
                        </tr>
                        <tr class="kind common">
                            <td><label for="product_introduce" style="position:relative; top:-14px;">产品简介:</label></td>
                            <td><textarea class="" rows="3" placeholder="输入商品简介..."  name="product_introduce" style="width: 538px;height: 62px;"></textarea></td>
                        </tr>
                        <tr class="common">
                            <td><label for="product_date"  ">生产日期:</label></td>
                            <td><input type="text" name="product_date" placeholder="2000-01-01"></td>
                        </tr>
                        <tr class="common">
                            <td><label for="product_quality_date"  ">保质期:</label></td>
                            <td><input type="text" name="product_quality_date" placeholder="天">&nbsp;<span style="font-size:12px;color:#989696;"></td>
                        </tr>

                        <tr class="common">
                            <td><label for="product_burdening"  style="position:relative; top:-30px;">配料:</label></td>
                            <td><textarea class="" rows="3" id=""  name="product_burdening" style="width: 540px;height: 84px;"></textarea></td>
                        </tr>

                        <tr class="common">
                            <td><label for="product_name"  ">储存方法:</label></td>
                            <td><input type="text" name="product_time" ></td>
                        </tr>

                        <tr class="common">
                            <td><label for="product_name"  ">净含量:</label></td>
                            <td><input type="text" name="product_time" ></td>
                        </tr>
                        <tr class="kind common">
                            <td><label for="product_introduce" style="position:relative; top:-100px;">图片上传:</label></td>
                            <td><div id="tab-content">
                                <ul id="tab">
                                    <li class="selected">本地上传</li>
                                    <li>图片空间</li>
                                    <li>视频中心</li>
                                </ul>
                                <div id="content">
                                    <div class="selected" id="load">
                                        选择本地图片：<span>文件上传</span>
                                        <p class="hint">提示： 1.本地上传图片大小不能超过3M</p>
                                        <p class="hint">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.本类目下您最多可上传5张图片</p>
                                        
                                        
                                    </div>
                                    <div></div>
                                    <div></div>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <tr class="kind common">
                            <td><label for="product_introduce" style="position:relative; top:40px;">宝贝描述:</label></td>
                            <td>
                                
                                <tr>
                                    <td>
                                        <div class="ke-container ke-container-default" style="float:right;margin-right:10px;width: 622px;height:238px;"><div style="display:block;" class="ke-toolbar" unselectable="on"><span class="ke-outline" data-name="source" title="HTML代码" unselectable="on"><span class="ke-toolbar-icon ke-toolbar-icon-url ke-icon-source" unselectable="on"></span></span><span class="ke-inline-block ke-separator"></span><span class="ke-outline" data-name="undo" title="后退(Ctrl+Z)" unselectable="on"><span class="ke-toolbar-icon ke-toolbar-icon-url ke-icon-undo" unselectable="on"></span></span><span class="ke-outline" data-name="redo" title="前进(Ctrl+Y)" unselectable="on"><span class="ke-toolbar-icon ke-toolbar-icon-url ke-icon-redo" unselectable="on"></span></span><span class="ke-inline-block ke-separator"></span><span class="ke-outline" data-name="preview" title="预览" unselectable="on"><span class="ke-toolbar-icon ke-toolbar-icon-url ke-icon-preview" unselectable="on"></span></span><span class="ke-outline" data-name="print" title="打印(Ctrl+P)" unselectable="on"><span class="ke-toolbar-icon ke-toolbar-icon-url ke-icon-print" unselectable="on"></span></span><span class="ke-outline" data-name="template" title="插入模板" unselectable="on"><span class="ke-toolbar-icon ke-toolbar-icon-url ke-icon-template" unselectable="on"></span></span><span class="ke-outline" data-name="code" title="插入程序代码" unselectable="on"><span class="ke-toolbar-icon ke-toolbar-icon-url ke-icon-code" unselectable="on"></span></span><span class="ke-outline" data-name="cut" title="剪切(Ctrl+X)" unselectable="on"><span class="ke-toolbar-icon ke-toolbar-icon-url ke-icon-cut" unselectable="on"></span></span><span class="ke-outline" data-name="copy" title="复制(Ctrl+C)" unselectable="on"><span class="ke-toolbar-icon ke-toolbar-icon-url ke-icon-copy" unselectable="on"></span></span><span class="ke-outline" data-name="paste" title="粘贴(Ctrl+V)" unselectable="on"><span class="ke-toolbar-icon ke-toolbar-icon-url ke-icon-paste" unselectable="on"></span></span><span class="ke-outline" data-name="plainpaste" title="粘贴为无格式文本" unselectable="on"><span class="ke-toolbar-icon ke-toolbar-icon-url ke-icon-plainpaste" unselectable="on"></span></span><span class="ke-outline" data-name="wordpaste" title="从Word粘贴" unselectable="on"><span class="ke-toolbar-icon ke-toolbar-icon-url ke-icon-wordpaste" unselectable="on"></span></span><span class="ke-inline-block ke-separator"></span><span class="ke-outline" data-name="justifyleft" title="左对齐" unselectable="on"><span class="ke-toolbar-icon ke-toolbar-icon-url ke-icon-justifyleft" unselectable="on"></span></span><span class="ke-outline" data-name="justifycenter" title="居中" unselectable="on"><span class="ke-toolbar-icon ke-toolbar-icon-url ke-icon-justifycenter" unselectable="on"></span></span><span class="ke-outline" data-name="justifyright" title="右对齐" unselectable="on"><span class="ke-toolbar-icon ke-toolbar-icon-url ke-icon-justifyright" unselectable="on"></span></span><span class="ke-outline" data-name="justifyfull" title="两端对齐" unselectable="on"><span class="ke-toolbar-icon ke-toolbar-icon-url ke-icon-justifyfull" unselectable="on"></span></span><span class="ke-outline" data-name="insertorderedlist" title="编号" unselectable="on"><span class="ke-toolbar-icon ke-toolbar-icon-url ke-icon-insertorderedlist" unselectable="on"></span></span><span class="ke-outline" data-name="insertunorderedlist" title="项目符号" unselectable="on"><span class="ke-toolbar-icon ke-toolbar-icon-url ke-icon-insertunorderedlist" unselectable="on"></span></span><span class="ke-outline" data-name="indent" title="增加缩进" unselectable="on"><span class="ke-toolbar-icon ke-toolbar-icon-url ke-icon-indent" unselectable="on"></span></span><span class="ke-outline" data-name="outdent" title="减少缩进" unselectable="on"><span class="ke-toolbar-icon ke-toolbar-icon-url ke-icon-outdent" unselectable="on"></span></span><span class="ke-outline" data-name="subscript" title="下标" unselectable="on"><span class="ke-toolbar-icon ke-toolbar-icon-url ke-icon-subscript" unselectable="on"></span></span><span class="ke-outline" data-name="superscript" title="上标" unselectable="on"><span class="ke-toolbar-icon ke-toolbar-icon-url ke-icon-superscript" unselectable="on"></span></span><span class="ke-outline" data-name="clearhtml" title="清理HTML代码" unselectable="on"><span class="ke-toolbar-icon ke-toolbar-icon-url ke-icon-clearhtml" unselectable="on"></span></span><span class="ke-outline" data-name="quickformat" title="一键排版" unselectable="on"><span class="ke-toolbar-icon ke-toolbar-icon-url ke-icon-quickformat" unselectable="on"></span></span><span class="ke-outline" data-name="selectall" title="全选(Ctrl+A)" unselectable="on"><span class="ke-toolbar-icon ke-toolbar-icon-url ke-icon-selectall" unselectable="on"></span></span><span class="ke-inline-block ke-separator"></span><span class="ke-outline" data-name="fullscreen" title="全屏显示" unselectable="on"><span class="ke-toolbar-icon ke-toolbar-icon-url ke-icon-fullscreen" unselectable="on"></span></span><div class="ke-hr"></div></td></tr>
                                <tr class="submit">
                                <td>
                                <input value=" 保存 " type="submit" style="position: relative;left: 620px;">
                                <input value=" 恢复编辑历史 " type="submit" style="position: relative;left: 620px;">
                                </td>
                                </tr>
                                
                            </td>
                        </tr>

                        <tr class="kind common">
                            <td><label for="product_introduce" style="position:relative; top:-6px;">宝贝物流服务运费:</label></td>
                            <td>发货地：<input type="text" name="product_time"></td><br />
                            <td>默认服务运费：<input type="text" name="product_time" ></td>
                        </tr>

                        <tr>
                            <td><input type="submit" class="release" value="上&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;传"></input></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>

</div>
<script>
    var oTab = document.getElementById('tab');
    var aLi = oTab.getElementsByTagName('li');
    var oContent = document.getElementById('content');
    var aDiv = oContent.getElementsByTagName('div');

    for(var i=0;i<aLi.length;i++){
        aLi[i].index=i;
        aLi[i].onclick=function(){
            for(var i=0;i<aLi.length;i++){
                aLi[i].className="";
                aDiv[i].className="";
            }
            this.className='selected';
            aDiv[this.index].className='selected';
        }   
    }

    function show(){
        if (!ct.checked){
            size.style.display="none";
        }else{
            size.style.display="";
        }
    }
</script>
</body>
</html>