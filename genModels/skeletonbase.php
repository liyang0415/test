<?php
namespace Wispirit\DbModel\BaseModel;
/**
* 基础模型
* 表名 {tableName}
* 自动生成文件 禁止修改
*
* @uses
*
* @category {modelName}
* @package  BaseModel
* @author    <>
* @license
* @link
*/
class {modelName} extends \Wispirit\DbModel\BasicDbModel{
    public static $table='{dbname}.{tableName}';

    function __construct($config=array())
    {
        parent::__construct($config);
    }

    function getTableFields()
    {
        {getTableFields};
    }

}