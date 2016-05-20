<?php
/**
 * CkEditor plugin
 *
 * PHP version 5
 *
 * @category    CkEditor
 * @package     CkEditor
 * @author      XE Team (akasima) <osh@xpressengine.com>
 * @copyright   2014 Copyright (C) NAVER <http://www.navercorp.com>
 * @license     http://www.gnu.org/licenses/lgpl-3.0-standalone.html LGPL
 * @link        http://www.xpressengine.com
 */
namespace Xpressengine\Plugins\CkEditor;

use Xpressengine\Permission\Grant;
use Xpressengine\Plugin\AbstractPlugin;
use XeSkin;
use Route;
use XeConfig;

/**
 * CkEditor plugin
 *
 * todo: default config, permission 등록
 * 
 * @category    CkEditor
 * @package     CkEditor
 * @author      XE Team (akasima) <osh@xpressengine.com>
 * @copyright   2014 Copyright (C) NAVER <http://www.navercorp.com>
 * @license     http://www.gnu.org/licenses/lgpl-3.0-standalone.html LGPL
 * @link        http://www.xpressengine.com
 */
class Plugin extends AbstractPlugin
{
    /**
     * @return boolean
     */
    public function unInstall()
    {
        // TODO: config, permission 삭제
    }

    /**
     * @return boolean
     */
    public function checkInstalled($installedVersion = NULL)
    {
        // TODO: Implement checkInstall() method.

        return true;
    }

    /**
     * @return boolean
     */
    public function checkUpdated($installedVersion = NULL)
    {
        // TODO: Implement checkUpdate() method.
    }

    /**
     * boot
     *
     * @return void
     */
    public function boot()
    {
//        $editor = app('xe.editor');

        /** @var \Xpressengine\UIObject\UIObjectHandler $uiobjectHandler */
        $uiobjectHandler = app('xe.uiobject');
//        $uiobjectHandler->setAlias('editor', 'uiobject/ckeditor@ckEditor');
        $uiobjectHandler->setAlias('contentCompiler', 'uiobject/ckeditor@contentsCompiler');

        XeSkin::setDefaultSettingsSkin($this->getId(), 'editor/ckeditor@ckEditor/settingsSkin/ckeditor@default');


        Route::settings($this->getId(), function () {
            Route::get('setting/{instanceId}', ['as' => 'manage.plugin.cke.setting', 'uses' => 'SettingsController@getSetting']);
            Route::post('setting/{instanceId}', ['as' => 'manage.plugin.cke.setting', 'uses' => 'SettingsController@postSetting']);
        }, ['namespace' => __NAMESPACE__]);

        app()->bind('xe.plugin.ckeditor', function ($app) {
            return $this;
        }, true);
    }

    /**
     * activate
     *
     * @param null $installedVersion installed version
     * @return void
     */
    public function activate($installedVersion = null)
    {
        // todo: 기본 설정 및 권한 등록
        XeConfig::set('editor/ckeditor@ckEditor', []);
//        app('xe.permission')->register('editor/ckeditor@ckEditor', new Grant());
    }
}
