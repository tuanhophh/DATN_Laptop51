<?php

namespace App\Services;

use Illuminate\Support\Facades\Gate;

class PermissionGateAndPolicyAccess{


    public function setGateAndPolicyAccess()
    {       
        $this->defineGateCategory();

    }

    public function defineGateCategory(){

        //  Danh mục
        Gate::define('list-category', 'App\Policies\CategoryPolicy@view');
        Gate::define('add-category', 'App\Policies\CategoryPolicy@create');
        Gate::define('edit-category', 'App\Policies\CategoryPolicy@update');
        Gate::define('delete-category', 'App\Policies\CategoryPolicy@delete');

        //  Sản phẩm
        Gate::define('list-product', 'App\Policies\ProductPolicy@view');
        Gate::define('add-product', 'App\Policies\ProductPolicy@create');
        Gate::define('edit-product', 'App\Policies\ProductPolicy@update');
        Gate::define('delete-product', 'App\Policies\ProductPolicy@delete');

        //  Người dùng
        Gate::define('list-user', 'App\Policies\UserPolicy@view');
        Gate::define('add-user', 'App\Policies\UserPolicy@create');
        Gate::define('edit-user', 'App\Policies\UserPolicy@update');
        Gate::define('delete-user', 'App\Policies\UserPolicy@delete');

        //  Hóa đơn
        Gate::define('list-bill', 'App\Policies\BillPolicy@view');
        Gate::define('add-bill', 'App\Policies\BillPolicy@create');
        Gate::define('edit-bill', 'App\Policies\BillPolicy@update');
        Gate::define('delete-bill', 'App\Policies\BillPolicy@delete');

        //  Phân quyền
        Gate::define('list-role', 'App\Policies\RolePolicy@view');
        Gate::define('add-role', 'App\Policies\RolePolicy@create');
        Gate::define('edit-role', 'App\Policies\RolePolicy@update');
        Gate::define('delete-role', 'App\Policies\RolePolicy@delete');
    }
    
}
?>