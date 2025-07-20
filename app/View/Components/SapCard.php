<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SapCard extends Component
{
    public string $title;
    public string $subtitle;
    public string $icon;
    public string $color;
    public bool $loading;

    /**
     * Create a new component instance.
     */
    public function __construct(
        string $title = '',
        string $subtitle = '',
        string $icon = 'fas fa-info-circle',
        string $color = 'primary',
        bool $loading = false
    ) {
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->icon = $icon;
        $this->color = $color;
        $this->loading = $loading;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.sap-card');
    }

    /**
     * Get the card classes based on color.
     */
    public function cardClasses(): string
    {
        return match($this->color) {
            'primary' => 'border-blue-500 bg-blue-50',
            'success' => 'border-green-500 bg-green-50',
            'warning' => 'border-yellow-500 bg-yellow-50',
            'danger' => 'border-red-500 bg-red-50',
            'info' => 'border-cyan-500 bg-cyan-50',
            default => 'border-gray-500 bg-gray-50',
        };
    }

    /**
     * Get the icon classes based on color.
     */
    public function iconClasses(): string
    {
        return match($this->color) {
            'primary' => 'text-blue-600',
            'success' => 'text-green-600',
            'warning' => 'text-yellow-600',
            'danger' => 'text-red-600',
            'info' => 'text-cyan-600',
            default => 'text-gray-600',
        };
    }
}
