<?php
/**
 * File: TodoModel.php
 * Author: frame@it163.org
 * Date: 18/6/23 16:52
 * Link: http://www.it163.org/
 */

namespace app\models;

use Pheasant\Types;


class Todo extends BaseModel
{

    public function properties()
    {
        return array(
            'id'   => new Types\SequenceType(),
            'title' => new Types\StringType(255, 'required'),
            'status'  => new Types\IntegerType(11, 'required'),
        );
    }

    public function tableName()
    {
        return 'todo';
    }
}