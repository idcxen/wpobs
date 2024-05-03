<link rel='stylesheet'  href='<?php echo plugin_dir_url(__FILE__); ?>layui/css/layui.css' />
<link rel='stylesheet'  href='<?php echo plugin_dir_url(__FILE__); ?>layui/css/laobuluo.css'/>
<script src='<?php echo plugin_dir_url(__FILE__); ?>layui/layui.js'></script>
<style type="text/css">
.wpobsform .layui-form-label{width:120px;}
.wpobsform .layui-input{width: 350px;}
.wpobsform .layui-form-mid{margin-left:3.5%;}
.wpobsform .layui-form-mid p{padding: 3px 0;}
.laobuluo-wp-hidden {position: relative;}
.laobuluo-wp-hidden .laobuluo-wp-eyes{padding: 5px;position:absolute;top:3px;z-index: 999;display: none;}
.laobuluo-wp-hidden i{font-size:20px;}
.laobuluo-wp-hidden i.dashicons-visibility{color:#009688 ;}
</style>
<div class="container-laobuluo-main">
    <div class="laobuluo-wbs-header" style="margin-bottom: 15px;">
        <div class="laobuluo-wbs-logo">
            <a>
                <img src="<?php echo plugin_dir_url(__FILE__); ?>layui/images/logo.png">
            </a><span class="wbs-span">WPOBS华为云对象存储插件</span><span class="wbs-free">Free V2.1</span>
        </div>
        <div class="laobuluo-wbs-btn">
            <a class="layui-btn layui-btn-primary" href="https://www.lezaiyun.com/?utm_source=wpobs-setting&utm_media=link&utm_campaign=header" target="_blank">
                <i class="layui-icon layui-icon-home"></i> 插件主页
            </a>
            <a class="layui-btn layui-btn-primary" href="https://www.lezaiyun.com/wpobs.html?utm_source=wpobs-setting&utm_media=link&utm_campaign=header" target="_blank">
                <i class="layui-icon layui-icon-release"></i> 插件教程
            </a>
        </div>
    </div>
</div>
<!-- 内容 -->
<div class="container-laobuluo-main">
    <div class="layui-container container-m">
        <div class="layui-row layui-col-space15">
            <!-- 左边 -->
            <div class="layui-col-md9">
                <div class="laobuluo-panel">
                    <div class="laobuluo-controw">
                        <fieldset class="layui-elem-field layui-field-title site-title">
                            <legend>
                                <a name="get">
                                    设置选项
                                </a>
                            </legend>
                        </fieldset>
                        <form class="layui-form wpobsform" action="<?php echo wp_nonce_url('./admin.php?page=' . $this->base_folder . '/index.php'); ?>" name="wpobsform" method="post" >
                            <div class="layui-form-item">
                                <label class="layui-form-label">桶名称</label>
                                <div class="layui-input-block">
                                    <input class="layui-input" type="text" name="bucket" value="<?php echo esc_attr($this->options['bucket']); ?>" size="50" placeholder="比如：laobuluo"/>
                                    <div class="layui-form-mid layui-word-aux">
                                        创建华为云对象存储名称，比如：
                                        <code>
                                        laobuluo
                                        </code>
                                    </div>
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label"> Endpoint</label>
                                <div class="layui-input-block">
                                    <input class="layui-input" type="text" name="endpoint" value="<?php echo esc_attr($this->options['endpoint']); ?>" size="50"
                           placeholder="生成的地区URL"/>
                                    <div class="layui-form-mid layui-word-aux">
                                       
                                            Endpoint：
                                            <code>
                                            obs.cn-east-3.myhuaweicloud.com
                                            </code>                                            
                                                                               
                                    </div>
                                </div>
                            </div>
                             <div class="layui-form-item">
                                <label class="layui-form-label"> 访问域名</label>
                                <div class="layui-input-block">
                                    <input class="layui-input" type="text" name="upload_url_path" value="<?php echo esc_url(get_option('upload_url_path')); ?>" size="50" placeholder="有免费远程域名或者自定义"/>
                                    <div class="layui-form-mid layui-word-aux">
                                       
                                            自动生成远程域名
                                            <code>
                                            http://laobuluo.obs.cn-east-2.myhuaweicloud.com
                                            </code>，我们也可以自定义域名，最后 不要以 <code>/</code>结尾，留空，支持HTTPS。                                          
                                                                               
                                    </div>
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label"> Access Key</label>
                                <div class="layui-input-block">
                                    <div class="laobuluo-wp-hidden">
                                        <input class="layui-input"  type="password" name="obs_key" value="<?php echo esc_attr($this->options['obs_key']); ?>" size="50" placeholder="Access Key Id"/>
                                        <span class="laobuluo-wp-eyes"><i class="dashicons dashicons-hidden"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label"> Secret Key</label>
                                <div class="layui-input-block">
                                    <div class="laobuluo-wp-hidden">
                                        <input class="layui-input"  type="password" name="obs_secret" value="<?php echo esc_attr($this->options['obs_secret']); ?>" size="50" placeholder="Secret Access Key"/>
                                        <span class="laobuluo-wp-eyes"><i class="dashicons dashicons-hidden"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label"> 自动重命名</label>
                                <div class="layui-input-inline" style="width:60px;">
                                    <input type="checkbox" name="auto_rename"  title="设置"
                                     <?php
                        if (isset($this->options['opt']['auto_rename']) and $this->options['opt']['auto_rename']) {
                            echo 'checked="TRUE"';
                        }
                        ?>
                                    >
                                </div>
                                <div class="layui-form-mid layui-word-aux">
                                    上传文件自动重命名，解决中文文件名或者重复文件名问题
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">不在本地保存</label>
                                <div class="layui-input-inline" style="width:60px;">
                                    <input type="checkbox"  name="no_local_file"  title="设置"
                                    <?php
                           if ($this->options['no_local_file']) {
                                echo 'checked="TRUE"';
                            }
                        ?>
                                    >
                                </div>
                                <div class="layui-form-mid layui-word-aux">
                                    如不想在服务器中备份静态文件就 "勾选"。
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">禁止缩略图</label>
                                <div class="layui-input-inline" style="width:60px;">
                                    <input type="checkbox"  name="disable_thumb" title="禁止"
                                     <?php
                       if (isset($this->options['opt']['thumbsize'])) {
                            echo 'checked="TRUE"';
                        }
                        ?>
                                    >
                                </div>
                                <div class="layui-form-mid layui-word-aux">
                                    仅生成和上传主图，禁止缩略图裁剪。
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">图片处理</label>
                                <div class="layui-input-inline" style="width:60px;">
                                    <input type="checkbox" name="img_process_switch"  lay-filter="process_switch" lay-skin="switch" lay-text="开启|关闭"
                                    <?php
                            if( isset($this->options['opt']['img_process']['switch']) &&
                                $this->options['opt']['img_process']['switch']){
                                echo 'checked="TRUE"';
                            }
                            ?>
                                    >
                                </div>
                            </div>
                            <div class="layui-form-item clashid" style="display:
                            <?php
                        if( isset($this->options['opt']['img_process']['switch']) &&
                            $this->options['opt']['img_process']['switch']){
                            echo 'block';
                        } else {
                            echo 'none';
                        }
                        ?>
                            ;">
                               <?php
                            if ( !isset($this->options['opt']['img_process']['style_value'])
                                or $this->options['opt']['img_process']['style_value'] === $this->image_display_default_value
                                or $this->options['opt']['img_process']['style_value'] === '' ) {
                                    echo '<label class="layui-form-label">选择模式</label>
                                <div class="layui-input-block">
                                <input lay-filter="choice" name="img_process_style_choice" type="radio" value="0" checked="TRUE"  title="webp压缩图片" >
                                </div>
                                <div class="layui-input-block">
                                <input lay-filter="choice" name="img_process_style_choice" type="radio" value="1" title="自定义规则">
                                </div>
                                <div class="layui-input-block" >
                                <input class="layui-input" style="margin-left:65px;"
                                name="img_process_style_customize" type="text" id="rss_rule" placeholder="请填写自定义规则"
                                value="" disabled="disabled">';
                                } else {
                                    echo '<label class="layui-form-label">选择模式</label>
                                <div class="layui-input-block">
                                <input lay-filter="choice" name="img_process_style_choice" type="radio" value="0" title="webp压缩图片" >
                                </div>
                                <div class="layui-input-block">
                                <input lay-filter="choice" name="img_process_style_choice" type="radio" value="1" checked="TRUE"   title="自定义规则">
                                </div>
                                <div class="layui-input-block" >
                                <input class="layui-input" style="margin-left:65px;"
                                name="img_process_style_customize" type="text" id="rss_rule" placeholder="请填写自定义规则"
                                value="' . $this->options['opt']['img_process']['style_value'] . '" >';
                                }
                                ?>
                                <div class="layui-form-mid layui-word-aux">
                                    支持图片处理功能，编辑图片，压缩、转换格式、文字图片水印等。（需要计费，可以不开启）
                                </div>
                            </div>
                     </div>
                     <div class="layui-form-item">
                          <label class="layui-form-label"></label>
                          <div class="layui-input-block"><input type="submit" name="submit" value="保存设置" class=" layui-btn" lay-submit lay-filter="formDemo" /></div>
                     </div>
                      <input type="hidden" name="type" value="info_set">
                    </form>
                    <fieldset class="layui-elem-field layui-field-title site-title">
                        <legend><a name="get">一键替换华为云存储地址</a></legend>
                    </fieldset>
                     <blockquote class="layui-elem-quote">
                        <p>1. 网站本地已有静态文件，需要在测试兼容插件之后，将本地文件对应目录上传到对象存储目录中。</p>
                        <p>2. 初次使用对象存储插件，可以通过下面按钮一键快速替换网站内容中的原有图片地址更换为华为云存储地址</p>
                        <p>3. 如果是从其他对象存储或者外部存储替换的，可用 <a href="https://www.lezaiyun.com/wpreplace.html" target="_blank">WPReplace</a> 插件替换。</p>
                        <p>4. 建议不熟悉的朋友先备份网站和数据。</p>
                    </blockquote>
                    <form class="layui-form wpcosform" action="<?php echo wp_nonce_url('./admin.php?page=' . $this->base_folder . '/index.php'); ?>" name="wpobs_form2" method="post">
                          <div class="layui-form-item">
                               <label class="layui-form-label">一键替换</label>
                               <div class="layui-input-block">
                                    <input type="hidden" name="type" value="info_replace">
                                    <?php if(isset($this->options['opt']) && array_key_exists('legacy_data_replace', $this->options['opt']) && $this->options['opt']['legacy_data_replace'] == 1) {
                        echo '<input type="submit" disabled name="submit" value="已替换" class="button" />';
                    } else {
                        echo '<input type="submit" name="submit" value="一键替换地址" class="button" />';
                    }
                    ?>
                               </div>
                          </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- 左边 -->
        <!-- 右边 -->
        <div class="layui-col-md3">
            <div id="nav">
                <div class="laobuluo-panel">
                                <div class="laobuluo-panel-title">商家推荐 <span class="layui-badge layui-bg-orange">每月便宜云服务器商</span></div>
                                <div class="laobuluo-shangjia">
                                    <a href="https://www.laobuluo.com/4927.html?utm_source=wpobs-setting&utm_media=link&utm_campaign=rightsads" target="_blank">
                                        <img src="<?php echo plugin_dir_url( __FILE__ );?>layui/images/ucloud.jpg"></a>
                                    
                                </div>
                            </div>
                <div class="laobuluo-panel">
                    <div class="laobuluo-panel-title">
                        关注公众号
                    </div>
                    <div class="laobuluo-code">
                        <img src="<?php echo plugin_dir_url(__FILE__); ?>layui/images/qrcode.png">
                        <p>
                            微信扫码关注 <span class="layui-badge layui-bg-blue">乐在云</span> 公众号
                        </p>
                        <p>
                            <span class="layui-badge">优先</span> 获取插件更新 和 更多 <span class="layui-badge layui-bg-green">免费插件</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- 右边 -->
    </div>
</div>
</div>
<!-- 内容 -->
<!-- footer -->
<div class="container-laobuluo-main">
    <div class="layui-container container-m">
        <div class="layui-row layui-col-space15">
            <div class="layui-col-md12">
                <div class="laobuluo-footer-code">
                    <span class="codeshow"></span>
                </div>
                <div class="laobuluo-links">
                         <a href="https://www.lezaiyun.com/?utm_source=wpobs-setting&utm_media=link&utm_campaign=footer"  target="_blank">乐在云</a>
                        <a href="https://www.lezaiyun.com/?utm_source=wpobs-setting&utm_media=link&utm_campaign=footer"  target="_blank">插件官方</a>                       
                        <a href="https://www.lezaiyun.com/wpobs.html?utm_source=wpobs-setting&utm_media=link&utm_campaign=footer"  target="_blank">使用说明</a> 
                        <a href="https://www.lezaiyun.com/about/?utm_source=wpobs-setting&utm_media=link&utm_campaign=footer"  target="_blank">关于我们</a>
                        </div>
            </div>
        </div>
    </div>
</div>
<!-- footer -->
<script>
layui.use(['form', 'element','jquery'], function() {
var $ =layui.jquery;
var form = layui.form;
function menuFixed(id) {
var obj = document.getElementById(id);
var _getHeight = obj.offsetTop;
var _Width= obj.offsetWidth
window.onscroll = function () {
changePos(id, _getHeight,_Width);
}
}
function changePos(id, height,width) {
var obj = document.getElementById(id);
obj.style.width = width+'px';
var scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
var _top = scrollTop-height;
if (_top < 150) {
var o = _top;
obj.style.position = 'relative';
o = o > 0 ? o : 0;
obj.style.top = o +'px';

} else {
obj.style.position = 'fixed';
obj.style.top = 50+'px';

}
}
menuFixed('nav');

var laobueys = $('.laobuluo-wp-hidden')

laobueys.each(function(){

var inpu = $(this).find('.layui-input');
var eyes = $(this).find('.laobuluo-wp-eyes')
var width = inpu.outerWidth(true);
eyes.css('left',width+'px').show();

eyes.click(function(){
if(inpu.attr('type') == "password"){
inpu.attr('type','text')
eyes.html('<i class="dashicons dashicons-visibility"></i>')
}else{
inpu.attr('type','password')
eyes.html('<i class="dashicons dashicons-hidden"></i>')
}
})
})

var  clashid = $(".clashid");
form.on('switch(process_switch)', function(data){
if (data.elem.checked){
clashid.show()
}else{
clashid.hide()
}
});

var selectValue = null;

var rule = $("[name=img_process_style_customize]")

form.on('radio(choice)', function(data){

if(selectValue == data.value && selectValue ){
data.elem.checked = ""
selectValue = null;
}else{
selectValue = data.value;
}

if(selectValue=='1'){
rule.attr('disabled',false)
}else{
rule.attr('disabled', true)
}

})

})
</script>


