<?php

declare(strict_types=1);

namespace App\Controllers\Institution;

use App\Models\Institution\BalanceGeneralModel;

final class BalanceGeneralController
{
    private BalanceGeneralModel $model;

    public function __construct(BalanceGeneralModel $model)
    {
        $this->model = $model;
    }

    public function show(): void
    {
        $heroIcon = $this->model->heroIcon();
        $heroKicker = $this->model->kicker();
        $heroTitle = $this->model->title();
        $heroParagraphs = $this->model->paragraphs();
        $documentsHeading = $this->model->documentsHeading();
        $documentsPrompt = $this->model->documentsPrompt();

        $balances = $this->model->balances();

        require ROOT_PATH . '/app/Views/institution/balances-generales.php';
    }
}