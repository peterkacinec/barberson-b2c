<?php

declare(strict_types=1);

namespace App\Filters\V1;

use App\Filters\ApiFilter;

class ProviderFilter extends ApiFilter
{
    protected array $allowedParams = [
        'name' => ['eq'],
        'category_id' => ['eq'],
        'surname' => ['eq'],
        'birthdate' => ['eq', 'lt', 'lte', 'gt', 'gte'],
        'email' => ['eq'],
        'phone' => ['eq'],
        'gender' => ['eq'],
        'description' => ['eq'],
    ];

    protected array $columnMap = [
        'createdAt' => 'created_at',
        'updatedAt' => 'updated_at',
    ];
}
