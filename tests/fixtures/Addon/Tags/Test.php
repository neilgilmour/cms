<?php

namespace Foo\Bar\Tags;

use Statamic\Tags\Tags;

class Test extends Tags
{
    public function index()
    {
        return $this->get('variable');
    }

    /**
     * Takes a param of "var", gets the value from the context, and simply parses the contents.
     *
     * @return string
     */
    public function someParsing()
    {
        $var = $this->get('var');

        $val = array_get($this->context, $var);

        return $this->parse([$var => $val]);
    }

    public function someLoopParsing()
    {
        return $this->parseLoop([
            [], [],
        ]);
    }

    public function returnSimpleArray()
    {
        return ['one' => 'a', 'two' => 'b'];
    }

    public function returnMultidimensionalArray()
    {
        return [
            ['one' => 'a', 'two' => 'b'],
            ['one' => 'c', 'two' => 'd'],
        ];
    }

    public function returnEmptyArray()
    {
        return [];
    }

    public function returnCollection()
    {
        return collect($this->returnMultidimensionalArray());
    }
}
