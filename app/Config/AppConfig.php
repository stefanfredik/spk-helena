<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class AppConfig extends BaseConfig
{
    public string $appName = APP_NAME;
    public string $appVersion = APP_VER;
    public string $appDescription = APP_DESC;
    public string $appSlug = "SPK";
    public string $logoImg = "assets/img/favicon.png";


    function getAppName()
    {
        return $this->appName;
    }


    function getAppDesc()
    {
        return $this->appDescription;
    }

    function getAppSlug()
    {
        return $this->appSlug;
    }
}
