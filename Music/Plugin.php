<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
/**
 * 彼岸花Music悬浮播放器插件
 * 
 * @package 彼岸花播放器
 * @author 彼岸花
 * @version 1.0.0
 * @link https://bianhua.fun
 */
class Music_Plugin implements Typecho_Plugin_Interface
{
    /**
     * 激活插件方法,如果激活失败,直接抛出异常
     *
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function activate()
    {
        Typecho_Plugin::factory('Widget_Archive')->footer = array('Music_Plugin', 'footer');
    }

    /**
     * 禁用插件方法,如果禁用失败,直接抛出异常
     *
     * @static
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function deactivate()
    {
    }

    /**
     * 获取插件配置面板
     *
     * @access public
     * @param Typecho_Widget_Helper_Form $form 配置面板
     * @return void
     */
    public static function config(Typecho_Widget_Helper_Form $form)
    {
     $musickey = new Typecho_Widget_Helper_Form_Element_Text('musickey', NULL, 'abc123456', _t('播放器KEY'), _t('播放器注册地址：<a style="color:#0099FF" href="https://heshi.love">heshi.love</a>'));
     $form->addInput($musickey);
     $jquery = new Typecho_Widget_Helper_Form_Element_Radio('jquery', array('1' => '是', '0' => '否'), 0, _t('是否引入jquery资源？'), _t('如果设置完KEY播放器没有出现就开启此项！'));
     $form->addInput($jquery);
    }

    /**
     * 个人用户的配置面板
     *
     * @access public
     * @param Typecho_Widget_Helper_Form $form
     * @return void
     */
    public static function personalConfig(Typecho_Widget_Helper_Form $form)
    {
    }


    /**
     * 输出底部
     *
     * @access public
     * @return void
     */
    public static function footer()
    {
        $options = Typecho_Widget::widget('Widget_Options')->plugin('Music');
        $options->jquery ? $jquerys='<script src="https://template.down.tver.wang/jquery_3.3.1/jquery.min.js"></script>' : $jquerys=null ;
        echo ''.$jquerys.'<script id="ilt" src="https://heshi.love/player/js/player.js" key="' . $options->musickey . '"></script>';
    }

}
