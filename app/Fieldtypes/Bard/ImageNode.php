<?php

namespace Statamic\Fieldtypes\Bard;

use Statamic\Support\Str;
use Scrumpy\ProseMirrorToHtml\Nodes\Node;
use Statamic\Facades\Asset;

class ImageNode extends Node
{
    public function matching()
    {
        return $this->node->type === 'image';
    }

    public function selfClosing() {
        return true;
    }

    public function tag()
    {
        $attrs = $this->node->attrs;

        if (Str::startsWith($attrs->src, 'asset::')) {
            $id = Str::after($attrs->src, 'asset::');
            $attrs->src = Asset::find($id)->url();
        }

        return [
            [
                'tag' => 'img',
                'attrs' => (array) $attrs,
            ]
        ];
    }
}
