<?php

namespace App\Cells;

use App\Models\PartnersModel;

class PartnersCell
{
    public function display()
    {
        $model = new PartnersModel();
        $partners = $model->select('name, url, image, description')->findAll();

        return view('public/_includes/partners', ['partners' => $partners]);
    }
}
