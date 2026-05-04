<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

/**
 * --------------------------------------------------------------------------
 * Site Configurations
 * --------------------------------------------------------------------------
 * 
 * Config to save application data.
 */
class Site extends BaseConfig
{
	/**
	 * -------------------------------------------------------------------
	 * Application Name
	 * -------------------------------------------------------------------
	 * 
	 * @var string
	 */
	public $appName = "Dinsos P3A Kab. Purwakarta";

	/**
	 * -------------------------------------------------------------------
	 * Application Title
	 * -------------------------------------------------------------------
	 * 
	 * Application Long Name
	 * 
	 * @var string
	 */
	public $appTitle = "Dinas Sosial P3A Kabupaten Purwakarta";

	/**
	 * -------------------------------------------------------------------
	 * Application Description
	 * -------------------------------------------------------------------
	 * 
	 * @var string
	 */
	public $appDescription = "Dinas Sosial Pemberdayaan Perempuan dan Perlindungan Anak Kabupaten Purwakarta melaksanakan tugas pokok membantu Bupati melaksanakan urusan pemerintahan daerah di bidang sosial serta pemberdayaan perempuan dan perlindungan anak dan tugas pembantuan yang diberikan kepada Daerah.";

	/**
	 * -------------------------------------------------------------------
	 * Application Keywords
	 * -------------------------------------------------------------------
	 * 
	 * Separated with comma (,)
	 * 
	 * @var string
	 */
	public $appKeywords = "purwakarta,purwakartakab,dinsos,dinas sosial,dinsosp3a";

	/**
	 * -------------------------------------------------------------------
	 * App Panel Prefix
	 * -------------------------------------------------------------------
	 * 
	 * @var string
	 */
	public $panelPrefix = "app";

	/**
	 * -------------------------------------------------------------------
	 * Static API Key
	 * -------------------------------------------------------------------
	 * 
	 * @var string
	 */
	public $apiKey = "kucingKeren22";

	/**
	 * -------------------------------------------------------------------
	 * Maintenance Mode
	 * -------------------------------------------------------------------
	 * 
	 * @var bool
	 */
	public $maintenanceMode = false;
}
