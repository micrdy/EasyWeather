<?php 
namespace Concrete\Package\EasyWeather;
use Package;
use BlockType;
use Loader; 
use Database; 

class Controller extends Package {

     protected $pkgHandle = 'easy_weather';
     protected $appVersionRequired = '5.7.0.4';
     protected $pkgVersion = '0.9.1';

     public function getPackageDescription() {
          return t("A Block for viewing the current weather at a given location.");
     }

     public function getPackageName() {
          return t("Easy Weather");
     }
     
     public function install() {
          $pkg = parent::install();
     
          // install block 
          BlockType::installBlockTypeFromPackage('easy_weather', $pkg); 
     }
     public function uninstall() {
          parent::uninstall();
          $db = \Database::connection();
          $db->query('drop table btEasyWeather');
     }
}
?>