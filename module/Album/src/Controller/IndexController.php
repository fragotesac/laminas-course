<?php

/**
 * @see       https://github.com/laminas/laminas-mvc-skeleton for the canonical source repository
 * @copyright https://github.com/laminas/laminas-mvc-skeleton/blob/master/COPYRIGHT.md
 * @license   https://github.com/laminas/laminas-mvc-skeleton/blob/master/LICENSE.md New BSD License
 */

declare(strict_types=1);

namespace Album\Controller;

use Album\Model\AlbumTable;
use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
	private $table;

	public function __construct(AlbumTable $table)
	{
		$this->table = $table;
	}

	public function indexAction()
    {
        return new ViewModel();
    }

    public function addAction()
    {
    	echo 'add';
    	exit;
    }

    public function editAction()
    {

	    return new ViewModel();
    }

    public function deleteAction()
    {

    }
}
