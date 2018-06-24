<?php
// source: /Users/niyang/Desktop/myframe/app/views/todo/index.latte

use Latte\Runtime as LR;

class Templateedfd77bf68 extends Latte\Runtime\Template
{

	function main()
	{
		extract($this->params);
		echo LR\Filters::escapeHtmlText($a) /* line 1 */ ?>

<?php
		echo LR\Filters::escapeHtmlText($b) /* line 2 */;
		return get_defined_vars();
	}

}
