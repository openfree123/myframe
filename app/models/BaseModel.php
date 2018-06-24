<?php
/**
 * File: BaseModel.php
 * Author: frame@it163.org
 * Date: 18/6/23 16:52
 * Link: http://www.it163.org/
 */

namespace app\models;
use Pheasant;
use Pheasant\DomainObject;

Pheasant::setup($GLOBALS['db']['dsn']);

class BaseModel extends DomainObject
{



}