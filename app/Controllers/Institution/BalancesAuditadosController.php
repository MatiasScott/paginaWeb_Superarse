<?php

declare(strict_types=1);

namespace App\Controllers\Institution;

use App\Models\Institution\BalancesAuditadosModel;

final class BalancesAuditadosController
{
    private BalancesAuditadosModel $model;

    public function __construct(BalancesAuditadosModel $model)
    {
        $this->model = $model;
    }

    public function show(): void
    {
        $heroIcon = $this->model->heroIcon();
        $heroKicker = $this->model->kicker();
        $heroTitle = $this->model->title();
        $heroParagraphs = $this->model->paragraphs();
        $reportsHeading = $this->model->reportsHeading();
        $reportsPrompt = $this->model->reportsPrompt();
        $balances = $this->model->balances();
        $note = $this->model->note();

        require ROOT_PATH . '/app/Views/institution/balances-auditados.php';
    }
}