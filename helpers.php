<?php
use App\Core\App;
use App\Core\Layout;
use App\Core\Site;
use App\Core\Slots;


function app(): object
{
    return App::instance();
}

function site(): object
{
    return Site::instance();
}

function snippet($name, $data = []): ?string
{
    if (is_object($data) === true) {
        $data = ['item' => $data];
    }

    return \App\Core\View::snippet($name, $data);
}


function layout($name = null, ?array $data = null)
{
    if (is_array($name) === true) {
        $data = $name;
        $name = null;
    }

    Layout::start($name, $data);
}

function slot(?string $name = null)
{
    Slots::start($name);
}

function endslot()
{
    echo Slots::end();
}


