<?php

namespace App\View\Components\Admin\Partials;

use Illuminate\View\Component;

class NestedNavLink extends Component
{
    /**
     * construct class
     *
     * @param string $main_header
     * @param int $sub_count
     * @param array $sub_links
     */
    public function __construct(
        public string $main_header = 'المركبات',
        public int $sub_count = 0,
        public array $sub_links = []
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.partials.nested-nav-link');
    }
}
