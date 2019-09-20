<?php

namespace AvoRed\RestApi\Tests\Integration;

use Illuminate\Support\Facades\DB;
use AvoRed\Framework\Database\Models\Category;
use AvoRed\Framework\Database\Models\MenuGroup;
use AvoRed\RestApi\Cms\Controllers\MenuGroupController;
use AvoRed\Framework\Database\Repository\MenuGroupRepository;
use Illuminate\Http\Request;

class MenuGroupControllerTest extends IntegrationTestCase
{
    public function test_it_returns_menus_with_submenus()
    {
        $menuGroupRepository = new MenuGroupRepository;
        $controller = new MenuGroupController($menuGroupRepository);
        $request = new Request();

        $menusJson = $controller->index('main-auth-menu')->toResponse($request)->getContent();
        $menus = json_decode($menusJson, true)['data'];

        $expected = [
            ['name' => 'AvoRed'],
            ['name' => 'PHP'],
            ['name' => 'Laravel'],
            ['name' => 'Cart'],
            ['name' => 'Checkout'],
            [
                'name' => 'Account',
                'submenus' => [
                    [ 'name' => 'Logout' ]
                ]
            ]
        ];

        $this->assertArraySubset($expected, $menus);
        $this->assertCount(6, $menus);
        $this->assertCount(1, $menus[5]['submenus']);
    }
}
