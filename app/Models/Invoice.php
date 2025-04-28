<?php

/**
 * Created By: JISHNU T K
 * Date: 2025/04/28
 * Time: 22:46:47
 * Description: Invoice.php
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = ['customer_name', 'customer_email', 'quantity', 'amount', 'total_amount', 'tax_percentage', 'net_amount', 'invoice_date', 'file_path'];

    public static function getTableName()
    {
        return with(new static)->getTable();
    }
}
