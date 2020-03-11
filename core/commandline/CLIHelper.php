<?php
/**
 * Created by PhpStorm.
 * User: SiteAlive.pk
 * Date: 7/22/2019
 * Time: 9:56 PM
 */

namespace Core\commandline;


class CLIHelper
{

    public static function createNamespace($base_nameSpace, $class_name)
    {
        $namespace = $base_nameSpace;
        $class_name_array = explode('/', $class_name);
        $count = count($class_name_array);
        if ($count == 1) {
            return $base_nameSpace;
        }
        $i = 0;
        do {
            $namespace .= '\\' . ucfirst($class_name_array[$i]);
            $i++;
        } while ($i < $count - 1);

        $namespace = rtrim($namespace, '\\');
        return $namespace;
    }

    public static function getClassName($class_name)
    {

        $class_name = explode('/', $class_name);
        $count = count($class_name) - 1;

        return $class_name[$count];
    }

    public static function getControllerTemplate($namespace, $class)
    {
        $template = "<?php \n\n\nnamespace $namespace;\n\n\n\nuse Core\SmartController;\n\nclass $class extends SmartController\n{\n\n}";
        return $template;
    }

    public static function getModelTemplate($namespace, $class)
    {
        $table='$table';
        $template = "<?php \n\n\nnamespace $namespace;\n\n\n\nuse Core\SmartModel;\n\nclass $class extends SmartModel\n{\n\t//public static $table = '';\n\n}";
        return $template;
    }
}