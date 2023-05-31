<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    use HasFactory;

    protected $guarded = 'id';

    public $append = ['coordinate' => 'map_poopup_content'];

    public function getNameLinkAttribute()
    {
        $title = _('app.show_detail_title', [
            'name' => $this->name, 'type' => _('outlet.outlet'),
        ]);
        $link = '<a href="'.route('outlet.show', $this).'"';
        $link .= ' title="'.$title.'"';
        $link .= $this->name;
        $link .= '</a>';   
    }
}
