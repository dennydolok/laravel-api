<?php 
namespace App\Filters\V1;

use App\Filters\ApiFilter;  

class InvoicesFilters extends ApiFilter{
    protected $allowedParams = [
        'customerId' => ['eq'],
        'amount' => ['eq', 'lte', 'lt', 'gt', 'gte'],
        'status' => ['eq', 'ne'],
        'billedDate' => ['eq', 'lte', 'lt', 'gt', 'gte'],
        'paidDate' => ['eq', 'lte', 'lt', 'gt', 'gte']
    ];

    protected $columnMap = [
        'customerId' => 'customer_id',
        'amount' => 'amount',
        'status' => 'status',
        'billedDate' => 'billed_date',
        'paidDate' => 'paid_date'
    ];

    protected $operatorMap = [
        'eq' => '=',
        'gt' => '>',
        'gte' => '>=',
        'lt' => '<',
        'lte' => '<=',
        'ne' => '!='
    ];
}
?>