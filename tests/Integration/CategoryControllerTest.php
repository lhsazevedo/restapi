<?php

namespace AvoRed\RestApi\Tests\Integration;

use Illuminate\Support\Facades\DB;
use AvoRed\Framework\Database\Models\Category;
use AvoRed\Framework\Database\Models\MenuGroup;
use AvoRed\RestApi\Cms\Controllers\MenuGroupController;
use AvoRed\Framework\Database\Repository\MenuGroupRepository;
use Illuminate\Http\Request;

class CategoryControllerTest extends IntegrationTestCase
{
    public function test_it_returns_menus_with_submenus()
    {
    }
}