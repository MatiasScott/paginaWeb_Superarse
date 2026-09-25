<?php

declare(strict_types=1);

namespace App\Controllers\Page;

use App\Core\BasePageController;
use App\Models\Page\ContentModel;

class ContentController extends BasePageController
{
    public function __construct(ContentModel $content)
    {
        parent::__construct($content);
    }
}

